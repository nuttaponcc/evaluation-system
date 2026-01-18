import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { InstructorForm } from '@/components/forms/instructor-form';

interface EditInstructorPageProps {
  params: Promise<{ id: string }>;
}

export default async function EditInstructorPage({ params }: EditInstructorPageProps) {
  const { id } = await params;

  const instructor = await prisma.instructor.findUnique({
    where: { id },
  });

  if (!instructor) {
    notFound();
  }

  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/instructors" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายชื่ออาจารย์
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">แก้ไขข้อมูลอาจารย์</h1>
        <p className="text-muted-foreground mt-2">
          แก้ไขข้อมูลอาจารย์
        </p>
      </div>

      <InstructorForm instructor={instructor} />
    </div>
  );
}
