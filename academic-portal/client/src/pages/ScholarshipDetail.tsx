import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Separator } from "@/components/ui/separator";
import { trpc } from "@/lib/trpc";
import { Link, useParams } from "wouter";
import {
  ArrowLeft,
  Building2,
  Calendar,
  Banknote,
  Mail,
  Phone,
  ExternalLink,
  Loader2,
  AlertCircle,
  GraduationCap,
} from "lucide-react";

const scholarshipTypeLabels: Record<string, string> = {
  full: "ทุนเต็มจำนวน",
  partial: "ทุนบางส่วน",
  grant: "ทุนให้เปล่า",
  loan: "ทุนกู้ยืม",
};

const scholarshipTypeColors: Record<string, string> = {
  full: "bg-green-100 text-green-800",
  partial: "bg-blue-100 text-blue-800",
  grant: "bg-purple-100 text-purple-800",
  loan: "bg-orange-100 text-orange-800",
};

export default function ScholarshipDetail() {
  const { id } = useParams<{ id: string }>();
  const { data: scholarship, isLoading, error } = trpc.scholarships.getById.useQuery(
    { id: parseInt(id || "0") },
    { enabled: !!id }
  );

  const formatAmount = (amount?: number | null, description?: string | null) => {
    if (description) return description;
    if (amount) return `${amount.toLocaleString()} บาท`;
    return "ตามเกณฑ์";
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

  if (error || !scholarship) {
    return (
      <PublicLayout>
        <div className="container py-12">
          <Card className="text-center py-12">
            <CardContent>
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบทุนการศึกษา</h3>
              <p className="text-muted-foreground mb-4">
                ทุนการศึกษาที่คุณค้นหาอาจถูกลบหรือไม่มีอยู่ในระบบ
              </p>
              <Link href="/scholarships">
                <Button>กลับไปหน้ารายการทุน</Button>
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
        <Link href="/scholarships">
          <Button variant="ghost" className="mb-6 gap-2">
            <ArrowLeft className="h-4 w-4" />
            กลับไปหน้ารายการทุน
          </Button>
        </Link>

        <div className="grid lg:grid-cols-3 gap-8">
          {/* Main Content */}
          <div className="lg:col-span-2 space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-start justify-between gap-4">
                  <div>
                    <CardTitle className="text-2xl mb-2">{scholarship.title}</CardTitle>
                    <div className="flex items-center gap-2 text-muted-foreground">
                      <Building2 className="h-4 w-4" />
                      <span className="font-medium">{scholarship.provider}</span>
                    </div>
                  </div>
                  <Badge className={scholarshipTypeColors[scholarship.scholarshipType]}>
                    {scholarshipTypeLabels[scholarship.scholarshipType]}
                  </Badge>
                </div>
              </CardHeader>
              <CardContent>
                <div className="grid sm:grid-cols-2 gap-4 mb-6">
                  <div className="flex items-center gap-2 text-sm">
                    <Banknote className="h-4 w-4 text-muted-foreground" />
                    <span>{formatAmount(scholarship.amount, scholarship.amountDescription)}</span>
                  </div>
                  {scholarship.startDate && (
                    <div className="flex items-center gap-2 text-sm">
                      <Calendar className="h-4 w-4 text-muted-foreground" />
                      <span>
                        เปิดรับสมัคร:{" "}
                        {new Date(scholarship.startDate).toLocaleDateString("th-TH", {
                          year: "numeric",
                          month: "long",
                          day: "numeric",
                        })}
                      </span>
                    </div>
                  )}
                  {scholarship.deadline && (
                    <div className="flex items-center gap-2 text-sm">
                      <Calendar className="h-4 w-4 text-muted-foreground" />
                      <span>
                        ปิดรับสมัคร:{" "}
                        {new Date(scholarship.deadline).toLocaleDateString("th-TH", {
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
                    <h3 className="font-semibold mb-3">รายละเอียดทุน</h3>
                    <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                      {scholarship.description}
                    </div>
                  </div>

                  <div>
                    <h3 className="font-semibold mb-3">คุณสมบัติผู้สมัคร</h3>
                    <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                      {scholarship.eligibility}
                    </div>
                  </div>

                  {scholarship.requirements && (
                    <div>
                      <h3 className="font-semibold mb-3">เอกสารที่ต้องใช้</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {scholarship.requirements}
                      </div>
                    </div>
                  )}

                  {scholarship.applicationProcess && (
                    <div>
                      <h3 className="font-semibold mb-3">ขั้นตอนการสมัคร</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {scholarship.applicationProcess}
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
                <CardTitle className="text-lg">สมัครทุน</CardTitle>
              </CardHeader>
              <CardContent className="space-y-4">
                {scholarship.applicationUrl && (
                  <a href={scholarship.applicationUrl} target="_blank" rel="noopener noreferrer">
                    <Button className="w-full gap-2">
                      <ExternalLink className="h-4 w-4" />
                      สมัครทุนออนไลน์
                    </Button>
                  </a>
                )}
                
                {(scholarship.contactEmail || scholarship.contactPhone) && (
                  <>
                    <Separator />
                    <div className="space-y-3">
                      <h4 className="font-medium text-sm">ติดต่อสอบถาม</h4>
                      {scholarship.contactEmail && (
                        <a
                          href={`mailto:${scholarship.contactEmail}`}
                          className="flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors"
                        >
                          <Mail className="h-4 w-4" />
                          {scholarship.contactEmail}
                        </a>
                      )}
                      {scholarship.contactPhone && (
                        <a
                          href={`tel:${scholarship.contactPhone}`}
                          className="flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground transition-colors"
                        >
                          <Phone className="h-4 w-4" />
                          {scholarship.contactPhone}
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
                      {new Date(scholarship.createdAt).toLocaleDateString("th-TH", {
                        year: "numeric",
                        month: "short",
                        day: "numeric",
                      })}
                    </span>
                  </div>
                  <div className="flex justify-between">
                    <span>เข้าชม:</span>
                    <span>{scholarship.viewCount.toLocaleString()} ครั้ง</span>
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
