import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table";
import { Badge } from "@/components/ui/badge";
import { trpc } from "@/lib/trpc";
import { Link } from "wouter";
import { useState } from "react";
import { Search, Plus, Edit, Trash2, Eye, EyeOff, Loader2, AlertCircle } from "lucide-react";
import { toast } from "sonner";

export default function AdminInstructors() {
  const [search, setSearch] = useState("");
  const utils = trpc.useUtils();
  const { data, isLoading } = trpc.instructors.list.useQuery({ search: search || undefined });
  const deleteMutation = trpc.instructors.delete.useMutation({
    onSuccess: () => { toast.success("ลบอาจารย์สำเร็จ"); utils.instructors.list.invalidate(); },
    onError: (error) => { toast.error(`เกิดข้อผิดพลาด: ${error.message}`); },
  });
  const toggleActiveMutation = trpc.instructors.toggleActive.useMutation({
    onSuccess: () => { toast.success("อัปเดตสถานะสำเร็จ"); utils.instructors.list.invalidate(); },
    onError: (error) => { toast.error(`เกิดข้อผิดพลาด: ${error.message}`); },
  });

  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div><h1 className="text-3xl font-bold">จัดการอาจารย์</h1><p className="text-muted-foreground mt-2">จัดการข้อมูลอาจารย์ทั้งหมด</p></div>
        <Link href="/admin/instructors/new"><Button className="gap-2"><Plus className="h-4 w-4" />เพิ่มอาจารย์ใหม่</Button></Link>
      </div>
      <Card><CardContent className="pt-6">
        <div className="flex items-center gap-4 mb-6"><div className="relative flex-1">
          <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
          <Input placeholder="ค้นหาอาจารย์..." value={search} onChange={(e) => setSearch(e.target.value)} className="pl-10" />
        </div></div>
        {isLoading ? <div className="flex items-center justify-center py-12"><Loader2 className="h-8 w-8 animate-spin text-muted-foreground" /></div> :
        data?.data.length === 0 ? <div className="text-center py-12"><AlertCircle className="h-12 w-12 mx-auto text-muted-foreground mb-4" /><h3 className="text-lg font-semibold mb-2">ไม่พบอาจารย์</h3><Link href="/admin/instructors/new"><Button>เพิ่มอาจารย์ใหม่</Button></Link></div> :
        <div className="border rounded-lg"><Table><TableHeader><TableRow><TableHead>ชื่อ-นามสกุล</TableHead><TableHead>ตำแหน่ง</TableHead><TableHead>แผนก</TableHead><TableHead>อีเมล</TableHead><TableHead>สถานะ</TableHead><TableHead className="text-right">จัดการ</TableHead></TableRow></TableHeader>
        <TableBody>{data?.data.map((item) => (<TableRow key={item.id}><TableCell className="font-medium">{item.name}</TableCell><TableCell>{item.position || "-"}</TableCell><TableCell>{item.department || "-"}</TableCell><TableCell>{item.email || "-"}</TableCell>
        <TableCell><Badge variant={item.isActive ? "default" : "secondary"}>{item.isActive ? "เปิดใช้งาน" : "ปิดใช้งาน"}</Badge></TableCell>
        <TableCell className="text-right"><div className="flex items-center justify-end gap-2">
          <Button variant="ghost" size="icon" onClick={() => toggleActiveMutation.mutate({ id: item.id, isActive: !item.isActive })}>{item.isActive ? <EyeOff className="h-4 w-4" /> : <Eye className="h-4 w-4" />}</Button>
          <Link href={`/admin/instructors/${item.id}/edit`}><Button variant="ghost" size="icon"><Edit className="h-4 w-4" /></Button></Link>
          <Button variant="ghost" size="icon" onClick={() => { if (confirm(`คุณต้องการลบ "${item.name}" หรือไม่?`)) deleteMutation.mutate({ id: item.id }); }}><Trash2 className="h-4 w-4" /></Button>
        </div></TableCell></TableRow>))}</TableBody></Table></div>}
      </CardContent></Card>
    </div>
  );
}
