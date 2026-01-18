import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft, Calendar, MapPin, Clock, User, Banknote, Award, FileText, Users } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { formatDate, formatCurrency, courseTypeLabels, isPast } from '@/lib/utils';

interface CourseDetailPageProps {
  params: Promise<{ id: string }>;
}

export default async function CourseDetailPage({ params }: CourseDetailPageProps) {
  const { id } = await params;

  const course = await prisma.course.findFirst({
    where: {
      OR: [{ id }, { courseId: id }],
      isActive: true,
    },
  });

  if (!course) {
    notFound();
  }

  const isExpired = isPast(course.courseEnd);

  return (
    <div className="container py-8">
      <Link href="/courses" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-6">
        <ArrowLeft className="h-4 w-4 mr-2" />
        กลับไปหน้ารายการหลักสูตร
      </Link>

      <div className="grid gap-8 lg:grid-cols-3">
        {/* Main Content */}
        <div className="lg:col-span-2 space-y-6">
          <div>
            <div className="flex items-center gap-2 mb-4 flex-wrap">
              <Badge variant="secondary">
                {courseTypeLabels[course.type] || course.type}
              </Badge>
              {course.certificate && (
                <Badge variant="success">
                  <Award className="h-3 w-3 mr-1" />
                  มีใบประกาศ
                </Badge>
              )}
              {isExpired && <Badge variant="destructive">สิ้นสุดแล้ว</Badge>}
            </div>
            <h1 className="text-3xl font-bold tracking-tight">{course.title}</h1>
            <div className="mt-4 flex flex-wrap gap-4 text-muted-foreground">
              <div className="flex items-center">
                <Calendar className="h-4 w-4 mr-2" />
                {formatDate(course.courseStart)} - {formatDate(course.courseEnd)}
              </div>
              {course.location && (
                <div className="flex items-center">
                  <MapPin className="h-4 w-4 mr-2" />
                  {course.location}
                </div>
              )}
            </div>
            <div className="mt-4 text-2xl font-semibold text-primary">
              {Number(course.fee) === 0 ? 'ฟรี' : formatCurrency(Number(course.fee))}
            </div>
          </div>

          <Separator />

          <Card>
            <CardHeader>
              <CardTitle>รายละเอียดหลักสูตร</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {course.description}
              </div>
            </CardContent>
          </Card>
        </div>

        {/* Sidebar */}
        <div className="space-y-6">
          <Card>
            <CardHeader>
              <CardTitle>ข้อมูลหลักสูตร</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              {course.instructor && (
                <div className="flex items-start">
                  <User className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">วิทยากร</div>
                    <div>{course.instructor}</div>
                  </div>
                </div>
              )}
              {course.duration && (
                <div className="flex items-start">
                  <Clock className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">ระยะเวลา</div>
                    <div>{course.duration}</div>
                  </div>
                </div>
              )}
              {course.schedule && (
                <div className="flex items-start">
                  <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">ตารางเรียน</div>
                    <div>{course.schedule}</div>
                  </div>
                </div>
              )}
              {course.maxParticipants && (
                <div className="flex items-start">
                  <Users className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">จำนวนที่รับ</div>
                    <div>{course.maxParticipants} คน</div>
                  </div>
                </div>
              )}
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>กำหนดการ</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              {course.registrationStart && (
                <div className="flex items-start">
                  <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">เปิดรับสมัคร</div>
                    <div>{formatDate(course.registrationStart)}</div>
                  </div>
                </div>
              )}
              {course.registrationEnd && (
                <div className="flex items-start">
                  <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">ปิดรับสมัคร</div>
                    <div>{formatDate(course.registrationEnd)}</div>
                  </div>
                </div>
              )}
              <div className="flex items-start">
                <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">วันเริ่มเรียน</div>
                  <div>{formatDate(course.courseStart)}</div>
                </div>
              </div>
              <div className="flex items-start">
                <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">วันสิ้นสุด</div>
                  <div>{formatDate(course.courseEnd)}</div>
                </div>
              </div>
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>ค่าลงทะเบียน</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="flex items-center">
                <Banknote className="h-5 w-5 mr-2 text-primary" />
                <span className="text-xl font-semibold">
                  {Number(course.fee) === 0 ? 'ฟรี' : formatCurrency(Number(course.fee))}
                </span>
              </div>
              {course.certificate && (
                <p className="text-sm text-muted-foreground mt-2 flex items-center">
                  <Award className="h-4 w-4 mr-1" />
                  มีใบประกาศนียบัตร
                </p>
              )}
            </CardContent>
          </Card>

          {course.syllabusUrl && (
            <Card>
              <CardHeader>
                <CardTitle>เอกสาร</CardTitle>
              </CardHeader>
              <CardContent>
                <a href={course.syllabusUrl} target="_blank" rel="noopener noreferrer">
                  <Button variant="outline" className="w-full">
                    <FileText className="h-4 w-4 mr-2" />
                    ดาวน์โหลดหลักสูตร
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
