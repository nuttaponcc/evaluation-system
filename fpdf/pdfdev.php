<?php

session_start();

include"../tools/connect-eval.php";
define(‘FPDF_FONTPATH’,'font/');

$query = "SELECT * FROM `staffinfo`  where   staffid = '$_SESSION[session_user_id]' ";
$result = mysql_query($query);
$r = mysql_fetch_assoc($result);

$query = "SELECT * FROM `dev`  where   devuserid= '$_SESSION[session_user_id]' ";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);

require('fpdf.php');
 
$pdf=new FPDF( 'L' , 'mm' , 'A4' );
$pdf->AddPage();

$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=6;

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนา
$pdf->SetFont('THSarabun','',13);


$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.1);

$pdf->SetFont('THSarabun','b',21);

$pdf->SetXY(145,4+$h*0);
$pdf->Cell(10,10,'แบบฟอร์มแผนพัฒนารายบุคคล',0,1,'C');

$pdf->SetFont('THSarabun','b',15);
$pdf->SetXY(145,4+$h*1);
$pdf->Cell(10,10,'  วงรอบที่ 1 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2567   ',0,1,'C');
$pdf->SetXY(145,4+$h*2);
$pdf->Cell(10,10,'ชื่อผู้รับการประเมิน ...'. $r['staffname'].'....ตำแหน่ง/ระดับ ....'. $r['staffposition'].'... ',0,1,'C');
$pdf->SetXY(145,4+$h*3);
//$pdf->Write(10,'                 ชื่อผู้บังคับบัญชา/ผู้ประเมิน ......'. $r['commander'].'.......  ตำแหน่ง/ระดับ .......'. $r['commanderposition'].'....... ');
$pdf->Cell(10,10,' สังกัด ...คณะวิทยาศาสตร์ มหาวิทยาลัยมหาสารคาม....       ระยะเวลาที่ดำรงตำแหน่ง ...'.$r['ptime'].'...   แผนพัฒนารายบุคคลประจำปี    ....2561....',0,1,'C');

$i=0;
$page=0;
$total=round(($num_rows+2) /4)+1;
while($r2 = mysql_fetch_assoc($result))
{

if($i==0)
{
$page++;
$pdf->SetFont('THSarabun','',13);
$pdf->SetXY(10,4+$h*5);
$pdf->Write(10,'  ที่                          ชื่อหัวข้อที่จะพัฒนา                                        เป้าหมายการพัฒนา                                                 วิธีการพัฒนา                                                         งบประมาณ    การวัดผลสำเร็จ');

$pdf->SetXY(222,6+$h*4);
$s="ระยะเวลา เริ่มต้นและ สิ้นสุด";
$pdf->MultiCell( 16 , 5 , $s ,'','C');


$x1=0;
$y1=20;
$x2=297;
$y2=48;
$h=6;

$pdf->Line($x1+10,$y1+10, $x2-10, $y1+10);

$pdf->Line($x1+10,$y1+10, $x1+10, $y2);
$pdf->Line($x2-10,$y1+10, $x2-10, $y2);

$pdf->Line($x1+10,$y1+10+$h*3, $x2-10, $y1+10+$h*3);
$pdf->Line(18,$y1+10, 18, $y2);
$pdf->Line(100,$y1+10, 100, $y2);
$pdf->Line(135,$y1+10, 135, $y2);
$pdf->Line(215,$y1+10, 215, $y2);
$pdf->Line(245,$y1+10, 245, $y2);
$pdf->Line(265,$y1+10, 265, $y2);

//$pdf->Line($x1+100,$y1+10+$h*10, $x1+170, $y1+10+$h*10);

$pdf->SetXY(250,10);
$pdf->Write(0,'หน้าที่  '.$pdf->PageNo().'  จาก '.$total.' หน้า');//. $narray.' array');

}

	$pdf->SetXY(12,50+6*$h*$i);
	$pdf->MultiCell( 30 , 5 , ($i+1+($page-1)*4) );        
	$s=$r2['subj'];
	$pdf->SetXY(19,50+6*$h*$i);
	$pdf->MultiCell( 80 , 5 , $s );        
	$s=$r2['gold'];
	$pdf->SetXY(100,50+6*$h*$i);
	$pdf->MultiCell( 35 , 5 , $s );        
	$s=$r2['method'];
	$pdf->SetXY(136,50+6*$h*$i);
	$pdf->MultiCell( 78 , 5 , $s);        
	$s=$r2['ptime'];
	$pdf->SetXY(215,50+6*$h*$i);
	$pdf->MultiCell( 30 , 5 , $s );        
	$s=$r2['status'];
	$pdf->SetXY(270,50+6*$h*$i);
	$pdf->MultiCell( 27 , 5 , $s );        
	$x1=0;

$y1=48;
$x2=297;
$y2=85;
$h=6;

$pdf->Line($x1+10,$y2+$i*35, $x2-10, $y2+$i*35);
$pdf->Line($x1+10,$y1+$i*35, $x1+10, $y2+$i*35);
$pdf->Line($x2-10,$y1+$i*35, $x2-10, $y2+$i*35);
$pdf->Line(18,$y1+$i*35, 18, $y2+$i*35);
$pdf->Line(100,$y1+$i*35, 100, $y2+$i*35);
$pdf->Line(135,$y1+$i*35, 135, $y2+$i*35);
$pdf->Line(215,$y1+$i*35, 215, $y2+$i*35);
$pdf->Line(245,$y1+$i*35, 245, $y2+$i*35);
$pdf->Line(265,$y1+$i*35, 265, $y2+$i*35);

	$i++;

	if(($i>=4)||(($i+($page-1)*4)==$num_rows))
	{
	   $i=0;
      $pdf->AddPage();
	}

}
//if($page==0)       $pdf->AddPage();
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

