import { Suspense } from 'react';
import Link from 'next/link';
import { Plus, Pencil, Trash2, Eye, EyeOff } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { formatDate, jobTypeLabels } from '@/lib/utils';
import { DeleteButton } from '@/components/admin/delete-button';
import { ToggleActiveButton } from '@/components/admin/toggle-active-button';

interface AdminJobsPageProps {
  searchParams: Promise<{
    page?: string;
  }>;
}

async function JobsList({ searchParams }: { searchParams: AdminJobsPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 20;

  const [jobs, total] = await Promise.all([
    prisma.job.findMany({
      orderBy: { createdAt: 'desc' },
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.job.count(),
  ]);

  return (
    <div className="space-y-4">
      <div className="rounded-md border">
        <table className="w-full">
          <thead>
            <tr className="border-b bg-muted/50">
              <th className="p-4 text-left font-medium">รหัส</th>
              <th className="p-4 text-left font-medium">ตำแหน่งงาน</th>
              <th className="p-4 text-left font-medium">บริษัท</th>
              <th className="p-4 text-left font-medium">ประเภท</th>
              <th className="p-4 text-left font-medium">สิ้นสุด</th>
              <th className="p-4 text-left font-medium">สถานะ</th>
              <th className="p-4 text-right font-medium">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            {jobs.map((job) => (
              <tr key={job.id} className="border-b hover:bg-muted/50">
                <td className="p-4 text-sm">{job.jobId}</td>
                <td className="p-4">
                  <div className="font-medium">{job.title}</div>
                  {job.isUrgent && (
                    <Badge variant="destructive" className="mt-1">ด่วน</Badge>
                  )}
                </td>
                <td className="p-4 text-sm">{job.company}</td>
                <td className="p-4">
                  <Badge variant="secondary">
                    {jobTypeLabels[job.jobType] || job.jobType}
                  </Badge>
                </td>
                <td className="p-4 text-sm">{formatDate(job.endDate)}</td>
                <td className="p-4">
                  <Badge variant={job.isActive ? 'success' : 'secondary'}>
                    {job.isActive ? 'เปิดใช้งาน' : 'ปิดใช้งาน'}
                  </Badge>
                </td>
                <td className="p-4">
                  <div className="flex items-center justify-end gap-2">
                    <ToggleActiveButton
                      id={job.id}
                      isActive={job.isActive}
                      endpoint="/api/jobs"
                    />
                    <Link href={`/admin/jobs/${job.id}/edit`}>
                      <Button variant="ghost" size="icon">
                        <Pencil className="h-4 w-4" />
                      </Button>
                    </Link>
                    <DeleteButton id={job.id} endpoint="/api/jobs" />
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
      <div className="text-sm text-muted-foreground">
        แสดง {jobs.length} จาก {total} รายการ
      </div>
    </div>
  );
}

export default async function AdminJobsPage({ searchParams }: AdminJobsPageProps) {
  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-3xl font-bold tracking-tight">จัดการงาน</h1>
          <p className="text-muted-foreground mt-2">
            จัดการประกาศรับสมัครงานทั้งหมด
          </p>
        </div>
        <Link href="/admin/jobs/new">
          <Button>
            <Plus className="h-4 w-4 mr-2" />
            เพิ่มงานใหม่
          </Button>
        </Link>
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <JobsList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
