import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft, Building2, Calendar, Banknote, Clock, FileText } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { formatDate, formatCurrency, scholarshipTypeLabels, isPast } from '@/lib/utils';

interface ScholarshipDetailPageProps {
  params: Promise<{ id: string }>;
}

export default async function ScholarshipDetailPage({ params }: ScholarshipDetailPageProps) {
  const { id } = await params;

  const scholarship = await prisma.scholarship.findFirst({
    where: {
      OR: [{ id }, { scholarshipId: id }],
      isActive: true,
    },
  });

  if (!scholarship) {
    notFound();
  }

  const isExpired = isPast(scholarship.applicationDeadline);

  return (
    <div className="container py-8">
      <Link href="/scholarships" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-6">
        <ArrowLeft className="h-4 w-4 mr-2" />
        กลับไปหน้ารายการทุน
      </Link>

      <div className="grid gap-8 lg:grid-cols-3">
        {/* Main Content */}
        <div className="lg:col-span-2 space-y-6">
          <div>
            <div className="flex items-center gap-2 mb-4 flex-wrap">
              <Badge variant={isExpired ? 'secondary' : 'info'}>
                {scholarshipTypeLabels[scholarship.type] || scholarship.type}
              </Badge>
              {isExpired && <Badge variant="destructive">หมดเขต</Badge>}
            </div>
            <h1 className="text-3xl font-bold tracking-tight">{scholarship.title}</h1>
            <div className="mt-4 flex flex-wrap gap-4 text-muted-foreground">
              <div className="flex items-center">
                <Building2 className="h-4 w-4 mr-2" />
                {scholarship.sponsor}
              </div>
            </div>
            {scholarship.amount && (
              <div className="mt-4 text-2xl font-semibold text-primary">
                {formatCurrency(Number(scholarship.amount))}
                {scholarship.duration && (
                  <span className="text-lg text-muted-foreground ml-2">/ {scholarship.duration}</span>
                )}
              </div>
            )}
          </div>

          <Separator />

          <Card>
            <CardHeader>
              <CardTitle>รายละเอียดทุน</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {scholarship.description}
              </div>
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>คุณสมบัติผู้สมัคร</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {scholarship.eligibility}
              </div>
            </CardContent>
          </Card>

          {scholarship.requiredDocs && (
            <Card>
              <CardHeader>
                <CardTitle>เอกสารที่ต้องใช้</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                  {scholarship.requiredDocs}
                </div>
              </CardContent>
            </Card>
          )}

          <Card>
            <CardHeader>
              <CardTitle>ข้อมูลติดต่อ</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {scholarship.contactInfo}
              </div>
            </CardContent>
          </Card>
        </div>

        {/* Sidebar */}
        <div className="space-y-6">
          <Card>
            <CardHeader>
              <CardTitle>กำหนดการ</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="flex items-start">
                <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">ปิดรับสมัคร</div>
                  <div className={isExpired ? 'text-destructive' : ''}>
                    {formatDate(scholarship.applicationDeadline)}
                  </div>
                </div>
              </div>
              {scholarship.announcementDate && (
                <div className="flex items-start">
                  <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">ประกาศผล</div>
                    <div>{formatDate(scholarship.announcementDate)}</div>
                  </div>
                </div>
              )}
              <div className="flex items-start">
                <Clock className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">ประกาศเมื่อ</div>
                  <div>{formatDate(scholarship.createdAt)}</div>
                </div>
              </div>
            </CardContent>
          </Card>

          {scholarship.amount && (
            <Card>
              <CardHeader>
                <CardTitle>มูลค่าทุน</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="flex items-center">
                  <Banknote className="h-5 w-5 mr-2 text-primary" />
                  <span className="text-xl font-semibold">
                    {formatCurrency(Number(scholarship.amount))}
                  </span>
                </div>
                {scholarship.duration && (
                  <p className="text-sm text-muted-foreground mt-2">
                    ระยะเวลา: {scholarship.duration}
                  </p>
                )}
              </CardContent>
            </Card>
          )}

          {scholarship.documentUrl && (
            <Card>
              <CardHeader>
                <CardTitle>ไฟล์แนบ</CardTitle>
              </CardHeader>
              <CardContent>
                <a href={scholarship.documentUrl} target="_blank" rel="noopener noreferrer">
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
