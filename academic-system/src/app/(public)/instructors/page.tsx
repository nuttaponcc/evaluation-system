import { Suspense } from 'react';
import { prisma } from '@/lib/prisma';
import { InstructorCard } from '@/components/cards/instructor-card';
import { SearchBar } from '@/components/shared/search-bar';
import { Pagination } from '@/components/shared/pagination';

interface InstructorsPageProps {
  searchParams: Promise<{
    page?: string;
    search?: string;
  }>;
}

async function InstructorsList({ searchParams }: { searchParams: InstructorsPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 12;
  const search = params.search || '';

  const where: any = { isActive: true };

  if (search) {
    where.OR = [
      { firstName: { contains: search, mode: 'insensitive' } },
      { lastName: { contains: search, mode: 'insensitive' } },
      { email: { contains: search, mode: 'insensitive' } },
      { expertise: { contains: search, mode: 'insensitive' } },
    ];
  }

  const [instructors, total] = await Promise.all([
    prisma.instructor.findMany({
      where,
      orderBy: [{ lastName: 'asc' }, { firstName: 'asc' }],
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.instructor.count({ where }),
  ]);

  const totalPages = Math.ceil(total / limit);

  return (
    <>
      {instructors.length === 0 ? (
        <div className="text-center py-12">
          <p className="text-muted-foreground">ไม่พบอาจารย์ที่ค้นหา</p>
        </div>
      ) : (
        <>
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {instructors.map((instructor) => (
              <InstructorCard key={instructor.id} instructor={instructor} />
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

export default async function InstructorsPage({ searchParams }: InstructorsPageProps) {
  return (
    <div className="container py-8">
      <div className="mb-8">
        <h1 className="text-3xl font-bold tracking-tight">รายชื่ออาจารย์</h1>
        <p className="mt-2 text-muted-foreground">
          ข้อมูลอาจารย์และผู้เชี่ยวชาญในคณะวิศวกรรมศาสตร์
        </p>
      </div>

      <div className="mb-6">
        <SearchBar placeholder="ค้นหาชื่ออาจารย์, ความเชี่ยวชาญ..." />
      </div>

      <Suspense fallback={<div className="text-center py-12">กำลังโหลด...</div>}>
        <InstructorsList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
