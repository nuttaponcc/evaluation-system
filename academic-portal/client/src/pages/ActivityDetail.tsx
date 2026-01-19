import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Separator } from "@/components/ui/separator";
import { trpc } from "@/lib/trpc";
import { Link, useParams } from "wouter";
import {
  ArrowLeft,
  MapPin,
  Calendar,
  Users,
  Mail,
  Phone,
  ExternalLink,
  Loader2,
  AlertCircle,
  Video,
  Banknote,
  Clock,
} from "lucide-react";

const activityTypeLabels: Record<string, string> = {
  workshop: "เวิร์คช็อป",
  seminar: "สัมมนา",
  competition: "การแข่งขัน",
  exhibition: "นิทรรศการ",
  other: "อื่นๆ",
};

const activityTypeColors: Record<string, string> = {
  workshop: "bg-blue-100 text-blue-800",
  seminar: "bg-green-100 text-green-800",
  competition: "bg-red-100 text-red-800",
  exhibition: "bg-purple-100 text-purple-800",
  other: "bg-gray-100 text-gray-800",
};

export default function ActivityDetail() {
  const { id } = useParams<{ id: string }>();
  const { data: activity, isLoading, error } = trpc.activities.getById.useQuery(
    { id: parseInt(id || "0") },
    { enabled: !!id }
  );

  if (isLoading) {
    return (
      <PublicLayout>
        <div className="container py-12 flex items-center justify-center">
          <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
        </div>
      </PublicLayout>
    );
  }

  if (error || !activity) {
    return (
      <PublicLayout>
        <div className="container py-12">
          <Card className="text-center py-12">
            <CardContent>
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบกิจกรรม</h3>
              <p className="text-muted-foreground mb-4">
                กิจกรรมที่คุณค้นหาอาจถูกลบหรือไม่มีอยู่ในระบบ
              </p>
              <Link href="/activities">
                <Button>กลับไปหน้ารายการกิจกรรม</Button>
              </Link>
            </CardContent>
          </Card>
        </div>
      </PublicLayout>
    );
  }

  return (
    <PublicLayout>
      <div className="container py-8">
        {/* Back button */}
        <Link href="/activities">
          <Button variant="ghost" className="mb-6 gap-2">
            <ArrowLeft className="h-4 w-4" />
            กลับไปหน้ารายการกิจกรรม
          </Button>
        </Link>

        <div className="grid lg:grid-cols-3 gap-8">
          {/* Main Content */}
          <div className="lg:col-span-2 space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-start justify-between gap-4">
                  <div>
                    <CardTitle className="text-2xl mb-2">{activity.title}</CardTitle>
                    <div className="text-muted-foreground">
                      จัดโดย: <span className="font-medium">{activity.organizer}</span>
                    </div>
                  </div>
                  <Badge className={activityTypeColors[activity.activityType]}>
                    {activityTypeLabels[activity.activityType]}
                  </Badge>
                </div>
              </CardHeader>
              <CardContent>
                <div className="grid sm:grid-cols-2 gap-4 mb-6">
                  <div className="flex items-center gap-2 text-sm">
                    <Calendar className="h-4 w-4 text-muted-foreground" />
                    <span>
                      {new Date(activity.startDate).toLocaleDateString("th-TH", {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                      })}
                      {activity.endDate && activity.endDate !== activity.startDate && (
                        <> - {new Date(activity.endDate).toLocaleDateString("th-TH", {
                          year: "numeric",
                          month: "long",
                          day: "numeric",
                        })}</>
                      )}
                    </span>
                  </div>
                  <div className="flex items-center gap-2 text-sm">
                    {activity.isOnline ? (
                      <>
                        <Video className="h-4 w-4 text-muted-foreground" />
                        <span>ออนไลน์</span>
                      </>
                    ) : (
                      <>
                        <MapPin className="h-4 w-4 text-muted-foreground" />
                        <span>{activity.location}</span>
                      </>
                    )}
                  </div>
                  {activity.maxParticipants && (
                    <div className="flex items-center gap-2 text-sm">
                      <Users className="h-4 w-4 text-muted-foreground" />
                      <span>รับจำนวน {activity.maxParticipants} คน</span>
                    </div>
                  )}
                  <div className="flex items-center gap-2 text-sm">
                    <Banknote className="h-4 w-4 text-muted-foreground" />
                    <span>
                      ค่าลงทะเบียน: {activity.registrationFee === 0 ? "ฟรี" : `${activity.registrationFee?.toLocaleString()} บาท`}
                    </span>
                  </div>
                  {activity.registrationDeadline && (
                    <div className="flex items-center gap-2 text-sm">
                      <Clock className="h-4 w-4 text-muted-foreground" />
                      <span>
                        ปิดรับสมัคร:{" "}
                        {new Date(activity.registrationDeadline).toLocaleDateString("th-TH", {
                          year: "numeric",
                          month: "long",
                          day: "numeric",
                        })}
                      </span>
                    </div>
                  )}
                </div>

                <Separator className="my-6" />

                <div className="space-y-6">
                  <div>
                    <h3 className="font-semibold mb-3">รายละเอียดกิจกรรม</h3>
                    <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                      {activity.description}
                    </div>
                  </div>

                  {activity.schedule && (
                    <div>
                      <h3 className="font-semibold mb-3">กำหนดการ</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {activity.schedule}
                      </div>
                    </div>
                  )}
                </div>
              </CardContent>
            </Card>
          </div>

          {/* Sidebar */}
          <div className="space-y-6">
            <Card>
              <CardHeader>
                <CardTitle className="text-lg">ลงทะเบียน</CardTitle>
              </CardHeader>
              <CardContent className="space-y-4">
                {activity.registrationUrl && (
                  <a href={activity.registrationUrl} target="_blank" rel="noopener noreferrer">
                    <Button className="w-full gap-2">
                      <ExternalLink className="h-4 w-4" />
                      ลงทะเบียนออนไลน์
                    </Button>
                  </a>
                )}
                
                {activity.isOnline && activity.onlineUrl && (
                  <a href={activity.onlineUrl} target="_blank" rel="noopener noreferrer">
                    <Button variant="outline" className="w-full gap-2">
                      <Video className="h-4 w-4" />
                      เข้าร่วมออนไลน์
                    </Button>
                  </a>
                )}
                
                {(activity.contactEmail || activity.contactPhone) && (
                  <>
                    <Separator />
                    <div className="space-y-3">
                      <h4 className="font-medium text-sm">ติดต่อสอบถาม</h4>
                      {activity.contactEmail && (
                        <a
                          href={`mailto:${activity.contactEmail}`}
                          className="flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors"
                        >
                          <Mail className="h-4 w-4" />
                          {activity.contactEmail}
                        </a>
                      )}
                      {activity.contactPhone && (
                        <a
                          href={`tel:${activity.contactPhone}`}
                          className="flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors"
                        >
                          <Phone className="h-4 w-4" />
                          {activity.contactPhone}
                        </a>
                      )}
                    </div>
                  </>
                )}
              </CardContent>
            </Card>

            <Card>
              <CardContent className="pt-6">
                <div className="text-sm text-muted-foreground">
                  <div className="flex justify-between mb-2">
                    <span>ประกาศเมื่อ:</span>
                    <span>
                      {new Date(activity.createdAt).toLocaleDateString("th-TH", {
                        year: "numeric",
                        month: "short",
                        day: "numeric",
                      })}
                    </span>
                  </div>
                  <div className="flex justify-between">
                    <span>เข้าชม:</span>
                    <span>{activity.viewCount.toLocaleString()} ครั้ง</span>
                  </div>
                </div>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </PublicLayout>
  );
}
