import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft, Building2, MapPin, Calendar, Mail, Phone, User, FileText, Clock } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { formatDate, formatSalaryRange, jobTypeLabels } from '@/lib/utils';

interface JobDetailPageProps {
  params: Promise<{ id: string }>;
}

export default async function JobDetailPage({ params }: JobDetailPageProps) {
  const { id } = await params;

  const job = await prisma.job.findFirst({
    where: {
      OR: [{ id }, { jobId: id }],
      isActive: true,
    },
  });

  if (!job) {
    notFound();
  }

  return (
    <div className="container py-8">
      <Link href="/jobs" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-6">
        <ArrowLeft className="h-4 w-4 mr-2" />
        กลับไปหน้ารายการงาน
      </Link>

      <div className="grid gap-8 lg:grid-cols-3">
        {/* Main Content */}
        <div className="lg:col-span-2 space-y-6">
          <div>
            <div className="flex items-center gap-2 mb-4 flex-wrap">
              {job.isUrgent && <Badge variant="destructive">ด่วน</Badge>}
              <Badge variant="secondary">{jobTypeLabels[job.jobType] || job.jobType}</Badge>
            </div>
            <h1 className="text-3xl font-bold tracking-tight">{job.title}</h1>
            <div className="mt-4 flex flex-wrap gap-4 text-muted-foreground">
              <div className="flex items-center">
                <Building2 className="h-4 w-4 mr-2" />
                {job.company}
              </div>
              <div className="flex items-center">
                <MapPin className="h-4 w-4 mr-2" />
                {job.location}
              </div>
            </div>
            <div className="mt-4 text-2xl font-semibold text-primary">
              {formatSalaryRange(
                job.salaryMin ? Number(job.salaryMin) : null,
                job.salaryMax ? Number(job.salaryMax) : null
              )}
            </div>
          </div>

          <Separator />

          <Card>
            <CardHeader>
              <CardTitle>รายละเอียดงาน</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {job.description}
              </div>
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>คุณสมบัติที่ต้องการ</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {job.requirements}
              </div>
            </CardContent>
          </Card>

          {job.benefits && (
            <Card>
              <CardHeader>
                <CardTitle>สวัสดิการ</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                  {job.benefits}
                </div>
              </CardContent>
            </Card>
          )}

          <Card>
            <CardHeader>
              <CardTitle>วิธีการสมัคร</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {job.applyMethod}
              </div>
            </CardContent>
          </Card>
        </div>

        {/* Sidebar */}
        <div className="space-y-6">
          <Card>
            <CardHeader>
              <CardTitle>ข้อมูลติดต่อ</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="flex items-start">
                <User className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">ผู้ติดต่อ</div>
                  <div>{job.contactPerson}</div>
                </div>
              </div>
              <div className="flex items-start">
                <Mail className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">อีเมล</div>
                  <a href={`mailto:${job.contactEmail}`} className="text-primary hover:underline">
                    {job.contactEmail}
                  </a>
                </div>
              </div>
              {job.contactPhone && (
                <div className="flex items-start">
                  <Phone className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">โทรศัพท์</div>
                    <a href={`tel:${job.contactPhone}`} className="text-primary hover:underline">
                      {job.contactPhone}
                    </a>
                  </div>
                </div>
              )}
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>ระยะเวลาประกาศ</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="flex items-start">
                <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">วันที่เริ่มประกาศ</div>
                  <div>{formatDate(job.startDate)}</div>
                </div>
              </div>
              <div className="flex items-start">
                <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">วันที่สิ้นสุดประกาศ</div>
                  <div>{formatDate(job.endDate)}</div>
                </div>
              </div>
              <div className="flex items-start">
                <Clock className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">ประกาศเมื่อ</div>
                  <div>{formatDate(job.createdAt)}</div>
                </div>
              </div>
            </CardContent>
          </Card>

          {job.attachmentUrl && (
            <Card>
              <CardHeader>
                <CardTitle>ไฟล์แนบ</CardTitle>
              </CardHeader>
              <CardContent>
                <a href={job.attachmentUrl} target="_blank" rel="noopener noreferrer">
                  <Button variant="outline" className="w-full">
                    <FileText className="h-4 w-4 mr-2" />
                    ดาวน์โหลดเอกสาร
                  </Button>
                </a>
              </CardContent>
            </Card>
          )}
        </div>
      </div>
    </div>
  );
}
