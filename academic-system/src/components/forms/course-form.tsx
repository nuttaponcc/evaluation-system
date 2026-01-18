'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import { useForm } from 'react-hook-form';
import { zodResolver } from '@hookform/resolvers/zod';
import { WizardForm } from './wizard-form';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { courseSchema, type CourseFormData } from '@/lib/validations';
import type { Course } from '@prisma/client';

interface CourseFormProps {
  course?: Course;
}

const steps = [
  { id: 'basic', title: 'ข้อมูลพื้นฐาน', description: 'ชื่อและรายละเอียดหลักสูตร' },
  { id: 'schedule', title: 'กำหนดการ', description: 'วันเวลาและสถานที่' },
  { id: 'registration', title: 'การลงทะเบียน', description: 'ค่าลงทะเบียนและจำนวนรับ' },
];

export function CourseForm({ course }: CourseFormProps) {
  const router = useRouter();
  const [isSubmitting, setIsSubmitting] = useState(false);

  const {
    register,
    handleSubmit,
    setValue,
    watch,
    formState: { errors },
  } = useForm<CourseFormData>({
    resolver: zodResolver(courseSchema),
    defaultValues: course
      ? {
          ...course,
          fee: course.fee ? Number(course.fee) : 0,
          courseStart: course.courseStart.toISOString().split('T')[0],
          courseEnd: course.courseEnd.toISOString().split('T')[0],
          registrationStart: course.registrationStart?.toISOString().split('T')[0],
          registrationEnd: course.registrationEnd?.toISOString().split('T')[0],
        }
      : {
          isActive: true,
          certificate: false,
          type: 'INTERNAL',
          fee: 0,
        },
  });

  const onSubmit = async () => {
    handleSubmit(async (data) => {
      setIsSubmitting(true);
      try {
        const url = course ? `/api/courses/${course.id}` : '/api/courses';
        const method = course ? 'PATCH' : 'POST';

        const response = await fetch(url, {
          method,
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
        });

        if (response.ok) {
          router.push('/admin/courses');
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
      submitLabel={course ? 'อัปเดต' : 'สร้างหลักสูตร'}
    >
      {/* Step 1: Basic Info */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="title">ชื่อหลักสูตร *</Label>
          <Input id="title" {...register('title')} placeholder="ชื่อหลักสูตรอบรม" />
          {errors.title && <p className="text-sm text-destructive">{errors.title.message}</p>}
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="type">ประเภทหลักสูตร *</Label>
            <Select defaultValue={watch('type')} onValueChange={(value) => setValue('type', value as any)}>
              <SelectTrigger>
                <SelectValue placeholder="เลือกประเภท" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="INTERNAL">หลักสูตรภายใน</SelectItem>
                <SelectItem value="EXTERNAL">หลักสูตรภายนอก</SelectItem>
              </SelectContent>
            </Select>
          </div>
          <div className="space-y-2">
            <Label htmlFor="instructor">วิทยากร</Label>
            <Input id="instructor" {...register('instructor')} placeholder="ชื่อวิทยากร" />
          </div>
        </div>
        <div className="space-y-2">
          <Label htmlFor="description">รายละเอียดหลักสูตร *</Label>
          <Textarea id="description" {...register('description')} rows={4} placeholder="อธิบายเนื้อหาหลักสูตร" />
          {errors.description && <p className="text-sm text-destructive">{errors.description.message}</p>}
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="duration">ระยะเวลาเรียน</Label>
            <Input id="duration" {...register('duration')} placeholder="เช่น 30 ชั่วโมง" />
          </div>
          <div className="space-y-2">
            <Label htmlFor="schedule">ตารางเรียน</Label>
            <Input id="schedule" {...register('schedule')} placeholder="เช่น ทุกวันเสาร์ 9:00-16:00" />
          </div>
        </div>
      </div>

      {/* Step 2: Schedule */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="courseStart">วันเริ่มเรียน *</Label>
            <Input id="courseStart" type="date" {...register('courseStart')} />
            {errors.courseStart && <p className="text-sm text-destructive">{errors.courseStart.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="courseEnd">วันสิ้นสุด *</Label>
            <Input id="courseEnd" type="date" {...register('courseEnd')} />
            {errors.courseEnd && <p className="text-sm text-destructive">{errors.courseEnd.message}</p>}
          </div>
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="registrationStart">วันเปิดรับสมัคร</Label>
            <Input id="registrationStart" type="date" {...register('registrationStart')} />
          </div>
          <div className="space-y-2">
            <Label htmlFor="registrationEnd">วันปิดรับสมัคร</Label>
            <Input id="registrationEnd" type="date" {...register('registrationEnd')} />
          </div>
        </div>
        <div className="space-y-2">
          <Label htmlFor="location">สถานที่เรียน</Label>
          <Input id="location" {...register('location')} placeholder="สถานที่จัดอบรม" />
        </div>
      </div>

      {/* Step 3: Registration */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="fee">ค่าลงทะเบียน (บาท) *</Label>
            <Input id="fee" type="number" {...register('fee', { valueAsNumber: true })} placeholder="0 = ฟรี" />
            {errors.fee && <p className="text-sm text-destructive">{errors.fee.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="maxParticipants">จำนวนรับสูงสุด</Label>
            <Input id="maxParticipants" type="number" {...register('maxParticipants', { valueAsNumber: true })} placeholder="30" />
          </div>
        </div>
        <div className="flex items-center space-x-2">
          <input type="checkbox" id="certificate" {...register('certificate')} className="h-4 w-4" />
          <Label htmlFor="certificate">มีใบประกาศนียบัตร</Label>
        </div>
        <div className="flex items-center space-x-2">
          <input type="checkbox" id="isActive" {...register('isActive')} className="h-4 w-4" />
          <Label htmlFor="isActive">เปิดใช้งานทันที</Label>
        </div>
      </div>
    </WizardForm>
  );
}
