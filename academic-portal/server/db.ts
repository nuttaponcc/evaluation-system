import { eq, desc, asc, like, and, or, gte, lte, sql } from "drizzle-orm";
import { drizzle } from "drizzle-orm/mysql2";
import { 
  InsertUser, users, 
  jobs, InsertJob, Job,
  scholarships, InsertScholarship, Scholarship,
  activities, InsertActivity, Activity,
  instructors, InsertInstructor, Instructor,
  courses, InsertCourse, Course
} from "../drizzle/schema";
import { ENV } from './_core/env';

let _db: ReturnType<typeof drizzle> | null = null;

export async function getDb() {
  if (!_db && process.env.DATABASE_URL) {
    try {
      _db = drizzle(process.env.DATABASE_URL);
    } catch (error) {
      console.warn("[Database] Failed to connect:", error);
      _db = null;
    }
  }
  return _db;
}

// ============ USER QUERIES ============
export async function upsertUser(user: InsertUser): Promise<void> {
  if (!user.openId) throw new Error("User openId is required for upsert");
  const db = await getDb();
  if (!db) return;

  const values: InsertUser = { openId: user.openId };
  const updateSet: Record<string, unknown> = {};

  const textFields = ["name", "email", "loginMethod"] as const;
  textFields.forEach(field => {
    const value = user[field];
    if (value !== undefined) {
      const normalized = value ?? null;
      values[field] = normalized;
      updateSet[field] = normalized;
    }
  });

  if (user.lastSignedIn !== undefined) {
    values.lastSignedIn = user.lastSignedIn;
    updateSet.lastSignedIn = user.lastSignedIn;
  }
  if (user.role !== undefined) {
    values.role = user.role;
    updateSet.role = user.role;
  } else if (user.openId === ENV.ownerOpenId) {
    values.role = 'admin';
    updateSet.role = 'admin';
  }

  if (!values.lastSignedIn) values.lastSignedIn = new Date();
  if (Object.keys(updateSet).length === 0) updateSet.lastSignedIn = new Date();

  await db.insert(users).values(values).onDuplicateKeyUpdate({ set: updateSet });
}

export async function getUserByOpenId(openId: string) {
  const db = await getDb();
  if (!db) return undefined;
  const result = await db.select().from(users).where(eq(users.openId, openId)).limit(1);
  return result.length > 0 ? result[0] : undefined;
}

export async function getAllUsers() {
  const db = await getDb();
  if (!db) return [];
  return db.select().from(users).orderBy(desc(users.createdAt));
}

export async function updateUserRole(id: number, role: "user" | "admin") {
  const db = await getDb();
  if (!db) return;
  await db.update(users).set({ role }).where(eq(users.id, id));
}

// ============ JOBS QUERIES ============
export async function getJobs(options?: { 
  search?: string; 
  jobType?: string; 
  isActive?: boolean;
  limit?: number;
  offset?: number;
}) {
  const db = await getDb();
  if (!db) return { data: [], total: 0 };

  const conditions = [];
  if (options?.isActive !== undefined) conditions.push(eq(jobs.isActive, options.isActive));
  if (options?.jobType) conditions.push(eq(jobs.jobType, options.jobType as any));
  if (options?.search) {
    conditions.push(or(
      like(jobs.title, `%${options.search}%`),
      like(jobs.company, `%${options.search}%`),
      like(jobs.location, `%${options.search}%`)
    ));
  }

  const whereClause = conditions.length > 0 ? and(...conditions) : undefined;
  
  const [data, countResult] = await Promise.all([
    db.select().from(jobs)
      .where(whereClause)
      .orderBy(desc(jobs.isUrgent), desc(jobs.createdAt))
      .limit(options?.limit || 10)
      .offset(options?.offset || 0),
    db.select({ count: sql<number>`count(*)` }).from(jobs).where(whereClause)
  ]);

  return { data, total: countResult[0]?.count || 0 };
}

export async function getJobById(id: number) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.select().from(jobs).where(eq(jobs.id, id)).limit(1);
  return result[0] || null;
}

export async function createJob(data: InsertJob) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.insert(jobs).values(data);
  return { id: result[0].insertId };
}

export async function updateJob(id: number, data: Partial<InsertJob>) {
  const db = await getDb();
  if (!db) return;
  await db.update(jobs).set(data).where(eq(jobs.id, id));
}

export async function deleteJob(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.delete(jobs).where(eq(jobs.id, id));
}

export async function incrementJobViewCount(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.update(jobs).set({ viewCount: sql`${jobs.viewCount} + 1` }).where(eq(jobs.id, id));
}

