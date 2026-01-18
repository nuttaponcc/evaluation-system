import { Suspense } from 'react';
import { prisma } from '@/lib/prisma';
import { ScholarshipCard } from '@/components/cards/scholarship-card';
import { SearchBar } from '@/components/shared/search-bar';
import { Pagination } from '@/components/shared/pagination';
import { Badge } from '@/components/ui/badge';
import { ScholarshipType } from '@prisma/client';
import Link from 'next/link';

interface ScholarshipsPageProps {
  searchParams: Promise<{
    page?: string;
    search?: string;
    type?: string;
  }>;
}

async function ScholarshipsList({ searchParams }: { searchParams: ScholarshipsPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 12;
  const search = params.search || '';
  const type = params.type;

  const where: any = { isActive: true };

  if (search) {
    where.OR = [
      { title: { contains: search, mode: 'insensitive' } },
      { sponsor: { contains: search, mode: 'insensitive' } },
      { description: { contains: search, mode: 'insensitive' } },
    ];
  }

  if (type && Object.keys(ScholarshipType).includes(type)) {
    where.type = type as ScholarshipType;
  }

  const [scholarships, total] = await Promise.all([
    prisma.scholarship.findMany({
      where,
      orderBy: [{ applicationDeadline: 'asc' }, { createdAt: 'desc' }],
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.scholarship.count({ where }),
  ]);

  const totalPages = Math.ceil(total / limit);

  return (
    <>
      {scholarships.length === 0 ? (
        <div className="text-center py-12">
          <p className="text-muted-foreground">ไม่พบทุนการศึกษาที่ค้นหา</p>
        </div>
      ) : (
        <>
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {scholarships.map((scholarship) => (
              <ScholarshipCard key={scholarship.id} scholarship={scholarship} />
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

export default async function ScholarshipsPage({ searchParams }: ScholarshipsPageProps) {
  const params = await searchParams;
  const currentType = params.type;

  const scholarshipTypes = [
    { value: '', label: 'ทั้งหมด' },
    { value: 'COMPANY', label: 'ทุนจากบริษัท' },
    { value: 'INBOUND', label: 'ทุนในประเทศ' },
    { value: 'OUTBOUND', label: 'ทุนต่างประเทศ' },
    { value: 'SPECIAL', label: 'ทุนพิเศษ' },
  ];

  return (
    <div className="container py-8">
      <div className="mb-8">
        <h1 className="text-3xl font-bold tracking-tight">ทุนการศึกษา</h1>
        <p className="mt-2 text-muted-foreground">
          ค้นหาทุนการศึกษาที่เหมาะสมกับคุณ
        </p>
      </div>

      <div className="mb-6 space-y-4">
        <SearchBar placeholder="ค้นหาทุนการศึกษา, ผู้ให้ทุน..." />
        
        <div className="flex flex-wrap gap-2">
          {scholarshipTypes.map((type) => (
            <Link
              key={type.value}
              href={type.value ? `?type=${type.value}` : '/scholarships'}
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
        <ScholarshipsList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
