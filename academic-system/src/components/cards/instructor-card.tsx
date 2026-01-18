import Link from 'next/link';
import Image from 'next/image';
import { Mail, Phone, MapPin, User } from 'lucide-react';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import type { Instructor } from '@prisma/client';

interface InstructorCardProps {
  instructor: Instructor;
}

export function InstructorCard({ instructor }: InstructorCardProps) {
  const fullName = `${instructor.titleName}${instructor.firstName} ${instructor.lastName}`;

  return (
    <Card className="h-full flex flex-col hover:shadow-lg transition-shadow">
      <CardHeader className="pb-3">
        <div className="flex items-start gap-4">
          <div className="relative h-20 w-20 flex-shrink-0 overflow-hidden rounded-full bg-muted">
            {instructor.photoUrl ? (
              <Image
                src={instructor.photoUrl}
                alt={fullName}
                fill
                className="object-cover"
              />
            ) : (
              <div className="flex h-full w-full items-center justify-center">
                <User className="h-10 w-10 text-muted-foreground" />
              </div>
            )}
          </div>
          <div className="flex-1 space-y-1">
            <h3 className="font-semibold text-lg leading-tight">
              {fullName}
            </h3>
            {instructor.expertise && (
              <p className="text-sm text-muted-foreground line-clamp-2">
                {instructor.expertise}
              </p>
            )}
          </div>
        </div>
      </CardHeader>
      <CardContent className="flex-1 space-y-2">
        <div className="flex items-center text-sm text-muted-foreground">
          <Mail className="h-4 w-4 mr-2 flex-shrink-0" />
          <a href={`mailto:${instructor.email}`} className="hover:text-primary truncate">
            {instructor.email}
          </a>
        </div>
        {instructor.phone && (
          <div className="flex items-center text-sm text-muted-foreground">
            <Phone className="h-4 w-4 mr-2 flex-shrink-0" />
            <span>{instructor.phone}</span>
          </div>
        )}
        {instructor.officeLocation && (
          <div className="flex items-center text-sm text-muted-foreground">
            <MapPin className="h-4 w-4 mr-2 flex-shrink-0" />
            <span className="line-clamp-1">{instructor.officeLocation}</span>
          </div>
        )}
      </CardContent>
      <CardFooter className="pt-3 border-t">
        <Link href={`/instructors/${instructor.id}`} className="w-full">
          <Button variant="outline" className="w-full">
            ดูโปรไฟล์
          </Button>
        </Link>
      </CardFooter>
    </Card>
  );
}
