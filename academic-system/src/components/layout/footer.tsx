import Link from 'next/link';
import { GraduationCap, Mail, Phone, MapPin } from 'lucide-react';

export function Footer() {
  return (
    <footer className="border-t bg-muted/50">
      <div className="container py-12">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          {/* Brand */}
          <div className="space-y-4">
            <Link href="/" className="flex items-center space-x-2">
              <GraduationCap className="h-6 w-6 text-primary" />
              <span className="font-bold text-xl">งานวิชาการ</span>
            </Link>
            <p className="text-sm text-muted-foreground">
              ระบบบริการงานวิชาการ คณะวิศวกรรมศาสตร์
            </p>
          </div>

          {/* Quick Links */}
          <div className="space-y-4">
            <h3 className="font-semibold">ลิงก์ด่วน</h3>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li>
                <Link href="/jobs" className="hover:text-primary transition-colors">
                  ประกาศรับสมัครงาน
                </Link>
              </li>
              <li>
                <Link href="/scholarships" className="hover:text-primary transition-colors">
                  ทุนการศึกษา
                </Link>
              </li>
              <li>
                <Link href="/activities" className="hover:text-primary transition-colors">
                  กิจกรรม
                </Link>
              </li>
              <li>
                <Link href="/courses" className="hover:text-primary transition-colors">
                  หลักสูตรอบรม
                </Link>
              </li>
            </ul>
          </div>

          {/* Resources */}
          <div className="space-y-4">
            <h3 className="font-semibold">ทรัพยากร</h3>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li>
                <Link href="/instructors" className="hover:text-primary transition-colors">
                  รายชื่ออาจารย์
                </Link>
              </li>
              <li>
                <a href="#" className="hover:text-primary transition-colors">
                  เว็บไซต์คณะ
                </a>
              </li>
              <li>
                <a href="#" className="hover:text-primary transition-colors">
                  ระบบสารสนเทศ
                </a>
              </li>
            </ul>
          </div>

          {/* Contact */}
          <div className="space-y-4">
            <h3 className="font-semibold">ติดต่อเรา</h3>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li className="flex items-center space-x-2">
                <MapPin className="h-4 w-4" />
                <span>คณะวิศวกรรมศาสตร์</span>
              </li>
              <li className="flex items-center space-x-2">
                <Phone className="h-4 w-4" />
                <span>02-XXX-XXXX</span>
              </li>
              <li className="flex items-center space-x-2">
                <Mail className="h-4 w-4" />
                <span>academic@eng.example.ac.th</span>
              </li>
            </ul>
          </div>
        </div>

        <div className="mt-8 pt-8 border-t text-center text-sm text-muted-foreground">
          <p>&copy; {new Date().getFullYear()} งานวิชาการ คณะวิศวกรรมศาสตร์. All rights reserved.</p>
        </div>
      </div>
    </footer>
  );
}
