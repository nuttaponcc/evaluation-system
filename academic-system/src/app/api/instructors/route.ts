import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { instructorSchema } from '@/lib/validations';
import { generateId, parsePaginationParams, calculatePagination } from '@/lib/utils';
import { Prisma } from '@prisma/client';

// GET /api/instructors - List all instructors with pagination, filters, search
export async function GET(request: NextRequest) {
  try {
    const searchParams = request.nextUrl.searchParams;
    const { page, limit, search, skip } = parsePaginationParams(searchParams);
    const isActive = searchParams.get('is_active');

    // Build where clause
    const where: Prisma.InstructorWhereInput = {};

    if (search) {
      where.OR = [
        { firstName: { contains: search, mode: 'insensitive' } },
        { lastName: { contains: search, mode: 'insensitive' } },
        { email: { contains: search, mode: 'insensitive' } },
        { expertise: { contains: search, mode: 'insensitive' } },
      ];
    }

    if (isActive === 'true') {
      where.isActive = true;
    } else if (isActive === 'false') {
      where.isActive = false;
    }

    // Get total count
    const total = await prisma.instructor.count({ where });

    // Get instructors
    const instructors = await prisma.instructor.findMany({
      where,
      include: {
        courses: true,
      },
      orderBy: [{ lastName: 'asc' }, { firstName: 'asc' }],
      skip,
      take: limit,
    });

    return NextResponse.json({
      success: true,
      data: instructors,
      pagination: calculatePagination(total, page, limit),
    });
  } catch (error) {
    console.error('Error fetching instructors:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch instructors' },
      { status: 500 }
    );
  }
}

// POST /api/instructors - Create new instructor (Admin/Editor only)
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
    const validationResult = instructorSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    // Check if email already exists
    const existingInstructor = await prisma.instructor.findUnique({
      where: { email: data.email },
    });

    if (existingInstructor) {
      return NextResponse.json(
        { success: false, error: 'Email already exists' },
        { status: 400 }
      );
    }

    const instructor = await prisma.instructor.create({
      data: {
        instructorId: generateId('INS'),
        titleName: data.titleName,
        firstName: data.firstName,
        lastName: data.lastName,
        email: data.email,
        phone: data.phone,
        officeLocation: data.officeLocation,
        photoUrl: data.photoUrl,
        biography: data.biography,
        education: data.education,
        expertise: data.expertise,
        researchInterests: data.researchInterests,
        publications: data.publications,
        awards: data.awards,
        isActive: data.isActive,
      },
      include: {
        courses: true,
      },
    });

    return NextResponse.json({ success: true, data: instructor }, { status: 201 });
  } catch (error) {
    console.error('Error creating instructor:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to create instructor' },
      { status: 500 }
    );
  }
}
