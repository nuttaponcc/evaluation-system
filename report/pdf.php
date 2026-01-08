<?php


//กำหนด Header ส่วนที่เกี่ยวข้อง
$d=date("สำรวจ ณ วันที่ d/m/y H:i น");
include ('adodb/adodb.inc.php');
define('FPDF_FONTPATH','fpdf/font/');
require ('fpdf/jpdf.inc.php');

if($rep==1)
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


$pdf->Line(80,55, 255, 55);
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
$pdf->SetFillColor(220,220, 220); 
$pdf->Rect(125, 55, 15, 70 , 'F');
$pdf->Rect(185, 55, 15, 70 , 'F');
$pdf->Rect(245, 55, 15, 70 , 'F');

$pdf->Image("head.jpg",0,0,220,25);
$pdf->Rect(25, 45, 260, 80 , 'D');
//$pdf->SetFillColor(255,100, 100); 
//$pdf->Rect(20, 25, 175, 50 , 'D');
//$pdf->Line(25,45, 305, 195);


$pdf->Line(80,55, 260, 55);
$pdf->Line(25,65, 285, 65);
$pdf->Line(25,73, 285, 73);
$pdf->Line(25,81, 285, 81);
$pdf->Line(25,89, 285, 89);
$pdf->Line(25,97, 285, 97);
$pdf->Line(25,105, 285, 105);
$pdf->Line(25,113, 285, 113);
$pdf->Line(80,45, 80, 125);
$pdf->Line(95,55, 95, 125);
$pdf->Line(110,55, 110, 125);
$pdf->Line(125,55, 125, 125);
$pdf->Line(140,45, 140, 125);
$pdf->Line(155,55, 155, 125);
$pdf->Line(170,55, 170, 125);
$pdf->Line(185,55, 185, 125);
$pdf->Line(200,45, 200, 125);
$pdf->Line(215,55, 215, 125);
$pdf->Line(230,55, 230, 125);
$pdf->Line(245,55, 245, 125);
$pdf->Line(260,45, 260, 125);



$pdf->SetXY(50,15);
$pdf->SetFont('angsana','B',16);
$pdf->Write(10,'ระบบจัดการงานบุคคล');
$pdf->SetXY(50,20);
$pdf->Write(10,'คณะวิทยาศาสตร์');
$pdf->SetXY(120,30);
$pdf->Write(10,'รายงานจำนวนข้าราชการ แยกตามวุฒิการศึกษา');
$pdf->SetXY(43,50);
$pdf->Write(10,'ข้อมูล');
$pdf->SetXY(100,45);
$pdf->Write(10,'  สาย ก                                                    สาย ข                                                      สาย ค');
$pdf->SetXY(265,50);
$pdf->Write(10,'รวม');
$pdf->SetFontSize(16);
$pdf->SetXY(85,55);
$pdf->Write(10,' ตรี           โท           เอก         รวม           ตรี          โท           เอก          รวม           ตรี           โท           เอก          รวม   ');

$rt00=$r0+$r1+$r2;
$rt01=$r3+$r4+$r5;
$rt02=$r6+$r7+$r8;
$rt0=$rt00+$rt01+$rt02;

$rt10=$r9+$r10+$r11;
$rt11=$r12+$r13+$r14;
$rt12=$r15+$r16+$r17;
$rt1=$rt10+$rt11+$rt12;

$rt20=$r18+$r19+$r20;
$rt21=$r21+$r22+$r23;
$rt22=$r24+$r25+$r26;
$rt2=$rt20+$rt21+$rt22;

$rt30=$r27+$r28+$r29;
$rt31=$r30+$r31+$r32;
$rt32=$r33+$r34+$r35;
$rt3=$rt30+$rt31+$rt32;

$rt40=$r36+$r37+$r38;
$rt41=$r39+$r40+$r41;
$rt42=$r42+$r43+$r44;
$rt4=$rt40+$rt41+$rt42;

$rt50=$r45+$r46+$r47;
$rt51=$r48+$r49+$r50;
$rt52=$r51+$r52+$r53;
$rt5=$rt50+$rt51+$rt52;

