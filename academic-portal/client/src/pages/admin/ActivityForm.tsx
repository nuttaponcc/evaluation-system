import { useState, useEffect } from "react";
import { useLocation, useParams } from "wouter";
import { trpc } from "@/lib/trpc";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Checkbox } from "@/components/ui/checkbox";
import { toast } from "sonner";
import { ArrowLeft } from "lucide-react";

export default function ActivityForm() {
  const params = useParams();
  const [, setLocation] = useLocation();
  const activityId = params.id ? parseInt(params.id) : null;
  const isEdit = activityId !== null;

  const [formData, setFormData] = useState({
    title: "",
    description: "",
    activityType: "seminar" as "workshop" | "seminar" | "competition" | "exhibition" | "other",
    startDate: "",
    endDate: "",
    registrationDeadline: "",
    location: "",
    isOnline: false,
    onlineUrl: "",
    organizer: "",
    contact: "",
    maxParticipants: null as number | null,
    fee: null as number | null,
    requirements: "",
    benefits: "",
    schedule: "",
    isActive: true,
  });

  const { data: activity, isLoading } = trpc.activities.getById.useQuery(
    { id: activityId! },
    { enabled: isEdit }
  );

  const createMutation = trpc.activities.create.useMutation({
    onSuccess: () => {
      toast.success("สร้างกิจกรรมสำเร็จ");
      setLocation("/admin/activities");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const updateMutation = trpc.activities.update.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตกิจกรรมสำเร็จ");
      setLocation("/admin/activities");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  useEffect(() => {
    if (activity) {
      setFormData({
        title: activity.title,
        description: activity.description,
        activityType: activity.activityType,
        startDate: activity.startDate ? new Date(activity.startDate).toISOString().split('T')[0] : "",
        endDate: activity.endDate ? new Date(activity.endDate).toISOString().split('T')[0] : "",
        registrationDeadline: activity.registrationDeadline ? new Date(activity.registrationDeadline).toISOString().split('T')[0] : "",
        location: activity.location,
        isOnline: activity.isOnline,
        onlineUrl: activity.onlineUrl || "",
        organizer: activity.organizer,
        contact: (activity as any).contactEmail || (activity as any).contactPhone || "",
        maxParticipants: activity.maxParticipants,
        fee: (activity as any).registrationFee || null,
        requirements: "",
        benefits: "",
        schedule: activity.schedule || "",
        isActive: activity.isActive,
      });
    }
  }, [activity]);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();

    if (!formData.startDate) {
      toast.error("กรุณาระบุวันที่เริ่ม");
      return;
    }

    const data = {
      ...formData,
      startDate: new Date(formData.startDate),
      endDate: formData.endDate ? new Date(formData.endDate) : null,
      registrationDeadline: formData.registrationDeadline ? new Date(formData.registrationDeadline) : null,
      onlineUrl: formData.onlineUrl || null,
      contact: formData.contact || null,
      maxParticipants: formData.maxParticipants || null,
      fee: formData.fee || null,
      requirements: formData.requirements || null,
      benefits: formData.benefits || null,
      schedule: formData.schedule || null,
    };

    if (isEdit) {
      updateMutation.mutate({ id: activityId!, ...data });
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
        <Button variant="ghost" onClick={() => setLocation("/admin/activities")} className="gap-2">
          <ArrowLeft className="h-4 w-4" />
          กลับ
        </Button>
      </div>

      <div className="max-w-4xl mx-auto">
        <Card>
          <CardHeader>
            <CardTitle>{isEdit ? "แก้ไขกิจกรรม" : "เพิ่มกิจกรรมใหม่"}</CardTitle>
            <CardDescription>กรอกข้อมูลกิจกรรมให้ครบถ้วน</CardDescription>
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
                    <Label htmlFor="title">ชื่อกิจกรรม *</Label>
                    <Input
                      id="title"
                      value={formData.title}
                      onChange={(e) => setFormData({ ...formData, title: e.target.value })}
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
                      <Label htmlFor="activityType">ประเภทกิจกรรม *</Label>
                      <Select
                        value={formData.activityType}
                        onValueChange={(value: "workshop" | "seminar" | "competition" | "exhibition" | "other") =>
                          setFormData({ ...formData, activityType: value })
                        }
                      >
                        <SelectTrigger>
                          <SelectValue />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="workshop">Workshop</SelectItem>
                          <SelectItem value="seminar">Seminar</SelectItem>
                          <SelectItem value="competition">Competition</SelectItem>
                          <SelectItem value="exhibition">Exhibition</SelectItem>
                          <SelectItem value="other">Other</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>

                    <div className="space-y-2">
                      <Label htmlFor="organizer">ผู้จัด *</Label>
                      <Input
                        id="organizer"
                        value={formData.organizer}
                        onChange={(e) => setFormData({ ...formData, organizer: e.target.value })}
                        required
                      />
                    </div>
                  </div>
                </CardContent>
              </Card>

              {/* วันที่และเวลา */}
              <Card>
                <CardHeader>
                  <CardTitle>วันที่และเวลา</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="startDate">วันที่เริ่ม *</Label>
                      <Input
                        id="startDate"
                        type="date"
                        value={formData.startDate}
                        onChange={(e) => setFormData({ ...formData, startDate: e.target.value })}
                        required
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="endDate">วันที่สิ้นสุด</Label>
                      <Input
                        id="endDate"
                        type="date"
                        value={formData.endDate}
                        onChange={(e) => setFormData({ ...formData, endDate: e.target.value })}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="registrationDeadline">ปิดรับสมัคร</Label>
                      <Input
                        id="registrationDeadline"
                        type="date"
                        value={formData.registrationDeadline}
                        onChange={(e) => setFormData({ ...formData, registrationDeadline: e.target.value })}
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="schedule">กำหนดการ</Label>
                    <Textarea
                      id="schedule"
                      value={formData.schedule}
                      onChange={(e) => setFormData({ ...formData, schedule: e.target.value })}
                      rows={3}
                      placeholder="ระบุกำหนดการของกิจกรรม"
                    />
                  </div>
                </CardContent>
              </Card>

              {/* สถานที่ */}
              <Card>
                <CardHeader>
                  <CardTitle>สถานที่</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="flex items-center space-x-2">
                    <Checkbox
                      id="isOnline"
                      checked={formData.isOnline}
                      onCheckedChange={(checked) =>
                        setFormData({ ...formData, isOnline: checked as boolean })
                      }
                    />
                    <Label htmlFor="isOnline" className="cursor-pointer">
                      กิจกรรมออนไลน์
                    </Label>
                  </div>

                  {formData.isOnline ? (
                    <div className="space-y-2">
                      <Label htmlFor="onlineUrl">ลิงก์ออนไลน์</Label>
                      <Input
                        id="onlineUrl"
                        type="url"
                        value={formData.onlineUrl}
                        onChange={(e) => setFormData({ ...formData, onlineUrl: e.target.value })}
                        placeholder="https://..."
                      />
                    </div>
                  ) : (
                    <div className="space-y-2">
                      <Label htmlFor="location">สถานที่ *</Label>
                      <Input
                        id="location"
                        value={formData.location}
                        onChange={(e) => setFormData({ ...formData, location: e.target.value })}
                        required={!formData.isOnline}
                      />
                    </div>
                  )}
                </CardContent>
              </Card>

              {/* รายละเอียดเพิ่มเติม */}
              <Card>
                <CardHeader>
                  <CardTitle>รายละเอียดเพิ่มเติม</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="maxParticipants">จำนวนผู้เข้าร่วมสูงสุด</Label>
                      <Input
                        id="maxParticipants"
                        type="number"
                        min="1"
                        value={formData.maxParticipants || ""}
                        onChange={(e) =>
                          setFormData({ ...formData, maxParticipants: e.target.value ? parseInt(e.target.value) : null })
                        }
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="fee">ค่าธรรมเนียม (บาท)</Label>
                      <Input
                        id="fee"
                        type="number"
                        min="0"
                        value={formData.fee || ""}
                        onChange={(e) =>
                          setFormData({ ...formData, fee: e.target.value ? parseFloat(e.target.value) : null })
                        }
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="contact">ช่องทางติดต่อ</Label>
                    <Input
                      id="contact"
                      value={formData.contact}
                      onChange={(e) => setFormData({ ...formData, contact: e.target.value })}
                      placeholder="เบอร์โทร, อีเมล, หรือช่องทางอื่นๆ"
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="requirements">คุณสมบัติผู้เข้าร่วม</Label>
                    <Textarea
                      id="requirements"
                      value={formData.requirements}
                      onChange={(e) => setFormData({ ...formData, requirements: e.target.value })}
                      rows={3}
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="benefits">สิ่งที่ได้รับ</Label>
                    <Textarea
                      id="benefits"
                      value={formData.benefits}
                      onChange={(e) => setFormData({ ...formData, benefits: e.target.value })}
                      rows={3}
                      placeholder="เช่น ใบประกาศนียบัตร, ของที่ระลึก, อาหารว่าง"
                    />
                  </div>
                </CardContent>
              </Card>

              {/* ปุ่มบันทึก */}
              <div className="flex justify-end gap-4">
                <Button type="button" variant="outline" onClick={() => setLocation("/admin/activities")}>
                  ยกเลิก
                </Button>
                <Button type="submit" disabled={createMutation.isPending || updateMutation.isPending}>
                  {createMutation.isPending || updateMutation.isPending
                    ? "กำลังบันทึก..."
                    : isEdit
                    ? "บันทึกการแก้ไข"
                    : "สร้างกิจกรรม"}
                </Button>
              </div>
            </form>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
