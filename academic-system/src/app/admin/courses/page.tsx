import { Suspense } from 'react';
import Link from 'next/link';
import { Plus, Pencil } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { formatDate, formatCurrency, courseTypeLabels } from '@/lib/utils';
import { DeleteButton } from '@/components/admin/delete-button';
import { ToggleActiveButton } from '@/components/admin/toggle-active-button';

interface AdminCoursesPageProps {
  searchParams: Promise<{
    page?: string;
  }>;
}

async function CoursesList({ searchParams }: { searchParams: AdminCoursesPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 20;

  const [courses, total] = await Promise.all([
    prisma.course.findMany({
      orderBy: { createdAt: 'desc' },
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.course.count(),
  ]);

  return (
    <div className="space-y-4">
      <div className="rounded-md border">
        <table className="w-full">
          <thead>
            <tr className="border-b bg-muted/50">
              <th className="p-4 text-left font-medium">รหัส</th>
              <th className="p-4 text-left font-medium">ชื่อหลักสูตร</th>
              <th className="p-4 text-left font-medium">ประเภท</th>
              <th className="p-4 text-left font-medium">ค่าลงทะเบียน</th>
              <th className="p-4 text-left font-medium">วันเริ่มเรียน</th>
              <th className="p-4 text-left font-medium">สถานะ</th>
              <th className="p-4 text-right font-medium">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            {courses.map((course) => (
              <tr key={course.id} className="border-b hover:bg-muted/50">
                <td className="p-4 text-sm">{course.courseId}</td>
                <td className="p-4">
                  <div className="font-medium">{course.title}</div>
                  {course.certificate && (
                    <Badge variant="success" className="mt-1">มีใบประกาศ</Badge>
                  )}
                </td>
                <td className="p-4">
                  <Badge variant="secondary">
                    {courseTypeLabels[course.type] || course.type}
                  </Badge>
                </td>
                <td className="p-4 text-sm">
                  {Number(course.fee) === 0 ? 'ฟรี' : formatCurrency(Number(course.fee))}
                </td>
                <td className="p-4 text-sm">{formatDate(course.courseStart)}</td>
                <td className="p-4">
                  <Badge variant={course.isActive ? 'success' : 'secondary'}>
                    {course.isActive ? 'เปิดใช้งาน' : 'ปิดใช้งาน'}
                  </Badge>
                </td>
                <td className="p-4">
                  <div className="flex items-center justify-end gap-2">
                    <ToggleActiveButton
                      id={course.id}
                      isActive={course.isActive}
                      endpoint="/api/courses"
                    />
                    <Link href={`/admin/courses/${course.id}/edit`}>
                      <Button variant="ghost" size="icon">
                        <Pencil className="h-4 w-4" />
                      </Button>
                    </Link>
                    <DeleteButton id={course.id} endpoint="/api/courses" />
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
      <div className="text-sm text-muted-foreground">
        แสดง {courses.length} จาก {total} รายการ
      </div>
    </div>
  );
}

export default async function AdminCoursesPage({ searchParams }: AdminCoursesPageProps) {
  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-3xl font-bold tracking-tight">จัดการหลักสูตร</h1>
          <p className="text-muted-foreground mt-2">
            จัดการหลักสูตรอบรมทั้งหมด
          </p>
        </div>
        <Link href="/admin/courses/new">
          <Button>
            <Plus className="h-4 w-4 mr-2" />
            เพิ่มหลักสูตรใหม่
          </Button>
        </Link>
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <CoursesList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
