import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { scholarshipSchema } from '@/lib/validations';
import { generateId, parsePaginationParams, calculatePagination } from '@/lib/utils';
import { ScholarshipType, Prisma } from '@prisma/client';

// GET /api/scholarships - List all scholarships with pagination, filters, search
export async function GET(request: NextRequest) {
  try {
    const searchParams = request.nextUrl.searchParams;
    const { page, limit, search, skip } = parsePaginationParams(searchParams);
    const type = searchParams.get('type');
    const isActive = searchParams.get('is_active');

    // Build where clause
    const where: Prisma.ScholarshipWhereInput = {};

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

    if (isActive === 'true') {
      where.isActive = true;
    } else if (isActive === 'false') {
      where.isActive = false;
    }

    // Get total count
    const total = await prisma.scholarship.count({ where });

    // Get scholarships
    const scholarships = await prisma.scholarship.findMany({
      where,
      orderBy: [{ applicationDeadline: 'asc' }, { createdAt: 'desc' }],
      skip,
      take: limit,
    });

    return NextResponse.json({
      success: true,
      data: scholarships,
      pagination: calculatePagination(total, page, limit),
    });
  } catch (error) {
    console.error('Error fetching scholarships:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch scholarships' },
      { status: 500 }
    );
  }
}

// POST /api/scholarships - Create new scholarship (Admin/Editor only)
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
    const validationResult = scholarshipSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    const scholarship = await prisma.scholarship.create({
      data: {
        scholarshipId: generateId('SCH'),
        title: data.title,
        type: data.type as ScholarshipType,
        sponsor: data.sponsor,
        amount: data.amount,
        duration: data.duration,
        description: data.description,
        eligibility: data.eligibility,
        requiredDocs: data.requiredDocs,
        applicationDeadline: data.applicationDeadline,
        announcementDate: data.announcementDate,
        contactInfo: data.contactInfo,
        documentUrl: data.documentUrl,
        isActive: data.isActive,
        createdBy: session.user.id,
      },
    });

    return NextResponse.json({ success: true, data: scholarship }, { status: 201 });
  } catch (error) {
    console.error('Error creating scholarship:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to create scholarship' },
      { status: 500 }
    );
  }
}
