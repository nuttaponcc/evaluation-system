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
  GraduationCap,
  Building2,
  Calendar,
  Banknote,
  ChevronLeft,
  ChevronRight,
  AlertCircle,
  Loader2,
} from "lucide-react";

const scholarshipTypeLabels: Record<string, string> = {
  full: "ทุนเต็มจำนวน",
  partial: "ทุนบางส่วน",
  grant: "ทุนให้เปล่า",
  loan: "ทุนกู้ยืม",
};

const scholarshipTypeColors: Record<string, string> = {
  full: "bg-green-100 text-green-800",
  partial: "bg-blue-100 text-blue-800",
  grant: "bg-purple-100 text-purple-800",
  loan: "bg-orange-100 text-orange-800",
};

const ITEMS_PER_PAGE = 9;

export default function Scholarships() {
  const [search, setSearch] = useState("");
  const [scholarshipType, setScholarshipType] = useState<string>("all");
  const [page, setPage] = useState(1);

  const { data, isLoading } = trpc.scholarships.list.useQuery({
    search: search || undefined,
    scholarshipType: scholarshipType === "all" ? undefined : scholarshipType,
    isActive: true,
    limit: ITEMS_PER_PAGE,
    offset: (page - 1) * ITEMS_PER_PAGE,
  });

  const totalPages = Math.ceil((data?.total || 0) / ITEMS_PER_PAGE);

  const formatAmount = (amount?: number | null, description?: string | null) => {
    if (description) return description;
    if (amount) return `${amount.toLocaleString()} บาท`;
    return "ตามเกณฑ์";
  };

  return (
    <PublicLayout>
      <div className="container py-8">
        {/* Header */}
        <div className="page-header">
          <h1 className="page-title">ทุนการศึกษา</h1>
          <p className="page-description">
            โอกาสทางการศึกษาจากหลากหลายแหล่งทุน
          </p>
        </div>

        {/* Filters */}
        <div className="flex flex-col sm:flex-row gap-4 mb-8">
          <div className="relative flex-1">
            <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
            <Input
              placeholder="ค้นหาทุนการศึกษา..."
              value={search}
              onChange={(e) => {
                setSearch(e.target.value);
                setPage(1);
              }}
              className="pl-10"
            />
          </div>
          <Select
            value={scholarshipType}
            onValueChange={(value) => {
              setScholarshipType(value);
              setPage(1);
            }}
          >
            <SelectTrigger className="w-full sm:w-48">
              <SelectValue placeholder="ประเภททุน" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="all">ทุกประเภท</SelectItem>
              <SelectItem value="full">ทุนเต็มจำนวน</SelectItem>
              <SelectItem value="partial">ทุนบางส่วน</SelectItem>
              <SelectItem value="grant">ทุนให้เปล่า</SelectItem>
              <SelectItem value="loan">ทุนกู้ยืม</SelectItem>
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
              <h3 className="text-lg font-semibold mb-2">ไม่พบทุนการศึกษา</h3>
              <p className="text-muted-foreground">
                ลองเปลี่ยนคำค้นหาหรือตัวกรองใหม่
              </p>
            </CardContent>
          </Card>
        ) : (
          <>
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
              {data?.data.map((scholarship) => (
                <Link key={scholarship.id} href={`/scholarships/${scholarship.id}`}>
                  <Card className="h-full card-hover cursor-pointer">
                    <CardHeader>
                      <div className="flex items-start justify-between gap-2">
                        <div className="flex-1 min-w-0">
                          <CardTitle className="text-lg line-clamp-2">{scholarship.title}</CardTitle>
                          <CardDescription className="flex items-center gap-1 mt-1">
                            <Building2 className="h-4 w-4 flex-shrink-0" />
                            <span className="truncate">{scholarship.provider}</span>
                          </CardDescription>
                        </div>
                        <Badge className={scholarshipTypeColors[scholarship.scholarshipType]}>
                          {scholarshipTypeLabels[scholarship.scholarshipType]}
                        </Badge>
                      </div>
                    </CardHeader>
                    <CardContent>
                      <div className="space-y-2 text-sm text-muted-foreground">
                        <div className="flex items-center gap-2">
                          <Banknote className="h-4 w-4 flex-shrink-0" />
                          <span>{formatAmount(scholarship.amount, scholarship.amountDescription)}</span>
                        </div>
                        <div className="flex items-center gap-2">
                          <GraduationCap className="h-4 w-4 flex-shrink-0" />
                          <span className="line-clamp-1">{scholarship.eligibility}</span>
                        </div>
                      </div>
                      {scholarship.deadline && (
                        <div className="mt-4 pt-4 border-t text-sm">
                          <span className="text-muted-foreground">ปิดรับสมัคร: </span>
                          <span className="font-medium">
                            {new Date(scholarship.deadline).toLocaleDateString("th-TH", {
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
