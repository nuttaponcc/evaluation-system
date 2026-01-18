import Link from 'next/link';
import { Calendar, Building2, Banknote } from 'lucide-react';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { formatDate, formatCurrency, scholarshipTypeLabels, isPast } from '@/lib/utils';
import type { Scholarship } from '@prisma/client';

interface ScholarshipCardProps {
  scholarship: Scholarship;
}

export function ScholarshipCard({ scholarship }: ScholarshipCardProps) {
  const isExpired = isPast(scholarship.applicationDeadline);

  return (
    <Card className="h-full flex flex-col hover:shadow-lg transition-shadow">
      <CardHeader className="pb-3">
        <div className="flex items-start justify-between gap-2">
          <div className="space-y-1 flex-1">
            <div className="flex items-center gap-2 flex-wrap">
              <Badge variant={isExpired ? 'secondary' : 'info'}>
                {scholarshipTypeLabels[scholarship.type] || scholarship.type}
              </Badge>
              {isExpired && <Badge variant="destructive">หมดเขต</Badge>}
            </div>
            <h3 className="font-semibold text-lg leading-tight line-clamp-2">
              {scholarship.title}
            </h3>
          </div>
        </div>
      </CardHeader>
      <CardContent className="flex-1 space-y-3">
        <div className="flex items-center text-sm text-muted-foreground">
          <Building2 className="h-4 w-4 mr-2 flex-shrink-0" />
          <span className="line-clamp-1">{scholarship.sponsor}</span>
        </div>
        {scholarship.amount && (
          <div className="flex items-center text-sm font-medium text-primary">
            <Banknote className="h-4 w-4 mr-2 flex-shrink-0" />
            <span>{formatCurrency(Number(scholarship.amount))}</span>
            {scholarship.duration && (
              <span className="text-muted-foreground ml-1">/ {scholarship.duration}</span>
            )}
          </div>
        )}
        <p className="text-sm text-muted-foreground line-clamp-2">
          {scholarship.description}
        </p>
      </CardContent>
      <CardFooter className="flex flex-col gap-3 pt-3 border-t">
        <div className="flex items-center w-full text-xs text-muted-foreground">
          <Calendar className="h-3 w-3 mr-1" />
          <span>ปิดรับสมัคร {formatDate(scholarship.applicationDeadline)}</span>
        </div>
        <Link href={`/scholarships/${scholarship.id}`} className="w-full">
          <Button variant="outline" className="w-full">
            ดูรายละเอียด
          </Button>
        </Link>
      </CardFooter>
    </Card>
  );
}
