<?php


//กำหนด Header ส่วนที่เกี่ยวข้อง
$d=date("สำรวจ ณ วันที่ d/m/y H:i น");
include ('adodb/adodb.inc.php');
define('FPDF_FONTPATH','fpdf/font/');
require ('fpdf/jpdf.inc.php');

if($rep==2)
{
//$pdf=new JPDF();
$pdf = new FPDF('L', 'mm');
$pdf->AddFont('angsana','B','angsanab.php');
$pdf->AddFont('angsana','','angsana.php');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->SetMargins(20,5,10);
$pdf->AddPage();
//กำหนดวาดรูปสี่เหลี่ยม (rectangle) ไม่มีพื้นหลัง (no fill) 
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.1);
$pdf->SetFillColor(255,255, 200); 
$pdf->Rect(25, 45, 260, 20 , 'F');
$pdf->Image("head.jpg",0,0,220,25);
$pdf->Rect(25, 45, 260, 150 , 'D');
//$pdf->SetFillColor(255,100, 100); 
//$pdf->Rect(20, 25, 175, 50 , 'D');
//$pdf->Line(25,45, 305, 195);
$a=10;
if ($a==10) $a=0; 
$pdf->Line(80,55, 255, 55+$a*10);

$pdf->Line(25,65, 285, 65);
$pdf->Line(25,73, 285, 73);
$pdf->Line(25,81, 285, 81);
$pdf->Line(25,89, 285, 89);
$pdf->Line(25,97, 285, 97);
$pdf->Line(25,105, 285, 105);
$pdf->Line(25,113, 285, 113);
$pdf->Line(25,121, 285, 121);
$pdf->Line(25,129, 285, 129);
$pdf->Line(25,137, 285, 137);
$pdf->Line(25,145, 285, 145);
$pdf->Line(25,153, 285, 153);
$pdf->Line(25,161, 285, 161);
$pdf->Line(25,169, 285, 169);
$pdf->Line(25,177, 285, 177);
$pdf->Line(80,45, 80, 195);
$pdf->Line(115,55, 115, 195);
$pdf->Line(150,55, 150, 195);
$pdf->Line(185,55, 185, 195);
$pdf->Line(220,55, 220, 195);
$pdf->Line(255,45, 255, 195);



