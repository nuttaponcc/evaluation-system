import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Separator } from "@/components/ui/separator";
import { trpc } from "@/lib/trpc";
import { Link, useParams } from "wouter";
import {
  ArrowLeft,
  BookOpen,
  GraduationCap,
  Users,
  Loader2,
  AlertCircle,
  FileText,
  Target,
  CheckCircle,
} from "lucide-react";

const levelLabels: Record<string, string> = {
  bachelor: "ปริญญาตรี",
  master: "ปริญญาโท",
  doctoral: "ปริญญาเอก",
  certificate: "ประกาศนียบัตร",
};

const levelColors: Record<string, string> = {
  bachelor: "bg-blue-100 text-blue-800",
  master: "bg-purple-100 text-purple-800",
  doctoral: "bg-red-100 text-red-800",
  certificate: "bg-green-100 text-green-800",
};

const courseTypeLabels: Record<string, string> = {
  required: "วิชาบังคับ",
  elective: "วิชาเลือก",
  general: "วิชาศึกษาทั่วไป",
};

export default function CourseDetail() {
  const { id } = useParams<{ id: string }>();
  const { data: course, isLoading, error } = trpc.courses.getById.useQuery(
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

  if (error || !course) {
    return (
      <PublicLayout>
        <div className="container py-12">
          <Card className="text-center py-12">
            <CardContent>
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบหลักสูตร</h3>
              <p className="text-muted-foreground mb-4">
                หลักสูตรที่คุณค้นหาอาจถูกลบหรือไม่มีอยู่ในระบบ
              </p>
              <Link href="/courses">
                <Button>กลับไปหน้ารายการหลักสูตร</Button>
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
        <Link href="/courses">
          <Button variant="ghost" className="mb-6 gap-2">
            <ArrowLeft className="h-4 w-4" />
            กลับไปหน้ารายการหลักสูตร
          </Button>
        </Link>

        <div className="grid lg:grid-cols-3 gap-8">
          {/* Main Content */}
          <div className="lg:col-span-2 space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-start justify-between gap-4">
                  <div className="flex-1">
                    <div className="text-sm text-muted-foreground mb-2">{course.code}</div>
                    <CardTitle className="text-2xl mb-2">{course.title}</CardTitle>
                    {course.titleEn && (
                      <div className="text-lg text-muted-foreground">{course.titleEn}</div>
                    )}
                  </div>
                  <Badge className={levelColors[course.level]}>
                    {levelLabels[course.level]}
                  </Badge>
                </div>
              </CardHeader>
              <CardContent>
                <div className="grid sm:grid-cols-2 gap-4 mb-6">
                  <div className="flex items-center gap-2 text-sm">
                    <BookOpen className="h-4 w-4 text-muted-foreground" />
                    <span>{course.credits} หน่วยกิต</span>
                  </div>
                  <div className="flex items-center gap-2 text-sm">
                    <GraduationCap className="h-4 w-4 text-muted-foreground" />
                    <span>{courseTypeLabels[course.courseType]}</span>
                  </div>
                  {course.instructor && (
                    <div className="flex items-center gap-2 text-sm">
                      <Users className="h-4 w-4 text-muted-foreground" />
                      <Link href={`/instructors/${course.instructor.id}`}>
                        <span className="hover:underline cursor-pointer">
                          {course.instructor.title} {course.instructor.name}
                        </span>
                      </Link>
                    </div>
                  )}
                </div>

                <Separator className="my-6" />

                <div className="space-y-6">
                  <div>
                    <h3 className="font-semibold mb-3 flex items-center gap-2">
                      <FileText className="h-5 w-5" />
                      รายละเอียดรายวิชา
                    </h3>
                    <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                      {course.description}
                    </div>
                  </div>

                  {course.objectives && (
                    <div>
                      <h3 className="font-semibold mb-3 flex items-center gap-2">
                        <Target className="h-5 w-5" />
                        วัตถุประสงค์
                      </h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {course.objectives}
                      </div>
                    </div>
                  )}

                  {course.prerequisites && (
                    <div>
                      <h3 className="font-semibold mb-3">วิชาที่ต้องเรียนมาก่อน</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {course.prerequisites}
                      </div>
                    </div>
                  )}

                  {course.syllabus && (
                    <div>
                      <h3 className="font-semibold mb-3">เนื้อหารายวิชา</h3>
                      <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                        {course.syllabus}
                      </div>
                    </div>
                  )}


                </div>
              </CardContent>
            </Card>
          </div>

          {/* Sidebar */}
          <div className="space-y-6">
            {course.instructor && (
              <Card>
                <CardHeader>
                  <CardTitle className="text-lg">อาจารย์ผู้สอน</CardTitle>
                </CardHeader>
                <CardContent>
                  <Link href={`/instructors/${course.instructor.id}`}>
                    <div className="hover:bg-accent p-3 rounded-lg transition-colors cursor-pointer">
                      <div className="font-medium">
                        {course.instructor.title} {course.instructor.name}
                      </div>
                    </div>
                  </Link>
                </CardContent>
              </Card>
            )}

            <Card>
              <CardContent className="pt-6">
                <div className="text-sm text-muted-foreground">
                  <div className="flex justify-between mb-2">
                    <span>อัปเดตล่าสุด:</span>
                    <span>
                      {new Date(course.updatedAt).toLocaleDateString("th-TH", {
                        year: "numeric",
                        month: "short",
                        day: "numeric",
                      })}
                    </span>
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
