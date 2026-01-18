import { notFound } from 'next/navigation';
import Link from 'next/link';
import { ArrowLeft, Calendar, MapPin, Users, User, Phone, Clock } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { formatDateTime, formatDate, isPast } from '@/lib/utils';

interface ActivityDetailPageProps {
  params: Promise<{ id: string }>;
}

export default async function ActivityDetailPage({ params }: ActivityDetailPageProps) {
  const { id } = await params;

  const activity = await prisma.activity.findFirst({
    where: {
      OR: [{ id }, { activityId: id }],
      isActive: true,
    },
  });

  if (!activity) {
    notFound();
  }

  const isExpired = isPast(activity.endDatetime);

  return (
    <div className="container py-8">
      <Link href="/activities" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-6">
        <ArrowLeft className="h-4 w-4 mr-2" />
        กลับไปหน้ารายการกิจกรรม
      </Link>

      <div className="grid gap-8 lg:grid-cols-3">
        {/* Main Content */}
        <div className="lg:col-span-2 space-y-6">
          <div>
            <div className="flex items-center gap-2 mb-4 flex-wrap">
              <Badge variant="secondary">{activity.category}</Badge>
              {isExpired && <Badge variant="destructive">สิ้นสุดแล้ว</Badge>}
            </div>
            <h1 className="text-3xl font-bold tracking-tight">{activity.title}</h1>
            <div className="mt-4 flex flex-wrap gap-4 text-muted-foreground">
              <div className="flex items-center">
                <Calendar className="h-4 w-4 mr-2" />
                {formatDateTime(activity.startDatetime)}
              </div>
              <div className="flex items-center">
                <MapPin className="h-4 w-4 mr-2" />
                {activity.location}
              </div>
            </div>
          </div>

          <Separator />

          <Card>
            <CardHeader>
              <CardTitle>รายละเอียดกิจกรรม</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                {activity.description}
              </div>
            </CardContent>
          </Card>

          {activity.objectives && (
            <Card>
              <CardHeader>
                <CardTitle>วัตถุประสงค์</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                  {activity.objectives}
                </div>
              </CardContent>
            </Card>
          )}
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
                  <div className="text-sm text-muted-foreground">เริ่มกิจกรรม</div>
                  <div>{formatDateTime(activity.startDatetime)}</div>
                </div>
              </div>
              <div className="flex items-start">
                <Calendar className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">สิ้นสุดกิจกรรม</div>
                  <div>{formatDateTime(activity.endDatetime)}</div>
                </div>
              </div>
              {activity.registrationDeadline && (
                <div className="flex items-start">
                  <Clock className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">ปิดรับลงทะเบียน</div>
                    <div>{formatDate(activity.registrationDeadline)}</div>
                  </div>
                </div>
              )}
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>ข้อมูลเพิ่มเติม</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="flex items-start">
                <MapPin className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">สถานที่</div>
                  <div>{activity.location}</div>
                </div>
              </div>
              {activity.maxParticipants && (
                <div className="flex items-start">
                  <Users className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">จำนวนที่รับ</div>
                    <div>{activity.maxParticipants} คน</div>
                  </div>
                </div>
              )}
              {activity.targetAudience && (
                <div className="flex items-start">
                  <Users className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">กลุ่มเป้าหมาย</div>
                    <div>{activity.targetAudience}</div>
                  </div>
                </div>
              )}
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>ผู้ประสานงาน</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="flex items-start">
                <User className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">ชื่อ</div>
                  <div>{activity.coordinator}</div>
                </div>
              </div>
              <div className="flex items-start">
                <Phone className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">ติดต่อ</div>
                  <div className="whitespace-pre-wrap">{activity.coordinatorContact}</div>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>
  );
}
