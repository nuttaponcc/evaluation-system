import { COOKIE_NAME } from "@shared/const";
import { TRPCError } from "@trpc/server";
import { z } from "zod";
import { getSessionCookieOptions } from "./_core/cookies";
import { systemRouter } from "./_core/systemRouter";
import { publicProcedure, protectedProcedure, router } from "./_core/trpc";
import * as db from "./db";
import { storagePut } from "./storage";
import { nanoid } from "nanoid";

// Admin procedure - requires admin role
const adminProcedure = protectedProcedure.use(({ ctx, next }) => {
  if (ctx.user.role !== 'admin') {
    throw new TRPCError({ code: 'FORBIDDEN', message: 'Admin access required' });
  }
  return next({ ctx });
});

export const appRouter = router({
  system: systemRouter,
  
  auth: router({
    me: publicProcedure.query(opts => opts.ctx.user),
    logout: publicProcedure.mutation(({ ctx }) => {
      const cookieOptions = getSessionCookieOptions(ctx.req);
      ctx.res.clearCookie(COOKIE_NAME, { ...cookieOptions, maxAge: -1 });
      return { success: true } as const;
    }),
  }),

  // File upload router
  upload: router({
    file: adminProcedure
      .input(z.object({
        fileData: z.string(), // base64 encoded file data
        fileName: z.string(),
        contentType: z.string(),
        folder: z.enum(["courses", "instructors"]),
      }))
      .mutation(async ({ input, ctx }) => {
        try {
          // Decode base64
          const buffer = Buffer.from(input.fileData, 'base64');
          
          // Generate unique file key
          const ext = input.fileName.split('.').pop();
          const randomSuffix = nanoid(8);
          const fileKey = `${input.folder}/${randomSuffix}.${ext}`;
          
          // Upload to S3
          const result = await storagePut(fileKey, buffer, input.contentType);
          
          return {
            success: true,
            url: result.url,
            key: result.key,
          };
        } catch (error) {
          console.error('File upload error:', error);
          throw new TRPCError({
            code: 'INTERNAL_SERVER_ERROR',
            message: 'Failed to upload file',
          });
        }
      }),
  }),

  // Dashboard stats
  stats: router({
    dashboard: publicProcedure.query(async () => {
      return db.getDashboardStats();
    }),
  }),

  // Admin router
  admin: router({
    getStats: adminProcedure.query(async () => {
      return db.getDashboardStats();
    }),
    getUsers: adminProcedure.query(async () => {
      return db.getAllUsers();
    }),
    toggleUserRole: adminProcedure
      .input(z.object({ userId: z.number(), newRole: z.enum(["user", "admin"]) }))
      .mutation(async ({ input }) => {
        await db.updateUserRole(input.userId, input.newRole);
        return { success: true };
      }),
  }),

  // Jobs router
  jobs: router({
    list: publicProcedure
      .input(z.object({
        search: z.string().optional(),
        jobType: z.string().optional(),
        isActive: z.boolean().optional(),
        limit: z.number().optional(),
        offset: z.number().optional(),
      }).optional())
      .query(async ({ input }) => {
        return db.getJobs(input);
      }),
    
    getById: publicProcedure
      .input(z.object({ id: z.number() }))
      .query(async ({ input }) => {
        const job = await db.getJobById(input.id);
        if (!job) throw new TRPCError({ code: 'NOT_FOUND' });
        await db.incrementJobViewCount(input.id);
        return job;
      }),
    
    create: adminProcedure
      .input(z.object({
        title: z.string().min(1),
        company: z.string().min(1),
        location: z.string().min(1),
        jobType: z.enum(["fulltime", "parttime", "internship", "contract"]),
        salaryMin: z.number().nullable().optional(),
        salaryMax: z.number().nullable().optional(),
        description: z.string().min(1),
        requirements: z.string().nullable().optional(),
        benefits: z.string().nullable().optional(),
        contactEmail: z.string().nullable().optional(),
        contactPhone: z.string().nullable().optional(),
        applicationUrl: z.string().nullable().optional(),
        deadline: z.date().nullable().optional(),
        isUrgent: z.boolean().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        return db.createJob(input);
      }),
    
    update: adminProcedure
      .input(z.object({
        id: z.number(),
        title: z.string().min(1).optional(),
        company: z.string().min(1).optional(),
        location: z.string().min(1).optional(),
        jobType: z.enum(["fulltime", "parttime", "internship", "contract"]).optional(),
        salaryMin: z.number().nullable().optional(),
        salaryMax: z.number().nullable().optional(),
        description: z.string().min(1).optional(),
        requirements: z.string().nullable().optional(),
        benefits: z.string().nullable().optional(),
        contactEmail: z.string().nullable().optional(),
        contactPhone: z.string().nullable().optional(),
        applicationUrl: z.string().nullable().optional(),
        deadline: z.date().nullable().optional(),
        isUrgent: z.boolean().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        const { id, ...data } = input;
        await db.updateJob(id, data);
        return { success: true };
      }),
    
    delete: adminProcedure
      .input(z.object({ id: z.number() }))
      .mutation(async ({ input }) => {
        await db.deleteJob(input.id);
        return { success: true };
      }),
    
    toggleActive: adminProcedure
      .input(z.object({ id: z.number(), isActive: z.boolean() }))
      .mutation(async ({ input }) => {
        await db.updateJob(input.id, { isActive: input.isActive });
        return { success: true };
      }),
  }),

  // Scholarships router
  scholarships: router({
    list: publicProcedure
      .input(z.object({
        search: z.string().optional(),
        scholarshipType: z.string().optional(),
        isActive: z.boolean().optional(),
        limit: z.number().optional(),
        offset: z.number().optional(),
      }).optional())
      .query(async ({ input }) => {
        return db.getScholarships(input);
      }),
    
    getById: publicProcedure
      .input(z.object({ id: z.number() }))
      .query(async ({ input }) => {
        const scholarship = await db.getScholarshipById(input.id);
        if (!scholarship) throw new TRPCError({ code: 'NOT_FOUND' });
        await db.incrementScholarshipViewCount(input.id);
        return scholarship;
      }),
    
    create: adminProcedure
      .input(z.object({
        title: z.string().min(1),
        provider: z.string().min(1),
        amount: z.number().nullable().optional(),
        amountDescription: z.string().nullable().optional(),
        scholarshipType: z.enum(["full", "partial", "grant", "loan"]),
        eligibility: z.string().min(1),
        description: z.string().min(1),
        requirements: z.string().nullable().optional(),
        applicationProcess: z.string().nullable().optional(),
        contactEmail: z.string().nullable().optional(),
        contactPhone: z.string().nullable().optional(),
        applicationUrl: z.string().nullable().optional(),
        startDate: z.date().nullable().optional(),
        deadline: z.date().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        return db.createScholarship(input);
      }),
    
    update: adminProcedure
      .input(z.object({
        id: z.number(),
        title: z.string().min(1).optional(),
        provider: z.string().min(1).optional(),
        amount: z.number().nullable().optional(),
        amountDescription: z.string().nullable().optional(),
        scholarshipType: z.enum(["full", "partial", "grant", "loan"]).optional(),
        eligibility: z.string().min(1).optional(),
        description: z.string().min(1).optional(),
        requirements: z.string().nullable().optional(),
        applicationProcess: z.string().nullable().optional(),
        contactEmail: z.string().nullable().optional(),
        contactPhone: z.string().nullable().optional(),
        applicationUrl: z.string().nullable().optional(),
        startDate: z.date().nullable().optional(),
        deadline: z.date().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        const { id, ...data } = input;
        await db.updateScholarship(id, data);
        return { success: true };
      }),
    
    delete: adminProcedure
      .input(z.object({ id: z.number() }))
      .mutation(async ({ input }) => {
        await db.deleteScholarship(input.id);
        return { success: true };
      }),
    
    toggleActive: adminProcedure
      .input(z.object({ id: z.number(), isActive: z.boolean() }))
      .mutation(async ({ input }) => {
        await db.updateScholarship(input.id, { isActive: input.isActive });
        return { success: true };
      }),
  }),

  // Activities router
  activities: router({
    list: publicProcedure
      .input(z.object({
        search: z.string().optional(),
        activityType: z.string().optional(),
        isActive: z.boolean().optional(),
        limit: z.number().optional(),
        offset: z.number().optional(),
      }).optional())
      .query(async ({ input }) => {
        return db.getActivities(input);
      }),
    
    getById: publicProcedure
      .input(z.object({ id: z.number() }))
      .query(async ({ input }) => {
        const activity = await db.getActivityById(input.id);
        if (!activity) throw new TRPCError({ code: 'NOT_FOUND' });
        await db.incrementActivityViewCount(input.id);
        return activity;
      }),
    
    create: adminProcedure
      .input(z.object({
        title: z.string().min(1),
        organizer: z.string().min(1),
        activityType: z.enum(["workshop", "seminar", "competition", "exhibition", "other"]),
        location: z.string().min(1),
        isOnline: z.boolean().optional(),
        onlineUrl: z.string().nullable().optional(),
        description: z.string().min(1),
        schedule: z.string().nullable().optional(),
        maxParticipants: z.number().nullable().optional(),
        registrationFee: z.number().optional(),
        contactEmail: z.string().nullable().optional(),
        contactPhone: z.string().nullable().optional(),
        registrationUrl: z.string().nullable().optional(),
        startDate: z.date(),
        endDate: z.date().nullable().optional(),
        registrationDeadline: z.date().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        return db.createActivity(input);
      }),
    
    update: adminProcedure
      .input(z.object({
        id: z.number(),
        title: z.string().min(1).optional(),
        organizer: z.string().min(1).optional(),
        activityType: z.enum(["workshop", "seminar", "competition", "exhibition", "other"]).optional(),
        location: z.string().min(1).optional(),
        isOnline: z.boolean().optional(),
        onlineUrl: z.string().nullable().optional(),
        description: z.string().min(1).optional(),
        schedule: z.string().nullable().optional(),
        maxParticipants: z.number().nullable().optional(),
        registrationFee: z.number().optional(),
        contactEmail: z.string().nullable().optional(),
        contactPhone: z.string().nullable().optional(),
        registrationUrl: z.string().nullable().optional(),
        startDate: z.date().optional(),
        endDate: z.date().nullable().optional(),
        registrationDeadline: z.date().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        const { id, ...data } = input;
        await db.updateActivity(id, data);
        return { success: true };
      }),
    
    delete: adminProcedure
      .input(z.object({ id: z.number() }))
      .mutation(async ({ input }) => {
        await db.deleteActivity(input.id);
        return { success: true };
      }),
    
    toggleActive: adminProcedure
      .input(z.object({ id: z.number(), isActive: z.boolean() }))
      .mutation(async ({ input }) => {
        await db.updateActivity(input.id, { isActive: input.isActive });
        return { success: true };
      }),
  }),

  // Instructors router
  instructors: router({
    list: publicProcedure
      .input(z.object({
        search: z.string().optional(),
        department: z.string().optional(),
        isActive: z.boolean().optional(),
        limit: z.number().optional(),
        offset: z.number().optional(),
      }).optional())
      .query(async ({ input }) => {
        return db.getInstructors(input);
      }),
    
    listForSelect: publicProcedure.query(async () => {
      return db.getAllInstructorsForSelect();
    }),
    
    getById: publicProcedure
      .input(z.object({ id: z.number() }))
      .query(async ({ input }) => {
        const instructor = await db.getInstructorById(input.id);
        if (!instructor) throw new TRPCError({ code: 'NOT_FOUND' });
        return instructor;
      }),
    
    getCourses: publicProcedure
      .input(z.object({ id: z.number() }))
      .query(async ({ input }) => {
        return db.getCoursesByInstructor(input.id);
      }),
    
    create: adminProcedure
      .input(z.object({
        name: z.string().min(1),
        title: z.string().nullable().optional(),
        position: z.string().nullable().optional(),
        department: z.string().nullable().optional(),
        email: z.string().nullable().optional(),
        phone: z.string().nullable().optional(),
        office: z.string().nullable().optional(),
        imageUrl: z.string().nullable().optional(),
        bio: z.string().nullable().optional(),
        education: z.string().nullable().optional(),
        expertise: z.string().nullable().optional(),
        publications: z.string().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        return db.createInstructor(input);
      }),
    
    update: adminProcedure
      .input(z.object({
        id: z.number(),
        name: z.string().min(1).optional(),
        title: z.string().nullable().optional(),
        position: z.string().nullable().optional(),
        department: z.string().nullable().optional(),
        email: z.string().nullable().optional(),
        phone: z.string().nullable().optional(),
        office: z.string().nullable().optional(),
        imageUrl: z.string().nullable().optional(),
        bio: z.string().nullable().optional(),
        education: z.string().nullable().optional(),
        expertise: z.string().nullable().optional(),
        publications: z.string().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        const { id, ...data } = input;
        await db.updateInstructor(id, data);
        return { success: true };
      }),
    
    delete: adminProcedure
      .input(z.object({ id: z.number() }))
      .mutation(async ({ input }) => {
        await db.deleteInstructor(input.id);
        return { success: true };
      }),
    
    toggleActive: adminProcedure
      .input(z.object({ id: z.number(), isActive: z.boolean() }))
      .mutation(async ({ input }) => {
        await db.updateInstructor(input.id, { isActive: input.isActive });
        return { success: true };
      }),
  }),

  // Courses router
  courses: router({
    list: publicProcedure
      .input(z.object({
        search: z.string().optional(),
        courseType: z.string().optional(),
        level: z.string().optional(),
        instructorId: z.number().optional(),
        isActive: z.boolean().optional(),
        limit: z.number().optional(),
        offset: z.number().optional(),
      }).optional())
      .query(async ({ input }) => {
        return db.getCourses(input);
      }),
    
    getById: publicProcedure
      .input(z.object({ id: z.number() }))
      .query(async ({ input }) => {
        const course = await db.getCourseById(input.id);
        if (!course) throw new TRPCError({ code: 'NOT_FOUND' });
        return course;
      }),
    
    create: adminProcedure
      .input(z.object({
        code: z.string().min(1),
        title: z.string().min(1),
        titleEn: z.string().nullable().optional(),
        credits: z.number(),
        courseType: z.enum(["required", "elective", "general"]),
        level: z.enum(["undergraduate", "graduate", "all"]),
        description: z.string().min(1),
        objectives: z.string().nullable().optional(),
        syllabus: z.string().nullable().optional(),
        prerequisites: z.string().nullable().optional(),
        schedule: z.string().nullable().optional(),
        room: z.string().nullable().optional(),
        semester: z.string().nullable().optional(),
        academicYear: z.string().nullable().optional(),
        maxStudents: z.number().nullable().optional(),
        instructorId: z.number().nullable().optional(),
        documentUrl: z.string().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        return db.createCourse(input);
      }),
    
    update: adminProcedure
      .input(z.object({
        id: z.number(),
        code: z.string().min(1).optional(),
        title: z.string().min(1).optional(),
        titleEn: z.string().nullable().optional(),
        credits: z.number().optional(),
        courseType: z.enum(["required", "elective", "general"]).optional(),
        level: z.enum(["undergraduate", "graduate", "all"]).optional(),
        description: z.string().min(1).optional(),
        objectives: z.string().nullable().optional(),
        syllabus: z.string().nullable().optional(),
        prerequisites: z.string().nullable().optional(),
        schedule: z.string().nullable().optional(),
        room: z.string().nullable().optional(),
        semester: z.string().nullable().optional(),
        academicYear: z.string().nullable().optional(),
        maxStudents: z.number().nullable().optional(),
        instructorId: z.number().nullable().optional(),
        documentUrl: z.string().nullable().optional(),
        isActive: z.boolean().optional(),
      }))
      .mutation(async ({ input }) => {
        const { id, ...data } = input;
        await db.updateCourse(id, data);
        return { success: true };
      }),
    
    delete: adminProcedure
      .input(z.object({ id: z.number() }))
      .mutation(async ({ input }) => {
        await db.deleteCourse(input.id);
        return { success: true };
      }),
    
    toggleActive: adminProcedure
      .input(z.object({ id: z.number(), isActive: z.boolean() }))
      .mutation(async ({ input }) => {
        await db.updateCourse(input.id, { isActive: input.isActive });
        return { success: true };
      }),
  }),

  // Users router (admin only)
  users: router({
    list: adminProcedure.query(async () => {
      return db.getAllUsers();
    }),
    
    updateRole: adminProcedure
      .input(z.object({ id: z.number(), role: z.enum(["user", "admin"]) }))
      .mutation(async ({ input }) => {
        await db.updateUserRole(input.id, input.role);
        return { success: true };
      }),
  }),
});

export type AppRouter = typeof appRouter;
