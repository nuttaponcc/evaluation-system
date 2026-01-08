<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>แบบประเมินความพึงพอใจระบบประเมินภาระงานบุคลากร(สายวิชาการ) </title>
</head>

<body>
<?
	include"../tools/connect-eval.php";
	$sql=" SELECT * FROM `survey`  ";	
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
   	 $sex[$row['sex']]++;
	 $type[$row['category']]++;
	 $department[$row['department']]++;
	 $p1+=$row['p1'];
	 $p2+=$row['p2'];
	 $p3+=$row['p3'];
	 $p4+=$row['p4'];
	 $p5+=$row['p5'];
	 $p6+=$row['p6'];
	 $p7+=$row['p7'];
	 $p8+=$row['p8'];
	 $p9+=$row['p9'];
	 $p10+=$row['p10'];
	 $p11+=$row['p11'];
	 $p12+=$row['p12'];
	 $p13+=$row['p13'];
	 $p14+=$row['p14'];
	 $p15+=$row['p15'];
	 $p16+=$row['p16'];
	 $p17+=$row['p17'];
	 $p18+=$row['p18'];
	 $p19+=$row['p19'];
	 $p20+=$row['p20'];
	 $p21+=$row['p21'];
	 $p22+=$row['p22'];
	 $p23+=$row['p23'];
	 $comment= $comment."<strong>ความคิดเห็นที่ </strong>".$i++.".<strong><br></strong>".$row['comment']."<br><br>";
	}
