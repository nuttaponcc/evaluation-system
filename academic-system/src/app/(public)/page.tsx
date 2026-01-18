import Link from 'next/link';
import { Briefcase, GraduationCap, Calendar, BookOpen, Users, ArrowRight } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

const features = [
  {
    title: 'ประกาศรับสมัครงาน',
    description: 'ค้นหาตำแหน่งงานที่เหมาะสมกับคุณจากบริษัทชั้นนำ',
    icon: Briefcase,
    href: '/jobs',
    color: 'text-blue-600',
    bgColor: 'bg-blue-100',
  },
  {
    title: 'ทุนการศึกษา',
    description: 'ทุนการศึกษาจากหน่วยงานต่างๆ ทั้งในและต่างประเทศ',
    icon: GraduationCap,
    href: '/scholarships',
    color: 'text-green-600',
    bgColor: 'bg-green-100',
  },
  {
    title: 'กิจกรรม',
    description: 'กิจกรรมต่างๆ ของคณะวิศวกรรมศาสตร์',
    icon: Calendar,
    href: '/activities',
    color: 'text-purple-600',
    bgColor: 'bg-purple-100',
  },
  {
    title: 'หลักสูตรอบรม',
    description: 'หลักสูตรอบรมเพื่อพัฒนาทักษะและความรู้',
    icon: BookOpen,
    href: '/courses',
    color: 'text-orange-600',
    bgColor: 'bg-orange-100',
  },
  {
    title: 'รายชื่ออาจารย์',
    description: 'ข้อมูลอาจารย์และผู้เชี่ยวชาญในคณะ',
    icon: Users,
    href: '/instructors',
    color: 'text-pink-600',
    bgColor: 'bg-pink-100',
  },
];

export default function HomePage() {
  return (
    <div>
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-primary/10 via-background to-background py-20 md:py-32">
        <div className="container">
          <div className="max-w-3xl">
            <h1 className="text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl">
              ระบบบริการ
              <span className="text-primary"> งานวิชาการ</span>
            </h1>
            <p className="mt-6 text-lg text-muted-foreground md:text-xl">
              ศูนย์รวมข้อมูลงาน ทุนการศึกษา กิจกรรม และหลักสูตรอบรม
              สำหรับนักศึกษาและบุคลากรคณะวิศวกรรมศาสตร์
            </p>
            <div className="mt-8 flex flex-wrap gap-4">
              <Link href="/jobs">
                <Button size="lg">
                  ดูตำแหน่งงาน
                  <ArrowRight className="ml-2 h-4 w-4" />
                </Button>
              </Link>
              <Link href="/scholarships">
                <Button variant="outline" size="lg">
                  ดูทุนการศึกษา
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="py-16 md:py-24">
        <div className="container">
          <div className="text-center mb-12">
            <h2 className="text-3xl font-bold tracking-tight sm:text-4xl">
              บริการของเรา
            </h2>
            <p className="mt-4 text-lg text-muted-foreground">
              เลือกบริการที่คุณต้องการ
            </p>
          </div>
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {features.map((feature) => (
              <Link key={feature.href} href={feature.href}>
                <Card className="h-full transition-all hover:shadow-lg hover:-translate-y-1">
                  <CardHeader>
                    <div className={`w-12 h-12 rounded-lg ${feature.bgColor} flex items-center justify-center mb-4`}>
                      <feature.icon className={`h-6 w-6 ${feature.color}`} />
                    </div>
                    <CardTitle className="text-xl">{feature.title}</CardTitle>
                  </CardHeader>
                  <CardContent>
                    <p className="text-muted-foreground">{feature.description}</p>
                  </CardContent>
                </Card>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Stats Section */}
      <section className="py-16 bg-muted/50">
        <div className="container">
          <div className="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div className="text-center">
              <div className="text-4xl font-bold text-primary">100+</div>
              <div className="mt-2 text-muted-foreground">ตำแหน่งงาน</div>
            </div>
            <div className="text-center">
              <div className="text-4xl font-bold text-primary">50+</div>
              <div className="mt-2 text-muted-foreground">ทุนการศึกษา</div>
            </div>
            <div className="text-center">
              <div className="text-4xl font-bold text-primary">30+</div>
              <div className="mt-2 text-muted-foreground">หลักสูตรอบรม</div>
            </div>
            <div className="text-center">
              <div className="text-4xl font-bold text-primary">200+</div>
              <div className="mt-2 text-muted-foreground">อาจารย์</div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}
