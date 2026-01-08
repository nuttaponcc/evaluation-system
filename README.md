# ระบบประเมินภาระงาน (Workload Evaluation System)

ระบบประเมินภาระงานสำหรับบุคลากร พัฒนาด้วย PHP และ MySQL

## คุณสมบัติ
- ระบบประเมินภาระงาน
- จัดการข้อมูลบุคลากร
- รายงานและสถิติ
- ระบบผู้ใช้และสิทธิ์การเข้าถึง

## การติดตั้ง

### ความต้องการของระบบ
- PHP 5.6 หรือสูงกว่า
- MySQL 5.5 หรือสูงกว่า
- Web Server (Apache/Nginx)

### ขั้นตอนการติดตั้ง

1. Clone repository นี้
```bash
git clone https://github.com/nuttaponcc/evaluation-system.git
```

2. Import ฐานข้อมูล
```bash
mysql -u username -p database_name < evaluation.sql
```

3. แก้ไขไฟล์ config สำหรับการเชื่อมต่อฐานข้อมูล

4. เปิดใช้งานผ่าน web browser

## โครงสร้างโปรเจค
- `/assets/` - ไฟล์ CSS, JavaScript, รูปภาพ
- `/docs/` - เอกสารประกอบ
- `/files/` - ไฟล์อัปโหลด
- `/form01/` - ฟอร์มต่างๆ
- `evaluation.sql` - ไฟล์ฐานข้อมูล

## License
All rights reserved.
