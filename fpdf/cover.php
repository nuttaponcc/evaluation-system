<?php

session_start();

include"../tools/connect-eval.php";

$query = "SELECT * FROM `staffinfo`  where   staffid = '$_SESSION[session_user_id] ' ";
$result = mysql_query($query);
$r = mysql_fetch_assoc($result);

$query = "SELECT * FROM `behavior` where   userid  = '$_SESSION[session_user_id] ' ";
$result = mysql_query($query);
$r2 = mysql_fetch_assoc($result);

require('fpdf.php');
 
$pdf=new FPDF( 'L' , 'mm' , 'A4' );
$pdf->Open();
$pdf->AddPage();

//$pdf->AliasNbPages();
//$pdf->SetMargins(20,5,10);

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$x1=15;
$y1=5;
$x2=285;
$y2=45;
$h=6;


$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=12;

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนา
$pdf->SetFont('THSarabun','B',18);

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.1);
$pdf->Image('msulogo.PNG',135,20,-300);
$pdf->SetXY(240,4+$h*0);
$pdf->Write(10,'       แบบ ป. 01-02');                      
$pdf->SetXY(250,4+$h*5);
$pdf->Write(10,'                                                                          แบบข้อตกลงภาระงานและพฤติกรรมการปฏิบัติราชการ  (Term of Reference : TOR)');                      
$pdf->SetXY(250,$h*6);  
$pdf->Write(10,'                                                                                               ข้าราชการและพนักงาน  สังกัดมหาวิทยาลัยมหาสารคาม');                      
$pdf->SetXY(30,4+$h*8);
$pdf->Write(10,'ผู้ปฏิบัติงาน           '.$r['staffname']);           
$pdf->SetXY(30,4+$h*9);
$pdf->Write(10,'สังกัด                  คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหาสารคาม ');                      
$pdf->SetXY(30,4+$h*10);
$pdf->Write(10,'ตำแหน่ง               '. $r['staffposition']);                      
$pdf->SetXY(30,4+$h*11);
//$pdf->Write(10,'คุณวุฒิ                       ปริญญาตรี                ปริญญาโท               ปริญญาเอก');                      
$pdf->Write(10,'คุณวุฒิ                '.$r['staffedu']);                      
$pdf->SetXY(30,4+$h*12);
//$pdf->Write(10,'ประเภทบุคลากร           ข้าราชการ                 พนักงานในสถาบันอุดมศึกษา           ลูกจ้างชั่วคราว ');                      
$pdf->Write(10,'ประเภทบุคลากร     '.$r['staffcategory']);                      
$pdf->SetXY(30,4+$h*14);
$pdf->Write(10,'รายละเอียดข้อตกลง   วงรอบที่ 1 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2567   ');                     
                                                                        
/*
$pdf->SetLineWidth(.5);
$x1=70;
$y1=138;
$pdf->Line($x1,$y1, $x1+5, $y1);
$pdf->Line($x1,$y1, $x1, $y1+5);
$pdf->Line($x1+5,$y1, $x1+5, $y1+5);
$pdf->Line($x1,$y1+5, $x1+5, $y1+5);
$x1=112;
$pdf->Line($x1,$y1, $x1+5, $y1);
$pdf->Line($x1,$y1, $x1, $y1+5);
$pdf->Line($x1+5,$y1, $x1+5, $y1+5);
$pdf->Line($x1,$y1+5, $x1+5, $y1+5);
$x1=152;
$pdf->Line($x1,$y1, $x1+5, $y1);
$pdf->Line($x1,$y1, $x1, $y1+5);
$pdf->Line($x1+5,$y1, $x1+5, $y1+5);
$pdf->Line($x1,$y1+5, $x1+5, $y1+5);

$x1=70;
$y1=150;
$pdf->Line($x1,$y1, $x1+5, $y1);
$pdf->Line($x1,$y1, $x1, $y1+5);
$pdf->Line($x1+5,$y1, $x1+5, $y1+5);
$pdf->Line($x1,$y1+5, $x1+5, $y1+5);
$x1=112;
$pdf->Line($x1,$y1, $x1+5, $y1);
$pdf->Line($x1,$y1, $x1, $y1+5);
$pdf->Line($x1+5,$y1, $x1+5, $y1+5);
$pdf->Line($x1,$y1+5, $x1+5, $y1+5);
$x1=178;
$pdf->Line($x1,$y1, $x1+5, $y1);
$pdf->Line($x1,$y1, $x1, $y1+5);
$pdf->Line($x1+5,$y1, $x1+5, $y1+5);
$pdf->Line($x1,$y1+5, $x1+5, $y1+5);
*/

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
$h=8;
$pdf->AddPage();
$pdf->SetFont('THSarabun','',15);

