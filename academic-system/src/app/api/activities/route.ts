import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { activitySchema } from '@/lib/validations';
import { generateId, parsePaginationParams, calculatePagination } from '@/lib/utils';
import { Prisma } from '@prisma/client';

// GET /api/activities - List all activities with pagination, filters, search
export async function GET(request: NextRequest) {
  try {
    const searchParams = request.nextUrl.searchParams;
    const { page, limit, search, skip } = parsePaginationParams(searchParams);
    const category = searchParams.get('category');
    const isActive = searchParams.get('is_active');

    // Build where clause
    const where: Prisma.ActivityWhereInput = {};

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

    if (isActive === 'true') {
      where.isActive = true;
    } else if (isActive === 'false') {
      where.isActive = false;
    }

    // Get total count
    const total = await prisma.activity.count({ where });

    // Get activities
    const activities = await prisma.activity.findMany({
      where,
      orderBy: [{ startDatetime: 'asc' }, { createdAt: 'desc' }],
      skip,
      take: limit,
    });

    return NextResponse.json({
      success: true,
      data: activities,
      pagination: calculatePagination(total, page, limit),
    });
  } catch (error) {
    console.error('Error fetching activities:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch activities' },
      { status: 500 }
    );
  }
}

// POST /api/activities - Create new activity (Admin/Editor only)
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
    const validationResult = activitySchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    const activity = await prisma.activity.create({
      data: {
        activityId: generateId('ACT'),
        title: data.title,
        category: data.category,
        description: data.description,
        objectives: data.objectives,
        targetAudience: data.targetAudience,
        location: data.location,
        startDatetime: data.startDatetime,
        endDatetime: data.endDatetime,
        maxParticipants: data.maxParticipants,
        registrationDeadline: data.registrationDeadline,
        coordinator: data.coordinator,
        coordinatorContact: data.coordinatorContact,
        imageUrls: data.imageUrls,
        documentUrls: data.documentUrls,
        isActive: data.isActive,
        createdBy: session.user.id,
      },
    });

    return NextResponse.json({ success: true, data: activity }, { status: 201 });
  } catch (error) {
    console.error('Error creating activity:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to create activity' },
      { status: 500 }
    );
  }
}
