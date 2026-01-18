import { NextRequest, NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';
import { scholarshipSchema } from '@/lib/validations';
import { ScholarshipType } from '@prisma/client';

// GET /api/scholarships/[id] - Get single scholarship
export async function GET(
  request: NextRequest,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const { id } = await params;

    const scholarship = await prisma.scholarship.findFirst({
      where: {
        OR: [{ id }, { scholarshipId: id }],
      },
    });

    if (!scholarship) {
      return NextResponse.json(
        { success: false, error: 'Scholarship not found' },
        { status: 404 }
      );
    }

    return NextResponse.json({ success: true, data: scholarship });
  } catch (error) {
    console.error('Error fetching scholarship:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch scholarship' },
      { status: 500 }
    );
  }
}

// PUT /api/scholarships/[id] - Update scholarship (Admin/Editor only)
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
    const validationResult = scholarshipSchema.safeParse(body);

    if (!validationResult.success) {
      return NextResponse.json(
        { success: false, error: 'Validation failed', details: validationResult.error.errors },
        { status: 400 }
      );
    }

    const data = validationResult.data;

    // Check if scholarship exists
    const existingScholarship = await prisma.scholarship.findFirst({
      where: {
        OR: [{ id }, { scholarshipId: id }],
      },
    });

    if (!existingScholarship) {
      return NextResponse.json(
        { success: false, error: 'Scholarship not found' },
        { status: 404 }
      );
    }

    const scholarship = await prisma.scholarship.update({
      where: { id: existingScholarship.id },
      data: {
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
      },
    });

    return NextResponse.json({ success: true, data: scholarship });
  } catch (error) {
    console.error('Error updating scholarship:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to update scholarship' },
      { status: 500 }
    );
  }
}

// DELETE /api/scholarships/[id] - Delete scholarship (Admin only)
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

    // Check if scholarship exists
    const existingScholarship = await prisma.scholarship.findFirst({
      where: {
        OR: [{ id }, { scholarshipId: id }],
      },
    });

    if (!existingScholarship) {
      return NextResponse.json(
        { success: false, error: 'Scholarship not found' },
        { status: 404 }
      );
    }

    await prisma.scholarship.delete({
      where: { id: existingScholarship.id },
    });

    return NextResponse.json({ success: true, message: 'Scholarship deleted successfully' });
  } catch (error) {
    console.error('Error deleting scholarship:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to delete scholarship' },
      { status: 500 }
    );
  }
}