// ============ SCHOLARSHIPS QUERIES ============
export async function getScholarships(options?: { 
  search?: string; 
  scholarshipType?: string; 
  isActive?: boolean;
  limit?: number;
  offset?: number;
}) {
  const db = await getDb();
  if (!db) return { data: [], total: 0 };

  const conditions = [];
  if (options?.isActive !== undefined) conditions.push(eq(scholarships.isActive, options.isActive));
  if (options?.scholarshipType) conditions.push(eq(scholarships.scholarshipType, options.scholarshipType as any));
  if (options?.search) {
    conditions.push(or(
      like(scholarships.title, `%${options.search}%`),
      like(scholarships.provider, `%${options.search}%`)
    ));
  }

  const whereClause = conditions.length > 0 ? and(...conditions) : undefined;
  
  const [data, countResult] = await Promise.all([
    db.select().from(scholarships)
      .where(whereClause)
      .orderBy(desc(scholarships.createdAt))
      .limit(options?.limit || 10)
      .offset(options?.offset || 0),
    db.select({ count: sql<number>`count(*)` }).from(scholarships).where(whereClause)
  ]);

  return { data, total: countResult[0]?.count || 0 };
}

export async function getScholarshipById(id: number) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.select().from(scholarships).where(eq(scholarships.id, id)).limit(1);
  return result[0] || null;
}

export async function createScholarship(data: InsertScholarship) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.insert(scholarships).values(data);
  return { id: result[0].insertId };
}

export async function updateScholarship(id: number, data: Partial<InsertScholarship>) {
  const db = await getDb();
  if (!db) return;
  await db.update(scholarships).set(data).where(eq(scholarships.id, id));
}

export async function deleteScholarship(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.delete(scholarships).where(eq(scholarships.id, id));
}

export async function incrementScholarshipViewCount(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.update(scholarships).set({ viewCount: sql`${scholarships.viewCount} + 1` }).where(eq(scholarships.id, id));
}

// ============ ACTIVITIES QUERIES ============
export async function getActivities(options?: { 
  search?: string; 
  activityType?: string; 
  isActive?: boolean;
  limit?: number;
  offset?: number;
}) {
  const db = await getDb();
  if (!db) return { data: [], total: 0 };

  const conditions = [];
  if (options?.isActive !== undefined) conditions.push(eq(activities.isActive, options.isActive));
  if (options?.activityType) conditions.push(eq(activities.activityType, options.activityType as any));
  if (options?.search) {
    conditions.push(or(
      like(activities.title, `%${options.search}%`),
      like(activities.organizer, `%${options.search}%`),
      like(activities.location, `%${options.search}%`)
    ));
  }

  const whereClause = conditions.length > 0 ? and(...conditions) : undefined;
  
  const [data, countResult] = await Promise.all([
    db.select().from(activities)
      .where(whereClause)
      .orderBy(desc(activities.startDate))
      .limit(options?.limit || 10)
      .offset(options?.offset || 0),
    db.select({ count: sql<number>`count(*)` }).from(activities).where(whereClause)
  ]);

  return { data, total: countResult[0]?.count || 0 };
}

export async function getActivityById(id: number) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.select().from(activities).where(eq(activities.id, id)).limit(1);
  return result[0] || null;
}

export async function createActivity(data: InsertActivity) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.insert(activities).values(data);
  return { id: result[0].insertId };
}

export async function updateActivity(id: number, data: Partial<InsertActivity>) {
  const db = await getDb();
  if (!db) return;
  await db.update(activities).set(data).where(eq(activities.id, id));
}

export async function deleteActivity(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.delete(activities).where(eq(activities.id, id));
}

export async function incrementActivityViewCount(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.update(activities).set({ viewCount: sql`${activities.viewCount} + 1` }).where(eq(activities.id, id));
}

// ============ INSTRUCTORS QUERIES ============
export async function getInstructors(options?: { 
  search?: string; 
  department?: string;
  isActive?: boolean;
  limit?: number;
  offset?: number;
}) {
  const db = await getDb();
  if (!db) return { data: [], total: 0 };

  const conditions = [];
  if (options?.isActive !== undefined) conditions.push(eq(instructors.isActive, options.isActive));
  if (options?.department) conditions.push(eq(instructors.department, options.department));
  if (options?.search) {
    conditions.push(or(
      like(instructors.name, `%${options.search}%`),
      like(instructors.position, `%${options.search}%`),
      like(instructors.expertise, `%${options.search}%`)
    ));
  }

  const whereClause = conditions.length > 0 ? and(...conditions) : undefined;
  
  const [data, countResult] = await Promise.all([
    db.select().from(instructors)
      .where(whereClause)
      .orderBy(asc(instructors.name))
      .limit(options?.limit || 10)
      .offset(options?.offset || 0),
    db.select({ count: sql<number>`count(*)` }).from(instructors).where(whereClause)
  ]);

  return { data, total: countResult[0]?.count || 0 };
}

export async function getInstructorById(id: number) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.select().from(instructors).where(eq(instructors.id, id)).limit(1);
  return result[0] || null;
}

export async function createInstructor(data: InsertInstructor) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.insert(instructors).values(data);
  return { id: result[0].insertId };
}

