import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { CourseForm } from '@/components/forms/course-form';

export default function NewCoursePage() {
  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/courses" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการหลักสูตร
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">เพิ่มหลักสูตรใหม่</h1>
        <p className="text-muted-foreground mt-2">
          กรอกข้อมูลเพื่อสร้างหลักสูตรอบรม
        </p>
      </div>

      <CourseForm />
    </div>
  );
}
