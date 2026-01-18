'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import { useForm } from 'react-hook-form';
import { zodResolver } from '@hookform/resolvers/zod';
import { WizardForm } from './wizard-form';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { instructorSchema, type InstructorFormData } from '@/lib/validations';
import type { Instructor } from '@prisma/client';

interface InstructorFormProps {
  instructor?: Instructor;
}

const steps = [
  { id: 'basic', title: 'ข้อมูลพื้นฐาน', description: 'ชื่อและข้อมูลติดต่อ' },
  { id: 'academic', title: 'ข้อมูลวิชาการ', description: 'การศึกษาและความเชี่ยวชาญ' },
  { id: 'research', title: 'ผลงานวิจัย', description: 'งานวิจัยและผลงานตีพิมพ์' },
];

export function InstructorForm({ instructor }: InstructorFormProps) {
  const router = useRouter();
  const [isSubmitting, setIsSubmitting] = useState(false);

  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm<InstructorFormData>({
    resolver: zodResolver(instructorSchema),
    defaultValues: instructor
      ? {
          ...instructor,
        }
      : {
          isActive: true,
        },
  });

  const onSubmit = async () => {
    handleSubmit(async (data) => {
      setIsSubmitting(true);
      try {
        const url = instructor ? `/api/instructors/${instructor.id}` : '/api/instructors';
        const method = instructor ? 'PATCH' : 'POST';

        const response = await fetch(url, {
          method,
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
        });

        if (response.ok) {
          router.push('/admin/instructors');
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
      submitLabel={instructor ? 'อัปเดต' : 'เพิ่มอาจารย์'}
    >
      {/* Step 1: Basic Info */}
      <div className="space-y-4">
        <div className="grid gap-4 sm:grid-cols-3">
          <div className="space-y-2">
            <Label htmlFor="titleName">คำนำหน้า *</Label>
            <Input id="titleName" {...register('titleName')} placeholder="เช่น ผศ.ดร." />
            {errors.titleName && <p className="text-sm text-destructive">{errors.titleName.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="firstName">ชื่อ *</Label>
            <Input id="firstName" {...register('firstName')} placeholder="ชื่อ" />
            {errors.firstName && <p className="text-sm text-destructive">{errors.firstName.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="lastName">นามสกุล *</Label>
            <Input id="lastName" {...register('lastName')} placeholder="นามสกุล" />
            {errors.lastName && <p className="text-sm text-destructive">{errors.lastName.message}</p>}
          </div>
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="email">อีเมล *</Label>
            <Input id="email" type="email" {...register('email')} placeholder="email@eng.ac.th" />
            {errors.email && <p className="text-sm text-destructive">{errors.email.message}</p>}
          </div>
          <div className="space-y-2">
            <Label htmlFor="phone">โทรศัพท์</Label>
            <Input id="phone" {...register('phone')} placeholder="02-XXX-XXXX" />
          </div>
        </div>
        <div className="grid gap-4 sm:grid-cols-2">
          <div className="space-y-2">
            <Label htmlFor="officeLocation">ห้องทำงาน</Label>
            <Input id="officeLocation" {...register('officeLocation')} placeholder="เช่น ตึก A ห้อง 101" />
          </div>
          <div className="space-y-2">
            <Label htmlFor="website">เว็บไซต์</Label>
            <Input id="website" {...register('website')} placeholder="https://..." />
          </div>
        </div>
        <div className="space-y-2">
          <Label htmlFor="photoUrl">URL รูปภาพ</Label>
          <Input id="photoUrl" {...register('photoUrl')} placeholder="https://..." />
        </div>
      </div>

      {/* Step 2: Academic */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="expertise">ความเชี่ยวชาญ</Label>
          <Input id="expertise" {...register('expertise')} placeholder="เช่น Machine Learning, Data Science" />
        </div>
        <div className="space-y-2">
          <Label htmlFor="education">ประวัติการศึกษา</Label>
          <Textarea id="education" {...register('education')} rows={5} placeholder="รายละเอียดการศึกษา" />
        </div>
      </div>

      {/* Step 3: Research */}
      <div className="space-y-4">
        <div className="space-y-2">
          <Label htmlFor="researchInterests">ความสนใจในการวิจัย</Label>
          <Textarea id="researchInterests" {...register('researchInterests')} rows={4} placeholder="หัวข้อวิจัยที่สนใจ" />
        </div>
        <div className="space-y-2">
          <Label htmlFor="publications">ผลงานวิจัย/ตีพิมพ์</Label>
          <Textarea id="publications" {...register('publications')} rows={5} placeholder="รายการผลงานวิจัยและบทความ" />
        </div>
        <div className="flex items-center space-x-2">
          <input type="checkbox" id="isActive" {...register('isActive')} className="h-4 w-4" />
          <Label htmlFor="isActive">เปิดใช้งานทันที</Label>
        </div>
      </div>
    </WizardForm>
  );
}
