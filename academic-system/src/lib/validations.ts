import { z } from 'zod';

// Job Validation Schema
export const jobSchema = z.object({
  title: z.string().min(1, 'กรุณากรอกชื่อตำแหน่งงาน').max(200),
  jobType: z.enum(['FULL_TIME', 'PART_TIME', 'INTERNSHIP', 'CONTRACT'], {
    required_error: 'กรุณาเลือกประเภทงาน',
  }),
  company: z.string().min(1, 'กรุณากรอกชื่อบริษัท').max(200),
  salaryMin: z.coerce.number().min(0).optional().nullable(),
  salaryMax: z.coerce.number().min(0).optional().nullable(),
  description: z.string().min(1, 'กรุณากรอกรายละเอียดงาน'),
  requirements: z.string().min(1, 'กรุณากรอกคุณสมบัติที่ต้องการ'),
  benefits: z.string().optional().nullable(),
  location: z.string().min(1, 'กรุณากรอกสถานที่ทำงาน').max(200),
  contactPerson: z.string().min(1, 'กรุณากรอกชื่อผู้ติดต่อ').max(200),
  contactEmail: z.string().email('กรุณากรอกอีเมลที่ถูกต้อง').max(200),
  contactPhone: z.string().max(50).optional().nullable(),
  applyMethod: z.string().min(1, 'กรุณากรอกวิธีการสมัคร'),
  startDate: z.coerce.date({ required_error: 'กรุณาเลือกวันที่เริ่มประกาศ' }),
  endDate: z.coerce.date({ required_error: 'กรุณาเลือกวันที่สิ้นสุดประกาศ' }),
  isActive: z.boolean().default(true),
  isUrgent: z.boolean().default(false),
  attachmentUrl: z.string().max(500).optional().nullable(),
});

export type JobFormData = z.infer<typeof jobSchema>;

// Scholarship Validation Schema
export const scholarshipSchema = z.object({
  title: z.string().min(1, 'กรุณากรอกชื่อทุน').max(200),
  type: z.enum(['COMPANY', 'INBOUND', 'OUTBOUND', 'SPECIAL'], {
    required_error: 'กรุณาเลือกประเภททุน',
  }),
  sponsor: z.string().min(1, 'กรุณากรอกชื่อผู้ให้ทุน').max(200),
  amount: z.coerce.number().min(0).optional().nullable(),
  duration: z.string().max(100).optional().nullable(),
  description: z.string().min(1, 'กรุณากรอกรายละเอียดทุน'),
  eligibility: z.string().min(1, 'กรุณากรอกคุณสมบัติผู้สมัคร'),
  requiredDocs: z.string().optional().nullable(),
  applicationDeadline: z.coerce.date({ required_error: 'กรุณาเลือกวันปิดรับสมัคร' }),
  announcementDate: z.coerce.date().optional().nullable(),
  contactInfo: z.string().min(1, 'กรุณากรอกข้อมูลติดต่อ'),
  documentUrl: z.string().max(500).optional().nullable(),
  isActive: z.boolean().default(true),
});

export type ScholarshipFormData = z.infer<typeof scholarshipSchema>;

// Activity Validation Schema
export const activitySchema = z.object({
  title: z.string().min(1, 'กรุณากรอกชื่อกิจกรรม').max(200),
  category: z.string().min(1, 'กรุณากรอกหมวดหมู่').max(100),
  description: z.string().min(1, 'กรุณากรอกรายละเอียดกิจกรรม'),
  objectives: z.string().optional().nullable(),
  targetAudience: z.string().max(200).optional().nullable(),
  location: z.string().min(1, 'กรุณากรอกสถานที่จัดกิจกรรม').max(200),
  startDatetime: z.coerce.date({ required_error: 'กรุณาเลือกวันเวลาเริ่มต้น' }),
  endDatetime: z.coerce.date({ required_error: 'กรุณาเลือกวันเวลาสิ้นสุด' }),
  maxParticipants: z.coerce.number().int().min(0).optional().nullable(),
  registrationDeadline: z.coerce.date().optional().nullable(),
  coordinator: z.string().min(1, 'กรุณากรอกชื่อผู้ประสานงาน').max(200),
  coordinatorContact: z.string().min(1, 'กรุณากรอกข้อมูลติดต่อผู้ประสานงาน'),
  imageUrls: z.array(z.string()).default([]),
  documentUrls: z.array(z.string()).default([]),
  isActive: z.boolean().default(true),
});

