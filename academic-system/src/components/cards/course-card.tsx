import Link from 'next/link';
import { Calendar, MapPin, Clock, Award, Banknote } from 'lucide-react';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { formatDate, formatCurrency, courseTypeLabels, isPast } from '@/lib/utils';
import type { Course } from '@prisma/client';

interface CourseCardProps {
  course: Course;
}

export function CourseCard({ course }: CourseCardProps) {
  const isExpired = isPast(course.courseEnd);

  return (
    <Card className="h-full flex flex-col hover:shadow-lg transition-shadow">
      <CardHeader className="pb-3">
        <div className="flex items-start justify-between gap-2">
          <div className="space-y-1 flex-1">
            <div className="flex items-center gap-2 flex-wrap">
              <Badge variant="secondary">
                {courseTypeLabels[course.type] || course.type}
              </Badge>
              {course.certificate && (
                <Badge variant="success">
                  <Award className="h-3 w-3 mr-1" />
                  มีใบประกาศ
                </Badge>
              )}
              {isExpired && <Badge variant="destructive">สิ้นสุดแล้ว</Badge>}
            </div>
            <h3 className="font-semibold text-lg leading-tight line-clamp-2">
              {course.title}
            </h3>
          </div>
        </div>
      </CardHeader>
      <CardContent className="flex-1 space-y-3">
        <div className="flex items-center text-sm text-muted-foreground">
          <Calendar className="h-4 w-4 mr-2 flex-shrink-0" />
          <span>
            {formatDate(course.courseStart)} - {formatDate(course.courseEnd)}
          </span>
        </div>
        {course.duration && (
          <div className="flex items-center text-sm text-muted-foreground">
            <Clock className="h-4 w-4 mr-2 flex-shrink-0" />
            <span>{course.duration}</span>
          </div>
        )}
        {course.location && (
          <div className="flex items-center text-sm text-muted-foreground">
            <MapPin className="h-4 w-4 mr-2 flex-shrink-0" />
            <span className="line-clamp-1">{course.location}</span>
          </div>
        )}
        <div className="flex items-center text-sm font-medium text-primary">
          <Banknote className="h-4 w-4 mr-2 flex-shrink-0" />
          <span>
            {Number(course.fee) === 0 ? 'ฟรี' : formatCurrency(Number(course.fee))}
          </span>
        </div>
        <p className="text-sm text-muted-foreground line-clamp-2">
          {course.description}
        </p>
      </CardContent>
      <CardFooter className="pt-3 border-t">
        <Link href={`/courses/${course.id}`} className="w-full">
          <Button variant="outline" className="w-full">
            ดูรายละเอียด
          </Button>
        </Link>
      </CardFooter>
    </Card>
  );
}
