import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { jobSchema } from '@/lib/validations';
import { generateId, parsePaginationParams, calculatePagination } from '@/lib/utils';
import { JobType, Prisma } from '@prisma/client';

// GET /api/jobs - List all jobs with pagination, filters, search
export async function GET(request: NextRequest) {
  try {
    const searchParams = request.nextUrl.searchParams;
    const { page, limit, search, skip } = parsePaginationParams(searchParams);
    const type = searchParams.get('type');
    const isUrgent = searchParams.get('is_urgent');
    const isActive = searchParams.get('is_active');

    // Build where clause
    const where: Prisma.JobWhereInput = {};

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
    } else if (isUrgent === 'false') {
      where.isUrgent = false;
    }

    if (isActive === 'true') {
      where.isActive = true;
    } else if (isActive === 'false') {
      where.isActive = false;
    }

    // Get total count
    const total = await prisma.job.count({ where });

    // Get jobs
    const jobs = await prisma.job.findMany({
      where,
      orderBy: [{ isUrgent: 'desc' }, { createdAt: 'desc' }],
      skip,
      take: limit,
    });

    return NextResponse.json({
      success: true,
      data: jobs,
      pagination: calculatePagination(total, page, limit),
    });
  } catch (error) {
    console.error('Error fetching jobs:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch jobs' },
      { status: 500 }
    );
  }
}

// POST /api/jobs - Create new job (Admin/Editor only)
export async function POST(request: NextRequest) {
  try {
    const session = await auth();
    if (!session || !['ADMIN', 'EDITOR'].includes(session.user.role)) {
      return NextResponse.json(
        { success: false, error: 'Unauthorized' },
        { status: 401 }
      );
    }

    const body = await request.json();
    const validationResult = jobSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    const job = await prisma.job.create({
      data: {
        jobId: generateId('JOB'),
        title: data.title,
        jobType: data.jobType as JobType,
        company: data.company,
        salaryMin: data.salaryMin,
        salaryMax: data.salaryMax,
        description: data.description,
        requirements: data.requirements,
        benefits: data.benefits,
        location: data.location,
        contactPerson: data.contactPerson,
        contactEmail: data.contactEmail,
        contactPhone: data.contactPhone,
        applyMethod: data.applyMethod,
        startDate: data.startDate,
        endDate: data.endDate,
        isActive: data.isActive,
        isUrgent: data.isUrgent,
        attachmentUrl: data.attachmentUrl,
        createdBy: session.user.id,
      },
    });

    return NextResponse.json({ success: true, data: job }, { status: 201 });
  } catch (error) {
    console.error('Error creating job:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to create job' },
      { status: 500 }
    );
  }
}
