import { notFound } from 'next/navigation';
import Link from 'next/link';
import Image from 'next/image';
import { ArrowLeft, Mail, Phone, MapPin, User, Globe, GraduationCap, BookOpen, Award } from 'lucide-react';
import { prisma } from '@/lib/prisma';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';

interface InstructorDetailPageProps {
  params: Promise<{ id: string }>;
}

export default async function InstructorDetailPage({ params }: InstructorDetailPageProps) {
  const { id } = await params;

  const instructor = await prisma.instructor.findFirst({
    where: {
      OR: [{ id }, { instructorId: id }],
      isActive: true,
    },
  });

  if (!instructor) {
    notFound();
  }

  const fullName = `${instructor.titleName}${instructor.firstName} ${instructor.lastName}`;

  return (
    <div className="container py-8">
      <Link href="/instructors" className="inline-flex items-center text-sm text-muted-foreground hover:text-foreground mb-6">
        <ArrowLeft className="h-4 w-4 mr-2" />
        กลับไปหน้ารายชื่ออาจารย์
      </Link>

      <div className="grid gap-8 lg:grid-cols-3">
        {/* Sidebar - Profile */}
        <div className="space-y-6">
          <Card>
            <CardContent className="pt-6">
              <div className="flex flex-col items-center text-center">
                <div className="relative h-32 w-32 overflow-hidden rounded-full bg-muted mb-4">
                  {instructor.photoUrl ? (
                    <Image
                      src={instructor.photoUrl}
                      alt={fullName}
                      fill
                      className="object-cover"
                    />
                  ) : (
                    <div className="flex h-full w-full items-center justify-center">
                      <User className="h-16 w-16 text-muted-foreground" />
                    </div>
                  )}
                </div>
                <h1 className="text-2xl font-bold">{fullName}</h1>
                {instructor.expertise && (
                  <p className="text-muted-foreground mt-2">{instructor.expertise}</p>
                )}
              </div>
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>ข้อมูลติดต่อ</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="flex items-start">
                <Mail className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                <div>
                  <div className="text-sm text-muted-foreground">อีเมล</div>
                  <a href={`mailto:${instructor.email}`} className="text-primary hover:underline">
                    {instructor.email}
                  </a>
                </div>
              </div>
              {instructor.phone && (
                <div className="flex items-start">
                  <Phone className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">โทรศัพท์</div>
                    <a href={`tel:${instructor.phone}`} className="text-primary hover:underline">
                      {instructor.phone}
                    </a>
                  </div>
                </div>
              )}
              {instructor.officeLocation && (
                <div className="flex items-start">
                  <MapPin className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">ห้องทำงาน</div>
                    <div>{instructor.officeLocation}</div>
                  </div>
                </div>
              )}
              {instructor.website && (
                <div className="flex items-start">
                  <Globe className="h-4 w-4 mr-3 mt-1 text-muted-foreground" />
                  <div>
                    <div className="text-sm text-muted-foreground">เว็บไซต์</div>
                    <a href={instructor.website} target="_blank" rel="noopener noreferrer" className="text-primary hover:underline">
                      เยี่ยมชมเว็บไซต์
                    </a>
                  </div>
                </div>
              )}
            </CardContent>
          </Card>
        </div>

        {/* Main Content */}
        <div className="lg:col-span-2 space-y-6">
          {instructor.education && (
            <Card>
              <CardHeader>
                <CardTitle className="flex items-center">
                  <GraduationCap className="h-5 w-5 mr-2" />
                  การศึกษา
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                  {instructor.education}
                </div>
              </CardContent>
            </Card>
          )}

          {instructor.researchInterests && (
            <Card>
              <CardHeader>
                <CardTitle className="flex items-center">
                  <BookOpen className="h-5 w-5 mr-2" />
                  ความสนใจในการวิจัย
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                  {instructor.researchInterests}
                </div>
              </CardContent>
            </Card>
          )}

          {instructor.publications && (
            <Card>
              <CardHeader>
                <CardTitle className="flex items-center">
                  <Award className="h-5 w-5 mr-2" />
                  ผลงานวิจัย/ตีพิมพ์
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="prose prose-sm max-w-none whitespace-pre-wrap">
                  {instructor.publications}
                </div>
              </CardContent>
            </Card>
          )}
        </div>
      </div>
    </div>
  );
}
