import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { ActivityForm } from '@/components/forms/activity-form';

export default function NewActivityPage() {
  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/activities" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการกิจกรรม
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">เพิ่มกิจกรรมใหม่</h1>
        <p className="text-muted-foreground mt-2">
          กรอกข้อมูลเพื่อสร้างกิจกรรม
        </p>
      </div>

      <ActivityForm />
    </div>
  );
}
