import { Suspense } from 'react';
import { prisma } from '@/lib/prisma';
import { JobCard } from '@/components/cards/job-card';
import { SearchBar } from '@/components/shared/search-bar';
import { Pagination } from '@/components/shared/pagination';
import { Badge } from '@/components/ui/badge';
import { JobType } from '@prisma/client';
import Link from 'next/link';

interface JobsPageProps {
  searchParams: Promise<{
    page?: string;
    search?: string;
    type?: string;
    is_urgent?: string;
  }>;
}

async function JobsList({ searchParams }: { searchParams: JobsPageProps['searchParams'] }) {
  const params = await searchParams;
  const page = parseInt(params.page || '1');
  const limit = 12;
  const search = params.search || '';
  const type = params.type;
  const isUrgent = params.is_urgent;

  // Build where clause
  const where: any = { isActive: true };

  if (search) {
    where.OR = [
      { title: { contains: search, mode: 'insensitive' } },
      { company: { contains: search, mode: 'insensitive' } },
      { description: { contains: search, mode: 'insensitive' } },
      { location: { contains: search, mode: 'insensitive' } },
    ];
  }

  if (type && Object.keys(JobType).includes(type)) {
    where.jobType = type as JobType;
  }

  if (isUrgent === 'true') {
    where.isUrgent = true;
  }

  const [jobs, total] = await Promise.all([
    prisma.job.findMany({
      where,
      orderBy: [{ isUrgent: 'desc' }, { createdAt: 'desc' }],
      skip: (page - 1) * limit,
      take: limit,
    }),
    prisma.job.count({ where }),
  ]);

  const totalPages = Math.ceil(total / limit);

  return (
    <>
      {jobs.length === 0 ? (
        <div className="text-center py-12">
          <p className="text-muted-foreground">ไม่พบตำแหน่งงานที่ค้นหา</p>
        </div>
      ) : (
        <>
          <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {jobs.map((job) => (
              <JobCard key={job.id} job={job} />
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

export default async function JobsPage({ searchParams }: JobsPageProps) {
  const params = await searchParams;
  const currentType = params.type;

  const jobTypes = [
    { value: '', label: 'ทั้งหมด' },
    { value: 'FULL_TIME', label: 'งานประจำ' },
    { value: 'PART_TIME', label: 'Part-time' },
    { value: 'INTERNSHIP', label: 'ฝึกงาน' },
    { value: 'CONTRACT', label: 'สัญญาจ้าง' },
  ];

  return (
    <div className="container py-8">
      <div className="mb-8">
        <h1 className="text-3xl font-bold tracking-tight">ประกาศรับสมัครงาน</h1>
        <p className="mt-2 text-muted-foreground">
          ค้นหาตำแหน่งงานที่เหมาะสมกับคุณ
        </p>
      </div>

      <div className="mb-6 space-y-4">
        <SearchBar placeholder="ค้นหาตำแหน่งงาน, บริษัท, สถานที่..." />
        
        <div className="flex flex-wrap gap-2">
          {jobTypes.map((type) => (
            <Link
              key={type.value}
              href={type.value ? `?type=${type.value}` : '/jobs'}
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
        <JobsList searchParams={searchParams} />
      </Suspense>
    </div>
  );
}
