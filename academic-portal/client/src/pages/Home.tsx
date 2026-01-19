import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { trpc } from "@/lib/trpc";
import { Link } from "wouter";
import {
  Briefcase,
  GraduationCap,
  Calendar,
  BookOpen,
  Users,
  ArrowRight,
  TrendingUp,
} from "lucide-react";

const features = [
  {
    icon: Briefcase,
    title: "ประกาศงาน",
    description: "ค้นหาตำแหน่งงานที่เหมาะสมกับความสามารถของคุณ",
    href: "/jobs",
    color: "text-blue-600 bg-blue-100",
  },
  {
    icon: GraduationCap,
    title: "ทุนการศึกษา",
    description: "โอกาสทางการศึกษาจากหลากหลายแหล่งทุน",
    href: "/scholarships",
    color: "text-green-600 bg-green-100",
  },
  {
    icon: Calendar,
    title: "กิจกรรม",
    description: "กิจกรรมและอีเวนต์ที่น่าสนใจ",
    href: "/activities",
    color: "text-purple-600 bg-purple-100",
  },
  {
    icon: BookOpen,
    title: "หลักสูตร",
    description: "หลักสูตรการเรียนการสอนที่หลากหลาย",
    href: "/courses",
    color: "text-orange-600 bg-orange-100",
  },
  {
    icon: Users,
    title: "อาจารย์",
    description: "ข้อมูลคณาจารย์และผู้เชี่ยวชาญ",
    href: "/instructors",
    color: "text-teal-600 bg-teal-100",
  },
];

export default function Home() {
  const { data: stats } = trpc.stats.dashboard.useQuery();

  return (
    <PublicLayout>
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-primary/10 via-background to-background py-20 lg:py-32">
        <div className="container">
          <div className="max-w-3xl">
            <h1 className="text-4xl lg:text-6xl font-bold tracking-tight mb-6">
              ระบบงานวิชาการ
              <span className="text-primary block mt-2">คณะวิศวกรรมศาสตร์</span>
            </h1>
            <p className="text-xl text-muted-foreground mb-8 max-w-2xl">
              ศูนย์รวมข้อมูลงาน ทุนการศึกษา กิจกรรม หลักสูตร และข้อมูลอาจารย์
              สำหรับนักศึกษาและบุคลากร
            </p>
            <div className="flex flex-wrap gap-4">
              <Link href="/jobs">
                <Button size="lg" className="gap-2">
                  <Briefcase className="h-5 w-5" />
                  ดูประกาศงาน
                </Button>
              </Link>
              <Link href="/scholarships">
                <Button size="lg" variant="outline" className="gap-2">
                  <GraduationCap className="h-5 w-5" />
                  ดูทุนการศึกษา
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Stats Section */}
      {stats && (
        <section className="py-12 border-b">
          <div className="container">
            <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
              <Card className="text-center">
                <CardContent className="pt-6">
                  <div className="text-3xl font-bold text-primary">{stats.jobs}</div>
                  <div className="text-sm text-muted-foreground">ประกาศงาน</div>
                </CardContent>
              </Card>
              <Card className="text-center">
                <CardContent className="pt-6">
                  <div className="text-3xl font-bold text-green-600">{stats.scholarships}</div>
                  <div className="text-sm text-muted-foreground">ทุนการศึกษา</div>
                </CardContent>
              </Card>
              <Card className="text-center">
                <CardContent className="pt-6">
                  <div className="text-3xl font-bold text-purple-600">{stats.activities}</div>
                  <div className="text-sm text-muted-foreground">กิจกรรม</div>
                </CardContent>
              </Card>
              <Card className="text-center">
                <CardContent className="pt-6">
                  <div className="text-3xl font-bold text-orange-600">{stats.courses}</div>
                  <div className="text-sm text-muted-foreground">หลักสูตร</div>
                </CardContent>
              </Card>
              <Card className="text-center col-span-2 md:col-span-1">
                <CardContent className="pt-6">
                  <div className="text-3xl font-bold text-teal-600">{stats.instructors}</div>
                  <div className="text-sm text-muted-foreground">อาจารย์</div>
                </CardContent>
              </Card>
            </div>
          </div>
        </section>
      )}

      {/* Features Section */}
      <section className="py-16 lg:py-24">
        <div className="container">
          <div className="text-center mb-12">
            <h2 className="text-3xl font-bold mb-4">บริการของเรา</h2>
            <p className="text-muted-foreground max-w-2xl mx-auto">
              เข้าถึงข้อมูลที่คุณต้องการได้อย่างรวดเร็วและสะดวก
            </p>
          </div>
          
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {features.map((feature) => {
              const Icon = feature.icon;
              return (
                <Link key={feature.href} href={feature.href}>
                  <Card className="h-full card-hover cursor-pointer group">
                    <CardHeader>
                      <div className={`w-12 h-12 rounded-lg ${feature.color} flex items-center justify-center mb-4`}>
                        <Icon className="h-6 w-6" />
                      </div>
                      <CardTitle className="flex items-center justify-between">
                        {feature.title}
                        <ArrowRight className="h-5 w-5 text-muted-foreground group-hover:text-primary group-hover:translate-x-1 transition-all" />
                      </CardTitle>
                      <CardDescription>{feature.description}</CardDescription>
                    </CardHeader>
                  </Card>
                </Link>
              );
            })}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 bg-primary text-primary-foreground">
        <div className="container text-center">
          <TrendingUp className="h-12 w-12 mx-auto mb-6 opacity-80" />
          <h2 className="text-3xl font-bold mb-4">พร้อมเริ่มต้นหรือยัง?</h2>
          <p className="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
            สำรวจโอกาสใหม่ๆ ที่รอคุณอยู่ ไม่ว่าจะเป็นงาน ทุนการศึกษา หรือกิจกรรมที่น่าสนใจ
          </p>
          <div className="flex flex-wrap justify-center gap-4">
            <Link href="/jobs">
              <Button size="lg" variant="secondary" className="gap-2">
                เริ่มค้นหางาน
                <ArrowRight className="h-5 w-5" />
              </Button>
            </Link>
          </div>
        </div>
      </section>
    </PublicLayout>
  );
}
