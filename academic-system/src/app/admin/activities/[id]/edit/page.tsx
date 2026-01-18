import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { ActivityForm } from '@/components/forms/activity-form';

interface EditActivityPageProps {
  params: Promise<{ id: string }>;
}

export default async function EditActivityPage({ params }: EditActivityPageProps) {
  const { id } = await params;

  const activity = await prisma.activity.findUnique({
    where: { id },
  });

  if (!activity) {
    notFound();
  }

  return (
    <div className="space-y-6">
      <div>
        <Link href="/admin/activities" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-4">
          <ArrowLeft className="h-4 w-4 mr-2" />
          กลับไปหน้ารายการกิจกรรม
        </Link>
        <h1 className="text-3xl font-bold tracking-tight">แก้ไขกิจกรรม</h1>
        <p className="text-muted-foreground mt-2">
          แก้ไขข้อมูลกิจกรรม
        </p>
      </div>

      <ActivityForm activity={activity} />
    </div>
  );
}
