import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { InstructorForm } from '@/components/forms/instructor-form';

export default function NewInstructorPage() {
  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/instructors" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายชื่ออาจารย์
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">เพิ่มอาจารย์ใหม่</h1>
        <p className="text-muted-foreground mt-2">
          กรอกข้อมูลเพื่อเพิ่มอาจารย์
        </p>
      </div>

      <InstructorForm />
    </div>
  );
}
