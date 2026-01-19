import { useState, useEffect, useRef } from "react";
import { useLocation, useParams } from "wouter";
import { trpc } from "@/lib/trpc";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { toast } from "sonner";
import { ArrowLeft, Upload, User, X } from "lucide-react";

export default function InstructorForm() {
  const params = useParams();
  const [, setLocation] = useLocation();
  const instructorId = params.id ? parseInt(params.id) : null;
  const isEdit = instructorId !== null;
  const fileInputRef = useRef<HTMLInputElement>(null);

  const [formData, setFormData] = useState({
    name: "",
    title: "",
    position: "",
    department: "",
    email: "",
    phone: "",
    office: "",
    imageUrl: "",
    bio: "",
    education: "",
    expertise: "",
    publications: "",
    isActive: true,
  });

  const [uploadedImage, setUploadedImage] = useState<{ name: string; url: string } | null>(null);
  const [isUploading, setIsUploading] = useState(false);

  const { data: instructor, isLoading } = trpc.instructors.getById.useQuery(
    { id: instructorId! },
    { enabled: isEdit }
  );

  const createMutation = trpc.instructors.create.useMutation({
    onSuccess: () => {
      toast.success("สร้างข้อมูลอาจารย์สำเร็จ");
      setLocation("/admin/instructors");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const updateMutation = trpc.instructors.update.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตข้อมูลอาจารย์สำเร็จ");
      setLocation("/admin/instructors");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const uploadMutation = trpc.upload.file.useMutation({
    onSuccess: (data) => {
      setUploadedImage({ name: fileInputRef.current?.files?.[0]?.name || "profile.jpg", url: data.url });
      setFormData({ ...formData, imageUrl: data.url });
      toast.success("อัปโหลดรูปภาพสำเร็จ");
      setIsUploading(false);
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาดในการอัปโหลด: " + error.message);
      setIsUploading(false);
    },
  });

  useEffect(() => {
    if (instructor) {
      setFormData({
        name: instructor.name,
        title: instructor.title || "",
        position: instructor.position || "",
        department: instructor.department || "",
        email: instructor.email || "",
        phone: instructor.phone || "",
        office: instructor.office || "",
        imageUrl: instructor.imageUrl || "",
        bio: instructor.bio || "",
        education: instructor.education || "",
        expertise: instructor.expertise || "",
        publications: instructor.publications || "",
        isActive: instructor.isActive,
      });
      if (instructor.imageUrl) {
        setUploadedImage({ name: "profile.jpg", url: instructor.imageUrl });
      }
    }
  }, [instructor]);

  const handleFileChange = async (e: React.ChangeEvent<HTMLInputElement>) => {
    const file = e.target.files?.[0];
    if (!file) return;

    // Validate file type
    if (!file.type.startsWith("image/")) {
      toast.error("กรุณาอัปโหลดไฟล์รูปภาพเท่านั้น");
      return;
    }

    // Validate file size (max 5MB)
    if (file.size > 5 * 1024 * 1024) {
      toast.error("ไฟล์มีขนาดใหญ่เกิน 5MB");
      return;
    }

    setIsUploading(true);

    // Convert to base64
    const reader = new FileReader();
    reader.onload = async () => {
      const base64 = reader.result as string;
      const base64Data = base64.split(',')[1];

      uploadMutation.mutate({
        fileData: base64Data,
        fileName: file.name,
        contentType: file.type,
        folder: "instructors",
      });
    };
    reader.readAsDataURL(file);
  };

  const handleRemoveImage = () => {
    setUploadedImage(null);
    setFormData({ ...formData, imageUrl: "" });
    if (fileInputRef.current) {
      fileInputRef.current.value = "";
    }
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();

    const data = {
      ...formData,
      title: formData.title || null,
      position: formData.position || null,
      department: formData.department || null,
      email: formData.email || null,
      phone: formData.phone || null,
      office: formData.office || null,
      imageUrl: formData.imageUrl || null,
      bio: formData.bio || null,
      education: formData.education || null,
      expertise: formData.expertise || null,
      publications: formData.publications || null,
    };

    if (isEdit) {
      updateMutation.mutate({ id: instructorId!, ...data });
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
        <Button variant="ghost" onClick={() => setLocation("/admin/instructors")} className="gap-2">
          <ArrowLeft className="h-4 w-4" />
          กลับ
        </Button>
      </div>

      <div className="max-w-4xl mx-auto">
        <Card>
          <CardHeader>
            <CardTitle>{isEdit ? "แก้ไขข้อมูลอาจารย์" : "เพิ่มอาจารย์ใหม่"}</CardTitle>
            <CardDescription>กรอกข้อมูลอาจารย์ให้ครบถ้วน</CardDescription>
          </CardHeader>
          <CardContent>
            <form onSubmit={handleSubmit} className="space-y-6">
              {/* รูปภาพอาจารย์ */}
              <Card>
                <CardHeader>
                  <CardTitle>รูปภาพอาจารย์</CardTitle>
                  <CardDescription>อัปโหลดรูปภาพอาจารย์ (ขนาดไม่เกิน 5MB)</CardDescription>
                </CardHeader>
                <CardContent className="space-y-4">
                  {uploadedImage ? (
                    <div className="flex items-center gap-6">
                      <div className="relative w-32 h-32 rounded-lg overflow-hidden border-2 border-border">
                        <img
                          src={uploadedImage.url}
                          alt="Profile"
                          className="w-full h-full object-cover"
                        />
                      </div>
                      <div className="flex-1">
                        <p className="font-medium mb-2">{uploadedImage.name}</p>
                        <div className="flex gap-2">
                          <label htmlFor="file-upload-replace">
                            <Button type="button" variant="outline" size="sm" asChild>
                              <span>เปลี่ยนรูปภาพ</span>
                            </Button>
                          </label>
                          <Button
                            type="button"
                            variant="outline"
                            size="sm"
                            onClick={handleRemoveImage}
                          >
                            ลบรูปภาพ
                          </Button>
                        </div>
                      </div>
                    </div>
                  ) : (
                    <div className="border-2 border-dashed rounded-lg p-8 text-center">
                      <div className="w-20 h-20 mx-auto mb-4 rounded-full bg-muted flex items-center justify-center">
                        <User className="h-10 w-10 text-muted-foreground" />
                      </div>
                      <p className="mb-2 text-sm text-muted-foreground">
                        คลิกเพื่ออัปโหลดรูปภาพ
                      </p>
                      <input
                        ref={fileInputRef}
                        type="file"
                        accept="image/*"
                        onChange={handleFileChange}
                        className="hidden"
                        id="file-upload"
                      />
                      <label htmlFor="file-upload">
                        <Button type="button" variant="outline" disabled={isUploading} asChild>
                          <span>
                            {isUploading ? (
                              "กำลังอัปโหลด..."
                            ) : (
                              <>
                                <Upload className="h-4 w-4 mr-2" />
                                เลือกไฟล์
                              </>
                            )}
                          </span>
                        </Button>
                      </label>
                    </div>
                  )}
                  <input
                    ref={fileInputRef}
                    type="file"
                    accept="image/*"
                    onChange={handleFileChange}
                    className="hidden"
                    id="file-upload-replace"
                  />
                </CardContent>
              </Card>

              {/* ข้อมูลพื้นฐาน */}
              <Card>
                <CardHeader>
                  <CardTitle>ข้อมูลพื้นฐาน</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="space-y-2">
                    <Label htmlFor="name">ชื่อ-นามสกุล *</Label>
                    <Input
                      id="name"
                      value={formData.name}
                      onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                      required
                    />
                  </div>

                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="title">คำนำหน้า/ตำแหน่งทางวิชาการ</Label>
                      <Input
                        id="title"
                        value={formData.title}
                        onChange={(e) => setFormData({ ...formData, title: e.target.value })}
                        placeholder="เช่น ผศ.ดร."
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="position">ตำแหน่ง</Label>
                      <Input
                        id="position"
                        value={formData.position}
                        onChange={(e) => setFormData({ ...formData, position: e.target.value })}
                        placeholder="เช่น หัวหน้าภาควิชา"
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="department">ภาควิชา/แผนก</Label>
                    <Input
                      id="department"
                      value={formData.department}
                      onChange={(e) => setFormData({ ...formData, department: e.target.value })}
                    />
                  </div>

                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="email">อีเมล</Label>
                      <Input
                        id="email"
                        type="email"
                        value={formData.email}
                        onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="phone">เบอร์โทรศัพท์</Label>
                      <Input
                        id="phone"
                        value={formData.phone}
                        onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="office">สถานที่ทำงาน/ห้องพัก</Label>
                    <Input
                      id="office"
                      value={formData.office}
                      onChange={(e) => setFormData({ ...formData, office: e.target.value })}
                      placeholder="เช่น อาคาร 3 ชั้น 4 ห้อง 401"
                    />
                  </div>
                </CardContent>
              </Card>

              {/* ข้อมูลเพิ่มเติม */}
              <Card>
                <CardHeader>
                  <CardTitle>ข้อมูลเพิ่มเติม</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="space-y-2">
                    <Label htmlFor="bio">ประวัติ/ข้อมูลส่วนตัว</Label>
                    <Textarea
                      id="bio"
                      value={formData.bio}
                      onChange={(e) => setFormData({ ...formData, bio: e.target.value })}
                      rows={4}
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="education">การศึกษา</Label>
                    <Textarea
                      id="education"
                      value={formData.education}
                      onChange={(e) => setFormData({ ...formData, education: e.target.value })}
                      rows={3}
                      placeholder="ระบุวุฒิการศึกษา สถาบัน และปีที่สำเร็จการศึกษา"
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="expertise">ความเชี่ยวชาญ</Label>
                    <Textarea
                      id="expertise"
                      value={formData.expertise}
                      onChange={(e) => setFormData({ ...formData, expertise: e.target.value })}
                      rows={3}
                      placeholder="ระบุสาขาที่เชี่ยวชาญ งานวิจัยที่สนใจ"
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="publications">ผลงานตีพิมพ์</Label>
                    <Textarea
                      id="publications"
                      value={formData.publications}
                      onChange={(e) => setFormData({ ...formData, publications: e.target.value })}
                      rows={4}
                      placeholder="ระบุผลงานตีพิมพ์ที่สำคัญ"
                    />
                  </div>
                </CardContent>
              </Card>

              {/* ปุ่มบันทึก */}
              <div className="flex justify-end gap-4">
                <Button type="button" variant="outline" onClick={() => setLocation("/admin/instructors")}>
                  ยกเลิก
                </Button>
                <Button type="submit" disabled={createMutation.isPending || updateMutation.isPending}>
                  {createMutation.isPending || updateMutation.isPending
                    ? "กำลังบันทึก..."
                    : isEdit
                    ? "บันทึกการแก้ไข"
                    : "สร้างข้อมูลอาจารย์"}
                </Button>
              </div>
            </form>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