$t0=$r0+$r9+$r18+$r27+$r36+$r45;
$t1=$r1+$r10+$r19+$r28+$r37+$r46;
$t2=$r2+$r11+$r20+$r29+$r38+$r47;
$t3=$rt00+$rt10+$rt20+$rt30+$rt40+$rt50;
$t4=$r3+$r12+$r21+$r30+$r39+$r48;
$t5=$r4+$r13+$r22+$r31+$r40+$r49;
$t6=$r5+$r14+$r23+$r32+$r41+$r50;
$t7=$rt01+$rt11+$rt21+$rt31+$rt41+$rt51;
$t8=$r6+$r15+$r24+$r33+$r42+$r51;
$t9=$r7+$r16+$r25+$r34+$r43+$r52;
$t10=$r8+$r17+$r26+$r35+$r44+$r53;
$t11=$rt02+$rt12+$rt22+$rt32+$rt42+$rt52;
$t12=$t3+$t7+$t11;



$pdf->SetFont('angsana','',16);
$pdf->SetXY(26,64);$pdf->Write(10,'สำนักงานเลขานุการ');
$pdf->SetXY(85,64);$pdf->Write(10,$r0) ;
$pdf->SetXY(100,64);$pdf->Write(10,$r1);
$pdf->SetXY(115,64);$pdf->Write(10,$r2);
$pdf->SetXY(130,64);$pdf->Write(10,$rt00);

$pdf->SetXY(145,64);$pdf->Write(10,$r3);
$pdf->SetXY(160,64);$pdf->Write(10,$r4);
$pdf->SetXY(175,64);$pdf->Write(10,$r5);
$pdf->SetXY(190,64);$pdf->Write(10,$rt01);

$pdf->SetXY(205,64);$pdf->Write(10,$r6) ;
$pdf->SetXY(220,64);$pdf->Write(10,$r7) ;
$pdf->SetXY(235,64);$pdf->Write(10,$r8) ;
$pdf->SetXY(250,64);$pdf->Write(10,$rt02) ;

$pdf->SetXY(270,64);$pdf->Write(10,$rt0) ;

$pdf->SetXY(26,72);$pdf->Write(10,'ภาควิชาเคมี');
$pdf->SetXY(85,72);$pdf->Write(10,$r9) ;
$pdf->SetXY(100,72);$pdf->Write(10,$r10);
$pdf->SetXY(115,72);$pdf->Write(10,$r11);
$pdf->SetXY(130,72);$pdf->Write(10,$rt10);

$pdf->SetXY(145,72);$pdf->Write(10,$r12);
$pdf->SetXY(160,72);$pdf->Write(10,$r13);
$pdf->SetXY(175,72);$pdf->Write(10,$r14);
$pdf->SetXY(190,72);$pdf->Write(10,$rt11);

$pdf->SetXY(205,72);$pdf->Write(10,$r15) ;
$pdf->SetXY(220,72);$pdf->Write(10,$r16) ;
$pdf->SetXY(235,72);$pdf->Write(10,$r17) ;
$pdf->SetXY(250,72);$pdf->Write(10,$rt12) ;

$pdf->SetXY(270,72);$pdf->Write(10,$rt1) ;

$pdf->SetXY(26,80);$pdf->Write(10,'ภาควิชาฟิสิกส์');
$pdf->SetXY(85,80);$pdf->Write(10,$r18) ;
$pdf->SetXY(100,80);$pdf->Write(10,$r19);
$pdf->SetXY(115,80);$pdf->Write(10,$r20);
$pdf->SetXY(130,80);$pdf->Write(10,$rt20);

$pdf->SetXY(145,80);$pdf->Write(10,$r21);
$pdf->SetXY(160,80);$pdf->Write(10,$r22);
$pdf->SetXY(175,80);$pdf->Write(10,$r23);
$pdf->SetXY(190,80);$pdf->Write(10,$rt21);

$pdf->SetXY(205,80);$pdf->Write(10,$r24) ;
$pdf->SetXY(220,80);$pdf->Write(10,$r25) ;
$pdf->SetXY(235,80);$pdf->Write(10,$r26) ;
$pdf->SetXY(250,80);$pdf->Write(10,$rt22) ;

$pdf->SetXY(270,80);$pdf->Write(10,$rt2) ;

$pdf->SetXY(26,88);$pdf->Write(10,'ภาควิชาชีววิทยา');
$pdf->SetXY(85,88);$pdf->Write(10,$r27) ;
$pdf->SetXY(100,88);$pdf->Write(10,$r28);
$pdf->SetXY(115,88);$pdf->Write(10,$r29);
$pdf->SetXY(130,88);$pdf->Write(10,$rt30);

