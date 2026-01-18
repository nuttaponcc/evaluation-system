import { Suspense } from 'react';
import { prisma } from '@/lib/prisma';
import { CourseCard } from '@/components/cards/course-card';
import { SearchBar } from '@/components/shared/search-bar';
import { Pagination } from '@/components/shared/pagination';
import { Badge } from '@/components/ui/badge';
import { CourseType } from '@prisma/client';
import Link from 'next/link';

interface CoursesPageProps {
  searchParams: Promise<{
    page?: string;
    search?: string;
    type?: string;
  }>;
}

async function CoursesList({ searchParams }: { searchParams: CoursesPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 12;
  const search = params.search || '';
  const type = params.type;

  const where: any = { isActive: true };

  if (search) {
    where.OR = [
      { title: { contains: search, mode: 'insensitive' } },
      { description: { contains: search, mode: 'insensitive' } },
      { instructor: { contains: search, mode: 'insensitive' } },
      { location: { contains: search, mode: 'insensitive' } },
    ];
  }

  if (type && Object.keys(CourseType).includes(type)) {
    where.type = type as CourseType;
  }

  const [courses, total] = await Promise.all([
    prisma.course.findMany({
      where,
      orderBy: [{ courseStart: 'asc' }, { createdAt: 'desc' }],
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.course.count({ where }),
  ]);

  const totalPages = Math.ceil(total / limit);

  return (
    <>
      {courses.length === 0 ? (
        <div className="text-center py-12">
          <p className="text-muted-foreground">ไม่พบหลักสูตรที่ค้นหา</p>
        </div>
      ) : (
        <>
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {courses.map((course) => (
              <CourseCard key={course.id} course={course} />
            ))}
          </div>
          <Pagination
            currentPage={page}
            totalPages={totalPages}
            total={total}
            limit={limit}
          />
        </>
      )}
    </>
  );
}

export default async function CoursesPage({ searchParams }: CoursesPageProps) {
  const params = await searchParams;
  const currentType = params.type;

  const courseTypes = [
    { value: '', label: 'ทั้งหมด' },
    { value: 'INTERNAL', label: 'หลักสูตรภายใน' },
    { value: 'EXTERNAL', label: 'หลักสูตรภายนอก' },
  ];

  return (
    <div className="container py-8">
      <div className="mb-8">
        <h1 className="text-3xl font-bold tracking-tight">หลักสูตรอบรม</h1>
        <p className="mt-2 text-muted-foreground">
          หลักสูตรอบรมเพื่อพัฒนาทักษะและความรู้
        </p>
      </div>

      <div className="mb-6 space-y-4">
        <SearchBar placeholder="ค้นหาหลักสูตร, วิทยากร, สถานที่..." />
        
        <div className="flex flex-wrap gap-2">
          {courseTypes.map((type) => (
            <Link
              key={type.value}
              href={type.value ? `?type=${type.value}` : '/courses'}
            >
              <Badge
                variant={currentType === type.value || (!currentType && !type.value) ? 'default' : 'outline'}
                className="cursor-pointer"
              >
                {type.label}
              </Badge>
            </Link>
          ))}
        </div>
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <CoursesList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
