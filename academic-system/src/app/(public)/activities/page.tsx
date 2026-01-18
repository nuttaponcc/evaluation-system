import { Suspense } from 'react';
import { prisma } from '@/lib/prisma';
import { ActivityCard } from '@/components/cards/activity-card';
import { SearchBar } from '@/components/shared/search-bar';
import { Pagination } from '@/components/shared/pagination';

interface ActivitiesPageProps {
  searchParams: Promise<{
    page?: string;
    search?: string;
    category?: string;
  }>;
}

async function ActivitiesList({ searchParams }: { searchParams: ActivitiesPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 12;
  const search = params.search || '';
  const category = params.category;

  const where: any = { isActive: true };

  if (search) {
    where.OR = [
      { title: { contains: search, mode: 'insensitive' } },
      { description: { contains: search, mode: 'insensitive' } },
      { location: { contains: search, mode: 'insensitive' } },
      { coordinator: { contains: search, mode: 'insensitive' } },
    ];
  }

  if (category) {
    where.category = { contains: category, mode: 'insensitive' };
  }

  const [activities, total] = await Promise.all([
    prisma.activity.findMany({
      where,
      orderBy: [{ startDatetime: 'asc' }, { createdAt: 'desc' }],
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.activity.count({ where }),
  ]);

  const totalPages = Math.ceil(total / limit);

  return (
    <>
      {activities.length === 0 ? (
        <div className="text-center py-12">
          <p className="text-muted-foreground">ไม่พบกิจกรรมที่ค้นหา</p>
        </div>
      ) : (
        <>
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {activities.map((activity) => (
              <ActivityCard key={activity.id} activity={activity} />
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

export default async function ActivitiesPage({ searchParams }: ActivitiesPageProps) {
  return (
    <div className="container py-8">
      <div className="mb-8">
        <h1 className="text-3xl font-bold tracking-tight">กิจกรรม</h1>
        <p className="mt-2 text-muted-foreground">
          กิจกรรมต่างๆ ของคณะวิศวกรรมศาสตร์
        </p>
      </div>

      <div className="mb-6">
        <SearchBar placeholder="ค้นหากิจกรรม, สถานที่, ผู้ประสานงาน..." />
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <ActivitiesList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