$pdf->SetXY(145,88);$pdf->Write(10,$r30);
$pdf->SetXY(160,88);$pdf->Write(10,$r31);
$pdf->SetXY(175,88);$pdf->Write(10,$r32);
$pdf->SetXY(190,88);$pdf->Write(10,$rt31);

$pdf->SetXY(205,88);$pdf->Write(10,$r33) ;
$pdf->SetXY(220,88);$pdf->Write(10,$r34) ;
$pdf->SetXY(235,88);$pdf->Write(10,$r35) ;
$pdf->SetXY(250,88);$pdf->Write(10,$rt32) ;

$pdf->SetXY(270,88);$pdf->Write(10,$rt3) ;

$pdf->SetXY(26,96);$pdf->Write(10,'ภาควิชาคณิตศาสตร์');
$pdf->SetXY(85,96);$pdf->Write(10,$r36) ;
$pdf->SetXY(100,96);$pdf->Write(10,$r37);
$pdf->SetXY(115,96);$pdf->Write(10,$r38);
$pdf->SetXY(130,96);$pdf->Write(10,$rt40);

$pdf->SetXY(145,96);$pdf->Write(10,$r39);
$pdf->SetXY(160,96);$pdf->Write(10,$r40);
$pdf->SetXY(175,96);$pdf->Write(10,$r41);
$pdf->SetXY(190,96);$pdf->Write(10,$rt41);

$pdf->SetXY(205,96);$pdf->Write(10,$r42) ;
$pdf->SetXY(220,96);$pdf->Write(10,$r43) ;
$pdf->SetXY(235,96);$pdf->Write(10,$r44) ;
$pdf->SetXY(250,96);$pdf->Write(10,$rt42) ;

$pdf->SetXY(270,96);$pdf->Write(10,$rt4) ;

$pdf->SetXY(26,104);$pdf->Write(10,'นักเรียนทุน');
$pdf->SetXY(85,104);$pdf->Write(10,$r45) ;
$pdf->SetXY(100,104);$pdf->Write(10,$r46);
$pdf->SetXY(115,104);$pdf->Write(10,$r47);
$pdf->SetXY(130,104);$pdf->Write(10,$rt50);

$pdf->SetXY(145,104);$pdf->Write(10,$r48);
$pdf->SetXY(160,104);$pdf->Write(10,$r49);
$pdf->SetXY(175,104);$pdf->Write(10,$r40);
$pdf->SetXY(190,104);$pdf->Write(10,$rt51);

$pdf->SetXY(205,104);$pdf->Write(10,$r51) ;
$pdf->SetXY(220,104);$pdf->Write(10,$r52) ;
$pdf->SetXY(235,104);$pdf->Write(10,$r53) ;
$pdf->SetXY(250,104);$pdf->Write(10,$rt52) ;

$pdf->SetXY(270,104);$pdf->Write(10,$rt5) ;

$pdf->SetFont('angsana','B',16);
$pdf->SetFont('angsana','B',16);
$pdf->SetXY(26,112);$pdf->Write(10,'รวม');
$pdf->SetXY(85,112);$pdf->Write(10,$t0) ;
$pdf->SetXY(100,112);$pdf->Write(10,$t1);
$pdf->SetXY(115,112);$pdf->Write(10,$t2);
$pdf->SetXY(130,112);$pdf->Write(10,$t3);

$pdf->SetXY(145,112);$pdf->Write(10,$t4);
$pdf->SetXY(160,112);$pdf->Write(10,$t5);
$pdf->SetXY(175,112);$pdf->Write(10,$t6);
$pdf->SetXY(190,112);$pdf->Write(10,$t7);

$pdf->SetXY(205,112);$pdf->Write(10,$t8) ;
$pdf->SetXY(220,112);$pdf->Write(10,$t9) ;
$pdf->SetXY(235,112);$pdf->Write(10,$t10) ;
$pdf->SetXY(250,112);$pdf->Write(10,$t11) ;

$pdf->SetXY(270,112);$pdf->Write(10,$t12) ;

