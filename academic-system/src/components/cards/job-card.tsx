import Link from 'next/link';
import { MapPin, Building2, Calendar, Clock } from 'lucide-react';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { formatDate, formatSalaryRange, jobTypeLabels } from '@/lib/utils';
import type { Job } from '@prisma/client';

interface JobCardProps {
  job: Job;
}

export function JobCard({ job }: JobCardProps) {
  return (
    <Card className="h-full flex flex-col hover:shadow-lg transition-shadow">
      <CardHeader className="pb-3">
        <div className="flex items-start justify-between gap-2">
          <div className="space-y-1 flex-1">
            <div className="flex items-center gap-2 flex-wrap">
              {job.isUrgent && (
                <Badge variant="destructive">ด่วน</Badge>
              )}
              <Badge variant="secondary">
                {jobTypeLabels[job.jobType] || job.jobType}
              </Badge>
            </div>
            <h3 className="font-semibold text-lg leading-tight line-clamp-2">
              {job.title}
            </h3>
          </div>
        </div>
      </CardHeader>
      <CardContent className="flex-1 space-y-3">
        <div className="flex items-center text-sm text-muted-foreground">
          <Building2 className="h-4 w-4 mr-2 flex-shrink-0" />
          <span className="line-clamp-1">{job.company}</span>
        </div>
        <div className="flex items-center text-sm text-muted-foreground">
          <MapPin className="h-4 w-4 mr-2 flex-shrink-0" />
          <span className="line-clamp-1">{job.location}</span>
        </div>
        <div className="flex items-center text-sm font-medium text-primary">
          <span>
            {formatSalaryRange(
              job.salaryMin ? Number(job.salaryMin) : null,
              job.salaryMax ? Number(job.salaryMax) : null
            )}
          </span>
        </div>
        <p className="text-sm text-muted-foreground line-clamp-2">
          {job.description}
        </p>
      </CardContent>
      <CardFooter className="flex flex-col gap-3 pt-3 border-t">
        <div className="flex items-center justify-between w-full text-xs text-muted-foreground">
          <div className="flex items-center">
            <Calendar className="h-3 w-3 mr-1" />
            <span>เปิดรับถึง {formatDate(job.endDate)}</span>
          </div>
          <div className="flex items-center">
            <Clock className="h-3 w-3 mr-1" />
            <span>{formatDate(job.createdAt)}</span>
          </div>
        </div>
        <Link href={`/jobs/${job.id}`} className="w-full">
          <Button variant="outline" className="w-full">
            ดูรายละเอียด
          </Button>
        </Link>
      </CardFooter>
    </Card>
  );
}
