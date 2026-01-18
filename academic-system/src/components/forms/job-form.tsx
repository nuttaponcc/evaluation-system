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
import { jobSchema, type JobFormData } from '@/lib/validations';
import type { Job } from '@prisma/client';

interface JobFormProps {
  job?: Job;
}

const steps = [
  { id: 'basic', title: 'ข้อมูลพื้นฐาน', description: 'ตำแหน่งงานและบริษัท' },
  { id: 'details', title: 'รายละเอียดงาน', description: 'คุณสมบัติและสวัสดิการ' },
  { id: 'contact', title: 'ข้อมูลติดต่อ', description: 'ผู้ติดต่อและวิธีสมัคร' },
  { id: 'schedule', title: 'ระยะเวลาประกาศ', description: 'วันที่เริ่มและสิ้นสุด' },
];

export function JobForm({ job }: JobFormProps) {
  const router = useRouter();
  const [isSubmitting, setIsSubmitting] = useState(false);

  const {
    register,
    handleSubmit,
    setValue,
    watch,
    formState: { errors },
  } = useForm<JobFormData>({
    resolver: zodResolver(jobSchema),
    defaultValues: job
      ? {
          ...job,
          salaryMin: job.salaryMin ? Number(job.salaryMin) : undefined,
          salaryMax: job.salaryMax ? Number(job.salaryMax) : undefined,
          startDate: job.startDate.toISOString().split('T')[0],
          endDate: job.endDate.toISOString().split('T')[0],
        }
      : {
          isUrgent: false,
          isActive: true,
          jobType: 'FULL_TIME',
        },
  });

  const onSubmit = async () => {
    handleSubmit(async (data) => {
      setIsSubmitting(true);
      try {
        const url = job ? `/api/jobs/${job.id}` : '/api/jobs';
        const method = job ? 'PATCH' : 'POST';

        const response = await fetch(url, {
          method,
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
        });

        if (response.ok) {
          router.push('/admin/jobs');
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
      submitLabel={job ? 'อัปเดต' : 'สร้างประกาศ'}
    >
      {/* Step 1: Basic Info */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="title">ตำแหน่งงาน *</Label>
            <Input id="title" {...register('title')} placeholder="เช่น Software Engineer" />
            {errors.title && <p className="text-sm text-destructive">{errors.title.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="company">บริษัท *</Label>
            <Input id="company" {...register('company')} placeholder="ชื่อบริษัท" />
            {errors.company && <p className="text-sm text-destructive">{errors.company.message}</p>}
          </div>
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="location">สถานที่ทำงาน *</Label>
            <Input id="location" {...register('location')} placeholder="เช่น กรุงเทพมหานคร" />
            {errors.location && <p className="text-sm text-destructive">{errors.location.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="jobType">ประเภทงาน *</Label>
            <Select defaultValue={watch('jobType')} onValueChange={(value) => setValue('jobType', value as any)}>
              <SelectTrigger>
                <SelectValue placeholder="เลือกประเภทงาน" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="FULL_TIME">งานประจำ</SelectItem>
                <SelectItem value="PART_TIME">Part-time</SelectItem>
                <SelectItem value="INTERNSHIP">ฝึกงาน</SelectItem>
                <SelectItem value="CONTRACT">สัญญาจ้าง</SelectItem>
              </SelectContent>
            </Select>
          </div>
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="salaryMin">เงินเดือนขั้นต่ำ</Label>
            <Input id="salaryMin" type="number" {...register('salaryMin', { valueAsNumber: true })} placeholder="30000" />
          </div>
          <div className="space-y-2">
            <Label htmlFor="salaryMax">เงินเดือนสูงสุด</Label>
            <Input id="salaryMax" type="number" {...register('salaryMax', { valueAsNumber: true })} placeholder="50000" />
          </div>
        </div>
        <div className="flex items-center space-x-2">
          <input type="checkbox" id="isUrgent" {...register('isUrgent')} className="h-4 w-4" />
          <Label htmlFor="isUrgent">ประกาศด่วน</Label>
        </div>
      </div>

      {/* Step 2: Details */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="description">รายละเอียดงาน *</Label>
          <Textarea id="description" {...register('description')} rows={5} placeholder="อธิบายลักษณะงานและหน้าที่รับผิดชอบ" />
          {errors.description && <p className="text-sm text-destructive">{errors.description.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="requirements">คุณสมบัติที่ต้องการ *</Label>
          <Textarea id="requirements" {...register('requirements')} rows={5} placeholder="คุณสมบัติและประสบการณ์ที่ต้องการ" />
          {errors.requirements && <p className="text-sm text-destructive">{errors.requirements.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="benefits">สวัสดิการ</Label>
          <Textarea id="benefits" {...register('benefits')} rows={3} placeholder="สวัสดิการที่ได้รับ" />
        </div>
      </div>

      {/* Step 3: Contact */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="contactPerson">ผู้ติดต่อ *</Label>
            <Input id="contactPerson" {...register('contactPerson')} placeholder="ชื่อผู้ติดต่อ" />
            {errors.contactPerson && <p className="text-sm text-destructive">{errors.contactPerson.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="contactEmail">อีเมล *</Label>
            <Input id="contactEmail" type="email" {...register('contactEmail')} placeholder="email@company.com" />
            {errors.contactEmail && <p className="text-sm text-destructive">{errors.contactEmail.message}</p>}
          </div>
        </div>
        <div className="space-y-2">
          <Label htmlFor="contactPhone">โทรศัพท์</Label>
          <Input id="contactPhone" {...register('contactPhone')} placeholder="02-XXX-XXXX" />
        </div>
        <div className="space-y-2">
          <Label htmlFor="applyMethod">วิธีการสมัคร *</Label>
          <Textarea id="applyMethod" {...register('applyMethod')} rows={3} placeholder="อธิบายวิธีการสมัครงาน" />
          {errors.applyMethod && <p className="text-sm text-destructive">{errors.applyMethod.message}</p>}
        </div>
      </div>

      {/* Step 4: Schedule */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="startDate">วันที่เริ่มประกาศ *</Label>
            <Input id="startDate" type="date" {...register('startDate')} />
            {errors.startDate && <p className="text-sm text-destructive">{errors.startDate.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="endDate">วันที่สิ้นสุดประกาศ *</Label>
            <Input id="endDate" type="date" {...register('endDate')} />
            {errors.endDate && <p className="text-sm text-destructive">{errors.endDate.message}</p>}
          </div>
        </div>
        <div className="flex items-center space-x-2">
          <input type="checkbox" id="isActive" {...register('isActive')} className="h-4 w-4" />
          <Label htmlFor="isActive">เปิดใช้งานทันที</Label>
        </div>
      </div>
    </WizardForm>
  );
}