export async function updateInstructor(id: number, data: Partial<InsertInstructor>) {
  const db = await getDb();
  if (!db) return;
  await db.update(instructors).set(data).where(eq(instructors.id, id));
}

export async function deleteInstructor(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.delete(instructors).where(eq(instructors.id, id));
}

export async function getAllInstructorsForSelect() {
  const db = await getDb();
  if (!db) return [];
  return db.select({ id: instructors.id, name: instructors.name, title: instructors.title })
    .from(instructors)
    .where(eq(instructors.isActive, true))
    .orderBy(asc(instructors.name));
}

// ============ COURSES QUERIES ============
export async function getCourses(options?: { 
  search?: string; 
  courseType?: string;
  level?: string;
  instructorId?: number;
  isActive?: boolean;
  limit?: number;
  offset?: number;
}) {
  const db = await getDb();
  if (!db) return { data: [], total: 0 };

  const conditions = [];
  if (options?.isActive !== undefined) conditions.push(eq(courses.isActive, options.isActive));
  if (options?.courseType) conditions.push(eq(courses.courseType, options.courseType as any));
  if (options?.level) conditions.push(eq(courses.level, options.level as any));
  if (options?.instructorId) conditions.push(eq(courses.instructorId, options.instructorId));
  if (options?.search) {
    conditions.push(or(
      like(courses.code, `%${options.search}%`),
      like(courses.title, `%${options.search}%`),
      like(courses.titleEn, `%${options.search}%`)
    ));
  }

  const whereClause = conditions.length > 0 ? and(...conditions) : undefined;
  
  const [data, countResult] = await Promise.all([
    db.select({
      course: courses,
      instructor: {
        id: instructors.id,
        name: instructors.name,
        title: instructors.title
      }
    }).from(courses)
      .leftJoin(instructors, eq(courses.instructorId, instructors.id))
      .where(whereClause)
      .orderBy(asc(courses.code))
      .limit(options?.limit || 10)
      .offset(options?.offset || 0),
    db.select({ count: sql<number>`count(*)` }).from(courses).where(whereClause)
  ]);

  return { 
    data: data.map(d => ({ ...d.course, instructor: d.instructor })), 
    total: countResult[0]?.count || 0 
  };
}

export async function getCourseById(id: number) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.select({
    course: courses,
    instructor: {
      id: instructors.id,
      name: instructors.name,
      title: instructors.title,
      email: instructors.email,
      phone: instructors.phone,
      office: instructors.office,
      imageUrl: instructors.imageUrl
    }
  }).from(courses)
    .leftJoin(instructors, eq(courses.instructorId, instructors.id))
    .where(eq(courses.id, id))
    .limit(1);
  
  if (!result[0]) return null;
  return { ...result[0].course, instructor: result[0].instructor };
}

export async function createCourse(data: InsertCourse) {
  const db = await getDb();
  if (!db) return null;
  const result = await db.insert(courses).values(data);
  return { id: result[0].insertId };
}

export async function updateCourse(id: number, data: Partial<InsertCourse>) {
  const db = await getDb();
  if (!db) return;
  await db.update(courses).set(data).where(eq(courses.id, id));
}

export async function deleteCourse(id: number) {
  const db = await getDb();
  if (!db) return;
  await db.delete(courses).where(eq(courses.id, id));
}

export async function getCoursesByInstructor(instructorId: number) {
  const db = await getDb();
  if (!db) return [];
  return db.select().from(courses)
    .where(and(eq(courses.instructorId, instructorId), eq(courses.isActive, true)))
    .orderBy(asc(courses.code));
}

// ============ STATISTICS QUERIES ============
export async function getDashboardStats() {
  const db = await getDb();
  if (!db) return { jobs: 0, scholarships: 0, activities: 0, courses: 0, instructors: 0, users: 0 };

  const [jobCount, scholarshipCount, activityCount, courseCount, instructorCount, userCount] = await Promise.all([
    db.select({ count: sql<number>`count(*)` }).from(jobs).where(eq(jobs.isActive, true)),
    db.select({ count: sql<number>`count(*)` }).from(scholarships).where(eq(scholarships.isActive, true)),
    db.select({ count: sql<number>`count(*)` }).from(activities).where(eq(activities.isActive, true)),
    db.select({ count: sql<number>`count(*)` }).from(courses).where(eq(courses.isActive, true)),
    db.select({ count: sql<number>`count(*)` }).from(instructors).where(eq(instructors.isActive, true)),
    db.select({ count: sql<number>`count(*)` }).from(users)
  ]);

  return {
    jobs: jobCount[0]?.count || 0,
    scholarships: scholarshipCount[0]?.count || 0,
    activities: activityCount[0]?.count || 0,
    courses: courseCount[0]?.count || 0,
    instructors: instructorCount[0]?.count || 0,
    users: userCount[0]?.count || 0
  };
}
