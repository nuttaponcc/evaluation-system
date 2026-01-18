import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { JobForm } from '@/components/forms/job-form';

export default function NewJobPage() {
  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/jobs" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการงาน
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">เพิ่มประกาศงานใหม่</h1>
        <p className="text-muted-foreground mt-2">
          กรอกข้อมูลเพื่อสร้างประกาศรับสมัครงาน
        </p>
      </div>

      <JobForm />
    </div>
  );
}
