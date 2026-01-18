import { Suspense } from 'react';
import Link from 'next/link';
import { Plus, Pencil } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { DeleteButton } from '@/components/admin/delete-button';
import { ToggleActiveButton } from '@/components/admin/toggle-active-button';

interface AdminInstructorsPageProps {
  searchParams: Promise<{
    page?: string;
  }>;
}

async function InstructorsList({ searchParams }: { searchParams: AdminInstructorsPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 20;

  const [instructors, total] = await Promise.all([
    prisma.instructor.findMany({
      orderBy: [{ lastName: 'asc' }, { firstName: 'asc' }],
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.instructor.count(),
  ]);

  return (
    <div className="space-y-4">
      <div className="rounded-md border">
        <table className="w-full">
          <thead>
            <tr className="border-b bg-muted/50">
              <th className="p-4 text-left font-medium">รหัส</th>
              <th className="p-4 text-left font-medium">ชื่อ-นามสกุล</th>
              <th className="p-4 text-left font-medium">อีเมล</th>
              <th className="p-4 text-left font-medium">โทรศัพท์</th>
              <th className="p-4 text-left font-medium">ความเชี่ยวชาญ</th>
              <th className="p-4 text-left font-medium">สถานะ</th>
              <th className="p-4 text-right font-medium">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            {instructors.map((instructor) => (
              <tr key={instructor.id} className="border-b hover:bg-muted/50">
                <td className="p-4 text-sm">{instructor.instructorId}</td>
                <td className="p-4 font-medium">
                  {instructor.titleName}{instructor.firstName} {instructor.lastName}
                </td>
                <td className="p-4 text-sm">{instructor.email}</td>
                <td className="p-4 text-sm">{instructor.phone || '-'}</td>
                <td className="p-4 text-sm max-w-[200px] truncate">
                  {instructor.expertise || '-'}
                </td>
                <td className="p-4">
                  <Badge variant={instructor.isActive ? 'success' : 'secondary'}>
                    {instructor.isActive ? 'เปิดใช้งาน' : 'ปิดใช้งาน'}
                  </Badge>
                </td>
                <td className="p-4">
                  <div className="flex items-center justify-end gap-2">
                    <ToggleActiveButton
                      id={instructor.id}
                      isActive={instructor.isActive}
                      endpoint="/api/instructors"
                    />
                    <Link href={`/admin/instructors/${instructor.id}/edit`}>
                      <Button variant="ghost" size="icon">
                        <Pencil className="h-4 w-4" />
                      </Button>
                    </Link>
                    <DeleteButton id={instructor.id} endpoint="/api/instructors" />
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
      <div className="text-sm text-muted-foreground">
        แสดง {instructors.length} จาก {total} รายการ
      </div>
    </div>
  );
}

export default async function AdminInstructorsPage({ searchParams }: AdminInstructorsPageProps) {
  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-3xl font-bold tracking-tight">จัดการอาจารย์</h1>
          <p className="text-muted-foreground mt-2">
            จัดการข้อมูลอาจารย์ทั้งหมด
          </p>
        </div>
        <Link href="/admin/instructors/new">
          <Button>
            <Plus className="h-4 w-4 mr-2" />
            เพิ่มอาจารย์ใหม่
          </Button>
        </Link>
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <InstructorsList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