?>
<table border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFF99">
  <tbody>
    <tr>
      <td height="83" bgcolor="#FFCC00"><div align="center"> <br />
              <h3>ผลการประเมินความพึงพอใจระบบประเมินภาระงานบุคลากร(สายวิชาการ) <br />
                คณะวิทยาศาสตร์ มหาวิทยาลัยมหาสารคาม<br />
                จากจำนวนผุ้ตอบแบบสอบถาม <font color=0000ff> <?  echo $i ?>  </font> คน <br />
              </h3>
      </div></td>
    </tr>
    <tr>
      <td><table border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td><table border="0" cellpadding="5" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td colspan="2" bgcolor="#E2E2E2"><div align="left">
                    <h3><u>ตอนที่ 1</u> ข้อมูลทั่วไปของผู้ใช้บริการ</h3>
                    (โปรดทำเครื่องหมาย
                    <input value="3" checked="checked" name="f1" type="radio" />
                    หน้าคำตอบที่ตรงกับความเป็นจริง) </div></td>
                </tr>
                <tr>
                  <td width="100" align="left" valign="top"><strong>เพศ</strong></td>
                  <td width="674" align="left" valign="top">                  ชาย   <font color="0000ff">
                    <?  echo $sex[1] ?>
                  </font>คน<br />
                    หญิง <font color="0000ff">
                    <?  echo $sex[2] ?></font>
                    คน</font></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><strong>สถานภาพผู้ตอบ</strong></td>
                  <td align="left" valign="top"><p>ผู้บริหาร   <font color="0000ff"> <?  echo $type[1] ?> </font>คน<br />
                    อาจารย์    <font color="0000ff"> <?  echo $type[2] ?> </font>คน<br />
                      บุคลากรสายสนับสนุน   <font color="0000ff"> <?  echo $type[3] ?> </font>คน<br />
                      อื่นๆ       <font color="0000ff"> <?  echo $type[4] ?> </font>คน<br />
                    </td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td><table border="0" cellpadding="5" cellspacing="0" width="100%">
              <tr>
                <td width="14%" align="left"><strong>หน่วยงาน</strong></td>
                <td align="left">                  ภาควิชาคณิตศาสตร์    <font color="0000ff"> <?  echo $department[0] ?> </font>คน<br /></td>
                <td align="left">                  ภาควิชาเคมี    <font color="0000ff">
                  <?  echo $department[1] ?>
                  </font>คน</td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="left">                  ภาควิชาชีววิทยา    <font color="0000ff">
                <?  echo $department[2] ?>
                </font>คน</td>
                <td align="left">                  ภาควิชาฟิสิกส์  <font color="0000ff">
                  <?  echo $department[3] ?>
                  </font>คน</td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="left">                  คณะผู้บริหาร  <font color="0000ff">
                <?  echo $department[4] ?>
                </font>คน</td>
                <td align="left">                  สำนักงานเลขานุการ  <font color="0000ff">
                <?  echo $department[5] ?>
                </font>คน</td>
              </tr>
              <tr>
                <td></td>
                <td> </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" cellpadding="4" cellspacing="0">
              <tbody>
                <tr>
                  <td colspan="2" align="left" bgcolor="#E2E2E2"><h3><u>ตอนที่ 2</u> ท่านมีความพึงพอใจต่อการให้บริการมากน้อยเพียงใด </h3>
                    (โปรดทำเครื่องหมาย
                    <input value="3" checked="checked" name="f3" type="radio" />
                    หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                </tr>
                <tr>
                  <td><table bgcolor="#8595a3" border="0" cellpadding="3" cellspacing="1" width="99%">
                    <tbody>
                      <tr align="center" bgcolor="#cccccc">
                        <td rowspan="2" align="center"><div align="center"><strong>หัวข้อ</strong></div></td>
                        <td colspan="5" align="center"><div align="center"><strong>ระดับความพึงพอใจ</strong></div></td>
                      </tr>
                      <tr>
                        <td bgcolor="#cccccc"><div align="center"><strong>มากที่สุด</strong></div></td>
                        <td bgcolor="#cccccc"><div align="center"><strong>มาก</strong></div></td>
                        <td bgcolor="#cccccc"><div align="center"><strong>ปานกลาง</strong></div></td>
                        <td bgcolor="#cccccc"><div align="center"><strong>น้อย</strong></div></td>
                        <td bgcolor="#cccccc"><div align="center"><strong>น้อยที่สุด</strong></div></td>
                      </tr>
                      <tr bgcolor="#e0e4e8">
                        <td colspan="6"><strong>กระบวนการขั้นตอน/กระบวนการ</strong></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">1. มีการจัดหมวดหมู่ของรายการใช้งานได้อย่างชัดเจน   <? echo " <font color=\"0000ff\"> ".$p1."/".$i."=".$res=$p1/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">2. มีเมนูการใช้งานง่าย ไม่ซับซ้อน <? echo " <font color=\"0000ff\"> ".$p2."/".$i."=".$res=$p2/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">3. การเข้าถึงระบบทำได้ง่าย รวดเร็ว <? echo " <font color=\"0000ff\"> ".$p3."/".$i."=".$res=$p3/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">4. มีฟังก์ชันครอบคลุมการทำงาน<? echo " <font color=\"0000ff\"> ".$p4."/".$i."=".$res=$p4/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">5. ระบบมีขั้นตอนการทำงานเป็นลำดับเข้าใจง่าย<? echo " <font color=\"0000ff\"> ".$p5."/".$i."=".$res=$p5/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">6. ระบบมีการแสดงผลข้อมูลที่รวดเร็ว<? echo " <font color=\"0000ff\"> ".$p6."/".$i."=".$res=$p6/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#e0e4e8">
                        <td colspan="6"><strong>ด้านเนื้อหา</strong></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">7. ข้อมูลในระบบครอบคลุมความต้องการของผู้ใช้งาน<? echo " <font color=\"0000ff\"> ".$p7."/".$i."=".$res=$p7/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">8. ข้อมูลในระบบมีความถูกต้อง  ชัดเจน  น่าเชื่อถือ <? echo " <font color=\"0000ff\"> ".$p8."/".$i."=".$res=$p8/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">9. รายงานผลในระบบฯ  สามารถนำไปเป็นข้อมูลการตัดสินใจของผู้บริหารได้  <? echo " <font color=\"0000ff\"> ".$p9."/".$i."=".$res=$p9/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">10. ระบบแสดงข้อมูลได้อย่างเหมาะสม  ครบถ้วน<? echo " <font color=\"0000ff\"> ".$p10."/".$i."=".$res=$p10/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">11. ข้อมูลในระบบมีความเป็นปัจจุบัน<? echo " <font color=\"0000ff\"> ".$p11."/".$i."=".$res=$p11/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#e0e4e8">
                        <td colspan="6"><strong>ด้านประสิทธิภาพและความปลอดภัย</strong></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">12. ระบบฯ แสดงข้อมูลได้อย่างเหมาะสม ครบถ้วน<? echo " <font color=\"0000ff\"> ".$p12."/".$i."=".$res=$p12/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">13. ระบบฯ มีการตรวจสอบสถานะผู้ใช้งาน<? echo " <font color=\"0000ff\"> ".$p13."/".$i."=".$res=$p13/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">14. ระบบฯ มีการป้องกันข้อมูลเสียหาย<? echo " <font color=\"0000ff\"> ".$p14."/".$i."=".$res=$p14/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">15. ระบบฯ มีการเก็บรักษาข้อมูลอย่างมีประสิทธิภาพและปลอดภัย<? echo " <font color=\"0000ff\"> ".$p15."/".$i."=".$res=$p15/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#e0e4e8">
                        <td colspan="6"><strong>ด้านเจ้าหน้าที่ผู้ให้บริการ</strong></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">16. เจ้าหน้าที่สามารถตอบคำถาม หรือแก้ไขปัญหาจากการใช้งานได้ รวดเร็ว <? echo " <font color=\"0000ff\"> ".$p16."/".$i."=".$res=$p16/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">17. ความเหมาะสมในการแต่งกาย บุคลิก ลักษณะท่าทางของเจ้าหน้าที่ผู้ให้บริการ <? echo " <font color=\"0000ff\"> ".$p17."/".$i."=".$res=$p17/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">18. ความเอาใจใส่ กระตือรือร้น ความพร้อม และมีจิตสำนึกในการให้บริการของผู้ให้บริการ <? echo " <font color=\"0000ff\"> ".$p18."/".$i."=".$res=$p18/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">19. เจ้าหน้าที่ให้บริการต่อผู้รับบริการโดยไม่เลือกปฏิบัติตรงไปตรงมา <? echo " <font color=\"0000ff\"> ".$p19."/".$i."=".$res=$p19/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#e0e4e8">
                        <td colspan="6"><strong>ด้านความพึงพอใจต่อคุณภาพการให้บริการ</strong></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">20. ระบบสามารถตอบสนองความต้องการของผู้ใช้งานได้ดี <? echo " <font color=\"0000ff\"> ".$p20."/".$i."=".$res=$p20/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">21. ระบบสามารถช่วยอำนวยความสะดวกในการปฏิบัติงานได้ดีขึ้น<? echo " <font color=\"0000ff\"> ".$p21."/".$i."=".$res=$p21/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td align="left">22.  ระบบสามารถช่วยลดระยะเวลาการปฏิบัติงานให้เร็วขึ้นได้<? echo " <font color=\"0000ff\"> ".$p22."/".$i."=".$res=$p22/$i."</font>"?></td>
                        <td align="center"><?  if($res>=4.5)echo "/";?></td>
                        <td align="center"><?  if(($res<4.5)&&($res>=3.5))echo "/";?></td>
                        <td align="center"><?  if(($res<3.5)&&($res>=2.5))echo "/";?></td>
                        <td align="center"><?  if(($res<2.5)&&($res>=1.5))echo "/";?></td>
                        <td align="center"><?  if(($res<1.5))echo "/";?></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#E2E2E2"><h3><u>ตอนที่ 3 </u> ข้อเสนอแนะ<br />
                  </h3></td>
                </tr>
                <tr>
                  <td colspan="2"><? echo $comment ?></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center"> </div></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td> </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
</body>