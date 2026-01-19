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
  MapPin,
  Calendar,
  Users,
  ChevronLeft,
  ChevronRight,
  AlertCircle,
  Loader2,
  Video,
  Banknote,
} from "lucide-react";

const activityTypeLabels: Record<string, string> = {
  workshop: "เวิร์คช็อป",
  seminar: "สัมมนา",
  competition: "การแข่งขัน",
  exhibition: "นิทรรศการ",
  other: "อื่นๆ",
};

const activityTypeColors: Record<string, string> = {
  workshop: "bg-blue-100 text-blue-800",
  seminar: "bg-green-100 text-green-800",
  competition: "bg-red-100 text-red-800",
  exhibition: "bg-purple-100 text-purple-800",
  other: "bg-gray-100 text-gray-800",
};

const ITEMS_PER_PAGE = 9;

export default function Activities() {
  const [search, setSearch] = useState("");
  const [activityType, setActivityType] = useState<string>("all");
  const [page, setPage] = useState(1);

  const { data, isLoading } = trpc.activities.list.useQuery({
    search: search || undefined,
    activityType: activityType === "all" ? undefined : activityType,
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
          <h1 className="page-title">กิจกรรม</h1>
          <p className="page-description">
            กิจกรรมและอีเวนต์ที่น่าสนใจ
          </p>
        </div>

        {/* Filters */}
        <div className="flex flex-col sm:flex-row gap-4 mb-8">
          <div className="relative flex-1">
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
          <Select
            value={activityType}
            onValueChange={(value) => {
              setActivityType(value);
              setPage(1);
            }}
          >
            <SelectTrigger className="w-full sm:w-48">
              <SelectValue placeholder="ประเภทกิจกรรม" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="all">ทุกประเภท</SelectItem>
              <SelectItem value="workshop">เวิร์คช็อป</SelectItem>
              <SelectItem value="seminar">สัมมนา</SelectItem>
              <SelectItem value="competition">การแข่งขัน</SelectItem>
              <SelectItem value="exhibition">นิทรรศการ</SelectItem>
              <SelectItem value="other">อื่นๆ</SelectItem>
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
              <h3 className="text-lg font-semibold mb-2">ไม่พบกิจกรรม</h3>
              <p className="text-muted-foreground">
                ลองเปลี่ยนคำค้นหาหรือตัวกรองใหม่
              </p>
            </CardContent>
          </Card>
        ) : (
          <>
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
              {data?.data.map((activity) => (
                <Link key={activity.id} href={`/activities/${activity.id}`}>
                  <Card className="h-full card-hover cursor-pointer">
                    <CardHeader>
                      <div className="flex items-start justify-between gap-2">
                        <div className="flex-1 min-w-0">
                          <CardTitle className="text-lg line-clamp-2">{activity.title}</CardTitle>
                          <CardDescription className="mt-1">
                            {activity.organizer}
                          </CardDescription>
                        </div>
                        <Badge className={activityTypeColors[activity.activityType]}>
                          {activityTypeLabels[activity.activityType]}
                        </Badge>
                      </div>
                    </CardHeader>
                    <CardContent>
                      <div className="space-y-2 text-sm text-muted-foreground">
                        <div className="flex items-center gap-2">
                          <Calendar className="h-4 w-4 flex-shrink-0" />
                          <span>
                            {new Date(activity.startDate).toLocaleDateString("th-TH", {
                              year: "numeric",
                              month: "short",
                              day: "numeric",
                            })}
                            {activity.endDate && activity.endDate !== activity.startDate && (
                              <> - {new Date(activity.endDate).toLocaleDateString("th-TH", {
                                year: "numeric",
                                month: "short",
                                day: "numeric",
                              })}</>
                            )}
                          </span>
                        </div>
                        <div className="flex items-center gap-2">
                          {activity.isOnline ? (
                            <>
                              <Video className="h-4 w-4 flex-shrink-0" />
                              <span>ออนไลน์</span>
                            </>
                          ) : (
                            <>
                              <MapPin className="h-4 w-4 flex-shrink-0" />
                              <span className="truncate">{activity.location}</span>
                            </>
                          )}
                        </div>
                        {activity.maxParticipants && (
                          <div className="flex items-center gap-2">
                            <Users className="h-4 w-4 flex-shrink-0" />
                            <span>รับ {activity.maxParticipants} คน</span>
                          </div>
                        )}
                        <div className="flex items-center gap-2">
                          <Banknote className="h-4 w-4 flex-shrink-0" />
                          <span>
                            {activity.registrationFee === 0 ? "ฟรี" : `${activity.registrationFee?.toLocaleString()} บาท`}
                          </span>
                        </div>
                      </div>
                      {activity.registrationDeadline && (
                        <div className="mt-4 pt-4 border-t text-sm">
                          <span className="text-muted-foreground">ปิดรับสมัคร: </span>
                          <span className="font-medium">
                            {new Date(activity.registrationDeadline).toLocaleDateString("th-TH", {
                              year: "numeric",
                              month: "long",
                              day: "numeric",
                            })}
                          </span>
                        </div>
                      )}
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
