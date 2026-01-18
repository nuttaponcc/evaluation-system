'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import { useForm } from 'react-hook-form';
import { zodResolver } from '@hookform/resolvers/zod';
import { WizardForm } from './wizard-form';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { activitySchema, type ActivityFormData } from '@/lib/validations';
import type { Activity } from '@prisma/client';

interface ActivityFormProps {
  activity?: Activity;
}

const steps = [
  { id: 'basic', title: 'ข้อมูลพื้นฐาน', description: 'ชื่อและรายละเอียดกิจกรรม' },
  { id: 'schedule', title: 'กำหนดการ', description: 'วันเวลาและสถานที่' },
  { id: 'contact', title: 'ผู้ประสานงาน', description: 'ข้อมูลติดต่อ' },
];

export function ActivityForm({ activity }: ActivityFormProps) {
  const router = useRouter();
  const [isSubmitting, setIsSubmitting] = useState(false);

  const formatDateTimeLocal = (date: Date) => {
    return date.toISOString().slice(0, 16);
  };

  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm<ActivityFormData>({
    resolver: zodResolver(activitySchema),
    defaultValues: activity
      ? {
          ...activity,
          startDatetime: formatDateTimeLocal(activity.startDatetime),
          endDatetime: formatDateTimeLocal(activity.endDatetime),
          registrationDeadline: activity.registrationDeadline?.toISOString().split('T')[0],
        }
      : {
          isActive: true,
        },
  });

  const onSubmit = async () => {
    handleSubmit(async (data) => {
      setIsSubmitting(true);
      try {
        const url = activity ? `/api/activities/${activity.id}` : '/api/activities';
        const method = activity ? 'PATCH' : 'POST';

        const response = await fetch(url, {
          method,
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
        });

        if (response.ok) {
          router.push('/admin/activities');
          router.refresh();
        } else {
          const result = await response.json();
          alert(result.error || 'เกิดข้อผิดพลาด');
        }
      } catch (error) {
        alert('เกิดข้อผิดพลาด');
      } finally {
        setIsSubmitting(false);
      }
    })();
  };

  return (
    <WizardForm
      steps={steps}
      onSubmit={onSubmit}
      isSubmitting={isSubmitting}
      submitLabel={activity ? 'อัปเดต' : 'สร้างกิจกรรม'}
    >
      {/* Step 1: Basic Info */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="title">ชื่อกิจกรรม *</Label>
          <Input id="title" {...register('title')} placeholder="ชื่อกิจกรรม" />
          {errors.title && <p className="text-sm text-destructive">{errors.title.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="category">หมวดหมู่ *</Label>
          <Input id="category" {...register('category')} placeholder="เช่น สัมมนา, อบรม, กีฬา" />
          {errors.category && <p className="text-sm text-destructive">{errors.category.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="description">รายละเอียดกิจกรรม *</Label>
          <Textarea id="description" {...register('description')} rows={4} placeholder="อธิบายรายละเอียดของกิจกรรม" />
          {errors.description && <p className="text-sm text-destructive">{errors.description.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="objectives">วัตถุประสงค์</Label>
          <Textarea id="objectives" {...register('objectives')} rows={3} placeholder="วัตถุประสงค์ของกิจกรรม" />
        </div>
        <div className="space-y-2">
          <Label htmlFor="targetAudience">กลุ่มเป้าหมาย</Label>
          <Input id="targetAudience" {...register('targetAudience')} placeholder="เช่น นักศึกษาปี 1-4" />
        </div>
      </div>

      {/* Step 2: Schedule */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="startDatetime">วันเวลาเริ่มกิจกรรม *</Label>
            <Input id="startDatetime" type="datetime-local" {...register('startDatetime')} />
            {errors.startDatetime && <p className="text-sm text-destructive">{errors.startDatetime.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="endDatetime">วันเวลาสิ้นสุดกิจกรรม *</Label>
            <Input id="endDatetime" type="datetime-local" {...register('endDatetime')} />
            {errors.endDatetime && <p className="text-sm text-destructive">{errors.endDatetime.message}</p>}
          </div>
        </div>
        <div className="space-y-2">
          <Label htmlFor="location">สถานที่จัดกิจกรรม *</Label>
          <Input id="location" {...register('location')} placeholder="สถานที่จัดกิจกรรม" />
          {errors.location && <p className="text-sm text-destructive">{errors.location.message}</p>}
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="maxParticipants">จำนวนผู้เข้าร่วมสูงสุด</Label>
            <Input id="maxParticipants" type="number" {...register('maxParticipants', { valueAsNumber: true })} placeholder="100" />
          </div>
          <div className="space-y-2">
            <Label htmlFor="registrationDeadline">วันปิดรับลงทะเบียน</Label>
            <Input id="registrationDeadline" type="date" {...register('registrationDeadline')} />
          </div>
        </div>
      </div>

      {/* Step 3: Contact */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="coordinator">ผู้ประสานงาน *</Label>
          <Input id="coordinator" {...register('coordinator')} placeholder="ชื่อผู้ประสานงาน" />
          {errors.coordinator && <p className="text-sm text-destructive">{errors.coordinator.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="coordinatorContact">ข้อมูลติดต่อ *</Label>
          <Textarea id="coordinatorContact" {...register('coordinatorContact')} rows={3} placeholder="อีเมล, โทรศัพท์" />
          {errors.coordinatorContact && <p className="text-sm text-destructive">{errors.coordinatorContact.message}</p>}
        </div>
        <div className="flex items-center space-x-2">
          <input type="checkbox" id="isActive" {...register('isActive')} className="h-4 w-4" />
          <Label htmlFor="isActive">เปิดใช้งานทันที</Label>
        </div>
      </div>
    </WizardForm>
  );
}
