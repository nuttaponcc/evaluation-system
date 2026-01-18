import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';
import { format, formatDistanceToNow, isAfter, isBefore, parseISO } from 'date-fns';
import { th } from 'date-fns/locale';

// Tailwind CSS class merger
export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}

// Generate unique ID with prefix
export function generateId(prefix: string): string {
  const timestamp = Date.now().toString(36);
  const randomStr = Math.random().toString(36).substring(2, 8);
  return `${prefix}-${timestamp}-${randomStr}`.toUpperCase();
}

// Format date in Thai
export function formatDate(date: Date | string, formatStr: string = 'dd MMMM yyyy'): string {
  const d = typeof date === 'string' ? parseISO(date) : date;
  return format(d, formatStr, { locale: th });
}

// Format datetime in Thai
export function formatDateTime(date: Date | string): string {
  const d = typeof date === 'string' ? parseISO(date) : date;
  return format(d, 'dd MMMM yyyy HH:mm น.', { locale: th });
}

// Format relative time in Thai
export function formatRelativeTime(date: Date | string): string {
  const d = typeof date === 'string' ? parseISO(date) : date;
  return formatDistanceToNow(d, { addSuffix: true, locale: th });
}

// Format currency in Thai Baht
export function formatCurrency(amount: number | null | undefined): string {
  if (amount === null || amount === undefined) return '-';
  return new Intl.NumberFormat('th-TH', {
    style: 'currency',
    currency: 'THB',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(amount);
}

// Format salary range
export function formatSalaryRange(min: number | null | undefined, max: number | null | undefined): string {
  if (!min && !max) return 'ไม่ระบุ';
  if (min && !max) return `${formatCurrency(min)} ขึ้นไป`;
  if (!min && max) return `ไม่เกิน ${formatCurrency(max)}`;
  if (min === max) return formatCurrency(min);
  return `${formatCurrency(min)} - ${formatCurrency(max)}`;
}

// Check if date is in the past
export function isPast(date: Date | string): boolean {
  const d = typeof date === 'string' ? parseISO(date) : date;
  return isBefore(d, new Date());
}

// Check if date is in the future
export function isFuture(date: Date | string): boolean {
  const d = typeof date === 'string' ? parseISO(date) : date;
  return isAfter(d, new Date());
}

// Truncate text
export function truncateText(text: string, maxLength: number): string {
  if (text.length <= maxLength) return text;
  return text.substring(0, maxLength) + '...';
}

// Job type labels in Thai
export const jobTypeLabels: Record<string, string> = {
  FULL_TIME: 'งานประจำ',
  PART_TIME: 'งาน Part-time',
  INTERNSHIP: 'ฝึกงาน',
  CONTRACT: 'สัญญาจ้าง',
};

// Scholarship type labels in Thai
export const scholarshipTypeLabels: Record<string, string> = {
  COMPANY: 'ทุนจากบริษัท',
  INBOUND: 'ทุนศึกษาต่อในประเทศ',
  OUTBOUND: 'ทุนศึกษาต่อต่างประเทศ',
  SPECIAL: 'ทุนพิเศษ',
};

// Course type labels in Thai
export const courseTypeLabels: Record<string, string> = {
  INTERNAL: 'หลักสูตรภายใน',
  EXTERNAL: 'หลักสูตรภายนอก',
};

// User role labels in Thai
export const userRoleLabels: Record<string, string> = {
  ADMIN: 'ผู้ดูแลระบบ',
  EDITOR: 'ผู้แก้ไข',
  VIEWER: 'ผู้ดู',
};

// Get status badge color
export function getStatusColor(isActive: boolean): string {
  return isActive ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800';
}

// Get urgency badge color
export function getUrgencyColor(isUrgent: boolean): string {
  return isUrgent ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800';
}

// Parse query params for pagination
export function parsePaginationParams(searchParams: URLSearchParams) {
  const page = parseInt(searchParams.get('page') || '1');
  const limit = parseInt(searchParams.get('limit') || '20');
  const search = searchParams.get('search') || '';
  
  return {
    page: isNaN(page) || page < 1 ? 1 : page,
    limit: isNaN(limit) || limit < 1 || limit > 100 ? 20 : limit,
    search,
    skip: (page - 1) * limit,
  };
}

// Calculate pagination metadata
export function calculatePagination(total: number, page: number, limit: number) {
  return {
    page,
    limit,
    total,
    totalPages: Math.ceil(total / limit),
  };
}

// Sanitize HTML (basic)
export function sanitizeHtml(html: string): string {
  return html
    .replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, '')
    .replace(/<iframe\b[^<]*(?:(?!<\/iframe>)<[^<]*)*<\/iframe>/gi, '')
    .replace(/on\w+="[^"]*"/gi, '')
    .replace(/on\w+='[^']*'/gi, '');
}
