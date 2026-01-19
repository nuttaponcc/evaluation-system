# ระบบงานวิชาการคณะวิศวกรรมศาสตร์

ระบบจัดการงานวิชาการแบบครบวงจรสำหรับคณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหาสารคาม พัฒนาด้วย Next.js 14, TypeScript, และ tRPC

## 🎯 ฟีเจอร์หลัก

### 6 Modules หลัก
1. **รับสมัครงาน (Jobs)** - ประกาศรับสมัครงานสำหรับนักศึกษาและศิษย์เก่า
2. **ทุนการศึกษา (Scholarships)** - ข้อมูลทุนการศึกษาและทุนวิจัย
3. **กิจกรรม (Activities)** - กิจกรรมวิชาการ เวิร์กชอป และการแข่งขัน
4. **หลักสูตร (Courses)** - หลักสูตรการเรียนการสอนพร้อมเอกสาร PDF
5. **อาจารย์ (Instructors)** - ข้อมูลคณาจารย์และบุคลากร
6. **ผู้ใช้งาน (Users)** - จัดการผู้ใช้และสิทธิ์การเข้าถึง

### ฟีเจอร์เสริม
- ✅ Admin Dashboard พร้อมสถิติภาพรวม
- ✅ CRUD Operations ครบทุก module
- ✅ File Upload (PDF documents, Images) พร้อม S3 integration
- ✅ Search, Filter, และ Pagination
- ✅ Role-based Access Control (Admin/User)
- ✅ Thai Language Support ทั้งระบบ
- ✅ Responsive Design
- ✅ Authentication & Authorization (Manus OAuth)

## 🛠 Tech Stack

### Frontend
- **React 19** - UI framework
- **TypeScript** - Type safety
- **Tailwind CSS 4** - Styling
- **shadcn/ui** - UI components
- **React Hook Form + Zod** - Form validation

### Backend
- **Express 4** - Web server
- **tRPC 11** - End-to-end typesafe APIs
- **Prisma ORM** - Database ORM
- **PostgreSQL** - Database

### Authentication
- **NextAuth.js v5** - Authentication
- **Manus OAuth** - SSO integration

### File Storage
- **AWS S3** - File storage
- PDF documents (หลักสูตร)
- Images (รูปภาพอาจารย์)

## 📦 Installation

### Prerequisites
- Node.js 22+
- pnpm
- PostgreSQL database

### Setup

1. Clone repository
```bash
git clone https://github.com/nuttaponcc/evaluation-system.git
cd evaluation-system/academic-portal
```

2. Install dependencies
```bash
pnpm install
```

3. Setup environment variables
```bash
# สร้างไฟล์ .env และกำหนดค่าตามตัวอย่างด้านล่าง
```

### Environment Variables

```env
# Database
DATABASE_URL="postgresql://user:password@localhost:5432/academic_portal"

# Authentication
JWT_SECRET="your-jwt-secret"
OAUTH_SERVER_URL="https://api.manus.im"
VITE_OAUTH_PORTAL_URL="https://portal.manus.im"
VITE_APP_ID="your-app-id"

# S3 Storage (ถ้าใช้)
AWS_ACCESS_KEY_ID="your-access-key"
AWS_SECRET_ACCESS_KEY="your-secret-key"
AWS_REGION="ap-southeast-1"
AWS_BUCKET_NAME="your-bucket-name"

# Owner Info
OWNER_OPEN_ID="owner-id"
OWNER_NAME="Admin Name"
```

4. Setup database
```bash
# Push database schema
pnpm db:push

# Seed initial data (optional)
pnpm tsx seed-data.ts
```

5. Run development server
```bash
pnpm dev
```

เปิดเบราว์เซอร์ที่ `http://localhost:3000`

## 📁 Project Structure

```
academic-portal/
├── client/                 # Frontend React application
│   ├── public/            # Static assets
│   └── src/
│       ├── components/    # Reusable UI components
│       ├── pages/         # Page components
│       │   ├── admin/    # Admin pages
│       │   └── ...       # Public pages
│       ├── lib/          # Utilities and tRPC client
│       └── App.tsx       # Main app component
├── server/                # Backend Express + tRPC
│   ├── _core/            # Core server functionality
│   ├── db.ts             # Database queries
│   └── routers.ts        # tRPC routers
├── drizzle/              # Database schema and migrations
│   └── schema.ts         # Database schema
├── shared/               # Shared types and constants
└── package.json
```

## 🚀 Deployment

### Deploy to Manus Platform (Recommended)
ระบบนี้ถูกออกแบบมาให้ทำงานบน Manus Platform ได้ทันที:
1. Push โค้ดไปยัง repository
2. เข้า Manus Dashboard
3. คลิก "Publish" เพื่อ deploy

### Deploy to Other Platforms

#### Vercel + Neon (PostgreSQL)
1. สร้าง PostgreSQL database บน [Neon](https://neon.tech)
2. Deploy ไปยัง [Vercel](https://vercel.com)
3. ตั้งค่า Environment Variables
4. Deploy!

#### Railway
1. สร้างโปรเจคใหม่บน [Railway](https://railway.app)
2. เพิ่ม PostgreSQL service
3. เชื่อมต่อ GitHub repository
4. ตั้งค่า Environment Variables
5. Deploy!

## 📚 Usage

### Admin Access
1. เข้าสู่ระบบด้วย Google OAuth
2. เข้าหน้า "จัดการระบบ"
3. จัดการข้อมูลในแต่ละ module

### Public Access
- ผู้ใช้ทั่วไปสามารถเข้าดูข้อมูลได้โดยไม่ต้อง login
- ค้นหาและกรองข้อมูลได้ทุก module
- ดาวน์โหลดเอกสารหลักสูตร (PDF)

### Role Management
เปลี่ยนบทบาทผู้ใช้ผ่านหน้า Admin → ผู้ใช้งาน:
- **Admin**: เข้าถึงและจัดการข้อมูลได้ทั้งหมด
- **User**: ดูข้อมูลได้อย่างเดียว

## 🧪 Testing

```bash
# Run tests
pnpm test

# Run tests in watch mode
pnpm test:watch
```

## 📝 API Documentation

ระบบใช้ tRPC สำหรับ API ซึ่งมี type safety แบบ end-to-end

### Example tRPC Procedures

```typescript
// Get all jobs
trpc.jobs.list.useQuery({ search: '', type: 'all' })

// Create new job
trpc.jobs.create.useMutation()

// Update job
trpc.jobs.update.useMutation()

// Delete job
trpc.jobs.delete.useMutation()

// Toggle active status
trpc.jobs.toggleActive.useMutation()
```

## 🔐 Security

- ✅ Role-based access control
- ✅ Protected admin routes
- ✅ Input validation with Zod
- ✅ SQL injection prevention (Prisma ORM)
- ✅ XSS protection
- ✅ CSRF protection

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License.

## 👥 Authors

- **Nuttapon Chaiduangsri** - Initial work

## 🙏 Acknowledgments

- คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหาสารคาม
- Manus Platform Team
- shadcn/ui for beautiful components
- tRPC team for amazing DX

## 📞 Support

หากมีคำถามหรือต้องการความช่วยเหลือ:
- Email: nuttapon.c@msu.ac.th
- GitHub Issues: [Create an issue](https://github.com/nuttaponcc/evaluation-system/issues)

---

Made with ❤️ for Faculty of Engineering, Mahasarakham University
