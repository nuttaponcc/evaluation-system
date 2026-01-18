import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { activitySchema } from '@/lib/validations';

// GET /api/activities/[id] - Get single activity
export async function GET(
  request: NextRequest,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const { id } = await params;

    const activity = await prisma.activity.findFirst({
      where: {
        OR: [{ id }, { activityId: id }],
      },
    });

    if (!activity) {
      return NextResponse.json(
        { success: false, error: 'Activity not found' },
        { status: 404 }
      );
    }

    return NextResponse.json({ success: true, data: activity });
  } catch (error) {
    console.error('Error fetching activity:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch activity' },
      { status: 500 }
    );
  }
}

// PUT /api/activities/[id] - Update activity (Admin/Editor only)
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
    const validationResult = activitySchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    // Check if activity exists
    const existingActivity = await prisma.activity.findFirst({
      where: {
        OR: [{ id }, { activityId: id }],
      },
    });

    if (!existingActivity) {
      return NextResponse.json(
        { success: false, error: 'Activity not found' },
        { status: 404 }
      );
    }

    const activity = await prisma.activity.update({
      where: { id: existingActivity.id },
      data: {
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
      },
    });

    return NextResponse.json({ success: true, data: activity });
  } catch (error) {
    console.error('Error updating activity:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to update activity' },
      { status: 500 }
    );
  }
}

// DELETE /api/activities/[id] - Delete activity (Admin only)
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

    // Check if activity exists
    const existingActivity = await prisma.activity.findFirst({
      where: {
        OR: [{ id }, { activityId: id }],
      },
    });

    if (!existingActivity) {
      return NextResponse.json(
        { success: false, error: 'Activity not found' },
        { status: 404 }
      );
    }

    await prisma.activity.delete({
      where: { id: existingActivity.id },
    });

    return NextResponse.json({ success: true, message: 'Activity deleted successfully' });
  } catch (error) {
    console.error('Error deleting activity:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to delete activity' },
      { status: 500 }
    );
  }
}
