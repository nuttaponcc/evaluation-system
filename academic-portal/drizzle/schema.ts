import { int, mysqlEnum, mysqlTable, text, timestamp, varchar, boolean, decimal } from "drizzle-orm/mysql-core";

// Users table (extended from template)
export const users = mysqlTable("users", {
  id: int("id").autoincrement().primaryKey(),
  openId: varchar("openId", { length: 64 }).notNull().unique(),
  name: text("name"),
  email: varchar("email", { length: 320 }),
  loginMethod: varchar("loginMethod", { length: 64 }),
  role: mysqlEnum("role", ["user", "admin"]).default("user").notNull(),
  createdAt: timestamp("createdAt").defaultNow().notNull(),
  updatedAt: timestamp("updatedAt").defaultNow().onUpdateNow().notNull(),
  lastSignedIn: timestamp("lastSignedIn").defaultNow().notNull(),
});

export type User = typeof users.$inferSelect;
export type InsertUser = typeof users.$inferInsert;

// Jobs table
export const jobs = mysqlTable("jobs", {
  id: int("id").autoincrement().primaryKey(),
  title: varchar("title", { length: 255 }).notNull(),
  company: varchar("company", { length: 255 }).notNull(),
  location: varchar("location", { length: 255 }).notNull(),
  jobType: mysqlEnum("jobType", ["fulltime", "parttime", "internship", "contract"]).default("fulltime").notNull(),
  salaryMin: int("salaryMin"),
  salaryMax: int("salaryMax"),
  description: text("description").notNull(),
  requirements: text("requirements"),
  benefits: text("benefits"),
  contactEmail: varchar("contactEmail", { length: 320 }),
  contactPhone: varchar("contactPhone", { length: 20 }),
  applicationUrl: varchar("applicationUrl", { length: 500 }),
  deadline: timestamp("deadline"),
  isUrgent: boolean("isUrgent").default(false).notNull(),
  isActive: boolean("isActive").default(true).notNull(),
  viewCount: int("viewCount").default(0).notNull(),
  createdAt: timestamp("createdAt").defaultNow().notNull(),
  updatedAt: timestamp("updatedAt").defaultNow().onUpdateNow().notNull(),
});

export type Job = typeof jobs.$inferSelect;
export type InsertJob = typeof jobs.$inferInsert;

// Scholarships table
export const scholarships = mysqlTable("scholarships", {
  id: int("id").autoincrement().primaryKey(),
  title: varchar("title", { length: 255 }).notNull(),
  provider: varchar("provider", { length: 255 }).notNull(),
  amount: int("amount"),
  amountDescription: varchar("amountDescription", { length: 255 }),
  scholarshipType: mysqlEnum("scholarshipType", ["full", "partial", "grant", "loan"]).default("partial").notNull(),
  eligibility: text("eligibility").notNull(),
  description: text("description").notNull(),
  requirements: text("requirements"),
  applicationProcess: text("applicationProcess"),
  contactEmail: varchar("contactEmail", { length: 320 }),
  contactPhone: varchar("contactPhone", { length: 20 }),
  applicationUrl: varchar("applicationUrl", { length: 500 }),
  startDate: timestamp("startDate"),
  deadline: timestamp("deadline"),
  isActive: boolean("isActive").default(true).notNull(),
  viewCount: int("viewCount").default(0).notNull(),
  createdAt: timestamp("createdAt").defaultNow().notNull(),
  updatedAt: timestamp("updatedAt").defaultNow().onUpdateNow().notNull(),
});

export type Scholarship = typeof scholarships.$inferSelect;
export type InsertScholarship = typeof scholarships.$inferInsert;

// Activities table
export const activities = mysqlTable("activities", {
  id: int("id").autoincrement().primaryKey(),
  title: varchar("title", { length: 255 }).notNull(),
  organizer: varchar("organizer", { length: 255 }).notNull(),
  activityType: mysqlEnum("activityType", ["workshop", "seminar", "competition", "exhibition", "other"]).default("workshop").notNull(),
  location: varchar("location", { length: 255 }).notNull(),
  isOnline: boolean("isOnline").default(false).notNull(),
  onlineUrl: varchar("onlineUrl", { length: 500 }),
  description: text("description").notNull(),
  schedule: text("schedule"),
  maxParticipants: int("maxParticipants"),
  registrationFee: int("registrationFee").default(0),
  contactEmail: varchar("contactEmail", { length: 320 }),
  contactPhone: varchar("contactPhone", { length: 20 }),
  registrationUrl: varchar("registrationUrl", { length: 500 }),
  startDate: timestamp("startDate").notNull(),
  endDate: timestamp("endDate"),
  registrationDeadline: timestamp("registrationDeadline"),
  isActive: boolean("isActive").default(true).notNull(),
  viewCount: int("viewCount").default(0).notNull(),
  createdAt: timestamp("createdAt").defaultNow().notNull(),
  updatedAt: timestamp("updatedAt").defaultNow().onUpdateNow().notNull(),
});

export type Activity = typeof activities.$inferSelect;
export type InsertActivity = typeof activities.$inferInsert;

// Instructors table
export const instructors = mysqlTable("instructors", {
  id: int("id").autoincrement().primaryKey(),
  name: varchar("name", { length: 255 }).notNull(),
  title: varchar("title", { length: 100 }),
  position: varchar("position", { length: 255 }),
  department: varchar("department", { length: 255 }),
  email: varchar("email", { length: 320 }),
  phone: varchar("phone", { length: 20 }),
  office: varchar("office", { length: 255 }),
  imageUrl: varchar("imageUrl", { length: 500 }),
  bio: text("bio"),
  education: text("education"),
  expertise: text("expertise"),
  publications: text("publications"),
  isActive: boolean("isActive").default(true).notNull(),
  createdAt: timestamp("createdAt").defaultNow().notNull(),
  updatedAt: timestamp("updatedAt").defaultNow().onUpdateNow().notNull(),
});

export type Instructor = typeof instructors.$inferSelect;
export type InsertInstructor = typeof instructors.$inferInsert;

// Courses table
export const courses = mysqlTable("courses", {
  id: int("id").autoincrement().primaryKey(),
  code: varchar("code", { length: 20 }).notNull(),
  title: varchar("title", { length: 255 }).notNull(),
  titleEn: varchar("titleEn", { length: 255 }),
  credits: int("credits").default(3).notNull(),
  courseType: mysqlEnum("courseType", ["required", "elective", "general"]).default("elective").notNull(),
  level: mysqlEnum("level", ["undergraduate", "graduate", "all"]).default("undergraduate").notNull(),
  description: text("description").notNull(),
  objectives: text("objectives"),
  syllabus: text("syllabus"),
  prerequisites: text("prerequisites"),
  schedule: varchar("schedule", { length: 255 }),
  room: varchar("room", { length: 100 }),
  semester: varchar("semester", { length: 20 }),
  academicYear: varchar("academicYear", { length: 10 }),
  maxStudents: int("maxStudents"),
  instructorId: int("instructorId").references(() => instructors.id),
  documentUrl: varchar("documentUrl", { length: 500 }),
  isActive: boolean("isActive").default(true).notNull(),
  createdAt: timestamp("createdAt").defaultNow().notNull(),
  updatedAt: timestamp("updatedAt").defaultNow().onUpdateNow().notNull(),
});

export type Course = typeof courses.$inferSelect;
export type InsertCourse = typeof courses.$inferInsert;
