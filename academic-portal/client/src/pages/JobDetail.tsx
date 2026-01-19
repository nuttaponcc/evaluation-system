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
  Building2,
  Clock,
  Banknote,
  Calendar,
  Mail,
  Phone,
  ExternalLink,
  Loader2,
  AlertCircle,
} from "lucide-react";

const jobTypeLabels: Record<string, string> = {
  fulltime: "งานประจำ",
  parttime: "งานพาร์ทไทม์",
  internship: "ฝึกงาน",
  contract: "สัญญาจ้าง",
};

export default function JobDetail() {
  const { id } = useParams<{ id: string }>();
  const { data: job, isLoading, error } = trpc.jobs.getById.useQuery(
    { id: parseInt(id || "0") },
    { enabled: !!id }
  );

  const formatSalary = (min?: number | null, max?: number | null) => {
    if (!min && !max) return "ตามตกลง";
    if (min && max) return `${min.toLocaleString()} - ${max.toLocaleString()} บาท`;
    if (min) return `${min.toLocaleString()}+ บาท`;
    return `สูงสุด ${max?.toLocaleString()} บาท`;
  };

  if (isLoading) {
    return (
      <PublicLayout>
        <div className="container py-12 flex items-center justify-center">
          <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
        </div>
      </PublicLayout>
    );
  }

  if (error || !job) {
    return (
      <PublicLayout>
        <div className="container py-12">
          <Card className="text-center py-12">
            <CardContent>
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบประกาศงาน</h3>
              <p className="text-muted-foreground mb-4">
                ประกาศงานที่คุณค้นหาอาจถูกลบหรือไม่มีอยู่ในระบบ
              </p>
              <Link href="/jobs">
                <Button>กลับไปหน้ารายการงาน</Button>
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
        <Link href="/jobs">
          <Button variant="ghost" className="mb-6 gap-2">
            <ArrowLeft className="h-4 w-4" />
            กลับไปหน้ารายการงาน
          </Button>
        </Link>

        <div className="grid lg:grid-cols-3 gap-8">
          {/* Main Content */}
          <div className="lg:col-span-2 space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-start justify-between gap-4">
                  <div>
                    <CardTitle className="text-2xl mb-2">{job.title}</CardTitle>
                    <div className="flex items-center gap-2 text-muted-foreground">
                      <Building2 className="h-4 w-4" />
                      <span className="font-medium">{job.company}</span>
                    </div>
                  </div>
                  {job.isUrgent && (
                    <Badge variant="destructive" className="text-sm">ด่วน</Badge>
                  )}
                </div>
              </CardHeader>
              <CardContent>
                <div className="grid sm:grid-cols-2 gap-4 mb-6">
                  <div className="flex items-center gap-2 text-sm">
                    <MapPin className="h-4 w-4 text-muted-foreground" />
                    <span>{job.location}</span>
                  </div>
                  <div className="flex items-center gap-2 text-sm">
                    <Clock className="h-4 w-4 text-muted-foreground" />
                    <span>{jobTypeLabels[job.jobType]}</span>
                  </div>
                  <div className="flex items-center gap-2 text-sm">
                    <Banknote className="h-4 w-4 text-muted-foreground" />
                    <span>{formatSalary(job.salaryMin, job.salaryMax)}</span>
                  </div>
                  {job.deadline && (
                    <div className="flex items-center gap-2 text-sm">
                      <Calendar className="h-4 w-4 text-muted-foreground" />
                      <span>
                        ปิดรับสมัคร:{" "}
                        {new Date(job.deadline).toLocaleDateString("th-TH", {
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
                    <h3 className="font-semibold mb-3">รายละเอียดงาน</h3>
                    <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                      {job.description}
                    </div>
                  </div>

                  {job.requirements && (
                    <div>
                      <h3 className="font-semibold mb-3">คุณสมบัติที่ต้องการ</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {job.requirements}
                      </div>
                    </div>
                  )}

                  {job.benefits && (
                    <div>
                      <h3 className="font-semibold mb-3">สวัสดิการ</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {job.benefits}
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
                <CardTitle className="text-lg">สมัครงาน</CardTitle>
              </CardHeader>
              <CardContent className="space-y-4">
                {job.applicationUrl && (
                  <a href={job.applicationUrl} target="_blank" rel="noopener noreferrer">
                    <Button className="w-full gap-2">
                      <ExternalLink className="h-4 w-4" />
                      สมัครงานออนไลน์
                    </Button>
                  </a>
                )}
                
                {(job.contactEmail || job.contactPhone) && (
                  <>
                    <Separator />
                    <div className="space-y-3">
                      <h4 className="font-medium text-sm">ติดต่อสอบถาม</h4>
                      {job.contactEmail && (
                        <a
                          href={`mailto:${job.contactEmail}`}
                          className="flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors"
                        >
                          <Mail className="h-4 w-4" />
                          {job.contactEmail}
                        </a>
                      )}
                      {job.contactPhone && (
                        <a
                          href={`tel:${job.contactPhone}`}
                          className="flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors"
                        >
                          <Phone className="h-4 w-4" />
                          {job.contactPhone}
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
                      {new Date(job.createdAt).toLocaleDateString("th-TH", {
                        year: "numeric",
                        month: "short",
                        day: "numeric",
                      })}
                    </span>
                  </div>
                  <div className="flex justify-between">
                    <span>เข้าชม:</span>
                    <span>{job.viewCount.toLocaleString()} ครั้ง</span>
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
