import { NextResponse } from 'next/server';
import { prisma } from '@/lib/prisma';
import { auth } from '@/lib/auth';

// GET /api/stats - Get dashboard statistics (Admin/Editor only)
export async function GET() {
  try {
    const session = await auth();
    if (!session || !['ADMIN', 'EDITOR'].includes(session.user.role)) {
      return NextResponse.json(
        { success: false, error: 'Unauthorized' },
        { status: 401 }
      );
    }

    const now = new Date();

    // Jobs stats
    const [totalJobs, activeJobs, urgentJobs] = await Promise.all([
      prisma.job.count(),
      prisma.job.count({ where: { isActive: true } }),
      prisma.job.count({ where: { isUrgent: true, isActive: true } }),
    ]);

    // Scholarships stats
    const [totalScholarships, activeScholarships, upcomingScholarships] = await Promise.all([
      prisma.scholarship.count(),
      prisma.scholarship.count({ where: { isActive: true } }),
      prisma.scholarship.count({
        where: {
          isActive: true,
          applicationDeadline: { gte: now },
        },
      }),
    ]);

    // Activities stats
    const [totalActivities, activeActivities, upcomingActivities] = await Promise.all([
      prisma.activity.count(),
      prisma.activity.count({ where: { isActive: true } }),
      prisma.activity.count({
        where: {
          isActive: true,
          startDatetime: { gte: now },
        },
      }),
    ]);

    // Courses stats
    const [totalCourses, activeCourses, internalCourses, externalCourses] = await Promise.all([
      prisma.course.count(),
      prisma.course.count({ where: { isActive: true } }),
      prisma.course.count({ where: { type: 'INTERNAL', isActive: true } }),
      prisma.course.count({ where: { type: 'EXTERNAL', isActive: true } }),
    ]);

    // Instructors stats
    const [totalInstructors, activeInstructors] = await Promise.all([
      prisma.instructor.count(),
      prisma.instructor.count({ where: { isActive: true } }),
    ]);

    const stats = {
      jobs: {
        total: totalJobs,
        active: activeJobs,
        urgent: urgentJobs,
      },
      scholarships: {
        total: totalScholarships,
        active: activeScholarships,
        upcoming: upcomingScholarships,
      },
      activities: {
        total: totalActivities,
        active: activeActivities,
        upcoming: upcomingActivities,
      },
      courses: {
        total: totalCourses,
        active: activeCourses,
        internal: internalCourses,
        external: externalCourses,
      },
      instructors: {
        total: totalInstructors,
        active: activeInstructors,
      },
    };

    return NextResponse.json({ success: true, data: stats });
  } catch (error) {
    console.error('Error fetching stats:', error);
    return NextResponse.json(
      { success: false, error: 'Failed to fetch stats' },
      { status: 500 }
    );
  }
}
