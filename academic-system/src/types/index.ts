import { Prisma } from '@prisma/client';

// Job Types
export type Job = Prisma.JobGetPayload<{}>;
export type JobCreateInput = Prisma.JobCreateInput;
export type JobUpdateInput = Prisma.JobUpdateInput;

// Scholarship Types
export type Scholarship = Prisma.ScholarshipGetPayload<{}>;
export type ScholarshipCreateInput = Prisma.ScholarshipCreateInput;
export type ScholarshipUpdateInput = Prisma.ScholarshipUpdateInput;

// Activity Types
export type Activity = Prisma.ActivityGetPayload<{}>;
export type ActivityCreateInput = Prisma.ActivityCreateInput;
export type ActivityUpdateInput = Prisma.ActivityUpdateInput;

// Course Types
export type Course = Prisma.CourseGetPayload<{}>;
export type CourseCreateInput = Prisma.CourseCreateInput;
export type CourseUpdateInput = Prisma.CourseUpdateInput;

// Instructor Types
export type Instructor = Prisma.InstructorGetPayload<{
  include: { courses: true };
}>;
export type InstructorCreateInput = Prisma.InstructorCreateInput;
export type InstructorUpdateInput = Prisma.InstructorUpdateInput;

// InstructorCourse Types
export type InstructorCourse = Prisma.InstructorCourseGetPayload<{}>;
export type InstructorCourseCreateInput = Prisma.InstructorCourseCreateInput;

// User Types
export type User = Prisma.UserGetPayload<{}>;
export type UserCreateInput = Prisma.UserCreateInput;
export type UserUpdateInput = Prisma.UserUpdateInput;

// Enum Types
export { JobType, ScholarshipType, CourseType, UserRole } from '@prisma/client';

// API Response Types
export interface PaginatedResponse<T> {
  data: T[];
  pagination: {
    page: number;
    limit: number;
    total: number;
    totalPages: number;
  };
}

export interface ApiResponse<T> {
  success: boolean;
  data?: T;
  error?: string;
  message?: string;
}

// Filter Types
export interface JobFilters {
  search?: string;
  type?: string;
  isUrgent?: boolean;
  isActive?: boolean;
}

export interface ScholarshipFilters {
  search?: string;
  type?: string;
  isActive?: boolean;
}

export interface ActivityFilters {
  search?: string;
  category?: string;
  isActive?: boolean;
}

export interface CourseFilters {
  search?: string;
  type?: string;
  isActive?: boolean;
}

export interface InstructorFilters {
  search?: string;
  isActive?: boolean;
}

// Dashboard Stats
export interface DashboardStats {
  jobs: {
    total: number;
    active: number;
    urgent: number;
  };
  scholarships: {
    total: number;
    active: number;
    upcoming: number;
  };
  activities: {
    total: number;
    active: number;
    upcoming: number;
  };
  courses: {
    total: number;
    active: number;
    internal: number;
    external: number;
  };
  instructors: {
    total: number;
    active: number;
  };
}

// Session User Type
export interface SessionUser {
  id: string;
  email: string;
  name: string;
  role: 'ADMIN' | 'EDITOR' | 'VIEWER';
}

// Wizard Step Type
export interface WizardStep {
  id: number;
  title: string;
  description: string;
}
