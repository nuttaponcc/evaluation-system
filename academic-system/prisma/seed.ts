import { PrismaClient } from '@prisma/client';
import bcrypt from 'bcryptjs';

const prisma = new PrismaClient();

async function main() {
  console.log('🌱 Seeding database...');

  // Create admin user
  const hashedPassword = await bcrypt.hash('admin123', 10);
  const admin = await prisma.user.upsert({
    where: { email: 'admin@eng.ac.th' },
    update: {},
    create: {
      email: 'admin@eng.ac.th',
      password: hashedPassword,
      name: 'ผู้ดูแลระบบ',
      role: 'ADMIN',
    },
  });
  console.log('✅ Created admin user:', admin.email);

  // Create sample jobs
  const jobs = await Promise.all([
    prisma.job.upsert({
      where: { jobId: 'JOB-001' },
      update: {},
      create: {
        jobId: 'JOB-001',
        title: 'Software Engineer',
        company: 'บริษัท เทคโนโลยี จำกัด',
        location: 'กรุงเทพมหานคร',
        jobType: 'FULL_TIME',
        description: 'พัฒนาและดูแลระบบซอฟต์แวร์ของบริษัท รวมถึงการออกแบบและพัฒนา API, ทำงานร่วมกับทีม DevOps และ QA',
        requirements: '- ปริญญาตรีสาขาวิศวกรรมคอมพิวเตอร์หรือสาขาที่เกี่ยวข้อง\n- มีประสบการณ์ 2 ปีขึ้นไป\n- เชี่ยวชาญ JavaScript/TypeScript\n- มีความรู้ด้าน React และ Node.js',
        benefits: '- ประกันสังคม\n- ประกันสุขภาพกลุ่ม\n- โบนัสประจำปี\n- Work from home 2 วัน/สัปดาห์',
        salaryMin: 40000,
        salaryMax: 70000,
        contactPerson: 'คุณสมชาย ใจดี',
        contactEmail: 'hr@techcompany.co.th',
        contactPhone: '02-123-4567',
        applyMethod: 'ส่ง Resume มาที่อีเมล hr@techcompany.co.th หรือสมัครผ่านเว็บไซต์',
        startDate: new Date('2026-01-01'),
        endDate: new Date('2026-03-31'),
        isActive: true,
        isUrgent: true,
      },
    }),
    prisma.job.upsert({
      where: { jobId: 'JOB-002' },
      update: {},
      create: {
        jobId: 'JOB-002',
        title: 'Data Analyst Intern',
        company: 'บริษัท ดาต้า อนาไลติกส์ จำกัด',
        location: 'กรุงเทพมหานคร',
        jobType: 'INTERNSHIP',
        description: 'ฝึกงานด้านการวิเคราะห์ข้อมูล เรียนรู้การใช้เครื่องมือ BI และ Machine Learning',
        requirements: '- นักศึกษาปี 3-4 สาขาวิศวกรรมคอมพิวเตอร์ หรือสาขาที่เกี่ยวข้อง\n- มีความรู้พื้นฐาน Python และ SQL\n- สนใจด้าน Data Science',
        benefits: '- ค่าตอบแทนรายเดือน\n- ใบรับรองการฝึกงาน\n- โอกาสในการทำงานต่อ',
        salaryMin: 15000,
        salaryMax: 18000,
        contactPerson: 'คุณวิภา รักษ์ข้อมูล',
        contactEmail: 'intern@dataanalytics.co.th',
        applyMethod: 'ส่ง Resume และ Transcript มาที่อีเมล',
        startDate: new Date('2026-01-15'),
        endDate: new Date('2026-04-30'),
        isActive: true,
        isUrgent: false,
      },
    }),
  ]);
  console.log('✅ Created', jobs.length, 'jobs');

  // Create sample scholarships
  const scholarships = await Promise.all([
    prisma.scholarship.upsert({
      where: { scholarshipId: 'SCH-001' },
      update: {},
      create: {
        scholarshipId: 'SCH-001',
        title: 'ทุนการศึกษาบริษัท ABC',
        sponsor: 'บริษัท ABC จำกัด (มหาชน)',
        type: 'COMPANY',
        amount: 50000,
        duration: '1 ปีการศึกษา',
        description: 'ทุนการศึกษาสำหรับนักศึกษาที่มีผลการเรียนดีและมีความประพฤติเรียบร้อย',
        eligibility: '- นักศึกษาชั้นปีที่ 2-4\n- เกรดเฉลี่ยสะสม 3.00 ขึ้นไป\n- มีความประพฤติดี\n- ขาดแคลนทุนทรัพย์',
        requiredDocs: '- ใบสมัครทุน\n- สำเนาบัตรประชาชน\n- สำเนาทะเบียนบ้าน\n- ใบแสดงผลการเรียน\n- หนังสือรับรองรายได้ผู้ปกครอง',
        contactInfo: 'งานกิจการนักศึกษา คณะวิศวกรรมศาสตร์\nโทร. 02-XXX-XXXX ต่อ 1234',
        applicationDeadline: new Date('2026-03-15'),
        announcementDate: new Date('2026-04-01'),
        isActive: true,
      },
    }),
    prisma.scholarship.upsert({
      where: { scholarshipId: 'SCH-002' },
      update: {},
      create: {
        scholarshipId: 'SCH-002',
        title: 'ทุนแลกเปลี่ยนต่างประเทศ',
        sponsor: 'กองทุนการศึกษานานาชาติ',
        type: 'OUTBOUND',
        amount: 200000,
        duration: '1 ภาคการศึกษา',
        description: 'ทุนสำหรับไปศึกษาแลกเปลี่ยนที่มหาวิทยาลัยพันธมิตรในต่างประเทศ',
        eligibility: '- นักศึกษาชั้นปีที่ 3\n- เกรดเฉลี่ยสะสม 3.25 ขึ้นไป\n- คะแนน IELTS 6.0 หรือ TOEFL iBT 80 ขึ้นไป',
        requiredDocs: '- ใบสมัครทุน\n- ผลสอบภาษาอังกฤษ\n- Statement of Purpose\n- จดหมายแนะนำ 2 ฉบับ',
        contactInfo: 'งานวิเทศสัมพันธ์ คณะวิศวกรรมศาสตร์\nEmail: international@eng.ac.th',
        applicationDeadline: new Date('2026-02-28'),
        announcementDate: new Date('2026-03-20'),
        isActive: true,
      },
    }),
  ]);
  console.log('✅ Created', scholarships.length, 'scholarships');

  // Create sample activities
  const activities = await Promise.all([
    prisma.activity.upsert({
      where: { activityId: 'ACT-001' },
      update: {},
      create: {
        activityId: 'ACT-001',
        title: 'สัมมนา AI และอนาคตของวิศวกรรม',
        category: 'สัมมนา',
        description: 'สัมมนาพิเศษเกี่ยวกับการประยุกต์ใช้ AI ในงานวิศวกรรม โดยวิทยากรผู้เชี่ยวชาญจากภาคอุตสาหกรรม',
        objectives: '- เพื่อให้ความรู้เกี่ยวกับเทคโนโลยี AI ที่ทันสมัย\n- เพื่อแลกเปลี่ยนประสบการณ์กับผู้เชี่ยวชาญ\n- เพื่อสร้างเครือข่ายกับภาคอุตสาหกรรม',
        targetAudience: 'นักศึกษาและบุคลากรคณะวิศวกรรมศาสตร์',
        startDatetime: new Date('2026-02-15T09:00:00'),
        endDatetime: new Date('2026-02-15T16:00:00'),
        location: 'ห้องประชุมใหญ่ ชั้น 5 ตึกวิศวกรรม',
        maxParticipants: 200,
        registrationDeadline: new Date('2026-02-10'),
        coordinator: 'ดร.สมศักดิ์ วิศวกร',
        coordinatorContact: 'Email: somsak@eng.ac.th\nโทร. 02-XXX-XXXX ต่อ 5678',
        isActive: true,
      },
    }),
    prisma.activity.upsert({
      where: { activityId: 'ACT-002' },
      update: {},
      create: {
        activityId: 'ACT-002',
        title: 'แข่งขัน Hackathon 2026',
        category: 'การแข่งขัน',
        description: 'การแข่งขันพัฒนาซอฟต์แวร์ 48 ชั่วโมง หัวข้อ "Smart City Solutions"',
        objectives: '- พัฒนาทักษะการเขียนโปรแกรม\n- ส่งเสริมการทำงานเป็นทีม\n- สร้างนวัตกรรมเพื่อสังคม',
        targetAudience: 'นักศึกษาทุกชั้นปี',
        startDatetime: new Date('2026-03-01T18:00:00'),
        endDatetime: new Date('2026-03-03T18:00:00'),
        location: 'อาคารนวัตกรรม คณะวิศวกรรมศาสตร์',
        maxParticipants: 100,
        registrationDeadline: new Date('2026-02-25'),
        coordinator: 'อ.วิชัย โปรแกรมเมอร์',
        coordinatorContact: 'Email: hackathon@eng.ac.th',
        isActive: true,
      },
    }),
  ]);
  console.log('✅ Created', activities.length, 'activities');

  // Create sample courses
  const courses = await Promise.all([
    prisma.course.upsert({
      where: { courseId: 'CRS-001' },
      update: {},
      create: {
        courseId: 'CRS-001',
        title: 'Python for Data Science',
        type: 'INTERNAL',
        description: 'หลักสูตรอบรม Python สำหรับการวิเคราะห์ข้อมูล ครอบคลุม Pandas, NumPy, Matplotlib และ Machine Learning เบื้องต้น',
        instructor: 'ผศ.ดร.สมหญิง ดาต้า',
        duration: '30 ชั่วโมง',
        schedule: 'ทุกวันเสาร์ 09:00-16:00',
        location: 'ห้องปฏิบัติการคอมพิวเตอร์ 301',
        fee: 3500,
        maxParticipants: 30,
        courseStart: new Date('2026-02-01'),
        courseEnd: new Date('2026-03-15'),
        registrationStart: new Date('2026-01-01'),
        registrationEnd: new Date('2026-01-25'),
        certificate: true,
        isActive: true,
      },
    }),
    prisma.course.upsert({
      where: { courseId: 'CRS-002' },
      update: {},
      create: {
        courseId: 'CRS-002',
        title: 'Web Development Bootcamp',
        type: 'EXTERNAL',
        description: 'หลักสูตรพัฒนาเว็บแบบเข้มข้น เรียนรู้ HTML, CSS, JavaScript, React และ Node.js',
        instructor: 'ทีมวิทยากรจาก TechAcademy',
        duration: '60 ชั่วโมง',
        schedule: 'วันเสาร์-อาทิตย์ 09:00-16:00',
        location: 'ห้องอบรม ชั้น 4',
        fee: 8500,
        maxParticipants: 25,
        courseStart: new Date('2026-03-01'),
        courseEnd: new Date('2026-04-30'),
        registrationStart: new Date('2026-01-15'),
        registrationEnd: new Date('2026-02-20'),
        certificate: true,
        isActive: true,
      },
    }),
    prisma.course.upsert({
      where: { courseId: 'CRS-003' },
      update: {},
      create: {
        courseId: 'CRS-003',
        title: 'การเขียนบทความวิจัยภาษาอังกฤษ',
        type: 'INTERNAL',
        description: 'อบรมการเขียนบทความวิจัยเพื่อตีพิมพ์ในวารสารนานาชาติ',
        instructor: 'รศ.ดร.ประสิทธิ์ นักวิจัย',
        duration: '12 ชั่วโมง',
        schedule: 'วันเสาร์ 09:00-12:00',
        location: 'ห้องประชุม 501',
        fee: 0,
        maxParticipants: 40,
        courseStart: new Date('2026-02-08'),
        courseEnd: new Date('2026-03-01'),
        registrationStart: new Date('2026-01-01'),
        registrationEnd: new Date('2026-02-01'),
        certificate: true,
        isActive: true,
      },
    }),
  ]);
  console.log('✅ Created', courses.length, 'courses');

  // Create sample instructors
  const instructors = await Promise.all([
    prisma.instructor.upsert({
      where: { instructorId: 'INS-001' },
      update: {},
      create: {
        instructorId: 'INS-001',
        titleName: 'ผศ.ดร.',
        firstName: 'สมชาย',
        lastName: 'วิศวกรรม',
        email: 'somchai@eng.ac.th',
        phone: '02-XXX-XXXX ต่อ 1001',
        officeLocation: 'ตึก A ห้อง 501',
        expertise: 'Artificial Intelligence, Machine Learning',
        education: '- Ph.D. Computer Science, MIT, USA (2015)\n- M.Eng. Computer Engineering, จุฬาลงกรณ์มหาวิทยาลัย (2010)\n- B.Eng. Computer Engineering, จุฬาลงกรณ์มหาวิทยาลัย (2008)',
        researchInterests: 'Deep Learning, Natural Language Processing, Computer Vision',
        publications: '1. "Deep Learning for Thai NLP" - IEEE Transactions, 2024\n2. "AI in Manufacturing" - Nature Communications, 2023',
        isActive: true,
      },
    }),
    prisma.instructor.upsert({
      where: { instructorId: 'INS-002' },
      update: {},
      create: {
        instructorId: 'INS-002',
        titleName: 'รศ.ดร.',
        firstName: 'สมหญิง',
        lastName: 'ดาต้า',
        email: 'somying@eng.ac.th',
        phone: '02-XXX-XXXX ต่อ 1002',
        officeLocation: 'ตึก B ห้อง 302',
        expertise: 'Data Science, Big Data Analytics',
        education: '- Ph.D. Data Science, Stanford University, USA (2012)\n- M.S. Statistics, UC Berkeley, USA (2008)\n- B.Sc. Mathematics, มหาวิทยาลัยมหิดล (2006)',
        researchInterests: 'Big Data, Data Mining, Predictive Analytics',
        publications: '1. "Big Data in Healthcare" - Science, 2024\n2. "Predictive Models for Industry 4.0" - IEEE Big Data, 2023',
        isActive: true,
      },
    }),
    prisma.instructor.upsert({
      where: { instructorId: 'INS-003' },
      update: {},
      create: {
        instructorId: 'INS-003',
        titleName: 'อ.ดร.',
        firstName: 'วิชัย',
        lastName: 'โปรแกรมเมอร์',
        email: 'wichai@eng.ac.th',
        phone: '02-XXX-XXXX ต่อ 1003',
        officeLocation: 'ตึก C ห้อง 201',
        expertise: 'Software Engineering, Web Development',
        education: '- Ph.D. Software Engineering, Carnegie Mellon University, USA (2018)\n- M.Eng. Software Engineering, AIT (2014)\n- B.Eng. Computer Engineering, มหาวิทยาลัยเกษตรศาสตร์ (2012)',
        researchInterests: 'DevOps, Cloud Computing, Microservices Architecture',
        publications: '1. "Microservices Best Practices" - ACM Computing Surveys, 2024\n2. "Cloud-Native Applications" - IEEE Software, 2023',
        isActive: true,
      },
    }),
  ]);
  console.log('✅ Created', instructors.length, 'instructors');

  console.log('🎉 Seeding completed!');
}

main()
  .catch((e) => {
    console.error('❌ Seeding failed:', e);
    process.exit(1);
  })
  .finally(async () => {
    await prisma.$disconnect();
  });
