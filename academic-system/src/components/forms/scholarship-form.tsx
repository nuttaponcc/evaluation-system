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
import { scholarshipSchema, type ScholarshipFormData } from '@/lib/validations';
import type { Scholarship } from '@prisma/client';

interface ScholarshipFormProps {
  scholarship?: Scholarship;
}

const steps = [
  { id: 'basic', title: 'ข้อมูลพื้นฐาน', description: 'ชื่อทุนและผู้ให้ทุน' },
  { id: 'details', title: 'รายละเอียดทุน', description: 'คุณสมบัติและเอกสาร' },
  { id: 'schedule', title: 'กำหนดการ', description: 'วันปิดรับสมัครและประกาศผล' },
];

export function ScholarshipForm({ scholarship }: ScholarshipFormProps) {
  const router = useRouter();
  const [isSubmitting, setIsSubmitting] = useState(false);

  const {
    register,
    handleSubmit,
    setValue,
    watch,
    formState: { errors },
  } = useForm<ScholarshipFormData>({
    resolver: zodResolver(scholarshipSchema),
    defaultValues: scholarship
      ? {
          ...scholarship,
          amount: scholarship.amount ? Number(scholarship.amount) : undefined,
          applicationDeadline: scholarship.applicationDeadline.toISOString().split('T')[0],
          announcementDate: scholarship.announcementDate?.toISOString().split('T')[0],
        }
      : {
          isActive: true,
          type: 'COMPANY',
        },
  });

  const onSubmit = async () => {
    handleSubmit(async (data) => {
      setIsSubmitting(true);
      try {
        const url = scholarship ? `/api/scholarships/${scholarship.id}` : '/api/scholarships';
        const method = scholarship ? 'PATCH' : 'POST';

        const response = await fetch(url, {
          method,
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
        });

        if (response.ok) {
          router.push('/admin/scholarships');
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
      submitLabel={scholarship ? 'อัปเดต' : 'สร้างประกาศ'}
    >
      {/* Step 1: Basic Info */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="title">ชื่อทุน *</Label>
          <Input id="title" {...register('title')} placeholder="ชื่อทุนการศึกษา" />
          {errors.title && <p className="text-sm text-destructive">{errors.title.message}</p>}
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="sponsor">ผู้ให้ทุน *</Label>
            <Input id="sponsor" {...register('sponsor')} placeholder="ชื่อหน่วยงานหรือบริษัท" />
            {errors.sponsor && <p className="text-sm text-destructive">{errors.sponsor.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="type">ประเภททุน *</Label>
            <Select defaultValue={watch('type')} onValueChange={(value) => setValue('type', value as any)}>
              <SelectTrigger>
                <SelectValue placeholder="เลือกประเภททุน" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="COMPANY">ทุนจากบริษัท</SelectItem>
                <SelectItem value="INBOUND">ทุนในประเทศ</SelectItem>
                <SelectItem value="OUTBOUND">ทุนต่างประเทศ</SelectItem>
                <SelectItem value="SPECIAL">ทุนพิเศษ</SelectItem>
              </SelectContent>
            </Select>
          </div>
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="amount">มูลค่าทุน (บาท)</Label>
            <Input id="amount" type="number" {...register('amount', { valueAsNumber: true })} placeholder="50000" />
          </div>
          <div className="space-y-2">
            <Label htmlFor="duration">ระยะเวลา</Label>
            <Input id="duration" {...register('duration')} placeholder="เช่น 1 ปี, ตลอดหลักสูตร" />
          </div>
        </div>
        <div className="space-y-2">
          <Label htmlFor="description">รายละเอียดทุน *</Label>
          <Textarea id="description" {...register('description')} rows={4} placeholder="อธิบายรายละเอียดของทุนการศึกษา" />
          {errors.description && <p className="text-sm text-destructive">{errors.description.message}</p>}
        </div>
      </div>

      {/* Step 2: Details */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="eligibility">คุณสมบัติผู้สมัคร *</Label>
          <Textarea id="eligibility" {...register('eligibility')} rows={5} placeholder="คุณสมบัติที่ต้องมีในการสมัครรับทุน" />
          {errors.eligibility && <p className="text-sm text-destructive">{errors.eligibility.message}</p>}
        </div>
        <div className="space-y-2">
          <Label htmlFor="requiredDocs">เอกสารที่ต้องใช้</Label>
          <Textarea id="requiredDocs" {...register('requiredDocs')} rows={4} placeholder="รายการเอกสารที่ต้องยื่น" />
        </div>
        <div className="space-y-2">
          <Label htmlFor="contactInfo">ข้อมูลติดต่อ *</Label>
          <Textarea id="contactInfo" {...register('contactInfo')} rows={3} placeholder="ข้อมูลการติดต่อสอบถาม" />
          {errors.contactInfo && <p className="text-sm text-destructive">{errors.contactInfo.message}</p>}
        </div>
      </div>

      {/* Step 3: Schedule */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="applicationDeadline">วันปิดรับสมัคร *</Label>
            <Input id="applicationDeadline" type="date" {...register('applicationDeadline')} />
            {errors.applicationDeadline && <p className="text-sm text-destructive">{errors.applicationDeadline.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="announcementDate">วันประกาศผล</Label>
            <Input id="announcementDate" type="date" {...register('announcementDate')} />
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
