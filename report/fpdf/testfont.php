<?php
require('fpdf.php');
 
$pdf=new FPDF();
$pdf->AddPage();

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

$pdf->Output();
?>
