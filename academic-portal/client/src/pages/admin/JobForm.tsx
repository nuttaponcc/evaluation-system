import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { trpc } from "@/lib/trpc";
import { useLocation, useParams } from "wouter";
import { useState, useEffect } from "react";
import { Loader2, ArrowLeft } from "lucide-react";
import { toast } from "sonner";

export default function JobForm() {
  const { id } = useParams<{ id?: string }>();
  const [, setLocation] = useLocation();
  const isEdit = !!id;

  const [formData, setFormData] = useState({
    title: "",
    company: "",
    location: "",
    jobType: "fulltime" as "fulltime" | "parttime" | "internship" | "contract",
    description: "",
    requirements: "",
    salary: "",
    contactEmail: "",
    contactPhone: "",
    applicationUrl: "",
    deadline: "",
    isActive: true,
  });

  const { data: job, isLoading } = trpc.jobs.getById.useQuery(
    { id: parseInt(id || "0") },
    { enabled: isEdit }
  );

  useEffect(() => {
    if (job) {
      setFormData({
        title: job.title,
        company: job.company,
        location: job.location || "",
        jobType: job.jobType,
        description: job.description,
        requirements: job.requirements || "",
        salary: job.salaryMin && job.salaryMax ? `${job.salaryMin} - ${job.salaryMax}` : "",
        contactEmail: job.contactEmail || "",
        contactPhone: job.contactPhone || "",
        applicationUrl: job.applicationUrl || "",
        deadline: job.deadline ? new Date(job.deadline).toISOString().split("T")[0] : "",
        isActive: job.isActive,
      });
    }
  }, [job]);

  const createMutation = trpc.jobs.create.useMutation({
    onSuccess: () => {
      toast.success("สร้างงานสำเร็จ");
      setLocation("/admin/jobs");
    },
    onError: (error) => {
      toast.error(`เกิดข้อผิดพลาด: ${error.message}`);
    },
  });

  const updateMutation = trpc.jobs.update.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตงานสำเร็จ");
      setLocation("/admin/jobs");
    },
    onError: (error) => {
      toast.error(`เกิดข้อผิดพลาด: ${error.message}`);
    },
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    
    const data = {
      ...formData,
      deadline: formData.deadline ? new Date(formData.deadline) : undefined,
    };

    if (isEdit) {
      updateMutation.mutate({ id: parseInt(id), ...data });
    } else {
      createMutation.mutate(data);
    }
  };

  if (isLoading) {
    return (
      <div className="flex items-center justify-center py-12">
        <Loader2 className="h-8 w-8 animate-spin text-muted-foreground" />
      </div>
    );
  }

  return (
    <div className="space-y-6">
      <div className="flex items-center gap-4">
        <Button
          variant="ghost"
          size="icon"
          onClick={() => setLocation("/admin/jobs")}
        >
          <ArrowLeft className="h-4 w-4" />
        </Button>
        <div>
          <h1 className="text-3xl font-bold">
            {isEdit ? "แก้ไขงาน" : "เพิ่มงานใหม่"}
          </h1>
          <p className="text-muted-foreground mt-2">
            กรอกข้อมูลงานให้ครบถ้วน
          </p>
        </div>
      </div>

      <form onSubmit={handleSubmit}>
        <Card>
          <CardHeader>
            <CardTitle>ข้อมูลงาน</CardTitle>
          </CardHeader>
          <CardContent className="space-y-6">
            <div className="grid gap-6 md:grid-cols-2">
              <div className="space-y-2">
                <Label htmlFor="title">ตำแหน่งงาน *</Label>
                <Input
                  id="title"
                  value={formData.title}
                  onChange={(e) => setFormData({ ...formData, title: e.target.value })}
                  required
                />
              </div>

              <div className="space-y-2">
                <Label htmlFor="company">บริษัท/องค์กร *</Label>
                <Input
                  id="company"
                  value={formData.company}
                  onChange={(e) => setFormData({ ...formData, company: e.target.value })}
                  required
                />
              </div>

              <div className="space-y-2">
                <Label htmlFor="location">สถานที่</Label>
                <Input
                  id="location"
                  value={formData.location}
                  onChange={(e) => setFormData({ ...formData, location: e.target.value })}
                />
              </div>

              <div className="space-y-2">
                <Label htmlFor="jobType">ประเภทงาน *</Label>
                <Select
                  value={formData.jobType}
                  onValueChange={(value) => setFormData({ ...formData, jobType: value as typeof formData.jobType })}
                >
                  <SelectTrigger>
                    <SelectValue />
                  </SelectTrigger>
                  <SelectContent>
                    <SelectItem value="fulltime">เต็มเวลา</SelectItem>
                    <SelectItem value="parttime">พาร์ทไทม์</SelectItem>
                    <SelectItem value="internship">ฝึกงาน</SelectItem>
                    <SelectItem value="contract">สัญญาจ้าง</SelectItem>
                  </SelectContent>
                </Select>
              </div>

              <div className="space-y-2">
                <Label htmlFor="salary">เงินเดือน</Label>
                <Input
                  id="salary"
                  value={formData.salary}
                  onChange={(e) => setFormData({ ...formData, salary: e.target.value })}
                  placeholder="เช่น 25,000 - 35,000 บาท"
                />
              </div>

              <div className="space-y-2">
                <Label htmlFor="deadline">วันปิดรับสมัคร</Label>
                <Input
                  id="deadline"
                  type="date"
                  value={formData.deadline}
                  onChange={(e) => setFormData({ ...formData, deadline: e.target.value })}
                />
              </div>
            </div>

            <div className="space-y-2">
              <Label htmlFor="description">รายละเอียดงาน *</Label>
              <Textarea
                id="description"
                value={formData.description}
                onChange={(e) => setFormData({ ...formData, description: e.target.value })}
                rows={6}
                required
              />
            </div>

            <div className="space-y-2">
              <Label htmlFor="requirements">คุณสมบัติผู้สมัคร</Label>
              <Textarea
                id="requirements"
                value={formData.requirements}
                onChange={(e) => setFormData({ ...formData, requirements: e.target.value })}
                rows={6}
              />
            </div>

            <div className="grid gap-6 md:grid-cols-2">
              <div className="space-y-2">
                <Label htmlFor="contactEmail">อีเมลติดต่อ</Label>
                <Input
                  id="contactEmail"
                  type="email"
                  value={formData.contactEmail}
                  onChange={(e) => setFormData({ ...formData, contactEmail: e.target.value })}
                />
              </div>

              <div className="space-y-2">
                <Label htmlFor="contactPhone">เบอร์โทรติดต่อ</Label>
                <Input
                  id="contactPhone"
                  value={formData.contactPhone}
                  onChange={(e) => setFormData({ ...formData, contactPhone: e.target.value })}
                />
              </div>
            </div>

            <div className="space-y-2">
              <Label htmlFor="applicationUrl">ลิงก์สมัครงาน</Label>
              <Input
                id="applicationUrl"
                type="url"
                value={formData.applicationUrl}
                onChange={(e) => setFormData({ ...formData, applicationUrl: e.target.value })}
                placeholder="https://..."
              />
            </div>

            <div className="flex items-center justify-end gap-4 pt-6">
              <Button
                type="button"
                variant="outline"
                onClick={() => setLocation("/admin/jobs")}
              >
                ยกเลิก
              </Button>
              <Button
                type="submit"
                disabled={createMutation.isPending || updateMutation.isPending}
              >
                {(createMutation.isPending || updateMutation.isPending) && (
                  <Loader2 className="mr-2 h-4 w-4 animate-spin" />
                )}
                {isEdit ? "บันทึกการแก้ไข" : "สร้างงาน"}
              </Button>
            </div>
          </CardContent>
        </Card>
      </form>
    </div>
  );
}
