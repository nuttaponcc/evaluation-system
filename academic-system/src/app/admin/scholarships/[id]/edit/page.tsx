import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { ScholarshipForm } from '@/components/forms/scholarship-form';

interface EditScholarshipPageProps {
  params: Promise<{ id: string }>;
}

export default async function EditScholarshipPage({ params }: EditScholarshipPageProps) {
  const { id } = await params;

  const scholarship = await prisma.scholarship.findUnique({
    where: { id },
  });

  if (!scholarship) {
    notFound();
  }

  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/scholarships" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการทุน
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">แก้ไขทุนการศึกษา</h1>
        <p className="text-muted-foreground mt-2">
          แก้ไขข้อมูลทุนการศึกษา
        </p>
      </div>

      <ScholarshipForm scholarship={scholarship} />
    </div>
  );
}