$pdf->SetXY(95,176);$pdf->Write(10,$de2);
$pdf->SetXY(130,176);$pdf->Write(10,$de5);
$pdf->SetXY(165,176);$pdf->Write(10,$de4);
$pdf->SetXY(200,176);$pdf->Write(10,$de3);
$pdf->SetXY(235,176);$pdf->Write(10,$de1);
$pdf->SetXY(265,176);$pdf->Write(10,$sum);
$pdf->SetFont('angsana','',14);
$pdf->SetXY(26,120);$pdf->Write(1,$d);

//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์
$pdf->Output();
}


if($rep==3)
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
$pdf->Rect(25, 45, 200, 20 , 'F');
$pdf->SetFillColor(220,220, 220); 
$pdf->Rect(125, 55, 15, 70 , 'F');
$pdf->Rect(185, 55, 15, 70 , 'F');

$pdf->Image("head.jpg",0,0,220,25);
$pdf->Rect(25, 45, 200, 80 , 'D');
//$pdf->SetFillColor(255,100, 100); 
//$pdf->Rect(20, 25, 175, 50 , 'D');
//$pdf->Line(25,45, 305, 195);


$pdf->Line(80,55, 200, 55);
$pdf->Line(25,65, 225, 65);
$pdf->Line(25,73, 225, 73);
$pdf->Line(25,81, 225, 81);
$pdf->Line(25,89, 225, 89);
$pdf->Line(25,97, 225, 97);
$pdf->Line(25,105, 225, 105);
$pdf->Line(25,113, 225, 113);
$pdf->Line(80,45, 80, 125);
$pdf->Line(95,55, 95, 125);
$pdf->Line(110,55, 110, 125);
$pdf->Line(125,55, 125, 125);
$pdf->Line(140,45, 140, 125);
$pdf->Line(155,55, 155, 125);
$pdf->Line(170,55, 170, 125);
$pdf->Line(185,55, 185, 125);
$pdf->Line(200,45, 200, 125);
//$pdf->Line(215,55, 215, 125);
//$pdf->Line(230,55, 230, 125);
//$pdf->Line(245,55, 245, 125);
//$pdf->Line(260,45, 260, 125);



$pdf->SetXY(50,15);
$pdf->SetFont('angsana','B',16);
$pdf->Write(10,'ระบบจัดการงานบุคคล');
$pdf->SetXY(50,20);
$pdf->Write(10,'คณะวิทยาศาสตร์');
$pdf->SetXY(120,30);
$pdf->Write(10,'รายงานจำนวนพนักงาน แยกตามวุฒิการศึกษา ');
$pdf->SetXY(43,50);
$pdf->Write(10,'ข้อมูล');
$pdf->SetXY(90,45);
$pdf->Write(10,'    พนักงานวิชาการ                                     พนักงานปฏิบัติการ');
$pdf->SetXY(210,50);
$pdf->Write(10,'รวม');
$pdf->SetFontSize(16);
$pdf->SetXY(85,55);
$pdf->Write(10,' ตรี           โท           เอก         รวม           ตรี          โท           เอก          รวม  ');

$rt00=$r0_0_0+$r0_1_0+$r0_2_0;
$rt01=$r0_0_1+$r0_1_1+$r0_2_1;
$rt0=$rt00+$rt01;

$rt10=$r1_0_0+$r1_1_0+$r1_2_0;
$rt11=$r1_0_1+$r1_1_1+$r1_2_1;
$rt1=$rt10+$rt11;

$rt20=$r2_0_0+$r2_1_0+$r2_2_0;
$rt21=$r2_0_1+$r2_1_1+$r2_2_1;
$rt2=$rt20+$rt21;

$rt30=$r3_0_0+$r3_1_0+$r3_2_0;
$rt31=$r3_0_1+$r3_1_1+$r3_2_1;
$rt3=$rt30+$rt31;

$rt40=$r4_0_0+$r4_1_0+$r4_2_0;
$rt41=$r4_0_1+$r4_1_1+$r4_2_1;
$rt4=$rt40+$rt41;

$rt50=$r5_0_0+$r5_1_0+$r5_2_0;
$rt51=$r5_0_1+$r5_1_1+$r5_2_1;
$rt5=$rt50+$rt51;

