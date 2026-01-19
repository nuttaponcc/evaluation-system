import { useState, useEffect } from "react";
import { useLocation, useParams } from "wouter";
import { trpc } from "@/lib/trpc";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { toast } from "sonner";
import { ArrowLeft } from "lucide-react";

export default function ScholarshipForm() {
  const params = useParams();
  const [, setLocation] = useLocation();
  const scholarshipId = params.id ? parseInt(params.id) : null;
  const isEdit = scholarshipId !== null;

  const [formData, setFormData] = useState({
    title: "",
    provider: "",
    amount: null as number | null,
    amountDescription: "",
    scholarshipType: "partial" as "full" | "partial" | "grant" | "loan",
    eligibility: "",
    description: "",
    requirements: "",
    applicationProcess: "",
    contactEmail: "",
    contactPhone: "",
    applicationUrl: "",
    startDate: "",
    deadline: "",
    isActive: true,
  });

  const { data: scholarship, isLoading } = trpc.scholarships.getById.useQuery(
    { id: scholarshipId! },
    { enabled: isEdit }
  );

  const createMutation = trpc.scholarships.create.useMutation({
    onSuccess: () => {
      toast.success("สร้างทุนการศึกษาสำเร็จ");
      setLocation("/admin/scholarships");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const updateMutation = trpc.scholarships.update.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตทุนการศึกษาสำเร็จ");
      setLocation("/admin/scholarships");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  useEffect(() => {
    if (scholarship) {
      setFormData({
        title: scholarship.title,
        provider: scholarship.provider,
        amount: scholarship.amount,
        amountDescription: scholarship.amountDescription || "",
        scholarshipType: scholarship.scholarshipType,
        eligibility: scholarship.eligibility,
        description: scholarship.description,
        requirements: scholarship.requirements || "",
        applicationProcess: scholarship.applicationProcess || "",
        contactEmail: scholarship.contactEmail || "",
        contactPhone: scholarship.contactPhone || "",
        applicationUrl: scholarship.applicationUrl || "",
        startDate: scholarship.startDate ? new Date(scholarship.startDate).toISOString().split('T')[0] : "",
        deadline: scholarship.deadline ? new Date(scholarship.deadline).toISOString().split('T')[0] : "",
        isActive: scholarship.isActive,
      });
    }
  }, [scholarship]);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();

    const data = {
      ...formData,
      amount: formData.amount || null,
      amountDescription: formData.amountDescription || null,
      requirements: formData.requirements || null,
      applicationProcess: formData.applicationProcess || null,
      contactEmail: formData.contactEmail || null,
      contactPhone: formData.contactPhone || null,
      applicationUrl: formData.applicationUrl || null,
      startDate: formData.startDate ? new Date(formData.startDate) : null,
      deadline: formData.deadline ? new Date(formData.deadline) : null,
    };

    if (isEdit) {
      updateMutation.mutate({ id: scholarshipId!, ...data });
    } else {
      createMutation.mutate(data);
    }
  };

  if (isLoading) {
    return <div className="container py-8">กำลังโหลด...</div>;
  }

  return (
    <div className="container py-8">
      <div className="mb-6">
        <Button variant="ghost" onClick={() => setLocation("/admin/scholarships")} className="gap-2">
          <ArrowLeft className="h-4 w-4" />
          กลับ
        </Button>
      </div>

      <div className="max-w-4xl mx-auto">
        <Card>
          <CardHeader>
            <CardTitle>{isEdit ? "แก้ไขทุนการศึกษา" : "เพิ่มทุนการศึกษาใหม่"}</CardTitle>
            <CardDescription>กรอกข้อมูลทุนการศึกษาให้ครบถ้วน</CardDescription>
          </CardHeader>
          <CardContent>
            <form onSubmit={handleSubmit} className="space-y-6">
              {/* ข้อมูลพื้นฐาน */}
              <Card>
                <CardHeader>
                  <CardTitle>ข้อมูลพื้นฐาน</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="space-y-2">
                    <Label htmlFor="title">ชื่อทุนการศึกษา *</Label>
                    <Input
                      id="title"
                      value={formData.title}
                      onChange={(e) => setFormData({ ...formData, title: e.target.value })}
                      required
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="provider">ผู้ให้ทุน *</Label>
                    <Input
                      id="provider"
                      value={formData.provider}
                      onChange={(e) => setFormData({ ...formData, provider: e.target.value })}
                      required
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="description">คำอธิบาย *</Label>
                    <Textarea
                      id="description"
                      value={formData.description}
                      onChange={(e) => setFormData({ ...formData, description: e.target.value })}
                      rows={4}
                      required
                    />
                  </div>

                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="scholarshipType">ประเภททุน *</Label>
                      <Select
                        value={formData.scholarshipType}
                        onValueChange={(value: "full" | "partial" | "grant" | "loan") =>
                          setFormData({ ...formData, scholarshipType: value })
                        }
                      >
                        <SelectTrigger>
                          <SelectValue />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="full">ทุนเต็มจำนวน (Full)</SelectItem>
                          <SelectItem value="partial">ทุนบางส่วน (Partial)</SelectItem>
                          <SelectItem value="grant">เงินช่วยเหลือ (Grant)</SelectItem>
                          <SelectItem value="loan">เงินกู้ยืม (Loan)</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>
                  </div>
                </CardContent>
              </Card>

              {/* จำนวนเงิน */}
              <Card>
                <CardHeader>
                  <CardTitle>จำนวนเงิน</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="space-y-2">
                    <Label htmlFor="amount">จำนวนเงิน (บาท)</Label>
                    <Input
                      id="amount"
                      type="number"
                      min="0"
                      value={formData.amount || ""}
                      onChange={(e) =>
                        setFormData({ ...formData, amount: e.target.value ? parseFloat(e.target.value) : null })
                      }
                      placeholder="ระบุจำนวนเงินที่แน่นอน"
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="amountDescription">คำอธิบายจำนวนเงิน</Label>
                    <Input
                      id="amountDescription"
                      value={formData.amountDescription}
                      onChange={(e) => setFormData({ ...formData, amountDescription: e.target.value })}
                      placeholder="เช่น 10,000 - 50,000 บาท หรือ ตามความต้องการ"
                    />
                    <p className="text-sm text-muted-foreground">
                      ใช้เมื่อจำนวนเงินไม่แน่นอนหรือเป็นช่วง
                    </p>
                  </div>
                </CardContent>
              </Card>

              {/* คุณสมบัติและเงื่อนไข */}
              <Card>
                <CardHeader>
                  <CardTitle>คุณสมบัติและเงื่อนไข</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="space-y-2">
                    <Label htmlFor="eligibility">คุณสมบัติผู้สมัคร *</Label>
                    <Textarea
                      id="eligibility"
                      value={formData.eligibility}
                      onChange={(e) => setFormData({ ...formData, eligibility: e.target.value })}
                      rows={4}
                      required
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="requirements">เอกสารที่ต้องใช้</Label>
                    <Textarea
                      id="requirements"
                      value={formData.requirements}
                      onChange={(e) => setFormData({ ...formData, requirements: e.target.value })}
                      rows={4}
                      placeholder="ระบุเอกสารที่ต้องใช้ในการสมัคร"
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="applicationProcess">ขั้นตอนการสมัคร</Label>
                    <Textarea
                      id="applicationProcess"
                      value={formData.applicationProcess}
                      onChange={(e) => setFormData({ ...formData, applicationProcess: e.target.value })}
                      rows={4}
                      placeholder="อธิบายขั้นตอนการสมัครทุน"
                    />
                  </div>
                </CardContent>
              </Card>

              {/* วันที่ */}
              <Card>
                <CardHeader>
                  <CardTitle>วันที่</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="startDate">วันที่เปิดรับสมัคร</Label>
                      <Input
                        id="startDate"
                        type="date"
                        value={formData.startDate}
                        onChange={(e) => setFormData({ ...formData, startDate: e.target.value })}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="deadline">วันที่ปิดรับสมัคร</Label>
                      <Input
                        id="deadline"
                        type="date"
                        value={formData.deadline}
                        onChange={(e) => setFormData({ ...formData, deadline: e.target.value })}
                      />
                    </div>
                  </div>
                </CardContent>
              </Card>

              {/* ช่องทางติดต่อ */}
              <Card>
                <CardHeader>
                  <CardTitle>ช่องทางติดต่อและสมัคร</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="contactEmail">อีเมล</Label>
                      <Input
                        id="contactEmail"
                        type="email"
                        value={formData.contactEmail}
                        onChange={(e) => setFormData({ ...formData, contactEmail: e.target.value })}
                        placeholder="contact@example.com"
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="contactPhone">เบอร์โทรศัพท์</Label>
                      <Input
                        id="contactPhone"
                        type="tel"
                        value={formData.contactPhone}
                        onChange={(e) => setFormData({ ...formData, contactPhone: e.target.value })}
                        placeholder="02-xxx-xxxx"
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="applicationUrl">ลิงก์สมัครออนไลน์</Label>
                    <Input
                      id="applicationUrl"
                      type="url"
                      value={formData.applicationUrl}
                      onChange={(e) => setFormData({ ...formData, applicationUrl: e.target.value })}
                      placeholder="https://..."
                    />
                  </div>
                </CardContent>
              </Card>

              {/* ปุ่มบันทึก */}
              <div className="flex justify-end gap-4">
                <Button type="button" variant="outline" onClick={() => setLocation("/admin/scholarships")}>
                  ยกเลิก
                </Button>
                <Button type="submit" disabled={createMutation.isPending || updateMutation.isPending}>
                  {createMutation.isPending || updateMutation.isPending
                    ? "กำลังบันทึก..."
                    : isEdit
                    ? "บันทึกการแก้ไข"
                    : "สร้างทุนการศึกษา"}
                </Button>
              </div>
            </form>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
