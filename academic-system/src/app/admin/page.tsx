import { prisma } from '@/lib/prisma';
import { Briefcase, GraduationCap, Calendar, BookOpen, Users } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import Link from 'next/link';

async function getStats() {
  const [jobs, scholarships, activities, courses, instructors] = await Promise.all([
    prisma.job.count({ where: { isActive: true } }),
    prisma.scholarship.count({ where: { isActive: true } }),
    prisma.activity.count({ where: { isActive: true } }),
    prisma.course.count({ where: { isActive: true } }),
    prisma.instructor.count({ where: { isActive: true } }),
  ]);

  return { jobs, scholarships, activities, courses, instructors };
}

export default async function AdminDashboard() {
  const stats = await getStats();

  const cards = [
    {
      title: 'งาน',
      value: stats.jobs,
      icon: Briefcase,
      href: '/admin/jobs',
      color: 'text-blue-600',
      bgColor: 'bg-blue-100',
    },
    {
      title: 'ทุนการศึกษา',
      value: stats.scholarships,
      icon: GraduationCap,
      href: '/admin/scholarships',
      color: 'text-green-600',
      bgColor: 'bg-green-100',
    },
    {
      title: 'กิจกรรม',
      value: stats.activities,
      icon: Calendar,
      href: '/admin/activities',
      color: 'text-purple-600',
      bgColor: 'bg-purple-100',
    },
    {
      title: 'หลักสูตร',
      value: stats.courses,
      icon: BookOpen,
      href: '/admin/courses',
      color: 'text-orange-600',
      bgColor: 'bg-orange-100',
    },
    {
      title: 'อาจารย์',
      value: stats.instructors,
      icon: Users,
      href: '/admin/instructors',
      color: 'text-pink-600',
      bgColor: 'bg-pink-100',
    },
  ];

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-bold tracking-tight">แดชบอร์ด</h1>
        <p className="text-muted-foreground mt-2">
          ภาพรวมข้อมูลในระบบงานวิชาการ
        </p>
      </div>

      <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
        {cards.map((card) => (
          <Link key={card.href} href={card.href}>
            <Card className="hover:shadow-lg transition-shadow cursor-pointer">
              <CardHeader className="flex flex-row items-center justify-between pb-2">
                <CardTitle className="text-sm font-medium text-muted-foreground">
                  {card.title}
                </CardTitle>
                <div className={`p-2 rounded-lg ${card.bgColor}`}>
                  <card.icon className={`h-4 w-4 ${card.color}`} />
                </div>
              </CardHeader>
              <CardContent>
                <div className="text-3xl font-bold">{card.value}</div>
                <p className="text-xs text-muted-foreground mt-1">
                  รายการที่เปิดใช้งาน
                </p>
              </CardContent>
            </Card>
          </Link>
        ))}
      </div>

      <div className="grid gap-6 lg:grid-cols-2">
        <Card>
          <CardHeader>
            <CardTitle>ลิงก์ด่วน</CardTitle>
          </CardHeader>
          <CardContent className="space-y-4">
            <Link href="/admin/jobs/new" className="block p-4 rounded-lg border hover:bg-muted transition-colors">
              <div className="flex items-center">
                <Briefcase className="h-5 w-5 mr-3 text-blue-600" />
                <div>
                  <div className="font-medium">เพิ่มประกาศงานใหม่</div>
                  <div className="text-sm text-muted-foreground">สร้างประกาศรับสมัครงาน</div>
                </div>
              </div>
            </Link>
            <Link href="/admin/scholarships/new" className="block p-4 rounded-lg border hover:bg-muted transition-colors">
              <div className="flex items-center">
                <GraduationCap className="h-5 w-5 mr-3 text-green-600" />
                <div>
                  <div className="font-medium">เพิ่มทุนการศึกษาใหม่</div>
                  <div className="text-sm text-muted-foreground">สร้างประกาศทุนการศึกษา</div>
                </div>
              </div>
            </Link>
            <Link href="/admin/activities/new" className="block p-4 rounded-lg border hover:bg-muted transition-colors">
              <div className="flex items-center">
                <Calendar className="h-5 w-5 mr-3 text-purple-600" />
                <div>
                  <div className="font-medium">เพิ่มกิจกรรมใหม่</div>
                  <div className="text-sm text-muted-foreground">สร้างกิจกรรมใหม่</div>
                </div>
              </div>
            </Link>
            <Link href="/admin/courses/new" className="block p-4 rounded-lg border hover:bg-muted transition-colors">
              <div className="flex items-center">
                <BookOpen className="h-5 w-5 mr-3 text-orange-600" />
                <div>
                  <div className="font-medium">เพิ่มหลักสูตรใหม่</div>
                  <div className="text-sm text-muted-foreground">สร้างหลักสูตรอบรม</div>
                </div>
              </div>
            </Link>
            <Link href="/admin/instructors/new" className="block p-4 rounded-lg border hover:bg-muted transition-colors">
              <div className="flex items-center">
                <Users className="h-5 w-5 mr-3 text-pink-600" />
                <div>
                  <div className="font-medium">เพิ่มอาจารย์ใหม่</div>
                  <div className="text-sm text-muted-foreground">เพิ่มข้อมูลอาจารย์</div>
                </div>
              </div>
            </Link>
          </CardContent>
        </Card>

        <Card>
          <CardHeader>
            <CardTitle>คู่มือการใช้งาน</CardTitle>
          </CardHeader>
          <CardContent className="space-y-4 text-sm text-muted-foreground">
            <div>
              <h4 className="font-medium text-foreground mb-2">การจัดการข้อมูล</h4>
              <ul className="list-disc list-inside space-y-1">
                <li>คลิกที่เมนูด้านซ้ายเพื่อเข้าถึงแต่ละหมวดหมู่</li>
                <li>ใช้ปุ่ม "เพิ่ม" เพื่อสร้างรายการใหม่</li>
                <li>คลิกที่รายการเพื่อแก้ไขข้อมูล</li>
                <li>ใช้ปุ่มลบเพื่อลบรายการ</li>
              </ul>
            </div>
            <div>
              <h4 className="font-medium text-foreground mb-2">สถานะการเปิดใช้งาน</h4>
              <ul className="list-disc list-inside space-y-1">
                <li>รายการที่เปิดใช้งานจะแสดงบนหน้าเว็บสาธารณะ</li>
                <li>ปิดใช้งานเพื่อซ่อนรายการชั่วคราว</li>
              </ul>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
