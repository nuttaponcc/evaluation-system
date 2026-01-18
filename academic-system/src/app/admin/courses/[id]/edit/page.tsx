import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { CourseForm } from '@/components/forms/course-form';

interface EditCoursePageProps {
  params: Promise<{ id: string }>;
}

export default async function EditCoursePage({ params }: EditCoursePageProps) {
  const { id } = await params;

  const course = await prisma.course.findUnique({
    where: { id },
  });

  if (!course) {
    notFound();
  }

  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/courses" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการหลักสูตร
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">แก้ไขหลักสูตร</h1>
        <p className="text-muted-foreground mt-2">
          แก้ไขข้อมูลหลักสูตรอบรม
        </p>
      </div>

      <CourseForm course={course} />
    </div>
  );
}
