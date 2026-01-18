import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { JobForm } from '@/components/forms/job-form';

interface EditJobPageProps {
  params: Promise<{ id: string }>;
}

export default async function EditJobPage({ params }: EditJobPageProps) {
  const { id } = await params;

  const job = await prisma.job.findUnique({
    where: { id },
  });

  if (!job) {
    notFound();
  }

  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/jobs" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการงาน
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">แก้ไขประกาศงาน</h1>
        <p className="text-muted-foreground mt-2">
          แก้ไขข้อมูลประกาศรับสมัครงาน
        </p>
      </div>

      <JobForm job={job} />
    </div>
  );
}
