import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { instructorSchema } from '@/lib/validations';

// GET /api/instructors/[id] - Get single instructor
export async function GET(
  request: NextRequest,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const { id } = await params;

    const instructor = await prisma.instructor.findFirst({
      where: {
        OR: [{ id }, { instructorId: id }],
      },
      include: {
        courses: true,
      },
    });

    if (!instructor) {
      return NextResponse.json(
        { success: false, error: 'Instructor not found' },
        { status: 404 }
      );
    }

    return NextResponse.json({ success: true, data: instructor });
  } catch (error) {
    console.error('Error fetching instructor:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch instructor' },
      { status: 500 }
    );
  }
}

// PUT /api/instructors/[id] - Update instructor (Admin/Editor only)
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
    const validationResult = instructorSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    // Check if instructor exists
    const existingInstructor = await prisma.instructor.findFirst({
      where: {
        OR: [{ id }, { instructorId: id }],
      },
    });

    if (!existingInstructor) {
      return NextResponse.json(
        { success: false, error: 'Instructor not found' },
        { status: 404 }
      );
    }

    // Check if email is being changed and if new email already exists
    if (data.email !== existingInstructor.email) {
      const emailExists = await prisma.instructor.findUnique({
        where: { email: data.email },
      });
      if (emailExists) {
        return NextResponse.json(
          { success: false, error: 'Email already exists' },
          { status: 400 }
        );
      }
    }

    const instructor = await prisma.instructor.update({
      where: { id: existingInstructor.id },
      data: {
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

    return NextResponse.json({ success: true, data: instructor });
  } catch (error) {
    console.error('Error updating instructor:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to update instructor' },
      { status: 500 }
    );
  }
}

// DELETE /api/instructors/[id] - Delete instructor (Admin only)
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

    // Check if instructor exists
    const existingInstructor = await prisma.instructor.findFirst({
      where: {
        OR: [{ id }, { instructorId: id }],
      },
    });

    if (!existingInstructor) {
      return NextResponse.json(
        { success: false, error: 'Instructor not found' },
        { status: 404 }
      );
    }

    await prisma.instructor.delete({
      where: { id: existingInstructor.id },
    });

    return NextResponse.json({ success: true, message: 'Instructor deleted successfully' });
  } catch (error) {
    console.error('Error deleting instructor:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to delete instructor' },
      { status: 500 }
    );
  }
}
