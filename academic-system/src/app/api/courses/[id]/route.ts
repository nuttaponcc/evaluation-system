import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { courseSchema } from '@/lib/validations';
import { CourseType } from '@prisma/client';

// GET /api/courses/[id] - Get single course
export async function GET(
  request: NextRequest,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const { id } = await params;

    const course = await prisma.course.findFirst({
      where: {
        OR: [{ id }, { courseId: id }],
      },
    });

    if (!course) {
      return NextResponse.json(
        { success: false, error: 'Course not found' },
        { status: 404 }
      );
    }

    return NextResponse.json({ success: true, data: course });
  } catch (error) {
    console.error('Error fetching course:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch course' },
      { status: 500 }
    );
  }
}

// PUT /api/courses/[id] - Update course (Admin/Editor only)
export async function PUT(
  request: NextRequest,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const session = await auth();
    if (!session || !['ADMIN', 'EDITOR'].includes(session.user.role)) {
      return NextResponse.json(
        { success: false, error: 'Unauthorized' },
        { status: 401 }
      );
    }

    const { id } = await params;
    const body = await request.json();
    const validationResult = courseSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    // Check if course exists
    const existingCourse = await prisma.course.findFirst({
      where: {
        OR: [{ id }, { courseId: id }],
      },
    });

    if (!existingCourse) {
      return NextResponse.json(
        { success: false, error: 'Course not found' },
        { status: 404 }
      );
    }

    const course = await prisma.course.update({
      where: { id: existingCourse.id },
      data: {
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
      },
    });

    return NextResponse.json({ success: true, data: course });
  } catch (error) {
    console.error('Error updating course:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to update course' },
      { status: 500 }
    );
  }
}

// DELETE /api/courses/[id] - Delete course (Admin only)
export async function DELETE(
  request: NextRequest,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const session = await auth();
    if (!session || session.user.role !== 'ADMIN') {
      return NextResponse.json(
        { success: false, error: 'Unauthorized' },
        { status: 401 }
      );
    }

    const { id } = await params;

    // Check if course exists
    const existingCourse = await prisma.course.findFirst({
      where: {
        OR: [{ id }, { courseId: id }],
      },
    });

    if (!existingCourse) {
      return NextResponse.json(
        { success: false, error: 'Course not found' },
        { status: 404 }
      );
    }

    await prisma.course.delete({
      where: { id: existingCourse.id },
    });

    return NextResponse.json({ success: true, message: 'Course deleted successfully' });
  } catch (error) {
    console.error('Error deleting course:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to delete course' },
      { status: 500 }
    );
  }
}
