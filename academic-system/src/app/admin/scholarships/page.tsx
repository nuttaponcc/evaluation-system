import { Suspense } from 'react';
import Link from 'next/link';
import { Plus, Pencil } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { formatDate, scholarshipTypeLabels } from '@/lib/utils';
import { DeleteButton } from '@/components/admin/delete-button';
import { ToggleActiveButton } from '@/components/admin/toggle-active-button';

interface AdminScholarshipsPageProps {
  searchParams: Promise<{
    page?: string;
  }>;
}

async function ScholarshipsList({ searchParams }: { searchParams: AdminScholarshipsPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 20;

  const [scholarships, total] = await Promise.all([
    prisma.scholarship.findMany({
      orderBy: { createdAt: 'desc' },
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.scholarship.count(),
  ]);

  return (
    <div className="space-y-4">
      <div className="rounded-md border">
        <table className="w-full">
          <thead>
            <tr className="border-b bg-muted/50">
              <th className="p-4 text-left font-medium">รหัส</th>
              <th className="p-4 text-left font-medium">ชื่อทุน</th>
              <th className="p-4 text-left font-medium">ผู้ให้ทุน</th>
              <th className="p-4 text-left font-medium">ประเภท</th>
              <th className="p-4 text-left font-medium">ปิดรับสมัคร</th>
              <th className="p-4 text-left font-medium">สถานะ</th>
              <th className="p-4 text-right font-medium">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            {scholarships.map((scholarship) => (
              <tr key={scholarship.id} className="border-b hover:bg-muted/50">
                <td className="p-4 text-sm">{scholarship.scholarshipId}</td>
                <td className="p-4 font-medium">{scholarship.title}</td>
                <td className="p-4 text-sm">{scholarship.sponsor}</td>
                <td className="p-4">
                  <Badge variant="secondary">
                    {scholarshipTypeLabels[scholarship.type] || scholarship.type}
                  </Badge>
                </td>
                <td className="p-4 text-sm">{formatDate(scholarship.applicationDeadline)}</td>
                <td className="p-4">
                  <Badge variant={scholarship.isActive ? 'success' : 'secondary'}>
                    {scholarship.isActive ? 'เปิดใช้งาน' : 'ปิดใช้งาน'}
                  </Badge>
                </td>
                <td className="p-4">
                  <div className="flex items-center justify-end gap-2">
                    <ToggleActiveButton
                      id={scholarship.id}
                      isActive={scholarship.isActive}
                      endpoint="/api/scholarships"
                    />
                    <Link href={`/admin/scholarships/${scholarship.id}/edit`}>
                      <Button variant="ghost" size="icon">
                        <Pencil className="h-4 w-4" />
                      </Button>
                    </Link>
                    <DeleteButton id={scholarship.id} endpoint="/api/scholarships" />
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
      <div className="text-sm text-muted-foreground">
        แสดง {scholarships.length} จาก {total} รายการ
      </div>
    </div>
  );
}

export default async function AdminScholarshipsPage({ searchParams }: AdminScholarshipsPageProps) {
  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-3xl font-bold tracking-tight">จัดการทุนการศึกษา</h1>
          <p className="text-muted-foreground mt-2">
            จัดการประกาศทุนการศึกษาทั้งหมด
          </p>
        </div>
        <Link href="/admin/scholarships/new">
          <Button>
            <Plus className="h-4 w-4 mr-2" />
            เพิ่มทุนใหม่
          </Button>
        </Link>
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <ScholarshipsList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