export type ActivityFormData = z.infer<typeof activitySchema>;

// Course Validation Schema
export const courseSchema = z.object({
  title: z.string().min(1, 'กรุณากรอกชื่อหลักสูตร').max(200),
  type: z.enum(['INTERNAL', 'EXTERNAL'], {
    required_error: 'กรุณาเลือกประเภทหลักสูตร',
  }),
  description: z.string().min(1, 'กรุณากรอกรายละเอียดหลักสูตร'),
  duration: z.string().max(100).optional().nullable(),
  schedule: z.string().max(200).optional().nullable(),
  location: z.string().max(200).optional().nullable(),
  instructor: z.string().max(200).optional().nullable(),
  maxParticipants: z.coerce.number().int().min(0).optional().nullable(),
  fee: z.coerce.number().min(0).default(0),
  certificate: z.boolean().default(false),
  registrationStart: z.coerce.date().optional().nullable(),
  registrationEnd: z.coerce.date().optional().nullable(),
  courseStart: z.coerce.date({ required_error: 'กรุณาเลือกวันเริ่มหลักสูตร' }),
  courseEnd: z.coerce.date({ required_error: 'กรุณาเลือกวันสิ้นสุดหลักสูตร' }),
  syllabusUrl: z.string().max(500).optional().nullable(),
  isActive: z.boolean().default(true),
});

export type CourseFormData = z.infer<typeof courseSchema>;

// Instructor Validation Schema
export const instructorSchema = z.object({
  titleName: z.string().min(1, 'กรุณากรอกคำนำหน้า').max(50),
  firstName: z.string().min(1, 'กรุณากรอกชื่อ').max(100),
  lastName: z.string().min(1, 'กรุณากรอกนามสกุล').max(100),
  email: z.string().email('กรุณากรอกอีเมลที่ถูกต้อง').max(200),
  phone: z.string().max(50).optional().nullable(),
  officeLocation: z.string().max(200).optional().nullable(),
  photoUrl: z.string().max(500).optional().nullable(),
  biography: z.string().optional().nullable(),
  education: z.string().optional().nullable(),
  expertise: z.string().optional().nullable(),
  researchInterests: z.string().optional().nullable(),
  publications: z.string().optional().nullable(),
  awards: z.string().optional().nullable(),
  isActive: z.boolean().default(true),
});

export type InstructorFormData = z.infer<typeof instructorSchema>;

// Instructor Course Validation Schema
export const instructorCourseSchema = z.object({
  courseCode: z.string().min(1, 'กรุณากรอกรหัสวิชา').max(20),
  courseNameTh: z.string().max(200).optional().nullable(),
  courseNameEn: z.string().max(200).optional().nullable(),
  semester: z.string().max(10).optional().nullable(),
  academicYear: z.string().max(10).optional().nullable(),
  credits: z.coerce.number().int().min(0).optional().nullable(),
});

export type InstructorCourseFormData = z.infer<typeof instructorCourseSchema>;

// User Validation Schema
export const userSchema = z.object({
  email: z.string().email('กรุณากรอกอีเมลที่ถูกต้อง').max(200),
  password: z.string().min(6, 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร'),
  fullName: z.string().min(1, 'กรุณากรอกชื่อ-นามสกุล').max(200),
  role: z.enum(['ADMIN', 'EDITOR', 'VIEWER']).default('VIEWER'),
  isActive: z.boolean().default(true),
});

export type UserFormData = z.infer<typeof userSchema>;

// Login Validation Schema
export const loginSchema = z.object({
  email: z.string().email('กรุณากรอกอีเมลที่ถูกต้อง'),
  password: z.string().min(1, 'กรุณากรอกรหัสผ่าน'),
});

export type LoginFormData = z.infer<typeof loginSchema>;
