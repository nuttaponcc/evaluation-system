import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { trpc } from "@/lib/trpc";
import { Link, useLocation } from "wouter";
import { useState } from "react";
import { Loader2, Plus, Search, Pencil, Trash2, Calendar, MapPin, Users } from "lucide-react";
import { toast } from "sonner";
import { Badge } from "@/components/ui/badge";

export default function AdminActivities() {
  const [, setLocation] = useLocation();
  const [search, setSearch] = useState("");
  const [page, setPage] = useState(1);
  const limit = 10;
  const offset = (page - 1) * limit;

  const { data, isLoading, refetch } = trpc.activities.list.useQuery({
    search,
    limit,
    offset,
  });

  const deleteMutation = trpc.activities.delete.useMutation({
    onSuccess: () => {
      toast.success("ลบกิจกรรมสำเร็จ");
      refetch();
    },
    onError: (error) => {
      toast.error(`เกิดข้อผิดพลาด: ${error.message}`);
    },
  });

  const toggleActiveMutation = trpc.activities.toggleActive.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตสถานะสำเร็จ");
      refetch();
    },
    onError: (error) => {
      toast.error(`เกิดข้อผิดพลาด: ${error.message}`);
    },
  });

  const handleDelete = (id: number, title: string) => {
    if (confirm(`คุณต้องการลบกิจกรรม "${title}" ใช่หรือไม่?`)) {
      deleteMutation.mutate({ id });
    }
  };

  const handleToggleActive = (id: number, currentStatus: boolean) => {
    toggleActiveMutation.mutate({ id, isActive: !currentStatus });
  };

  const formatDate = (date: Date | null) => {
    if (!date) return "-";
    return new Date(date).toLocaleDateString("th-TH", {
      year: "numeric",
      month: "long",
      day: "numeric",
    });
  };

  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-3xl font-bold">จัดการกิจกรรม</h1>
          <p className="text-muted-foreground mt-1">
            จัดการข้อมูลกิจกรรมและอีเวนต์ต่างๆ
          </p>
        </div>
        <Button onClick={() => setLocation("/admin/activities/new")} className="gap-2">
          <Plus className="h-4 w-4" />
          เพิ่มกิจกรรมใหม่
        </Button>
      </div>

      <Card>
        <CardHeader>
          <CardTitle>รายการกิจกรรม</CardTitle>
        </CardHeader>
        <CardContent>
          <div className="mb-6">
            <div className="relative">
              <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
              <Input
                placeholder="ค้นหากิจกรรม..."
                value={search}
                onChange={(e) => {
                  setSearch(e.target.value);
                  setPage(1);
                }}
                className="pl-10"
              />
            </div>
          </div>

          {isLoading ? (
            <div className="flex items-center justify-center py-12">
              <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
            </div>
          ) : !data?.data.length ? (
            <div className="text-center py-12 text-muted-foreground">
              ไม่พบข้อมูลกิจกรรม
            </div>
          ) : (
            <>
              <div className="space-y-4">
                {data.data.map((activity: any) => (
                  <Card key={activity.id} className="overflow-hidden">
                    <CardContent className="p-6">
                      <div className="flex items-start justify-between gap-4">
                        <div className="flex-1 space-y-3">
                          <div className="flex items-start gap-3">
                            <div className="flex-1">
                              <div className="flex items-center gap-2 mb-1">
                                <h3 className="text-lg font-semibold">{activity.title}</h3>
                                <Badge variant={activity.isActive ? "default" : "secondary"}>
                                  {activity.isActive ? "เปิดใช้งาน" : "ปิดใช้งาน"}
                                </Badge>
                                <Badge variant="outline">{activity.type}</Badge>
                              </div>
                              <p className="text-sm text-muted-foreground line-clamp-2">
                                {activity.description}
                              </p>
                            </div>
                          </div>

                          <div className="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div className="flex items-center gap-2 text-muted-foreground">
                              <Calendar className="h-4 w-4" />
                              <span>
                                {formatDate(activity.startDate)}
                                {activity.endDate && ` - ${formatDate(activity.endDate)}`}
                              </span>
                            </div>
                            {activity.location && (
                              <div className="flex items-center gap-2 text-muted-foreground">
                                <MapPin className="h-4 w-4" />
                                <span>{activity.location}</span>
                              </div>
                            )}
                            {activity.maxParticipants && (
                              <div className="flex items-center gap-2 text-muted-foreground">
                                <Users className="h-4 w-4" />
                                <span>จำนวนจำกัด {activity.maxParticipants} คน</span>
                              </div>
                            )}
                          </div>

                          {activity.organizer && (
                            <div className="text-sm">
                              <span className="text-muted-foreground">ผู้จัด: </span>
                              <span className="font-medium">{activity.organizer}</span>
                            </div>
                          )}
                        </div>

                        <div className="flex flex-col gap-2">
                          <Button
                            variant="outline"
                            size="sm"
                            onClick={() => setLocation(`/admin/activities/${activity.id}/edit`)}
                            className="gap-2"
                          >
                            <Pencil className="h-4 w-4" />
                            แก้ไข
                          </Button>
                          <Button
                            variant="outline"
                            size="sm"
                            onClick={() => handleToggleActive(activity.id, activity.isActive)}
                            disabled={toggleActiveMutation.isPending}
                          >
                            {activity.isActive ? "ปิดใช้งาน" : "เปิดใช้งาน"}
                          </Button>
                          <Button
                            variant="outline"
                            size="sm"
                            onClick={() => handleDelete(activity.id, activity.title)}
                            disabled={deleteMutation.isPending}
                            className="gap-2 text-destructive hover:text-destructive"
                          >
                            <Trash2 className="h-4 w-4" />
                            ลบ
                          </Button>
                        </div>
                      </div>
                    </CardContent>
                  </Card>
                ))}
              </div>

              {data && Math.ceil(data.total / limit) > 1 && (
                <div className="flex items-center justify-center gap-2 mt-6">
                  <Button
                    variant="outline"
                    size="sm"
                    onClick={() => setPage((p) => Math.max(1, p - 1))}
                    disabled={page === 1}
                  >
                    ก่อนหน้า
                  </Button>
                  <span className="text-sm text-muted-foreground">
                    หน้า {page} จาก {Math.ceil(data.total / limit)}
                  </span>
                  <Button
                    variant="outline"
                    size="sm"
                    onClick={() => setPage((p) => Math.min(Math.ceil(data.total / limit), p + 1))}
                    disabled={page === Math.ceil(data.total / limit)}
                  >
                    ถัดไป
                  </Button>
                </div>
              )}
            </>
          )}
        </CardContent>
      </Card>
    </div>
  );
}