$t0=$r0_0_0+$r1_0_0+$r2_0_0+$r3_0_0+$r4_0_0+$r5_0_0;
$t1=$r0_1_0+$r1_1_0+$r2_1_0+$r3_1_0+$r4_1_0+$r5_1_0;
$t2=$r0_2_0+$r1_2_0+$r2_2_0+$r3_2_0+$r4_2_0+$r5_2_0;
$t3=$rt00+$rt10+$rt20+$rt30+$rt40+$rt50;
$t4=$r0_0_1+$r1_0_1+$r2_0_1+$r3_0_1+$r4_0_1+$r5_0_1;
$t5=$r0_1_1+$r1_1_1+$r2_1_1+$r3_1_1+$r4_0_1+$r5_1_1;
$t6=$r0_2_1+$r1_2_1+$r2_2_1+$r3_2_1+$r4_2_1+$r5_2_1;
$t7=$rt01+$rt11+$rt21+$rt31+$rt41+$rt51;
$t8=$t3+$t7;

$pdf->SetFont('angsana','',16);
$pdf->SetXY(26,64);$pdf->Write(10,'สำนักงานเลขานุการ');
$pdf->SetXY(85,64);$pdf->Write(10,$r0_0_0) ;
$pdf->SetXY(100,64);$pdf->Write(10,$r0_1_0);
$pdf->SetXY(115,64);$pdf->Write(10,$r0_2_0);
$pdf->SetXY(130,64);$pdf->Write(10,$rt00);

$pdf->SetXY(145,64);$pdf->Write(10,$r0_0_1);
$pdf->SetXY(160,64);$pdf->Write(10,$r0_1_1);
$pdf->SetXY(175,64);$pdf->Write(10,$r0_2_1);
$pdf->SetXY(190,64);$pdf->Write(10,$rt01);


$pdf->SetXY(210,64);$pdf->Write(10,$rt0) ;

$pdf->SetXY(26,72);$pdf->Write(10,'ภาควิชาเคมี');
$pdf->SetXY(85,72);$pdf->Write(10,$r1_0_0) ;
$pdf->SetXY(100,72);$pdf->Write(10,$r1_1_0);
$pdf->SetXY(115,72);$pdf->Write(10,$r1_2_0);
$pdf->SetXY(130,72);$pdf->Write(10,$rt10);

$pdf->SetXY(145,72);$pdf->Write(10,$r1_0_1);
$pdf->SetXY(160,72);$pdf->Write(10,$r1_1_1);
$pdf->SetXY(175,72);$pdf->Write(10,$r1_2_1);
$pdf->SetXY(190,72);$pdf->Write(10,$rt11);

$pdf->SetXY(210,72);$pdf->Write(10,$rt1) ;

$pdf->SetXY(26,80);$pdf->Write(10,'ภาควิชาฟิสิกส์');
$pdf->SetXY(85,80);$pdf->Write(10,$r2_0_0) ;
$pdf->SetXY(100,80);$pdf->Write(10,$r2_1_0);
$pdf->SetXY(115,80);$pdf->Write(10,$r2_2_0);
$pdf->SetXY(130,80);$pdf->Write(10,$rt20);

$pdf->SetXY(145,80);$pdf->Write(10,$r2_0_1);
$pdf->SetXY(160,80);$pdf->Write(10,$r2_1_1);
$pdf->SetXY(175,80);$pdf->Write(10,$r2_2_1);
$pdf->SetXY(190,80);$pdf->Write(10,$rt21);

$pdf->SetXY(210,80);$pdf->Write(10,$rt2) ;

$pdf->SetXY(26,88);$pdf->Write(10,'ภาควิชาชีววิทยา');
$pdf->SetXY(85,88);$pdf->Write(10,$r3_0_0) ;
$pdf->SetXY(100,88);$pdf->Write(10,$r3_1_0);
$pdf->SetXY(115,88);$pdf->Write(10,$r3_2_0);
$pdf->SetXY(130,88);$pdf->Write(10,$rt30);

$pdf->SetXY(145,88);$pdf->Write(10,$r3_0_1);
$pdf->SetXY(160,88);$pdf->Write(10,$r3_1_1);
$pdf->SetXY(175,88);$pdf->Write(10,$r3_2_1);
$pdf->SetXY(190,88);$pdf->Write(10,$rt31);

$pdf->SetXY(210,88);$pdf->Write(10,$rt3) ;

