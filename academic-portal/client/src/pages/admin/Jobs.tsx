import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import { Badge } from "@/components/ui/badge";
import { trpc } from "@/lib/trpc";
import { Link } from "wouter";
import { useState } from "react";
import {
  Search,
  Plus,
  Edit,
  Trash2,
  Eye,
  EyeOff,
  Loader2,
  AlertCircle,
} from "lucide-react";
import { toast } from "sonner";

const jobTypeLabels: Record<string, string> = {
  fulltime: "เต็มเวลา",
  parttime: "พาร์ทไทม์",
  internship: "ฝึกงาน",
  contract: "สัญญาจ้าง",
};

export default function AdminJobs() {
  const [search, setSearch] = useState("");
  const utils = trpc.useUtils();

  const { data, isLoading } = trpc.jobs.list.useQuery({
    search: search || undefined,
  });

  const deleteMutation = trpc.jobs.delete.useMutation({
    onSuccess: () => {
      toast.success("ลบงานสำเร็จ");
      utils.jobs.list.invalidate();
    },
    onError: (error) => {
      toast.error(`เกิดข้อผิดพลาด: ${error.message}`);
    },
  });

  const toggleActiveMutation = trpc.jobs.toggleActive.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตสถานะสำเร็จ");
      utils.jobs.list.invalidate();
    },
    onError: (error) => {
      toast.error(`เกิดข้อผิดพลาด: ${error.message}`);
    },
  });

  const handleDelete = (id: number, title: string) => {
    if (confirm(`คุณต้องการลบงาน "${title}" หรือไม่?`)) {
      deleteMutation.mutate({ id });
    }
  };

  const handleToggleActive = (id: number, currentStatus: boolean) => {
    toggleActiveMutation.mutate({ id, isActive: !currentStatus });
  };

  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-3xl font-bold">จัดการงาน</h1>
          <p className="text-muted-foreground mt-2">
            จัดการประกาศรับสมัครงานทั้งหมด
          </p>
        </div>
        <Link href="/admin/jobs/new">
          <Button className="gap-2">
            <Plus className="h-4 w-4" />
            เพิ่มงานใหม่
          </Button>
        </Link>
      </div>

      <Card>
        <CardContent className="pt-6">
          <div className="flex items-center gap-4 mb-6">
            <div className="relative flex-1">
              <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
              <Input
                placeholder="ค้นหางาน..."
                value={search}
                onChange={(e) => setSearch(e.target.value)}
                className="pl-10"
              />
            </div>
          </div>

          {isLoading ? (
            <div className="flex items-center justify-center py-12">
              <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
            </div>
          ) : data?.data.length === 0 ? (
            <div className="text-center py-12">
              <AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-lg font-semibold mb-2">ไม่พบงาน</h3>
              <p className="text-muted-foreground mb-4">
                เริ่มต้นโดยการเพิ่มงานใหม่
              </p>
              <Link href="/admin/jobs/new">
                <Button>เพิ่มงานใหม่</Button>
              </Link>
            </div>
          ) : (
            <div className="border rounded-lg">
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>ตำแหน่ง</TableHead>
                    <TableHead>บริษัท</TableHead>
                    <TableHead>ประเภท</TableHead>
                    <TableHead>สถานะ</TableHead>
                    <TableHead className="text-right">จัดการ</TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  {data?.data.map((job) => (
                    <TableRow key={job.id}>
                      <TableCell className="font-medium">{job.title}</TableCell>
                      <TableCell>{job.company}</TableCell>
                      <TableCell>
                        <Badge variant="outline">
                          {jobTypeLabels[job.jobType]}
                        </Badge>
                      </TableCell>
                      <TableCell>
                        <Badge variant={job.isActive ? "default" : "secondary"}>
                          {job.isActive ? "เปิดใช้งาน" : "ปิดใช้งาน"}
                        </Badge>
                      </TableCell>
                      <TableCell className="text-right">
                        <div className="flex items-center justify-end gap-2">
                          <Button
                            variant="ghost"
                            size="icon"
                            onClick={() => handleToggleActive(job.id, job.isActive)}
                            disabled={toggleActiveMutation.isPending}
                          >
                            {job.isActive ? (
                              <EyeOff className="h-4 w-4" />
                            ) : (
                              <Eye className="h-4 w-4" />
                            )}
                          </Button>
                          <Link href={`/admin/jobs/${job.id}/edit`}>
                            <Button variant="ghost" size="icon">
                              <Edit className="h-4 w-4" />
                            </Button>
                          </Link>
                          <Button
                            variant="ghost"
                            size="icon"
                            onClick={() => handleDelete(job.id, job.title)}
                            disabled={deleteMutation.isPending}
                          >
                            <Trash2 className="h-4 w-4" />
                          </Button>
                        </div>
                      </TableCell>
                    </TableRow>
                  ))}
                </TableBody>
              </Table>
            </div>
          )}
        </CardContent>
      </Card>
    </div>
  );
}
