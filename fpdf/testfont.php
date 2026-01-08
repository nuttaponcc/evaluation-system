<?php

session_start();

require('fpdf.php');
 
//$pdf=new FPDF();

$pdf=new FPDF( 'L' , 'mm' , 'A4' );
//$pdf=new FPDF( 'L' , 'mm' , array( 297,225 ));


$pdf->AddPage();
/*
$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',30);
$pdf->Cell(0,0,'ข้อความทดสอบ');
$pdf->Ln(15);

$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนา
$pdf->SetFont('THSarabun','b',30);
$pdf->Cell(0,0,'ข้อความทดสอบ');
$pdf->Ln(15);

$pdf->AddFont('THSarabun','i','THSarabun Italic.php');//อียง
$pdf->SetFont('THSarabun','i',30);
$pdf->Cell(0,0,'ข้อความทดสอบ');
$pdf->Ln(15);

$pdf->AddFont('THSarabun','bi','THSarabun BoldItalic.php');//หนาเอียง
$pdf->SetFont('THSarabun','bi',30);
$pdf->Cell(0,0,'ข้อความทดสอบ');
*/


$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=6;
//$pdf->SetFillColor(255,255, 200); 


$pdf->SetDrawColor(200,200, 200); 
$pdf->SetLineWidth(.1);

for($n=1;$n<=30;$n++)
{
	 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
}

$pdf->SetFillColor(255,255, 255); 
$pdf->Rect($x1, $y1+$h*4, $x2-$x1, $h*3 , 'F');

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.2);
$n=4;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=7;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=4;
 $pdf->Line($x1+170,$y1+$n*$h, $x1+170, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+190, $y2);
 $pdf->Line($x1+215,$y1+$n*$h, $x1+215, $y2);
 $pdf->Line($x1+230,$y1+$n*$h, $x1+230, $y2);
 $pdf->Line($x1+250,$y1+$n*$h, $x1+250, $y2);
$n=6;
 $pdf->Line($x1+195,$y1+$n*$h, $x1+195, $y2);
 $pdf->Line($x1+200,$y1+$n*$h, $x1+200, $y2);
 $pdf->Line($x1+205,$y1+$n*$h, $x1+205, $y2);
 $pdf->Line($x1+210,$y1+$n*$h, $x1+210, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+215, $y1+$n*$h);

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',13);

$pdf->SetXY(15,4);
$pdf->Write(10,'                                                          ข้อตกลงและแบบการประเมินผลสัมฤทธิ์ของงานของข้าราชการและพนักงาน สังกัดมหาวิทยาลัยมหาสารคาม (องค์ประกอบที่ 1)                                                    ป.01');
$pdf->SetXY(15,4+$h*1);
$pdf->Write(10,'รอบการประเมิน        รอบที่ 1 (.........เดือน........................พ.ศ. ........... )     วงรอบที่ 2 (1 มีนาคม พ.ศ. 2557 ถึง 31 สิงหาคม พ.ศ. 2557)');
$pdf->SetXY(15,4+$h*2);
$pdf->Write(10,'ชื่อผู้รับการประเมิน   .....'. $name.'......ตำแหน่ง/ระดับ ........'. $level.'.......... สังกัด .................คณะวิทยาศาสตร์............');
$pdf->SetXY(15,4+$h*3);
$pdf->Write(10,'ชื่อผู้บังคับบัญชา/ผู้ประเมิน ......'. $name2.'.......  ตำแหน่ง/ระดับ .......'. $level2.'........');
$pdf->SetXY(15,6+$h*4);
$pdf->Write(10,'                                                                                                                                                                               ภาระงาน        ระดับเป้าหมาย');
$pdf->SetXY(15,4+$h*6);
$pdf->Write(10,'                                                                                                                                                                                                 1   2   3    4   5');
$pdf->SetXY(15,4+$h*5);
$pdf->Write(10,'                                                                    กิจกรรม/โครงการ/งาน                                                                             ');
$pdf->SetXY(15,4+$h*5);
$pdf->SetFont('THSarabun','',10);
$pdf->Write(10,'                                                                                                                                                                                                                               (คำนวณตามเกณฑ์)');
$pdf->SetFont('THSarabun','',12);
$pdf->SetXY(15,3+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                            ค่าคะแนน       น้ำหนัก(2)         ค่าคะแนน');
$pdf->SetXY(15,7+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                              ที่ได้(1)      (ความสำคัญ /       ถ่วงน้ำหนัก');
$pdf->SetXY(15,11+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                                             ความยากง่าย      (1)x(2)/100');
$pdf->SetXY(15,15+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                                                ของงาน');
//$pdf->SetXY(250,1);$pdf->Write(19,'หน้าที่ .... จาก.... ');
$pdf->SetXY(150,189);
$pdf->Write(0,'หน้าที่ '.$pdf->PageNo().'  จาก');

$pdf->AddPage();
/*  -------------------------------------------------------------------------------------------------------------------------------- */

$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=6;
//$pdf->SetFillColor(255,255, 200); 

$pdf->SetDrawColor(200,200, 200); 
$pdf->SetLineWidth(.1);

for($n=1;$n<=30;$n++)
{
	 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
}

$pdf->SetFillColor(255,255, 255); 
$pdf->Rect($x1, $y1+$h*0, $x2-$x1, $h*3 , 'F');

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.2);
$n=0;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=3;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=0;
 $pdf->Line($x1+170,$y1+$n*$h, $x1+170, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+190, $y2);
 $pdf->Line($x1+215,$y1+$n*$h, $x1+215, $y2);
 $pdf->Line($x1+230,$y1+$n*$h, $x1+230, $y2);
 $pdf->Line($x1+250,$y1+$n*$h, $x1+250, $y2);
$n=2;
 $pdf->Line($x1+195,$y1+$n*$h, $x1+195, $y2);
 $pdf->Line($x1+200,$y1+$n*$h, $x1+200, $y2);
 $pdf->Line($x1+205,$y1+$n*$h, $x1+205, $y2);
 $pdf->Line($x1+210,$y1+$n*$h, $x1+210, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+215, $y1+$n*$h);

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',13);

$pdf->SetXY(15,6+$h*0);
$pdf->Write(10,'                                                                                                                                                                               ภาระงาน        ระดับเป้าหมาย');
$pdf->SetXY(15,4+$h*2);
$pdf->Write(10,'                                                                                                                                                                                                 1   2   3    4   5');
$pdf->SetXY(15,4+$h*1);
$pdf->Write(10,'                                                                    กิจกรรม/โครงการ/งาน                                                                             ');
$pdf->SetXY(15,4+$h*1);
$pdf->SetFont('THSarabun','',10);
$pdf->Write(10,'                                                                                                                                                                                                                               (คำนวณตามเกณฑ์)');
$pdf->SetFont('THSarabun','',12);
$pdf->SetXY(15,3+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                            ค่าคะแนน       น้ำหนัก(2)         ค่าคะแนน');
$pdf->SetXY(15,7+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                              ที่ได้(1)      (ความสำคัญ /       ถ่วงน้ำหนัก');
$pdf->SetXY(15,11+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                                             ความยากง่าย      (1)x(2)/100');
$pdf->SetXY(15,15+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                                                ของงาน');
//$pdf->SetXY(250,1);$pdf->Write(19,'หน้าที่ .... จาก.... ');
$pdf->SetXY(150,189);
$pdf->Write(0,'หน้าที่ '.$pdf->PageNo().'  จาก');

//$pdf->AddPage();
	
	
$pdf->Output();

?>.
