import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Separator } from "@/components/ui/separator";
import { trpc } from "@/lib/trpc";
import { Link, useParams } from "wouter";
import {
  ArrowLeft,
  Mail,
  Phone,
  MapPin,
  Loader2,
  AlertCircle,
  BookOpen,
  Award,
  Briefcase,
} from "lucide-react";

export default function InstructorDetail() {
  const { id } = useParams<{ id: string }>();
  const { data: instructor, isLoading, error } = trpc.instructors.getById.useQuery(
    { id: parseInt(id || "0") },
    { enabled: !!id }
  );

  const getInitials = (name: string) => {
    const parts = name.split(" ");
    if (parts.length >= 2) {
      return parts[0][0] + parts[1][0];
    }
    return name.substring(0, 2);
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

  if (error || !instructor) {
    return (
      <PublicLayout>
        <div className="container py-12">
          <Card className="text-center py-12">
            <CardContent>
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบข้อมูลอาจารย์</h3>
              <p className="text-muted-foreground mb-4">
                อาจารย์ที่คุณค้นหาอาจถูกลบหรือไม่มีอยู่ในระบบ
              </p>
              <Link href="/instructors">
                <Button>กลับไปหน้ารายการอาจารย์</Button>
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
        <Link href="/instructors">
          <Button variant="ghost" className="mb-6 gap-2">
            <ArrowLeft className="h-4 w-4" />
            กลับไปหน้ารายการอาจารย์
          </Button>
        </Link>

        <div className="grid lg:grid-cols-3 gap-8">
          {/* Sidebar */}
          <div className="space-y-6">
            <Card>
              <CardContent className="pt-6">
                <div className="text-center">
                  <Avatar className="h-32 w-32 mx-auto mb-4">
                    <AvatarImage src={instructor.imageUrl || undefined} alt={instructor.name} />
                    <AvatarFallback className="text-2xl">
                      {getInitials(instructor.name)}
                    </AvatarFallback>
                  </Avatar>
                  <h2 className="text-2xl font-bold mb-1">
                    {instructor.title} {instructor.name}
                  </h2>
                  {instructor.department && (
                    <p className="text-muted-foreground">{instructor.department}</p>
                  )}
                </div>

                <Separator className="my-6" />

                <div className="space-y-4">
                  {instructor.email && (
                    <a
                      href={`mailto:${instructor.email}`}
                      className="flex items-center gap-3 text-sm hover:text-foreground transition-colors"
                    >
                      <Mail className="h-4 w-4 text-muted-foreground" />
                      <span className="break-all">{instructor.email}</span>
                    </a>
                  )}
                  {instructor.phone && (
                    <a
                      href={`tel:${instructor.phone}`}
                      className="flex items-center gap-3 text-sm hover:text-foreground transition-colors"
                    >
                      <Phone className="h-4 w-4 text-muted-foreground" />
                      <span>{instructor.phone}</span>
                    </a>
                  )}
                  {instructor.office && (
                    <div className="flex items-center gap-3 text-sm">
                      <MapPin className="h-4 w-4 text-muted-foreground" />
                      <span>{instructor.office}</span>
                    </div>
                  )}
                </div>
              </CardContent>
            </Card>
          </div>

          {/* Main Content */}
          <div className="lg:col-span-2 space-y-6">
            {instructor.bio && (
              <Card>
                <CardHeader>
                  <CardTitle className="flex items-center gap-2">
                    <Briefcase className="h-5 w-5" />
                    ประวัติ
                  </CardTitle>
                </CardHeader>
                <CardContent>
                  <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                    {instructor.bio}
                  </div>
                </CardContent>
              </Card>
            )}

            {instructor.education && (
              <Card>
                <CardHeader>
                  <CardTitle className="flex items-center gap-2">
                    <Award className="h-5 w-5" />
                    การศึกษา
                  </CardTitle>
                </CardHeader>
                <CardContent>
                  <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                    {instructor.education}
                  </div>
                </CardContent>
              </Card>
            )}

            {instructor.expertise && (
              <Card>
                <CardHeader>
                  <CardTitle className="flex items-center gap-2">
                    <BookOpen className="h-5 w-5" />
                    ความเชี่ยวชาญ
                  </CardTitle>
                </CardHeader>
                <CardContent>
                  <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                    {instructor.expertise}
                  </div>
                </CardContent>
              </Card>
            )}

            {instructor.publications && (
              <Card>
                <CardHeader>
                  <CardTitle>ผลงานตีพิมพ์</CardTitle>
                </CardHeader>
                <CardContent>
                  <div className="prose prose-sm max-w-none text-muted-foreground whitespace-pre-wrap">
                    {instructor.publications}
                  </div>
                </CardContent>
              </Card>
            )}


          </div>
        </div>
      </div>
    </PublicLayout>
  );
}