$pdf->SetXY(26,96);$pdf->Write(10,'ภาควิชาคณิตศาสตร์');
$pdf->SetXY(85,96);$pdf->Write(10,$r4_0_0) ;
$pdf->SetXY(100,96);$pdf->Write(10,$r4_1_0);
$pdf->SetXY(115,96);$pdf->Write(10,$r4_2_0);
$pdf->SetXY(130,96);$pdf->Write(10,$rt40);

$pdf->SetXY(145,96);$pdf->Write(10,$r4_0_1);
$pdf->SetXY(160,96);$pdf->Write(10,$r4_1_1);
$pdf->SetXY(175,96);$pdf->Write(10,$r4_2_1);
$pdf->SetXY(190,96);$pdf->Write(10,$rt41);

$pdf->SetXY(210,96);$pdf->Write(10,$rt4) ;

$pdf->SetXY(26,104);$pdf->Write(10,'นักเรียนทุน');
$pdf->SetXY(85,104);$pdf->Write(10,$r5_0_0) ;
$pdf->SetXY(100,104);$pdf->Write(10,$r5_1_0);
$pdf->SetXY(115,104);$pdf->Write(10,$r5_2_0);
$pdf->SetXY(130,104);$pdf->Write(10,$rt50);

$pdf->SetXY(145,104);$pdf->Write(10,$r5_0_1);
$pdf->SetXY(160,104);$pdf->Write(10,$r5_1_1);
$pdf->SetXY(175,104);$pdf->Write(10,$r5_2_1);
$pdf->SetXY(190,104);$pdf->Write(10,$rt51);

$pdf->SetXY(210,104);$pdf->Write(10,$rt5) ;

$pdf->SetFont('angsana','B',16);
$pdf->SetFont('angsana','B',16);
$pdf->SetXY(26,112);$pdf->Write(10,'รวม');
$pdf->SetXY(85,112);$pdf->Write(10,$t0) ;
$pdf->SetXY(100,112);$pdf->Write(10,$t1);
$pdf->SetXY(115,112);$pdf->Write(10,$t2);
$pdf->SetXY(130,112);$pdf->Write(10,$t3);

$pdf->SetXY(145,112);$pdf->Write(10,$t4);
$pdf->SetXY(160,112);$pdf->Write(10,$t5);
$pdf->SetXY(175,112);$pdf->Write(10,$t6);
$pdf->SetXY(190,112);$pdf->Write(10,$t7);


$pdf->SetXY(210,112);$pdf->Write(10,$t8) ;

$pdf->SetFont('angsana','',14);
$pdf->SetXY(26,120);$pdf->Write(1,$d);

//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์
$pdf->Output();
}



