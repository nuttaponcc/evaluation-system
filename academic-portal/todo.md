# Academic Portal TODO

## Database & Backend
- [x] Database schema for Jobs, Scholarships, Activities, Courses, Instructors
- [x] tRPC routers for all CRUD operations
- [x] Admin role-based access control
- [x] Seed data for testing

## Public Pages
- [x] Homepage with overview of all modules
- [x] Jobs list page with search and filtering
- [x] Job detail page
- [x] Scholarships list page with search and filtering
- [x] Scholarship detail page
- [x] Activities list page with search and filtering
- [x] Activity detail page
- [x] Courses list page with search and filtering
- [x] Course detail page
- [x] Instructors list page with search
- [x] Instructor detail page
- [x] Pagination for all list pages
- [x] Date range filtering for time-sensitive content

## Admin Dashboard
- [x] Admin dashboard with statistics overview
- [x] Jobs management (CRUD with form)
- [x] Scholarships management (CRUD with form)
- [x] Activities management (CRUD with form)
- [x] Courses management (CRUD with form)
- [x] Instructors management (CRUD with form)
- [x] Users management
- [x] Active/inactive toggle for all content types

## UI/UX
- [x] Thai language support throughout
- [x] Responsive design
- [x] Clean professional styling

## New Features Requested
- [x] เปลี่ยนชื่อเมนู "งาน" เป็น "รับสมัครงาน" ทั้งหมด
- [x] เพิ่มระบบอัปโหลดไฟล์เอกสารหลักสูตร (PDF) สำหรับ Courses
- [x] เพิ่มระบบอัปโหลดรูปภาพอาจารย์สำหรับ Instructors
- [x] อัปเดต database schema เพื่อเก็บ file URLs
- [x] สร้าง file upload API endpoint
- [x] อัปเดต Course และ Instructor forms

## Bugs Found
- [x] Activities Admin page ยังแสดง "Coming Soon" แทนที่จะเป็นหน้าจัดการจริง
- [x] ต้องสร้าง ActivityForm สำหรับ create/edit Activities

## New Tasks
- [x] ตรวจสอบ Scholarships Admin page ว่าสามารถเพิ่ม/แก้ไข/ลบได้ครบหรือไม่
- [x] ตรวจสอบ Courses Admin page ว่าสามารถเพิ่ม/แก้ไข/ลบได้ครบหรือไม่
- [x] สร้าง/แก้ไข ScholarshipForm ให้รองรับข้อมูลครบถ้วน
- [x] สร้าง/แก้ไข CourseForm ให้รองรับข้อมูลครบถ้วน (รวมอัปโหลดเอกสาร)

## Production Readiness Checklist
### Public Pages
- [x] Homepage แสดงข้อมูลสถิติและลิงก์ไปยัง modules ต่างๆ
- [x] รับสมัครงาน - list page พร้อม search, filter, pagination
- [x] รับสมัครงาน - detail page แสดงข้อมูลครบถ้วน
- [x] ทุนการศึกษา - list page พร้อม search, filter, pagination
- [x] ทุนการศึกษา - detail page แสดงข้อมูลครบถ้วน
- [x] กิจกรรม - list page พร้อม search, filter, pagination
- [x] กิจกรรม - detail page แสดงข้อมูลครบถ้วน
- [x] หลักสูตร - list page พร้อม search, filter, pagination
- [x] หลักสูตร - detail page แสดงข้อมูลครบถ้วน พร้อมลิงก์ดาวน์โหลดเอกสาร
- [x] อาจารย์ - list page พร้อม search, pagination
- [x] อาจารย์ - detail page แสดงข้อมูลครบถ้วน พร้อมรูปภาพ

### Admin CRUD Operations
- [x] Jobs Admin - list, create, edit, delete, toggle active
- [x] Scholarships Admin - list, create, edit, delete, toggle active
- [x] Activities Admin - list, create, edit, delete, toggle active
- [x] Courses Admin - list, create, edit, delete, toggle active, upload document
- [x] Instructors Admin - list, create, edit, delete, toggle active, upload image
- [x] Users Admin - list, view, edit role

### File Upload System
- [x] Course document upload (PDF) ทำงานได้
- [x] Instructor image upload ทำงานได้
- [x] File preview/download ทำงานได้
- [x] File delete/replace ทำงานได้

### General
- [x] Navigation menu ทำงานถูกต้อง
- [x] Responsive design บนมือถือ
- [x] Error handling แสดงข้อความที่เหมาะสม
- [x] Loading states แสดงถูกต้อง
