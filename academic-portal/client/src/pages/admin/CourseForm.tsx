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
import { ArrowLeft, Upload, FileText, X } from "lucide-react";

export default function CourseForm() {
  const params = useParams();
  const [, setLocation] = useLocation();
  const courseId = params.id ? parseInt(params.id) : null;
  const isEdit = courseId !== null;

  const [formData, setFormData] = useState({
    code: "",
    title: "",
    titleEn: "",
    credits: 3,
    courseType: "elective" as "required" | "elective" | "general",
    level: "undergraduate" as "undergraduate" | "graduate" | "all",
    description: "",
    objectives: "",
    syllabus: "",
    prerequisites: "",
    schedule: "",
    room: "",
    semester: "",
    academicYear: "",
    maxStudents: null as number | null,
    instructorId: null as number | null,
    documentUrl: "",
    isActive: true,
  });

  const [documentFile, setDocumentFile] = useState<File | null>(null);
  const [isUploading, setIsUploading] = useState(false);

  const { data: course, isLoading } = trpc.courses.getById.useQuery(
    { id: courseId! },
    { enabled: isEdit }
  );

  const { data: instructorsData } = trpc.instructors.list.useQuery({
    search: "",
    limit: 100,
    offset: 0,
  });

  const uploadMutation = trpc.upload.file.useMutation();

  const createMutation = trpc.courses.create.useMutation({
    onSuccess: () => {
      toast.success("สร้างหลักสูตรสำเร็จ");
      setLocation("/admin/courses");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  const updateMutation = trpc.courses.update.useMutation({
    onSuccess: () => {
      toast.success("อัปเดตหลักสูตรสำเร็จ");
      setLocation("/admin/courses");
    },
    onError: (error) => {
      toast.error("เกิดข้อผิดพลาด: " + error.message);
    },
  });

  useEffect(() => {
    if (course) {
      setFormData({
        code: course.code,
        title: course.title,
        titleEn: course.titleEn || "",
        credits: course.credits,
        courseType: course.courseType,
        level: course.level,
        description: course.description,
        objectives: course.objectives || "",
        syllabus: course.syllabus || "",
        prerequisites: course.prerequisites || "",
        schedule: course.schedule || "",
        room: course.room || "",
        semester: course.semester || "",
        academicYear: course.academicYear || "",
        maxStudents: course.maxStudents,
        instructorId: course.instructorId,
        documentUrl: course.documentUrl || "",
        isActive: course.isActive,
      });
    }
  }, [course]);

  const handleDocumentChange = async (e: React.ChangeEvent<HTMLInputElement>) => {
    const file = e.target.files?.[0];
    if (!file) return;

    if (file.type !== "application/pdf") {
      toast.error("กรุณาอัปโหลดไฟล์ PDF เท่านั้น");
      return;
    }

    if (file.size > 10 * 1024 * 1024) {
      toast.error("ขนาดไฟล์ต้องไม่เกิน 10MB");
      return;
    }

    setDocumentFile(file);
  };

  const handleRemoveDocument = () => {
    setDocumentFile(null);
    setFormData({ ...formData, documentUrl: "" });
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    let documentUrl = formData.documentUrl;

    if (documentFile) {
      setIsUploading(true);
      try {
        const reader = new FileReader();
        reader.readAsDataURL(documentFile);
        await new Promise((resolve) => {
          reader.onload = resolve;
        });

        const base64 = (reader.result as string).split(",")[1];
        const result = await uploadMutation.mutateAsync({
          fileName: documentFile.name,
          contentType: documentFile.type,
          fileData: base64,
          folder: "courses" as const,
        });

        documentUrl = result.url;
        toast.success("อัปโหลดเอกสารสำเร็จ");
      } catch (error) {
        toast.error("เกิดข้อผิดพลาดในการอัปโหลดเอกสาร");
        setIsUploading(false);
        return;
      }
      setIsUploading(false);
    }

    const data = {
      ...formData,
      titleEn: formData.titleEn || null,
      objectives: formData.objectives || null,
      syllabus: formData.syllabus || null,
      prerequisites: formData.prerequisites || null,
      schedule: formData.schedule || null,
      room: formData.room || null,
      semester: formData.semester || null,
      academicYear: formData.academicYear || null,
      maxStudents: formData.maxStudents || null,
      instructorId: formData.instructorId || null,
      documentUrl: documentUrl || null,
    };

    if (isEdit) {
      updateMutation.mutate({ id: courseId!, ...data });
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
        <Button variant="ghost" onClick={() => setLocation("/admin/courses")} className="gap-2">
          <ArrowLeft className="h-4 w-4" />
          กลับ
        </Button>
      </div>

      <div className="max-w-4xl mx-auto">
        <Card>
          <CardHeader>
            <CardTitle>{isEdit ? "แก้ไขหลักสูตร" : "เพิ่มหลักสูตรใหม่"}</CardTitle>
            <CardDescription>กรอกข้อมูลหลักสูตรให้ครบถ้วน</CardDescription>
          </CardHeader>
          <CardContent>
            <form onSubmit={handleSubmit} className="space-y-6">
              <Card>
                <CardHeader>
                  <CardTitle>ข้อมูลพื้นฐาน</CardTitle>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="code">รหัสวิชา *</Label>
                      <Input
                        id="code"
                        value={formData.code}
                        onChange={(e) => setFormData({ ...formData, code: e.target.value })}
                        required
                      />
                    </div>
                    <div className="space-y-2">
                      <Label htmlFor="credits">หน่วยกิต *</Label>
                      <Input
                        id="credits"
                        type="number"
                        min="1"
                        max="6"
                        value={formData.credits}
                        onChange={(e) => setFormData({ ...formData, credits: parseInt(e.target.value) })}
                        required
                      />
                    </div>
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="title">ชื่อวิชา (ภาษาไทย) *</Label>
                    <Input
                      id="title"
                      value={formData.title}
                      onChange={(e) => setFormData({ ...formData, title: e.target.value })}
                      required
                    />
                  </div>

                  <div className="space-y-2">
                    <Label htmlFor="description">คำอธิบายรายวิชา *</Label>
                    <Textarea
                      id="description"
                      value={formData.description}
                      onChange={(e) => setFormData({ ...formData, description: e.target.value })}
                      rows={4}
                      required
                    />
                  </div>

                  <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div className="space-y-2">
                      <Label htmlFor="courseType">ประเภทวิชา *</Label>
                      <Select
                        value={formData.courseType}
                        onValueChange={(value: "required" | "elective" | "general") =>
                          setFormData({ ...formData, courseType: value })
                        }
                      >
                        <SelectTrigger>
                          <SelectValue />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="required">วิชาบังคับ</SelectItem>
                          <SelectItem value="elective">วิชาเลือก</SelectItem>
                          <SelectItem value="general">ศึกษาทั่วไป</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>

                    <div className="space-y-2">
                      <Label htmlFor="level">ระดับ *</Label>
                      <Select
                        value={formData.level}
                        onValueChange={(value: "undergraduate" | "graduate" | "all") =>
                          setFormData({ ...formData, level: value })
                        }
                      >
                        <SelectTrigger>
                          <SelectValue />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="undergraduate">ปริญญาตรี</SelectItem>
                          <SelectItem value="graduate">บัณฑิตศึกษา</SelectItem>
                          <SelectItem value="all">ทุกระดับ</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>

                    <div className="space-y-2">
                      <Label htmlFor="instructorId">อาจารย์ผู้สอน</Label>
                      <Select
                        value={formData.instructorId?.toString() || ""}
                        onValueChange={(value) =>
                          setFormData({ ...formData, instructorId: value ? parseInt(value) : null })
                        }
                      >
                        <SelectTrigger>
                          <SelectValue placeholder="เลือกอาจารย์" />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="">ไม่ระบุ</SelectItem>
                          {instructorsData?.data.map((instructor) => (
                            <SelectItem key={instructor.id} value={instructor.id.toString()}>
                              {instructor.name}
                            </SelectItem>
                          ))}
                        </SelectContent>
                      </Select>
                    </div>
                  </div>
                </CardContent>
              </Card>

              <Card>
                <CardHeader>
                  <CardTitle>เอกสารหลักสูตร</CardTitle>
                  <CardDescription>อัปโหลดเอกสาร PDF (ไม่เกิน 10MB)</CardDescription>
                </CardHeader>
                <CardContent className="space-y-4">
                  {formData.documentUrl && !documentFile ? (
                    <div className="flex items-center gap-4 p-4 border rounded-lg">
                      <FileText className="h-8 w-8 text-blue-500" />
                      <div className="flex-1">
                        <p className="font-medium">เอกสารปัจจุบัน</p>
                        <a
                          href={formData.documentUrl}
                          target="_blank"
                          rel="noopener noreferrer"
                          className="text-sm text-blue-500 hover:underline"
                        >
                          ดูเอกสาร
                        </a>
                      </div>
                      <Button type="button" variant="ghost" size="sm" onClick={handleRemoveDocument}>
                        <X className="h-4 w-4" />
                      </Button>
                    </div>
                  ) : documentFile ? (
                    <div className="flex items-center gap-4 p-4 border rounded-lg bg-blue-50">
                      <FileText className="h-8 w-8 text-blue-500" />
                      <div className="flex-1">
                        <p className="font-medium">{documentFile.name}</p>
                        <p className="text-sm text-muted-foreground">
                          {(documentFile.size / 1024 / 1024).toFixed(2)} MB
                        </p>
                      </div>
                      <Button type="button" variant="ghost" size="sm" onClick={() => setDocumentFile(null)}>
                        <X className="h-4 w-4" />
                      </Button>
                    </div>
                  ) : (
                    <div className="border-2 border-dashed rounded-lg p-8 text-center">
                      <Upload className="h-12 w-12 mx-auto mb-4 text-muted-foreground" />
                      <Label htmlFor="document" className="cursor-pointer">
                        <span className="text-blue-500 hover:underline">คลิกเพื่ออัปโหลด</span>
                      </Label>
                      <Input
                        id="document"
                        type="file"
                        accept="application/pdf"
                        onChange={handleDocumentChange}
                        className="hidden"
                      />
                      <p className="text-sm text-muted-foreground mt-2">PDF (สูงสุด 10MB)</p>
                    </div>
                  )}
                </CardContent>
              </Card>

              <div className="flex justify-end gap-4">
                <Button type="button" variant="outline" onClick={() => setLocation("/admin/courses")}>
                  ยกเลิก
                </Button>
                <Button type="submit" disabled={createMutation.isPending || updateMutation.isPending || isUploading}>
                  {isUploading
                    ? "กำลังอัปโหลด..."
                    : createMutation.isPending || updateMutation.isPending
                    ? "กำลังบันทึก..."
                    : isEdit
                    ? "บันทึกการแก้ไข"
                    : "สร้างหลักสูตร"}
                </Button>
              </div>
            </form>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
