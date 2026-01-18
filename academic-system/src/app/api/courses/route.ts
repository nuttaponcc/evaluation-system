import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { courseSchema } from '@/lib/validations';
import { generateId, parsePaginationParams, calculatePagination } from '@/lib/utils';
import { CourseType, Prisma } from '@prisma/client';

// GET /api/courses - List all courses with pagination, filters, search
export async function GET(request: NextRequest) {
  try {
    const searchParams = request.nextUrl.searchParams;
    const { page, limit, search, skip } = parsePaginationParams(searchParams);
    const type = searchParams.get('type');
    const isActive = searchParams.get('is_active');

    // Build where clause
    const where: Prisma.CourseWhereInput = {};

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

    if (isActive === 'true') {
      where.isActive = true;
    } else if (isActive === 'false') {
      where.isActive = false;
    }

    // Get total count
    const total = await prisma.course.count({ where });

    // Get courses
    const courses = await prisma.course.findMany({
      where,
      orderBy: [{ courseStart: 'asc' }, { createdAt: 'desc' }],
      skip,
      take: limit,
    });

    return NextResponse.json({
      success: true,
      data: courses,
      pagination: calculatePagination(total, page, limit),
    });
  } catch (error) {
    console.error('Error fetching courses:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch courses' },
      { status: 500 }
    );
  }
}

// POST /api/courses - Create new course (Admin/Editor only)
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
    const validationResult = courseSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    const course = await prisma.course.create({
      data: {
        courseId: generateId('CRS'),
        title: data.title,
        type: data.type as CourseType,
        description: data.description,
        duration: data.duration,
        schedule: data.schedule,
        location: data.location,
        instructor: data.instructor,
        maxParticipants: data.maxParticipants,
        fee: data.fee,
        certificate: data.certificate,
        registrationStart: data.registrationStart,
        registrationEnd: data.registrationEnd,
        courseStart: data.courseStart,
        courseEnd: data.courseEnd,
        syllabusUrl: data.syllabusUrl,
        isActive: data.isActive,
        createdBy: session.user.id,
      },
    });

    return NextResponse.json({ success: true, data: course }, { status: 201 });
  } catch (error) {
    console.error('Error creating course:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to create course' },
      { status: 500 }
    );
  }
}