$pdf->SetDrawColor(0,0,0); 

$pdf->SetLineWidth(.1);

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',13);

$h=7;

$pdf->SetLeftMargin(18);
$pdf->SetXY(15,34+$h*3);
$pdf->Write(5,'                         ลงชื่อรับทราบแผนพัฒนารายบุคคล                                                        ลงชื่ออนุมัติแผนพัฒนารายบุคคล');
//$pdf->SetMargins(1,1,200);


$pdf->SetXY(15,34+$h*5);
$pdf->Write(10,'                      (…………………………................………………………)                                         (……………....................................................)                      ');
$pdf->SetXY(15,34+$h*6);
$pdf->Write(10,'                                        ผู้รับการพัฒนา                                                                             ผู้บังคับบัญชา        ');
$pdf->SetXY(15,34+$h*7);
$pdf->Write(10,'                 วันที่………….เดือน…………………………..พ.ศ………………                               วันที่………….เดือน…………………………..พ.ศ………………');

$pdf->SetFont('THSarabun','u',13);
$pdf->SetXY(15,34+$h*10);
$pdf->Write(10,'หมายเหตุ');
$pdf->SetFont('THSarabun','',13);
$pdf->SetXY(30,34+$h*10);
$pdf->Write(10,':      หากแผนพัฒนามีผล สำเร็จ ให้แนบรายงานผลการพัฒนาตนเองด้วย');
$pdf->SetXY(30,34+$h*11);
$pdf->Write(10,'       S  :  เรียนรู้ด้วยตนเอง      OJT :  การฝึกปฏิบัติ    C : การสอนงาน     PA : การมอบหมายงานเป็นโครงการ');
$pdf->SetXY(30,34+$h*12);
$pdf->Write(10,'       WS : การติดตามหัวหน้างาน    T/S :  ฝึกอบรม/สัมมนา  W : การประชุมเชิงปฏิบัติการ  Sym : การอภิปราย   Con : ปรึกษาหารือ');

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.1);

$x1=210;
$x2=280;
$y1=60;
$y2=120;
$h=6;

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->SetXY(210,34+$h*3);
$pdf->MultiCell( 70 , 35 , 'ลงชื่อรับทราบผล' ,0,'C');        
$pdf->SetXY(210,34+$h*4);
$pdf->MultiCell( 70 , 35 , 'การดำเนินการตามแผนพัฒนารายบุคคล' ,0,'C');        
$pdf->SetXY(210,34+$h*6);
$pdf->MultiCell( 70 , 35 , '(....................................................................)' ,0,'C');        
$pdf->SetXY(210,34+$h*7);
$pdf->MultiCell( 70 , 35 , 'ตำแหน่ง......................................................' ,0,'C');        
$pdf->SetXY(210,34+$h*8);
$pdf->MultiCell( 70 , 35 , ' ผู้บังคับบัญชา' ,0,'C');        
$pdf->SetXY(210,36+$h*9);
$pdf->MultiCell( 70 , 35 , 'วันที่...............................................................' ,0,'C');        



$pdf->SetXY(130,189);
$pdf->Write(0,'หน้าที่  '.$pdf->PageNo().'  จาก '.$total.' หน้า');//. $narray.' array');

$pdf->Output();

?>.
