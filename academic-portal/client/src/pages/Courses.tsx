import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Badge } from "@/components/ui/badge";
import { trpc } from "@/lib/trpc";
import { Link } from "wouter";
import { useState } from "react";
import {
  Search,
  BookOpen,
  Clock,
  ChevronLeft,
  ChevronRight,
  AlertCircle,
  Loader2,
  GraduationCap,
  Users,
} from "lucide-react";

const levelLabels: Record<string, string> = {
  bachelor: "ปริญญาตรี",
  master: "ปริญญาโท",
  doctoral: "ปริญญาเอก",
  certificate: "ประกาศนียบัตร",
};

const levelColors: Record<string, string> = {
  bachelor: "bg-blue-100 text-blue-800",
  master: "bg-purple-100 text-purple-800",
  doctoral: "bg-red-100 text-red-800",
  certificate: "bg-green-100 text-green-800",
};

const ITEMS_PER_PAGE = 9;

export default function Courses() {
  const [search, setSearch] = useState("");
  const [level, setLevel] = useState<string>("all");
  const [page, setPage] = useState(1);

  const { data, isLoading } = trpc.courses.list.useQuery({
    search: search || undefined,
    level: level === "all" ? undefined : level,
    isActive: true,
    limit: ITEMS_PER_PAGE,
    offset: (page - 1) * ITEMS_PER_PAGE,
  });

  const totalPages = Math.ceil((data?.total || 0) / ITEMS_PER_PAGE);

  return (
    <PublicLayout>
      <div className="container py-8">
        {/* Header */}
        <div className="page-header">
          <h1 className="page-title">หลักสูตร</h1>
          <p className="page-description">
            หลักสูตรการเรียนการสอนที่หลากหลาย
          </p>
        </div>

        {/* Filters */}
        <div className="flex flex-col sm:flex-row gap-4 mb-8">
          <div className="relative flex-1">
            <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
            <Input
              placeholder="ค้นหาหลักสูตร..."
              value={search}
              onChange={(e) => {
                setSearch(e.target.value);
                setPage(1);
              }}
              className="pl-10"
            />
          </div>
          <Select
            value={level}
            onValueChange={(value) => {
              setLevel(value);
              setPage(1);
            }}
          >
            <SelectTrigger className="w-full sm:w-48">
              <SelectValue placeholder="ระดับการศึกษา" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="all">ทุกระดับ</SelectItem>
              <SelectItem value="bachelor">ปริญญาตรี</SelectItem>
              <SelectItem value="master">ปริญญาโท</SelectItem>
              <SelectItem value="doctoral">ปริญญาเอก</SelectItem>
              <SelectItem value="certificate">ประกาศนียบัตร</SelectItem>
            </SelectContent>
          </Select>
        </div>

        {/* Results */}
        {isLoading ? (
          <div className="flex items-center justify-center py-12">
            <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
          </div>
        ) : data?.data.length === 0 ? (
          <Card className="text-center py-12">
            <CardContent>
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบหลักสูตร</h3>
              <p className="text-muted-foreground">
                ลองเปลี่ยนคำค้นหาหรือตัวกรองใหม่
              </p>
            </CardContent>
          </Card>
        ) : (
          <>
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
              {data?.data.map((course) => (
                <Link key={course.id} href={`/courses/${course.id}`}>
                  <Card className="h-full card-hover cursor-pointer">
                    <CardHeader>
                      <div className="flex items-start justify-between gap-2">
                        <div className="flex-1 min-w-0">
                          <div className="text-sm text-muted-foreground mb-1">{course.code}</div>
                          <CardTitle className="text-lg line-clamp-2">{course.title}</CardTitle>
                          {course.titleEn && (
                            <CardDescription className="mt-1">
                              {course.titleEn}
                            </CardDescription>
                          )}
                        </div>
                        <Badge className={levelColors[course.level]}>
                          {levelLabels[course.level]}
                        </Badge>
                      </div>
                    </CardHeader>
                    <CardContent>
                      <div className="space-y-2 text-sm text-muted-foreground">
                        <div className="flex items-center gap-2">
                          <BookOpen className="h-4 w-4 flex-shrink-0" />
                          <span>{course.credits} หน่วยกิต</span>
                        </div>
                        <div className="flex items-center gap-2">
                          <GraduationCap className="h-4 w-4 flex-shrink-0" />
                          <span>{course.courseType === 'required' ? 'วิชาบังคับ' : course.courseType === 'elective' ? 'วิชาเลือก' : 'วิชาศึกษาทั่วไป'}</span>
                        </div>
                        {course.instructor && (
                          <div className="flex items-center gap-2">
                            <Users className="h-4 w-4 flex-shrink-0" />
                            <span className="line-clamp-1">
                              {course.instructor.title} {course.instructor.name}
                            </span>
                          </div>
                        )}
                      </div>
                      <p className="mt-4 text-sm text-muted-foreground line-clamp-2">
                        {course.description}
                      </p>
                    </CardContent>
                  </Card>
                </Link>
              ))}
            </div>

            {/* Pagination */}
            {totalPages > 1 && (
              <div className="flex items-center justify-center gap-2">
                <Button
                  variant="outline"
                  size="icon"
                  onClick={() => setPage((p) => Math.max(1, p - 1))}
                  disabled={page === 1}
                >
                  <ChevronLeft className="h-4 w-4" />
                </Button>
                <span className="text-sm text-muted-foreground px-4">
                  หน้า {page} จาก {totalPages}
                </span>
                <Button
                  variant="outline"
                  size="icon"
                  onClick={() => setPage((p) => Math.min(totalPages, p + 1))}
                  disabled={page === totalPages}
                >
                  <ChevronRight className="h-4 w-4" />
                </Button>
              </div>
            )}
          </>
        )}
      </div>
    </PublicLayout>
  );
}
