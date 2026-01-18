import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { ScholarshipForm } from '@/components/forms/scholarship-form';

export default function NewScholarshipPage() {
  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/scholarships" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการทุน
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">เพิ่มทุนการศึกษาใหม่</h1>
        <p className="text-muted-foreground mt-2">
          กรอกข้อมูลเพื่อสร้างประกาศทุนการศึกษา
        </p>
      </div>

      <ScholarshipForm />
    </div>
  );
}
