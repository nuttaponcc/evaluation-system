import { useState } from "react";
import { useLocation } from "wouter";
import { trpc } from "@/lib/trpc";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { toast } from "sonner";
import { Plus, Search, Pencil, Trash2, Eye, EyeOff, FileText } from "lucide-react";

export default function CoursesAdmin() {
  const [, setLocation] = useLocation();
  const [search, setSearch] = useState("");
  const [offset, setOffset] = useState(0);
  const limit = 10;

  const { data, isLoading, refetch } = trpc.courses.list.useQuery({
    search,
    limit,
    offset,
  });

  const deleteMutation = trpc.courses.delete.useMutation({
    onSuccess: () => {
      toast.success("ลบหลักสูตรสำเร็จ");
      refetch();
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const toggleActiveMutation = trpc.courses.toggleActive.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตสถานะสำเร็จ");
      refetch();
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const handleDelete = (id: number, title: string) => {
    if (confirm(`คุณต้องการลบหลักสูตร "${title}" ใช่หรือไม่?`)) {
      deleteMutation.mutate({ id });
    }
  };

  const handleToggleActive = (id: number, currentStatus: boolean) => {
    toggleActiveMutation.mutate({ id, isActive: !currentStatus });
  };

  const totalPages = data ? Math.ceil(data.total / limit) : 0;
  const currentPage = Math.floor(offset / limit) + 1;

  return (
    <div className="container py-8">
      <div className="flex justify-between items-center mb-6">
        <div>
          <h1 className="text-3xl font-bold">จัดการหลักสูตร</h1>
          <p className="text-muted-foreground">เพิ่ม แก้ไข และจัดการหลักสูตรทั้งหมด</p>
        </div>
        <Button onClick={() => setLocation("/admin/courses/new")} className="gap-2">
          <Plus className="h-4 w-4" />
          เพิ่มหลักสูตร
        </Button>
      </div>

      <Card className="mb-6">
        <CardContent className="pt-6">
          <div className="flex gap-4">
            <div className="relative flex-1">
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-muted-foreground" />
              <Input
                placeholder="ค้นหาหลักสูตร..."
                value={search}
                onChange={(e) => {
                  setSearch(e.target.value);
                  setOffset(0);
                }}
                className="pl-10"
              />
            </div>
          </div>
        </CardContent>
      </Card>

      {isLoading ? (
        <div className="text-center py-8">กำลังโหลด...</div>
      ) : data && data.data.length > 0 ? (
        <>
          <div className="grid gap-4">
            {data.data.map((course) => (
              <Card key={course.id}>
                <CardHeader>
                  <div className="flex justify-between items-start">
                    <div className="flex-1">
                      <div className="flex items-center gap-2 mb-2">
                        <CardTitle>{course.title}</CardTitle>
                        <Badge variant={course.isActive ? "default" : "secondary"}>
                          {course.isActive ? "เปิดใช้งาน" : "ปิดใช้งาน"}
                        </Badge>
                        {course.documentUrl && (
                          <Badge variant="outline" className="gap-1">
                            <FileText className="h-3 w-3" />
                            มีเอกสาร
                          </Badge>
                        )}
                      </div>
                      <CardDescription className="line-clamp-2">
                        {course.description}
                      </CardDescription>
                    </div>
                  </div>
                </CardHeader>
                <CardContent>
                  <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 text-sm">
                    <div>
                      <span className="text-muted-foreground">รหัสวิชา:</span>
                      <p className="font-medium">{course.code}</p>
                    </div>
                    <div>
                      <span className="text-muted-foreground">หน่วยกิต:</span>
                      <p className="font-medium">{course.credits} หน่วยกิต</p>
                    </div>
                    <div>
                      <span className="text-muted-foreground">ประเภท:</span>
                      <p className="font-medium">
                        {course.courseType === "required" ? "บังคับ" : course.courseType === "elective" ? "เลือก" : "ศึกษาทั่วไป"}
                      </p>
                    </div>
                    <div>
                      <span className="text-muted-foreground">ผู้สอน:</span>
                      <p className="font-medium">{course.instructor?.name || "-"}</p>
                    </div>
                  </div>

                  <div className="flex gap-2">
                    <Button
                      variant="outline"
                      size="sm"
                      onClick={() => setLocation(`/admin/courses/${course.id}/edit`)}
                      className="gap-2"
                    >
                      <Pencil className="h-4 w-4" />
                      แก้ไข
                    </Button>
                    {course.documentUrl && (
                      <Button
                        variant="outline"
                        size="sm"
                        onClick={() => window.open(course.documentUrl!, "_blank")}
                        className="gap-2"
                      >
                        <FileText className="h-4 w-4" />
                        ดูเอกสาร
                      </Button>
                    )}
                    <Button
                      variant="outline"
                      size="sm"
                      onClick={() => handleToggleActive(course.id, course.isActive)}
                      className="gap-2"
                    >
                      {course.isActive ? (
                        <>
                          <EyeOff className="h-4 w-4" />
                          ปิดใช้งาน
                        </>
                      ) : (
                        <>
                          <Eye className="h-4 w-4" />
                          เปิดใช้งาน
                        </>
                      )}
                    </Button>
                    <Button
                      variant="destructive"
                      size="sm"
                      onClick={() => handleDelete(course.id, course.title)}
                      className="gap-2"
                    >
                      <Trash2 className="h-4 w-4" />
                      ลบ
                    </Button>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>

          {totalPages > 1 && (
            <div className="flex justify-center gap-2 mt-6">
              <Button
                variant="outline"
                onClick={() => setOffset(Math.max(0, offset - limit))}
                disabled={offset === 0}
              >
                ก่อนหน้า
              </Button>
              <span className="flex items-center px-4">
                หน้า {currentPage} / {totalPages}
              </span>
              <Button
                variant="outline"
                onClick={() => setOffset(offset + limit)}
                disabled={offset + limit >= data.total}
              >
                ถัดไป
              </Button>
            </div>
          )}
        </>
      ) : (
        <Card>
          <CardContent className="text-center py-8">
            <p className="text-muted-foreground">ไม่พบหลักสูตร</p>
          </CardContent>
        </Card>
      )}
    </div>
  );
}