if($rep==4)
{
//$pdf=new JPDF();
$pdf = new FPDF('P', 'mm');
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
$pdf->Rect(25, 45, 115, 20 , 'F');
$pdf->SetFillColor(220,220, 220); 
$pdf->Rect(125, 55, 15, 50 , 'F');


$pdf->Image("head.jpg",0,0,220,25);
$pdf->Rect(25, 45, 115, 60 , 'D');
//$pdf->SetFillColor(255,100, 100); 
//$pdf->Rect(20, 25, 175, 50 , 'D');
//$pdf->Line(25,45, 305, 195);


$pdf->Line(80,55, 140, 55);
$pdf->Line(25,65, 140, 65);
$pdf->Line(25,73, 140, 73);
$pdf->Line(25,81, 140, 81);
$pdf->Line(25,89, 140, 89);
$pdf->Line(80,45, 80, 105);
$pdf->Line(95,55, 95, 105);
$pdf->Line(110,55, 110, 105);
$pdf->Line(125,55, 125, 105);


$pdf->SetXY(50,15);
$pdf->SetFont('angsana','B',16);
$pdf->Write(10,'ระบบจัดการงานบุคคล');
$pdf->SetXY(50,20);
$pdf->Write(10,'คณะวิทยาศาสตร์');
$pdf->SetXY(120,5);
$pdf->Write(10,'       รายงานสายวิชาการ แยกตามวุฒิการศึกษา ');
$pdf->SetXY(43,50);
$pdf->Write(10,'ข้อมูล');
$pdf->SetXY(90,45);
$pdf->Write(10,'    พนักงานวิชาการ');

$pdf->SetFontSize(16);
$pdf->SetXY(85,55);
$pdf->Write(10,' ตรี           โท           เอก         รวม  ');

$rt00=$r0_0+$r0_1+$r0_2;

$rt10=$r1_0+$r1_1+$r1_2;

$rt20=$r2_0+$r2_1+$r2_2;

$t0=$r0_0+$r1_0+$r2_0;
$t1=$r0_1+$r1_1+$r2_1;
$t2=$r0_2+$r1_2+$r2_2;

$t3=$t0+$t1+$t2;

$pdf->SetFont('angsana','',16);
$pdf->SetXY(26,64);$pdf->Write(10,'ข้าราชการสาย ก');
$pdf->SetXY(85,64);$pdf->Write(10,$r0_0) ;
$pdf->SetXY(100,64);$pdf->Write(10,$r0_1);
$pdf->SetXY(115,64);$pdf->Write(10,$r0_2);
$pdf->SetXY(130,64);$pdf->Write(10,$rt00);

$pdf->SetXY(210,64);$pdf->Write(10,$rt0) ;

$pdf->SetXY(26,72);$pdf->Write(10,'พนักงานวิชาการ');
$pdf->SetXY(85,72);$pdf->Write(10,$r1_0) ;
$pdf->SetXY(100,72);$pdf->Write(10,$r1_1);
$pdf->SetXY(115,72);$pdf->Write(10,$r1_2);
$pdf->SetXY(130,72);$pdf->Write(10,$rt10);

$pdf->SetXY(26,80);$pdf->Write(10,'ผู้มีความรู้ความสามารถพิเศษ');
$pdf->SetXY(85,80);$pdf->Write(10,$r2_0) ;
$pdf->SetXY(100,80);$pdf->Write(10,$r2_1);
$pdf->SetXY(115,80);$pdf->Write(10,$r2_2);
$pdf->SetXY(130,80);$pdf->Write(10,$rt20);



$pdf->SetFont('angsana','B',16);
$pdf->SetFont('angsana','B',16);
$pdf->SetXY(26,88);$pdf->Write(10,'รวม');
$pdf->SetXY(85,88);$pdf->Write(10,$t0) ;
$pdf->SetXY(100,88);$pdf->Write(10,$t1);
$pdf->SetXY(115,88);$pdf->Write(10,$t2);
$pdf->SetXY(130,88);$pdf->Write(10,$t3);


$pdf->SetXY(210,112);$pdf->Write(10,$t8) ;

$pdf->SetFont('angsana','',14);
$pdf->SetXY(26,98);$pdf->Write(1,$d);

//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์
$pdf->Output();
}




