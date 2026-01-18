import Link from 'next/link';
import { Calendar, MapPin, Users } from 'lucide-react';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { formatDateTime, isPast } from '@/lib/utils';
import type { Activity } from '@prisma/client';

interface ActivityCardProps {
  activity: Activity;
}

export function ActivityCard({ activity }: ActivityCardProps) {
  const isExpired = isPast(activity.endDatetime);

  return (
    <Card className="h-full flex flex-col hover:shadow-lg transition-shadow">
      <CardHeader className="pb-3">
        <div className="flex items-start justify-between gap-2">
          <div className="space-y-1 flex-1">
            <div className="flex items-center gap-2 flex-wrap">
              <Badge variant="secondary">{activity.category}</Badge>
              {isExpired && <Badge variant="destructive">สิ้นสุดแล้ว</Badge>}
            </div>
            <h3 className="font-semibold text-lg leading-tight line-clamp-2">
              {activity.title}
            </h3>
          </div>
        </div>
      </CardHeader>
      <CardContent className="flex-1 space-y-3">
        <div className="flex items-center text-sm text-muted-foreground">
          <Calendar className="h-4 w-4 mr-2 flex-shrink-0" />
          <span className="line-clamp-1">{formatDateTime(activity.startDatetime)}</span>
        </div>
        <div className="flex items-center text-sm text-muted-foreground">
          <MapPin className="h-4 w-4 mr-2 flex-shrink-0" />
          <span className="line-clamp-1">{activity.location}</span>
        </div>
        {activity.maxParticipants && (
          <div className="flex items-center text-sm text-muted-foreground">
            <Users className="h-4 w-4 mr-2 flex-shrink-0" />
            <span>รับจำนวน {activity.maxParticipants} คน</span>
          </div>
        )}
        <p className="text-sm text-muted-foreground line-clamp-2">
          {activity.description}
        </p>
      </CardContent>
      <CardFooter className="pt-3 border-t">
        <Link href={`/activities/${activity.id}`} className="w-full">
          <Button variant="outline" className="w-full">
            ดูรายละเอียด
          </Button>
        </Link>
      </CardFooter>
    </Card>
  );
}
