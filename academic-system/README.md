# ระบบงานวิชาการ คณะวิศวกรรมศาสตร์

ระบบเว็บไซต์สำหรับจัดการงานวิชาการของคณะวิศวกรรมศาสตร์ พัฒนาด้วย Next.js 14 Full Stack

## Tech Stack

- **Framework:** Next.js 14 (App Router)
- **Language:** TypeScript
- **Database:** PostgreSQL + Prisma ORM
- **Authentication:** NextAuth.js v5
- **Styling:** Tailwind CSS + shadcn/ui
- **Forms:** React Hook Form + Zod

## Features

### 6 Modules หลัก

1. **Jobs (งาน)** - ประกาศรับสมัครงาน
2. **Scholarships (ทุนการศึกษา)** - ประกาศทุนการศึกษา
3. **Activities (กิจกรรม)** - กิจกรรมและอีเวนต์
4. **Courses (หลักสูตร)** - หลักสูตรอบรม
5. **Instructors (อาจารย์)** - ข้อมูลอาจารย์
6. **Users (ผู้ใช้งาน)** - จัดการผู้ใช้ระบบ

### ฟีเจอร์หลัก

- ✅ หน้าสาธารณะสำหรับดูข้อมูล
- ✅ ระบบ Admin Dashboard
- ✅ CRUD Operations ครบทุก Module
- ✅ Wizard Form สำหรับกรอกข้อมูล
- ✅ ระบบค้นหาและกรอง
- ✅ Pagination
- ✅ Responsive Design
- ✅ Authentication & Authorization

## การติดตั้ง

### 1. Clone Repository

```bash
git clone https://github.com/nuttaponcc/evaluation-system.git
cd evaluation-system/academic-system
```

### 2. ติดตั้ง Dependencies

```bash
pnpm install
```

### 3. ตั้งค่า Environment Variables

```bash
cp .env.example .env
```

แก้ไขไฟล์ `.env`:

```env
DATABASE_URL="postgresql://user:password@localhost:5432/academic_system"
NEXTAUTH_SECRET="your-secret-key"
NEXTAUTH_URL="http://localhost:3000"
```

### 4. Setup Database

```bash
# สร้าง Prisma Client
pnpm db:generate

# Push Schema ไป Database
pnpm db:push

# Seed ข้อมูลตัวอย่าง
pnpm db:seed
```

### 5. รันโปรเจค

```bash
pnpm dev
```

เปิด [http://localhost:3000](http://localhost:3000)

## การใช้งาน

### หน้าสาธารณะ

- `/` - หน้าแรก
- `/jobs` - รายการงาน
- `/scholarships` - รายการทุนการศึกษา
- `/activities` - รายการกิจกรรม
- `/courses` - รายการหลักสูตร
- `/instructors` - รายชื่ออาจารย์

### หน้า Admin

- `/admin` - Dashboard
- `/admin/login` - เข้าสู่ระบบ
- `/admin/jobs` - จัดการงาน
- `/admin/scholarships` - จัดการทุน
- `/admin/activities` - จัดการกิจกรรม
- `/admin/courses` - จัดการหลักสูตร
- `/admin/instructors` - จัดการอาจารย์

### ข้อมูลเข้าสู่ระบบทดสอบ

```
Email: admin@eng.ac.th
Password: admin123
```

## โครงสร้างโปรเจค

```
academic-system/
├── prisma/
│   ├── schema.prisma      # Database Schema
│   └── seed.ts            # Seed Data
├── src/
│   ├── app/
│   │   ├── (public)/      # Public Pages
│   │   ├── admin/         # Admin Pages
│   │   └── api/           # API Routes
│   ├── components/
│   │   ├── ui/            # UI Components (shadcn)
│   │   ├── layout/        # Layout Components
│   │   ├── cards/         # Card Components
│   │   ├── forms/         # Form Components
│   │   ├── shared/        # Shared Components
│   │   └── admin/         # Admin Components
│   ├── lib/
│   │   ├── auth.ts        # NextAuth Config
│   │   ├── prisma.ts      # Prisma Client
│   │   ├── utils.ts       # Utility Functions
│   │   └── validations.ts # Zod Schemas
│   └── types/
│       └── index.ts       # TypeScript Types
└── public/
    └── uploads/           # Uploaded Files
```

## Scripts

```bash
pnpm dev          # รัน Development Server
pnpm build        # Build Production
pnpm start        # รัน Production Server
pnpm lint         # ตรวจสอบ Code
pnpm db:generate  # Generate Prisma Client
pnpm db:push      # Push Schema to DB
pnpm db:migrate   # Run Migrations
pnpm db:seed      # Seed Database
pnpm db:studio    # Open Prisma Studio
```

## License

MIT License