if($rep==5)
{
//$pdf=new JPDF();
$pdf = new FPDF('P', 'mm');
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
$pdf->Rect(25, 45, 145, 20 , 'F');
$pdf->SetFillColor(220,220, 220); 
$pdf->Rect(150, 55, 20, 65 , 'F');


$pdf->Image("head.jpg",0,0,220,25);
$pdf->Rect(25, 45, 145, 75 , 'D');
//$pdf->SetFillColor(255,100, 100); 
//$pdf->Rect(20, 25, 175, 50 , 'D');
//$pdf->Line(25,45, 305, 195);


$pdf->Line(80,55, 170, 55);
$pdf->Line(25,65, 170, 65);
$pdf->Line(25,73, 170, 73);
$pdf->Line(25,81, 170, 81);
$pdf->Line(25,89, 170, 89);
$pdf->Line(25,97, 170, 97);
$pdf->Line(25,105, 170, 105);
$pdf->Line(80,45, 80, 120);
$pdf->Line(105,55, 105, 120);
$pdf->Line(120,55, 120, 120);
$pdf->Line(135,55, 135, 120);
$pdf->Line(150,55, 150, 120);


$pdf->SetXY(50,15);
$pdf->SetFont('angsana','B',16);
$pdf->Write(10,'ระบบจัดการงานบุคคล');
$pdf->SetXY(50,20);
$pdf->Write(10,'คณะวิทยาศาสตร์');
$pdf->SetXY(120,5);
$pdf->Write(10,'       รายงานสายวิชาการ แยกตามวุฒิการศึกษา ');
$pdf->SetXY(43,50);
$pdf->Write(10,'ข้อมูล');
$pdf->SetXY(90,45);
$pdf->Write(10,'    พนักงานวิชาการ');

$pdf->SetFontSize(16);
$pdf->SetXY(85,55);
$pdf->Write(10,'ต่ำกว่าตรี            ตรี           โท           เอก         รวม  ');

$rt00=$r0_0+$r0_1+$r0_2+$r0_3;

$rt10=$r1_0+$r1_1+$r1_2+$r1_3;

$rt20=$r2_0+$r2_1+$r2_2+$r2_3;

$rt30=$r3_0+$r3_1+$r3_2+$r3_3;

$rt40=$r4_0+$r4_1+$r4_2+$r4_3;

$t0=$r0_0+$r1_0+$r2_0+$r3_0+$r4_0;
$t1=$r0_1+$r1_1+$r2_1+$r3_1+$r4_1;
$t2=$r0_2+$r1_2+$r2_2+$r3_2+$r4_2;
$t3=$r0_3+$r1_3+$r2_3+$r3_3+$r4_3;

$t4=$t0+$t1+$t2+$t3;

$pdf->SetFont('angsana','',16);
$pdf->SetXY(26,64);$pdf->Write(10,'ข้าราชการสาย ข');
$pdf->SetXY(90,64);$pdf->Write(10,$r0_0) ;
$pdf->SetXY(110,64);$pdf->Write(10,$r0_1);
$pdf->SetXY(125,64);$pdf->Write(10,$r0_2);
$pdf->SetXY(140,64);$pdf->Write(10,$r0_3);
$pdf->SetXY(155,64);$pdf->Write(10,$rt00);


$pdf->SetXY(26,72);$pdf->Write(10,'ข้าราชการสาย ค');
$pdf->SetXY(90,72);$pdf->Write(10,$r1_0) ;
$pdf->SetXY(110,72);$pdf->Write(10,$r1_1);
$pdf->SetXY(125,72);$pdf->Write(10,$r1_2);
$pdf->SetXY(140,72);$pdf->Write(10,$r1_3);
$pdf->SetXY(155,72);$pdf->Write(10,$rt10);

$pdf->SetXY(26,80);$pdf->Write(10,'ลูกจ้างประจำ');
$pdf->SetXY(90,80);$pdf->Write(10,$r2_0) ;
$pdf->SetXY(110,80);$pdf->Write(10,$r2_1);
$pdf->SetXY(125,80);$pdf->Write(10,$r2_2);
$pdf->SetXY(140,80);$pdf->Write(10,$r2_3);
$pdf->SetXY(155,80);$pdf->Write(10,$rt20);

$pdf->SetXY(26,88);$pdf->Write(10,'ลูกจ้างชั่วคราว');
$pdf->SetXY(90,88);$pdf->Write(10,$r3_0) ;
$pdf->SetXY(110,88);$pdf->Write(10,$r3_1);
$pdf->SetXY(125,88);$pdf->Write(10,$r3_2);
$pdf->SetXY(140,88);$pdf->Write(10,$r3_3);
$pdf->SetXY(155,88);$pdf->Write(10,$rt30);

$pdf->SetXY(26,96);$pdf->Write(10,'พนักงานปฏิบัติการ');
$pdf->SetXY(90,96);$pdf->Write(10,$r4_0) ;
$pdf->SetXY(110,96);$pdf->Write(10,$r4_1);
$pdf->SetXY(125,96);$pdf->Write(10,$r4_2);
$pdf->SetXY(140,96);$pdf->Write(10,$r4_3);
$pdf->SetXY(155,96);$pdf->Write(10,$rt40);


$pdf->SetFont('angsana','B',16);
$pdf->SetFont('angsana','B',16);
$pdf->SetXY(26,105);$pdf->Write(10,'รวม');
$pdf->SetXY(90,105);$pdf->Write(10,$t0) ;
$pdf->SetXY(110,105);$pdf->Write(10,$t1);
$pdf->SetXY(125,105);$pdf->Write(10,$t2);
$pdf->SetXY(140,105);$pdf->Write(10,$t3);
$pdf->SetXY(155,105);$pdf->Write(10,$t4);


$pdf->SetXY(210,112);$pdf->Write(10,$t4) ;

$pdf->SetFont('angsana','',14);
$pdf->SetXY(26,115);$pdf->Write(1,$d);

//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์
$pdf->Output();
}

?> 

