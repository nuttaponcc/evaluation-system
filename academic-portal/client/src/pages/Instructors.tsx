import PublicLayout from "@/components/PublicLayout";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { trpc } from "@/lib/trpc";
import { Link } from "wouter";
import { useState } from "react";
import {
  Search,
  Mail,
  Phone,
  MapPin,
  ChevronLeft,
  ChevronRight,
  AlertCircle,
  Loader2,
  User,
} from "lucide-react";

const ITEMS_PER_PAGE = 12;

export default function Instructors() {
  const [search, setSearch] = useState("");
  const [department, setDepartment] = useState<string>("all");
  const [page, setPage] = useState(1);

  const { data, isLoading } = trpc.instructors.list.useQuery({
    search: search || undefined,
    department: department === "all" ? undefined : department,
    isActive: true,
    limit: ITEMS_PER_PAGE,
    offset: (page - 1) * ITEMS_PER_PAGE,
  });

  const totalPages = Math.ceil((data?.total || 0) / ITEMS_PER_PAGE);

  const getInitials = (name: string) => {
    const parts = name.split(" ");
    if (parts.length >= 2) {
      return parts[0][0] + parts[1][0];
    }
    return name.substring(0, 2);
  };

  return (
    <PublicLayout>
      <div className="container py-8">
        {/* Header */}
        <div className="page-header">
          <h1 className="page-title">อาจารย์</h1>
          <p className="page-description">
            คณาจารย์และบุคลากรทางการศึกษา
          </p>
        </div>

        {/* Filters */}
        <div className="flex flex-col sm:flex-row gap-4 mb-8">
          <div className="relative flex-1">
            <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
            <Input
              placeholder="ค้นหาอาจารย์..."
              value={search}
              onChange={(e) => {
                setSearch(e.target.value);
                setPage(1);
              }}
              className="pl-10"
            />
          </div>
          <Select
            value={department}
            onValueChange={(value) => {
              setDepartment(value);
              setPage(1);
            }}
          >
            <SelectTrigger className="w-full sm:w-48">
              <SelectValue placeholder="ภาควิชา" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="all">ทุกภาควิชา</SelectItem>
              <SelectItem value="computer">วิศวกรรมคอมพิวเตอร์</SelectItem>
              <SelectItem value="electrical">วิศวกรรมไฟฟ้า</SelectItem>
              <SelectItem value="mechanical">วิศวกรรมเครื่องกล</SelectItem>
              <SelectItem value="civil">วิศวกรรมโยธา</SelectItem>
              <SelectItem value="chemical">วิศวกรรมเคมี</SelectItem>
              <SelectItem value="industrial">วิศวกรรมอุตสาหการ</SelectItem>
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
              <h3 className="text-lg font-semibold mb-2">ไม่พบอาจารย์</h3>
              <p className="text-muted-foreground">
                ลองเปลี่ยนคำค้นหาหรือตัวกรองใหม่
              </p>
            </CardContent>
          </Card>
        ) : (
          <>
            <div className="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
              {data?.data.map((instructor) => (
                <Link key={instructor.id} href={`/instructors/${instructor.id}`}>
                  <Card className="h-full card-hover cursor-pointer">
                    <CardHeader className="text-center">
                      <Avatar className="h-24 w-24 mx-auto mb-4">
                        <AvatarImage src={instructor.imageUrl || undefined} alt={instructor.name} />
                        <AvatarFallback className="text-lg">
                          {getInitials(instructor.name)}
                        </AvatarFallback>
                      </Avatar>
                      <CardTitle className="text-lg">
                        {instructor.title} {instructor.name}
                      </CardTitle>
                      {instructor.department && (
                        <CardDescription>{instructor.department}</CardDescription>
                      )}
                    </CardHeader>
                    <CardContent>
                      <div className="space-y-2 text-sm text-muted-foreground">
                        {instructor.email && (
                          <div className="flex items-center gap-2">
                            <Mail className="h-4 w-4 flex-shrink-0" />
                            <span className="truncate">{instructor.email}</span>
                          </div>
                        )}
                        {instructor.phone && (
                          <div className="flex items-center gap-2">
                            <Phone className="h-4 w-4 flex-shrink-0" />
                            <span>{instructor.phone}</span>
                          </div>
                        )}
                        {instructor.office && (
                          <div className="flex items-center gap-2">
                            <MapPin className="h-4 w-4 flex-shrink-0" />
                            <span className="truncate">{instructor.office}</span>
                          </div>
                        )}
                      </div>
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
