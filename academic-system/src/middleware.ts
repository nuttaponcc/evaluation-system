import { auth } from '@/lib/auth';
import { NextResponse } from 'next/server';

export default auth((req) => {
  const { nextUrl } = req;
  const isLoggedIn = !!req.auth;
  const isAdminRoute = nextUrl.pathname.startsWith('/admin');
  const isLoginPage = nextUrl.pathname === '/admin/login';
  const isApiRoute = nextUrl.pathname.startsWith('/api');

  // Allow API routes to handle their own auth
  if (isApiRoute) {
    return NextResponse.next();
  }

  // If on login page and already logged in, redirect to admin
  if (isLoginPage && isLoggedIn) {
    return NextResponse.redirect(new URL('/admin', nextUrl));
  }

  // If accessing admin routes without being logged in, redirect to login
  if (isAdminRoute && !isLoginPage && !isLoggedIn) {
    return NextResponse.redirect(new URL('/admin/login', nextUrl));
  }

  // Check role-based access for admin routes
  if (isAdminRoute && !isLoginPage && isLoggedIn) {
    const userRole = req.auth?.user?.role;
    if (userRole !== 'ADMIN' && userRole !== 'EDITOR') {
      return NextResponse.redirect(new URL('/admin/login', nextUrl));
    }
  }

  return NextResponse.next();
});

export const config = {
  matcher: ['/admin/:path*'],
};
