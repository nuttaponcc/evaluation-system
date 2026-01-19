import { drizzle } from "drizzle-orm/mysql2";
import * as schema from "./drizzle/schema.js";

const db = drizzle(process.env.DATABASE_URL);

async function seed() {
  console.log("🌱 Seeding database...");

  // Seed Instructors
  const instructors = await db.insert(schema.instructors).values([
    {
      name: "ศ. ดร. สมชาย วิศวกรรม",
      position: "ศาสตราจารย์",
      department: "วิศวกรรมคอมพิวเตอร์",
      email: "somchai.v@eng.ac.th",
      phone: "02-123-4567",
      office: "อาคาร 3 ชั้น 5 ห้อง 501",
      bio: "ผู้เชี่ยวชาญด้านปัญญาประดิษฐ์และการเรียนรู้ของเครื่อง",
      education: "Ph.D. Computer Science, MIT",
      expertise: "AI, Machine Learning, Deep Learning",
      isActive: true,
    },
    {
      name: "รศ. ดร. สมหญิง เทคโนโลยี",
      position: "รองศาสตราจารย์",
      department: "วิศวกรรมไฟฟ้า",
      email: "somying.t@eng.ac.th",
      phone: "02-123-4568",
      office: "อาคาร 2 ชั้น 3 ห้อง 302",
      bio: "ผู้เชี่ยวชาญด้านระบบพลังงานหมุนเวียน",
      education: "Ph.D. Electrical Engineering, Stanford",
      expertise: "Renewable Energy, Power Systems",
      isActive: true,
    },
  ]);

  console.log("✅ Instructors seeded");

  // Seed Courses
  await db.insert(schema.courses).values([
    {
      code: "CS101",
      title: "การเขียนโปรแกรมเบื้องต้น",
      titleEn: "Introduction to Programming",
      credits: 3,
      courseType: "required",
      level: "undergraduate",
      description: "หลักสูตรพื้นฐานการเขียนโปรแกรมด้วยภาษา Python",
      objectives: "เพื่อให้นักศึกษาเข้าใจหลักการเขียนโปรแกรมเบื้องต้น",
      syllabus: "สัปดาห์ 1-4: พื้นฐาน Python\nสัปดาห์ 5-8: โครงสร้างข้อมูล\nสัปดาห์ 9-12: OOP",
      schedule: "จันทร์-พุธ 9:00-12:00",
      room: "ห้อง 301",
      semester: "1",
      academicYear: "2567",
      maxStudents: 50,
      instructorId: 1,
      isActive: true,
    },
    {
      code: "EE201",
      title: "วงจรไฟฟ้า",
      titleEn: "Electric Circuits",
      credits: 4,
      courseType: "required",
      level: "undergraduate",
      description: "ศึกษาหลักการพื้นฐานของวงจรไฟฟ้า",
      objectives: "เพื่อให้นักศึกษาเข้าใจหลักการวิเคราะห์วงจรไฟฟ้า",
      schedule: "อังคาร-พฤหัสบดี 13:00-16:00",
      room: "ห้อง 205",
      semester: "1",
      academicYear: "2567",
      maxStudents: 40,
      instructorId: 2,
      isActive: true,
    },
  ]);

  console.log("✅ Courses seeded");

  // Seed Jobs
  await db.insert(schema.jobs).values([
    {
      title: "Software Engineer",
      company: "Tech Startup Co., Ltd.",
      location: "กรุงเทพฯ",
      jobType: "fulltime",
      salaryMin: 35000,
      salaryMax: 50000,
      description: "รับสมัคร Software Engineer ประสบการณ์ 1-3 ปี",
      requirements: "- ปริญญาตรี วิศวกรรมคอมพิวเตอร์หรือสาขาที่เกี่ยวข้อง\n- มีประสบการณ์ใช้ React, Node.js",
      benefits: "- ประกันสังคม\n- ประกันสุขภาพ\n- โบนัสประจำปี",
      contactEmail: "hr@techstartup.com",
      contactPhone: "02-234-5678",
      deadline: new Date("2026-03-31"),
      isUrgent: true,
      isActive: true,
    },
    {
      title: "Data Analyst Intern",
      company: "Big Data Analytics Ltd.",
      location: "ปทุมธานี",
      jobType: "internship",
      salaryMin: 10000,
      salaryMax: 15000,
      description: "รับสมัครนักศึกษาฝึกงาน Data Analyst",
      requirements: "- กำลังศึกษาปี 3-4\n- มีความรู้ Python, SQL",
      contactEmail: "intern@bigdata.com",
      deadline: new Date("2026-02-28"),
      isActive: true,
    },
  ]);

  console.log("✅ Jobs seeded");

  // Seed Scholarships
  await db.insert(schema.scholarships).values([
    {
      title: "ทุนเรียนดี",
      provider: "มูลนิธิส่งเสริมการศึกษา",
      amount: 50000,
      scholarshipType: "full",
      eligibility: "นักศึกษาชั้นปีที่ 2-4 ที่มี GPA ตั้งแต่ 3.50 ขึ้นไป",
      description: "ทุนการศึกษาสำหรับนักศึกษาที่มีผลการเรียนดี",
      requirements: "- GPA ไม่ต่ำกว่า 3.50\n- ไม่เคยได้รับทุนอื่น",
      applicationProcess: "สมัครผ่านเว็บไซต์ พร้อมแนบเอกสาร",
      contactEmail: "scholarship@foundation.org",
      deadline: new Date("2026-04-30"),
      isActive: true,
    },
    {
      title: "ทุนนักวิจัยรุ่นใหม่",
      provider: "สำนักงานกองทุนสนับสนุนการวิจัย",
      amount: 100000,
      scholarshipType: "grant",
      eligibility: "นักศึกษาระดับปริญญาโทที่มีผลงานวิจัย",
      description: "ทุนสนับสนุนการทำวิจัยสำหรับนักศึกษาระดับบัณฑิตศึกษา",
      contactEmail: "research@grant.go.th",
      deadline: new Date("2026-05-31"),
      isActive: true,
    },
  ]);

  console.log("✅ Scholarships seeded");

  // Seed Activities
  await db.insert(schema.activities).values([
    {
      title: "Workshop: AI for Beginners",
      organizer: "ชมรมวิศวกรรมคอมพิวเตอร์",
      activityType: "workshop",
      location: "ห้องประชุมใหญ่ อาคาร 1",
      isOnline: false,
      description: "เวิร์คช็อปแนะนำพื้นฐาน AI สำหรับผู้เริ่มต้น",
      schedule: "9:00-16:00 น.",
      maxParticipants: 50,
      registrationFee: 500,
      contactEmail: "csclub@eng.ac.th",
      startDate: new Date("2026-03-15"),
      endDate: new Date("2026-03-15"),
      registrationDeadline: new Date("2026-03-10"),
      isActive: true,
    },
    {
      title: "Engineering Innovation Competition 2026",
      organizer: "คณะวิศวกรรมศาสตร์",
      activityType: "competition",
      location: "หอประชุมคณะวิศวกรรมศาสตร์",
      description: "การแข่งขันนวัตกรรมทางวิศวกรรมระดับมหาวิทยาลัย",
      maxParticipants: 100,
      registrationFee: 0,
      contactEmail: "innovation@eng.ac.th",
      startDate: new Date("2026-04-20"),
      endDate: new Date("2026-04-21"),
      registrationDeadline: new Date("2026-04-10"),
      isActive: true,
    },
  ]);

  console.log("✅ Activities seeded");
  console.log("🎉 Seeding completed!");
}

seed().catch(console.error);
