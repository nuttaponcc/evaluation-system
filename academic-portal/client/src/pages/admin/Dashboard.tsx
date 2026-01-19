import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { trpc } from "@/lib/trpc";
import { Link } from "wouter";
import {
  Briefcase,
  GraduationCap,
  Calendar,
  BookOpen,
  Users,
  UserCircle,
  Loader2,
  TrendingUp,
} from "lucide-react";

export default function AdminDashboard() {
  const { data: stats, isLoading } = trpc.admin.getStats.useQuery();

  if (isLoading) {
    return (
      <div className="flex items-center justify-center py-12">
        <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
      </div>
    );
  }

  const statCards = [
    {
      title: "งาน",
      value: stats?.jobs || 0,
      icon: Briefcase,
      href: "/admin/jobs",
      color: "text-blue-600",
      bgColor: "bg-blue-50",
    },
    {
      title: "ทุนการศึกษา",
      value: stats?.scholarships || 0,
      icon: GraduationCap,
      href: "/admin/scholarships",
      color: "text-green-600",
      bgColor: "bg-green-50",
    },
    {
      title: "กิจกรรม",
      value: stats?.activities || 0,
      icon: Calendar,
      href: "/admin/activities",
      color: "text-purple-600",
      bgColor: "bg-purple-50",
    },
    {
      title: "หลักสูตร",
      value: stats?.courses || 0,
      icon: BookOpen,
      href: "/admin/courses",
      color: "text-orange-600",
      bgColor: "bg-orange-50",
    },
    {
      title: "อาจารย์",
      value: stats?.instructors || 0,
      icon: Users,
      href: "/admin/instructors",
      color: "text-red-600",
      bgColor: "bg-red-50",
    },
    {
      title: "ผู้ใช้งาน",
      value: stats?.users || 0,
      icon: UserCircle,
      href: "/admin/users",
      color: "text-indigo-600",
      bgColor: "bg-indigo-50",
    },
  ];

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-bold">แดชบอร์ด</h1>
        <p className="text-muted-foreground mt-2">
          ภาพรวมระบบงานวิชาการคณะวิศวกรรมศาสตร์
        </p>
      </div>

      <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        {statCards.map((stat) => {
          const Icon = stat.icon;
          return (
            <Link key={stat.title} href={stat.href}>
              <Card className="card-hover cursor-pointer">
                <CardHeader className="flex flex-row items-center justify-between pb-2">
                  <CardTitle className="text-sm font-medium text-muted-foreground">
                    {stat.title}
                  </CardTitle>
                  <div className={`p-2 rounded-lg ${stat.bgColor}`}>
                    <Icon className={`h-5 w-5 ${stat.color}`} />
                  </div>
                </CardHeader>
                <CardContent>
                  <div className="text-3xl font-bold">{stat.value}</div>
                  <p className="text-xs text-muted-foreground mt-1">
                    รายการทั้งหมด
                  </p>
                </CardContent>
              </Card>
            </Link>
          );
        })}
      </div>

      <div className="grid gap-6 md:grid-cols-2">
        <Card>
          <CardHeader>
            <CardTitle className="flex items-center gap-2">
              <TrendingUp className="h-5 w-5" />
              กิจกรรมล่าสุด
            </CardTitle>
          </CardHeader>
          <CardContent>
            <p className="text-sm text-muted-foreground">
              ยินดีต้อนรับสู่ระบบจัดการงานวิชาการ
            </p>
          </CardContent>
        </Card>

        <Card>
          <CardHeader>
            <CardTitle>การดำเนินการด่วน</CardTitle>
          </CardHeader>
          <CardContent className="space-y-2">
            <Link href="/admin/jobs/new">
              <div className="text-sm hover:underline cursor-pointer text-blue-600">
                + เพิ่มงานใหม่
              </div>
            </Link>
            <Link href="/admin/scholarships/new">
              <div className="text-sm hover:underline cursor-pointer text-green-600">
                + เพิ่มทุนการศึกษาใหม่
              </div>
            </Link>
            <Link href="/admin/activities/new">
              <div className="text-sm hover:underline cursor-pointer text-purple-600">
                + เพิ่มกิจกรรมใหม่
              </div>
            </Link>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