$pdf->SetXY(30,$h*2);
$pdf->Write(0,'คำชี้แจง');
$pdf->SetXY(40,$h*3);
$pdf->Write(0,'1. แบบข้อตกลงภาระงานและพฤติกรรมการปฏิบัติราชการ (Term of Reference : TOR) ข้าราชการและพนักงาน สังกัดมหาวิทยาลัยมหาสารคามนี้ เป็นการกำหนด  ');
$pdf->SetXY(40,$h*4);
$pdf->Write(0,'    แผนการปฏิบัติงานของผู้ปฏิบัติงานในมหาวิทยาลัยมหาสารคาม ซึ่งเป็นข้อตกลงร่วมกับผู้บังคับบัญชาก่อนเริ่มปฏิบัติงาน');
$pdf->SetXY(40,$h*5);
$pdf->Write(0,'2. การกำหนดข้อตกลงร่วม ผู้ปฏิบัติงานจะต้องกรอกรายละเอียดภาระงานโดยสังเขปในส่วนของภาระงานตามหน้าที่ความรับผิดชอบของตำแหน่ง และ/หรือภาระงาน ');
$pdf->SetXY(40,$h*6);
$pdf->Write(0,'    ด้านอื่นๆ พร้อมกำหนดตัวชี้วัดความสำเร็จของภาระงานแต่ละรายการ ตลอดจนค่าเป้าหมาย และค่านำหนักร้อยละ สำหรับในส่วนของพฤติกรรมการปฏิบัติราชการ  ');
$pdf->SetXY(40,$h*7);
$pdf->Write(0,'    (สมรรถนะ) ให้ระบุระดับสมรรถนะค่ามาตรฐาน ');
$pdf->SetXY(40,$h*8);
$pdf->Write(0,'3. สำหรับการกรอกรายละเอียดภาระงานตามภารกิจ  ให้อ้างอิงการคำนวณภาระงานขั้นต่ำตามหลักเกณฑ์กรอบมาตรฐานภาระงานที่แนบท้ายประกาศ ก.บ.ม ');
$pdf->SetXY(40,$h*9);
$pdf->Write(0,'     มหาวิทยาลัยมหาสารคาม ที่บังคับใช้สำหรับการประเมินผลการปฏิบัติราชการ ');
$pdf->SetXY(40,$h*10);
$pdf->Write(0,'4. การกำหนดตัวชี้วัดความสำเร็จของงาน  ทั้งในส่วนของเชิงปริมาณและเชิงคุณภาพ  ให้เป็นการกำหนดข้อตกลงภายในหน่วยงานนั้นๆ  ');
$pdf->SetXY(40,$h*11);
$pdf->Write(0,'5. การจัดทำข้อตกลงภาระงานดังกล่าวนี้  เพื่อใช้เป็นกรอบในการประเมินผลการปฏิบัติราชการ  เพื่อประกอบการเลื่อนเงินเดือนแล ะค่าจ้างในแต่ละรอบการประเมิน');

$pdf->SetXY(130,189);
$pdf->Write(0,'หน้าที่  2 จาก 2 หน้า');//. $narray.' array');

$pdf->Output();

?>.