$pdf->SetXY(50,15);
$pdf->SetFont('angsana','B',16);
$pdf->Write(10,'ระบบจัดการงานบุคคล');
$pdf->SetXY(50,20);
$pdf->Write(10,'คณะวิทยาศาสตร์');
$pdf->SetXY(120,30);
$pdf->Write(10,'อัตรากำลังคณะวิทยาศาสตร์');
$pdf->SetXY(43,50);
$pdf->Write(10,'ข้อมูล');
$pdf->SetXY(155,45);
$pdf->Write(10,'ภาควิชา');
$pdf->SetXY(265,50);
$pdf->Write(10,'รวม');
$pdf->SetFontSize(13);
$pdf->SetXY(85,55);
$pdf->Write(10,'     ภาควิชาเคมี                  ภาควิชาคณิตศาสตร์                   ภาควิชาชีววิทยา                    ภาควิชาฟิสิกส์                      สำนักงานเลขานุการ   ');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(26,64);$pdf->Write(10,'ข้าราชการสาย ก');
$pdf->SetXY(95,64);$pdf->Write(10,$r1_2) ;
$pdf->SetXY(130,64);$pdf->Write(10,$r1_5);
$pdf->SetXY(165,64);$pdf->Write(10,$r1_4);
$pdf->SetXY(200,64);$pdf->Write(10,$r1_3);
$pdf->SetXY(235,64);$pdf->Write(10,$r1_1);
$pdf->SetXY(265,64);$pdf->Write(10,$r1);
$pdf->SetXY(26,72);$pdf->Write(10,'พนักงานวิชาการ');
$pdf->SetXY(95,72);$pdf->Write(10,$r6_2) ;
$pdf->SetXY(130,72);$pdf->Write(10,$r6_5);
$pdf->SetXY(165,72);$pdf->Write(10,$r6_4);
$pdf->SetXY(200,72);$pdf->Write(10,$r6_3);
$pdf->SetXY(235,72);$pdf->Write(10,$r6_1);
$pdf->SetXY(265,72);$pdf->Write(10,$r6);
$pdf->SetXY(26,80);$pdf->Write(10,'อาจารย์ผู้ช่วยสอน');
$pdf->SetXY(95,80);$pdf->Write(10,$r12_2) ;
$pdf->SetXY(130,80);$pdf->Write(10,$r12_5);
$pdf->SetXY(165,80);$pdf->Write(10,$r12_4);
$pdf->SetXY(200,80);$pdf->Write(10,$r12_3);
$pdf->SetXY(235,80);$pdf->Write(10,$r12_1);
$pdf->SetXY(265,80);$pdf->Write(10,$r12);
$pdf->SetXY(26,88);$pdf->Write(10,'ผู้เชี่ยวชาญ');
$pdf->SetXY(95,88);$pdf->Write(10,$r8_2) ;
$pdf->SetXY(130,88);$pdf->Write(10,$r8_5);
$pdf->SetXY(165,88);$pdf->Write(10,$r8_4);
$pdf->SetXY(200,88);$pdf->Write(10,$r8_3);
$pdf->SetXY(235,88);$pdf->Write(10,$r8_1);
$pdf->SetXY(265,88);$pdf->Write(10,$r8);
$pdf->SetXY(26,96);$pdf->Write(10,'ผู้มีความรู้่ความสามารถพิเศษ');
$pdf->SetXY(95,96);$pdf->Write(10,$r9_2);
$pdf->SetXY(130,96);$pdf->Write(10,$r9_5);
$pdf->SetXY(165,96);$pdf->Write(10,$r9_4);
$pdf->SetXY(200,96);$pdf->Write(10,$r9_3);
$pdf->SetXY(235,96);$pdf->Write(10,$r9_1);
$pdf->SetXY(265,96);$pdf->Write(10,$r9);
$pdf->SetXY(26,104);$pdf->Write(10,'นักเรียนทุน');
$pdf->SetXY(95,104);$pdf->Write(10,$r11_2);
$pdf->SetXY(130,104);$pdf->Write(10,$r11_5);
$pdf->SetXY(165,104);$pdf->Write(10,$r11_4);
$pdf->SetXY(200,104);$pdf->Write(10,$r11_3);
$pdf->SetXY(235,104);$pdf->Write(10,$r11_1);
$pdf->SetXY(265,104);$pdf->Write(10,$r11);
$pdf->SetFont('angsana','B',16);
$pdf->SetXY(26,112);$pdf->Write(10,'สายสนับสนุน');
$pdf->SetFont('angsana','',16);
$pdf->SetXY(30,120);$pdf->Write(10,'1.ข้าราชการสาย ข');
$pdf->SetXY(95,120);$pdf->Write(10,$r2_2);
$pdf->SetXY(130,120);$pdf->Write(10,$r2_5);
$pdf->SetXY(165,120);$pdf->Write(10,$r2_4);
$pdf->SetXY(200,120);$pdf->Write(10,$r2_3);
$pdf->SetXY(235,120);$pdf->Write(10,$r2_1);
$pdf->SetXY(265,120);$pdf->Write(10,$r2);
$pdf->SetXY(30,128);$pdf->Write(10,'2.ข้าราชการสาย ค');
$pdf->SetXY(95,128);$pdf->Write(10,$r3_2);
$pdf->SetXY(130,128);$pdf->Write(10,$r3_5);
$pdf->SetXY(165,128);$pdf->Write(10,$r3_4);
$pdf->SetXY(200,128);$pdf->Write(10,$r3_3);
$pdf->SetXY(235,128);$pdf->Write(10,$r3_1);
$pdf->SetXY(265,128);$pdf->Write(10,$r3);
$pdf->SetXY(30,136);$pdf->Write(10,'3.ลูกจ้างประจำ');
$pdf->SetXY(95,136);$pdf->Write(10,$r4_2);
$pdf->SetXY(130,136);$pdf->Write(10,$r4_5);
$pdf->SetXY(165,136);$pdf->Write(10,$r4_4);
$pdf->SetXY(200,136);$pdf->Write(10,$r4_3);
$pdf->SetXY(235,136);$pdf->Write(10,$r4_1);
$pdf->SetXY(265,136);$pdf->Write(10,$r4);
$pdf->SetXY(30,144);$pdf->Write(10,'4.พนักงานปฏิับัติการ');
$pdf->SetXY(95,144);$pdf->Write(10,$r7_2);
$pdf->SetXY(130,144);$pdf->Write(10,$r7_5);
$pdf->SetXY(165,144);$pdf->Write(10,$r7_4);
$pdf->SetXY(200,144);$pdf->Write(10,$r7_3);
$pdf->SetXY(235,144);$pdf->Write(10,$r7_1);
$pdf->SetXY(265,144);$pdf->Write(10,$r7);
$pdf->SetXY(30,152);$pdf->Write(10,'5.ลูกจ้างชั่วคราว');
$pdf->SetXY(95,152);$pdf->Write(10,$r5_2);
$pdf->SetXY(130,152);$pdf->Write(10,$r5_5);
$pdf->SetXY(165,152);$pdf->Write(10,$r5_4);
$pdf->SetXY(200,152);$pdf->Write(10,$r5_3);
$pdf->SetXY(235,152);$pdf->Write(10,$r5_1);
$pdf->SetXY(265,152);$pdf->Write(10,$r5);
$pdf->SetXY(30,160);$pdf->Write(10,'6.ลูกจ้างรายวัน');
$pdf->SetXY(95,160);$pdf->Write(10,$r12_2);
$pdf->SetXY(130,160);$pdf->Write(10,$r12_5);
$pdf->SetXY(165,160);$pdf->Write(10,$r12_4);
$pdf->SetXY(200,160);$pdf->Write(10,$r12_3);
$pdf->SetXY(235,160);$pdf->Write(10,$r12_1);
$pdf->SetXY(265,160);$pdf->Write(10,$r12);
$pdf->SetXY(30,168);$pdf->Write(10,'7.พนักงานราชการ');
$pdf->SetXY(95,168);$pdf->Write(10,$r13_2);
$pdf->SetXY(130,168);$pdf->Write(10,$r13_5);
$pdf->SetXY(165,168);$pdf->Write(10,$r13_4);
$pdf->SetXY(200,168);$pdf->Write(10,$r13_3);
$pdf->SetXY(235,168);$pdf->Write(10,$r13_1);
$pdf->SetXY(265,168);$pdf->Write(10,$r13);
$pdf->SetFont('angsana','B',16);
$pdf->SetXY(26,176);$pdf->Write(10,'รวม');
$pdf->SetXY(95,176);$pdf->Write(10,$de2);
$pdf->SetXY(130,176);$pdf->Write(10,$de5);
$pdf->SetXY(165,176);$pdf->Write(10,$de4);
$pdf->SetXY(200,176);$pdf->Write(10,$de3);
$pdf->SetXY(235,176);$pdf->Write(10,$de1);
$pdf->SetXY(265,176);$pdf->Write(10,$sum);
$pdf->SetFont('angsana','',14);
$pdf->SetXY(26,186);$pdf->Write(1,$d);

//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์
$pdf->Output();
}
?> 

