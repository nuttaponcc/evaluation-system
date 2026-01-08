<?
include"tools/connect-eval.php";
//session_start();

$userid=$_GET['id'];
$_SESSION[session_staff]=$userid;
        $Mquery = "SELECT * FROM `staffinfo`  where   staffid = '$_SESSION[session_user_id] ' ";	
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);
		
		
		
		if(!( $Mrow ['m']||$Mrow ['p']||$Mrow ['b']||$Mrow ['c']||$Mrow ['a']) )
		{  
				header("Location: http://202.28.32.130/evaluation/iindex.php");
				exit();		
				echo "ไม่สามารถให้งานระบบได้";
		}


$id=$_GET['id'];

	    $Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$id;
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);

			    $query = "SELECT * FROM `weight`,`wselect` where  weight.id=wselect.wtid and wselect.userid=$id ";
				$result = mysql_query($query);
				if($row = mysql_fetch_assoc($result))
				{

				}else{
				$query = "SELECT * FROM `weight` where 1 limit 1";
				$result = mysql_query($query);
				$row = mysql_fetch_assoc($result);
				}
				$weight1=$row['w1'];
				$weight2=$row['w2'];
				$weight3=$row['w3'];
				$weight4=$row['w4'];
				$weight5=$row['w5'];
			echo " weight $weight1 : $weight2 : $weight3 : $weight4 : $weight5  ";	
				if($row['status'])$percent=50; else $percent=70;
				//echo "test  $weight1  $weight2  $weight3 $weight4 $weight5";
$_SESSION[session_staff2]=$Mrow ['staffposition']." ".$Mrow ['staffname'];
				
				echo  "<table bgcolor=ff0000  cellpadding=10 cellspacing=5><tr><td  bgcolor=ff5555 >คุณกำลังเข้าถึงข้อมูลของ  : ".$Mrow ['staffposition']." ".$Mrow ['staffname']."<br>";
				echo "สังกัด :  ".$Mrow ['staffmajor']."<br>โปรดระมัดระวังการแก้ไขข้อมูล ";
				echo '<a href="http://202.28.32.138/evaluation/index.php?menu=research-com" target="_blank" ><input name="b1" type="button" value="ดูข้อมูลการวิจัยย้อนหลัง" /></a></td></tr></table><br>';
?>
<div align="left">
<strong>|  <a href="#1">1) ภาระงานด้านการสอน</a> | <a href="#2">2) ภาระงานด้านวิจัย</a> | <a href="#3">3) ภาระงานด้านการบริการวิชาการ</a> | <a href="#4">4) ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</a> | <a href="#5">5) ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</a>  |</strong>
<br />
<br />

  <table border="0" cellpadding="5" cellspacing="2" bgcolor="#666666">
  <tr>
    <td align="left" valign="top" bgcolor="#FF3300"><div align="center">กิจกรรม/โครงการ/งาน</div> </td>
    <td align="left" valign="top" bgcolor="#FF3300"><div align="center">ภาระงาน<br />
    (คำนวณตามเกณฑ์)</div></td>
    <td align="left" valign="top" bgcolor="#FF3300"><div align="center">ไฟล์เอกสารประกอบ</div></td>
    <td align="left" valign="top" bgcolor="#FF3300">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FF3300">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FF99CC"><a name="1" id="1"></a>1. ภาระงานด้านการสอน</td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FF99CC"><p><img src="images/formula/1-1.jpg" width="466" height="50" /></p>
      <p><img src="images/formula/1-2.jpg" width="466" height="50" /> สำหรับผู้บริหาร </p></td>
    <td align="right" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FF99CC"><?=$lock04?></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.1) การสอนภาคบรรยาย </td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=3 มีรายละเอียดของรายวิชา (มคอ.3) และ รายละเอียดของประสบการณ์ (มคอ.4)(ถ้ามี) <br />
      ตัวคูณ=4 มี มคอ.5 และ มคอ.6 (ถ้ามี) และส่งผลการ เรียนภายในระยะเวลาที่คณะกำหนด <br />
      ตัวคูณ=5 มีการจัดการเรียนการสอนที่พัฒนาจาก งานวิจัย หรือมีการจัดการความรู้เพื่อพัฒนาการเรียน การสอน หรือมีการนำประสบการณ์จากการให้บริการ วิชาการสู่สังคมหรือชุมชนมาพัฒนาการจัดการเรียน การสอน</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><?  if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
  <?
    $sum=0;
   	$query = "SELECT * FROM `workload`,`course`,`lectures`  where lectures.courseid=course.id and lectures.workload=workload.id and  userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$row['t']."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-lectures-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-lectures-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	 </td>";
	echo " </tr>";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.2) การสอนภาคปฏิบัติ</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=3 มีรายละเอียดของรายวิชา (มคอ.3) และ รายละเอียดของประสบการณ์ (ถ้ามี) (มคอ.4)<br />
      ตัวคูณ=4 มี มคอ.3 และ มคอ.4 (ถ้ามี) และส่งผลการ เรียนภายในระยะเวลาที่คณะกำหนด<br />
      ตัวคูณ=5 มีการจัดการเรียนการสอนที่พัฒนาจาก งานวิจัย หรือมีการจัดการความรู้เพื่อพัฒนาการเรียน การสอน หรือมีการนำประสบการณ์จากการให้บริการ วิชาการสู่สังคมหรือชุมชนมาพัฒนาการจัดการเรียน การสอน</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-practices-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
   <?
  echo 	$query = "SELECT * FROM `workload`,`course`,`practices`  where practices.courseid=course.id and practices.workload=workload.id and  userid=$userid ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['credit']-$row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">  ". ($row['credit']-$row['t'])."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0)echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
	
	    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-practices-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-practices-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	 	</td>
";
echo "  </tr>	";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.3) ผู้ประสานงานรายวิชา</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=3 มีรายละเอียดของรายวิชา (มคอ.3) และ รายละเอียดของประสบการณ์ (ถ้ามี) (มคอ.4) <br />
ตัวคูณ=4 มี มคอ.3 และ มคอ.4 (ถ้ามี) และส่งผลการ เรียนภายในระยะเวลาที่คณะกำหนด <br />
ตัวคูณ=5 มีการจัดการเรียนการสอนที่พัฒนาจาก งานวิจัย   หรือมีการจัดการความรู้เพื่อพัฒนาการเรียน การสอน   หรือมีการนำประสบการณ์จากการให้บริการ   วิชาการสู่สังคมหรือชุมชนมาพัฒนาการจัดการเรียน   การสอน <br /></td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-coordinator-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
  </tr>
    <?
   	$query = "SELECT * FROM `workload`,`course`,`coordinator`  where coordinator.courseid=course.id and coordinator.workload=workload.id and  userid=$userid ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-coordinator-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-coordinator-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>		 </td>";
	echo "  </tr>	";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.4) การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=1 มีการจัดการให้คำปรึกษา/ควบคุม การฝึกงาน/ ปฏิบัติงานสหกิจ/ฝึกสอน/การทำโครงงาน/ปริญญา นิพนธ์ <br />
      ตัวคูณ=2 มีแผนการจัดการให้ คำปรึกษา/ควบคุม การ ฝึกงาน/ปฏิบัติงาน สหกิจ/ฝึกสอน/การทำโครงงาน/ ปริญญานิพนธ์ และมีการดำเนินการตามแผน <br />
      ตัวคูณ=3 นิสิตในที่ปรึกษาผ่านตามเกณฑ์ที่กำหนด/ตาม หลักสูตร/โครงการ <br />
      ตัวคูณ=4 ผลงานของนิสิตในที่ปรึกษาได้รับการนำเสนอผลงานในงานประชุมวิชาการระดับชาติหรือนานาชาติ (แบบปากเปล่า หรือแบบโปสเตอร์) <br />
      ตัวคูณ=5 ผลงานของนิสิตในที่ปรึกษาได้รับรางวัลระดับชาติหรือนานาชาติ</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-internships-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
    <?
   	$query = "SELECT * FROM `workload`,`internships`  where  internships.workload=workload.id and  userid=$userid ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 if($row['score']>0)
	 {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
		}else{
	 		$n=$row['amount']*$row['week']*$row['multiplier'];		
			$sc=$row['amount'];
		}	
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-internships-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-internships-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		 	</td>
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.5) ที่ปรึกษาโครงการปริญญานิพนธ์    ระดับปริญญาตรี<br /></td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=1 มีการจัดการให้คำปรึกษา/ควบคุม การฝึกงาน/ ปฏิบัติงานสหกิจ/ฝึกสอน/การทำโครงงาน/ปริญญา นิพนธ์<br />
      ตัวคูณ=2 มีแผนการจัดการให้ คำปรึกษา/ควบคุม การ ฝึกงาน/ปฏิบัติงาน สหกิจ/ฝึกสอน/การทำโครงงาน/ ปริญญานิพนธ์ และมีการดำเนินการตามแผน<br />
      ตัวคูณ=3 นิสิตในที่ปรึกษาผ่านตามเกณฑ์ที่กำหนด/ตาม หลักสูตร/โครงการ<br />
      ตัวคูณ=4 ผลงานของนิสิตในที่ปรึกษาได้รับการนำเสนอผลงานในงานประชุมวิชาการระดับชาติหรือนานาชาติ (แบบปากเปล่า หรือแบบโปสเตอร์)<br />
      ตัวคูณ=5 ผลงานของนิสิตในที่ปรึกษาได้รับรางวัลระดับชาติหรือนานาชาติ</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-ug-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
      <?
   	$query = "SELECT * FROM `workload`,`undergraduate-advisor`  where  `undergraduate-advisor`.`workload`=`workload`.`id` and  `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
	";
	if ($lock04==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-ug-advisor-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-ug-advisor-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	 	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.6)    ที่ปรึกษาวิทยานิพนธ์ ระดับปริญญาโทและเอก</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=1 มีการจัดการให้คำปรึกษา/ควบคุม การฝึกงาน/ ปฏิบัติงานสหกิจ/ฝึกสอน/การทำโครงงาน/ปริญญา นิพนธ์<br />
      ตัวคูณ=2 มีแผนการจัดการให้ คำปรึกษา/ควบคุม การ ฝึกงาน/ปฏิบัติงาน สหกิจ/ฝึกสอน/การทำโครงงาน/ ปริญญานิพนธ์ และมีการดำเนินการตามแผน<br />
      ตัวคูณ=3 นิสิตในที่ปรึกษาผ่านตามเกณฑ์ที่กำหนด/ตาม หลักสูตร/โครงการ<br />
      ตัวคูณ=4 ผลงานของนิสิตในที่ปรึกษาได้รับการนำเสนอผลงานในงานประชุมวิชาการระดับชาติหรือนานาชาติ (แบบปากเปล่า หรือแบบโปสเตอร์)<br />
      ตัวคูณ=5 ผลงานของนิสิตในที่ปรึกษาได้รับรางวัลระดับชาติหรือนานาชาติ</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-g-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
        <?
   	$query = "SELECT * FROM `workload`,`graduate-advisor`  where  `graduate-advisor`.`workload`=`workload`.`id` and  `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-g-advisor-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-g-advisor-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		 </td>
	";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.7) ที่ปรึกษาวิชาสัมมนา</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=1 มีการจัดการให้คำปรึกษา/ควบคุม การฝึกงาน/ ปฏิบัติงานสหกิจ/ฝึกสอน/การทำโครงงาน/ปริญญา นิพนธ์ <br />
ตัวคูณ=2 มีแผนการจัดการให้ คำปรึกษา/ควบคุม การ ฝึกงาน/ปฏิบัติงาน      สหกิจ/ฝึกสอน/การทำโครงงาน/ ปริญญานิพนธ์ และมีการดำเนินการตามแผน <br />
ตัวคูณ=3 นิสิตในที่ปรึกษาผ่านตามเกณฑ์ที่กำหนด/ตาม หลักสูตร/โครงการ <br />
ตัวคูณ=4 ผลงานของนิสิตในที่ปรึกษาได้รับการนำเสนอผลงานในงานประชุมวิชาการระดับชาติหรือนานาชาติ (แบบปากเปล่า หรือแบบโปสเตอร์) <br />
ตัวคูณ=5 ผลงานของนิสิตในที่ปรึกษาได้รับรางวัลระดับชาติหรือนานาชาติ </td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-seminar-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
          <?
   	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=`workload`.`id` and  `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 if($row['workload']==34) $week=1 ; else $week=$row['week'];
	  	$n=$row['score']*$week*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	 $t=$t."+$n";
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$week."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-seminar-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-seminar-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		 </td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.8)    อาจารย์ที่ปรึกษาทางด้านวิชาการ</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=1 มีการจัดการบริการให้คำปรึกษาทางวิชาการ และแนะแนวทางการใช้ชีวิตที่ถูกต้องแก่นิสิต <br />
ตัวคูณ=2 มีการจัดการบริการข้อมูลข่าวสารที่เป็น ประโยชน์ต่อนิสิต <br />
ตัวคูณ=3 มีการจัดกิจกรรมเพื่อพัฒนาประสบการณ์ทาง วิชาการหรือปลูกฝังคุณธรรมจริยธรรมให้แก่นิสิต <br />
ตัวคูณ=4 มีการประเมินผลคุณภาพของการให้บริการให้ คำปรึกษาการบริการข้อมูลและนำผลการประเมินมา ปรับปรุงคุณภาพการให้บริการ <br />
ตัวคูณ=5ได้รับรางวัลหรือเผยแพร่ระดับชาติ/นานาชาติ </td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-academic-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
            <?
   	$query = "SELECT * FROM `workload`,`academic-advisor`  where  `academic-advisor`.`workload`=`workload`.`id` and  `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-academic-advisor-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-academic-advisor-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		 	</td>
		";
		echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.9) อาจารย์ที่ปรึกษาด้านกิจกรรม</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ=1 มีการจัดการบริการให้คำปรึกษาทางวิชาการ และแนะแนวทางการใช้ชีวิตที่ถูกต้องแก่นิสิต<br />
      ตัวคูณ=2 มีการจัดการบริการข้อมูลข่าวสารที่เป็น ประโยชน์ต่อนิสิต<br />
      ตัวคูณ=3 มีการจัดกิจกรรมเพื่อพัฒนาประสบการณ์ทาง วิชาการหรือปลูกฝังคุณธรรมจริยธรรมให้แก่นิสิต<br />
      ตัวคูณ=4 มีการประเมินผลคุณภาพของการให้บริการให้ คำปรึกษาการบริการข้อมูลและนำผลการประเมินมา ปรับปรุงคุณภาพการให้บริการ<br />
      ตัวคูณ=5ได้รับรางวัลหรือเผยแพร่ระดับชาติ/นานาชาติ</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-activity-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
  </tr>
              <?
   	$query = "SELECT * FROM `workload`,`activity-advisor`  where  `activity-advisor`.`workload`=`workload`.`id` and  `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-activity-advisor-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-activity-advisor-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>		 	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.10) กรรมการสอบ Senior Project/วิทยานิพนธ์/คณะกรรมการสอบสัมมนา/กรรมการคุมสอบ </td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">ตัวคูณ = 1  โดยคิดภาระงาน 2 หน่วยภาระงาน/เรื่อง </td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-lectures-add" target="_parent"></a>
      <? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-seniorproject-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
          <?
   	$query = "SELECT * FROM `workload`,`seniorproject`  where  `seniorproject`.`workload`=`workload`.`id` and  `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
	";
if ($lock04==0)  echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-seniorproject-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-seniorproject-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		 </td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
<!--
<tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.11)  การรายงานผลการจัดการเรียนการสอน  </td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-rm-add" target="_parent">
      <? if ($lock04==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>
   <?
   	$query = "SELECT * FROM `course2`,`rm`  where rm.courseid=course2.id and  userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['multiplier']*15;
//	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$row['multiplier']."x15=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
 <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?madmin=eval-rm-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-rm-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
		 </td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  
  -->

    <tr>
                  <td align="left" valign="top" bgcolor="#FF99CC">รวมภาระงานด้านการสอน</td>
                  <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
                  <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
                  <td align="right" valign="top" bgcolor="#FF99CC"><? 
				        echo round($sum,3); 
				  ?></td>
                  <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    <tr>
    <td align="left" valign="top" bgcolor="#FF99CC">คะแนนของความสำเร็จของภาระงานด้านการสอน คำนวณจากสูตร </td>
    <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FF99CC"><? 
				        $resum=($sum*100)/(240*5);
				 if($Mrow ['staffmajor'] =='คณะผู้บริหาร') $resum=($sum*100)/(180*5); else   $resum=($sum*100)/(240*5);
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
  </tr>
  
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">ระดับความสำเร็จในด้านภาระการสอน (1)<br />      <?
      	$ql = "SELECT * FROM `level` where idlevel=1";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
		echo "ระดับความสำเร็จ<br>";
		echo "ระดับที่ 0 0 คะแนน<br>";
		echo "ระดับที่ 1  ".$rowl['level1']." - ".($rowl['level2']-0.01)." คะแนน<br>";
		echo "ระดับที่ 2  ".$rowl['level2']." - ".($rowl['level3']-0.01)." คะแนน<br>";
		echo "ระดับที่ 3  ".$rowl['level3']." - ".($rowl['level4']-0.01)." คะแนน<br>";
		echo "ระดับที่ 4  ".$rowl['level4']." - ".($rowl['level5']-0.01)." คะแนน<br>";
		echo "ระดับที่ 5  ตั้งแต่ ".$rowl['level5']." คะแนน ขึ้นไป <br>";
?></td>
      <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#FF99CC"><? 
			         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }
				        echo $grade; 

				  ?></td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">น้ำหนัก(2) (ความสำคัญ/ความยากง่ายของงาน)</td>
      <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#FF99CC"><?
   		echo $weight1;
	  ?></td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    <tr>
                  <td align="left" valign="top" bgcolor="#FF99CC">ค่าคะแนนถ่วงน้ำหนัก  (1)x(2)/100 </td>
                  <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
                  <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
                  <td align="right" valign="top" bgcolor="#FF99CC"><? 
							  $sw1 =  ($grade*$weight1)/100;
				        echo $sw1; 
				  ?></td>
                  <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="2"></a>2. ภาระงานด้านวิจัย-</td>
      <td align="center" valign="top" bgcolor="#000000"><a href="index.php?madmin=eval2&id=<?=$id?>" target="_blank"> คลิ๊กเพื่อดูข้อมูลด้านวิจัย 5 ปีย้อนหลัง </a></td>
      <td align="left" valign="top" bgcolor="#A3BA1B"><p><img src="images/formula/2-1.JPG" width="530" height="49" /></p>
      <p><img src="images/formula/2-2.JPG" width="530" height="49" />&nbsp;สำหรับผู้ที่มีตำแหน่ง รศ. </p></td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
        <?=$coe[2][1]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font>x<font  size="-3">
      <?=$coe[2][1]?>
    </font></td>
    <td align="left" valign="top" bgcolor="#C8E234"><strong>จำนวนงบประมาณสนับสนุนโครงการวิจัย</strong><br />
      ตัวคูณ=5 ตั้งแต่ 300,000 ขึ้นไป<br />
      ตัวคูณ=4 ตั้งแต่ 200,000 บาท-299,999 บาท<br />
      ตัวคูณ=3 ตั้งแต่ 100,000 บาท-199,999 บาท<br />
      ตัวคูณ=2 ตั้งแต่ 60,000 บาท-99,999 บาท<br />
      ตัวคูณ=1 ตั้งแต่ 1 บาท-59,999 บาท<br />
      ตัวคูณ=0 ไม่มีเงินทุน</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-research1-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>      <? } ?></td>
  </tr>
                  <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research1-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research1-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
 
                   <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research2-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research2-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
 <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
        <?=$coe[2][2]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x
      <?=$coe[2][2]?>
    </font></td>
    <td align="left" valign="top" bgcolor="#C8E234"><strong>ตัวคูณ=1&nbsp;</strong>มีงานวิจัยตีพิมพ์เผยแพร่ในProceedings &nbsp;ตามเกณฑ์ประกาศ ก.พ.อ. ที่ใช้ปัจจุบัน<br />
      <strong>ตัวคูณ=2&nbsp;</strong>มีงานวิจัยตีพิมพ์เผยแพร่ใน Proceedings ระดับชาติ หรือตีพิมพ์ในวารสารวิชาการที่ปรากฏในฐานข้อมูล TCIกลุ่ม 2<br />
      <strong>ตัวคูณ=3&nbsp;</strong>มีงานวิจัยตีพิมพ์เผยแพร่ในวารสารวิชาการที่ปรากฏในฐานข้อมูล TCIกลุ่ม 1<br />
      <strong>ตัวคูณ=4</strong>&nbsp;มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล วิชาการระดับนานาชาติตามประกาศ ก.พ.อ. หรือระเบียบคณะกรรมการการอุดมศึกษาว่าด้วยหลักเกณฑ์การพิจารณาวารสารทางวิชาการสำหรับเผยแพร่ผลงานทางวิชาการ ปรากฏอยู่ในฐานข้อมูล Scopus หรือ อนุสิทธิบัตร<br />
      <strong>ตัวคูณ=5</strong>&nbsp;มีผลงานวิจัยหรือบทความวิชาการระดับนานาชาติที่ตีพิมพ์เผยแพร่ในวารสารปรากฏอยู่ในฐานข้อมูล ISI หรือมีสิทธิบัตร<!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-research3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>      <? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research3-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research3-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
        <?=$coe[2][3]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x
      <?=$coe[2][3]?>
    </font></td>
    <td align="left" valign="top" bgcolor="#C8E234"> <strong>ตัวคูณ=3 </strong>มีผลงานวิจัยที่นำไปใช้ประโยชน์เชิงสาธารณะ/นโยบาย/พาณิชย์ (นับซ้ำได้ ไม่ซ้ำหน่วยงาน) หน่วยงานที่นำไปใช้ประโยชน์ต้องเป็นหน่วยงานภายนอกมหาวิทยาลัยเท่านั้น ไม่นับหลักฐานการนำไปใช้ประโยชน์จากเว็บไซด์ <strong><br />
      ตัวคูณ=5 </strong>มีผลงานนวัตกรรมที่สามารถสร้างมูลค่าเพิ่มให้กับหน่วยงานได้ นวัตกรรม หมายถึง การนำแนวความคิดใหม่หรือการใช้ประโยชน์จากสิ่งที่มีอยู่แล้วใช้ในรูปแบบใหม่ เพื่อทำให้เกิดประโยชน์ในการพัฒนานิสิต ชุมชน สังคม และประเทศชาติ อาทิเช่น การทำนวัตกรรมผ่านการวิจัย และพัฒนางานวิจัยไปสู่นวัตกรรม นวัตกรรมไม่ได้จำกัดแค่สิ่งประดิษฐ์ทางเทคโนโลยี นวัตกรรมอาจเป็นความคิดหรือวิธีปฏิบัติใหม่ที่นำไปใช้ให้เกิดประโยชน์ได้ อาทิ การผสมผสานวิชาต่าง ๆ จนเกิดนวัตกรรมด้านหลักสูตร การคิดระบบ Voting ใหม่ก็ถือเป็นนวัตกรรมด้านนโยบาย</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-research-uses-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research-uses-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research-uses-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
        <?=$coe[2][4]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x
      <?=$coe[2][4]?>
    </font></td>
    <td align="left" valign="top" bgcolor="#BAE94B"><strong>ตัวคูณ=3 </strong>เอกสารประกอบการสอน</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-research51-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>      <? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research51-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research51-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x
        <?=$coe[2][4]?>
    </font></td>
    <td align="left" valign="top" bgcolor="#BAE94B"><strong>ตัวคูณ=4</strong> เอกสารคำสอน</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-research52-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research52-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research52-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x
        <?=$coe[2][4]?>
    </font></td>
    <td align="left" valign="top" bgcolor="#BAE94B"><strong>ตัวคูณ=5</strong> หนังสือหรือตำราที่จัดพิมพ์โดยสำนักพิมพ์ที่ได้รับการยอมรับ</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-research53-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?madmin=eval-research53-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-research53-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B">รวมภาระงานด้านการวิจัย</td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;<? 
				        echo round($sum2,3);
$sum2; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B">คะแนนของความสำเร็จของภาระงานด้านการวิจัย คำนวณจากสูตร </td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#A3BA1B"><? 
				        $resum=($sum2*100)/(5);
						
				 //	if($Mrow ['staffposition']=='รองศาสตราจารย์') $resum=($sum2*100)/(1*5); else   
				 $resum=($sum2*100)/(1*5);						
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B">ระดับความสำเร็จในด้านภาระการจัย (1)<br />
      <?
      	$ql = "SELECT * FROM `level` where idlevel=2";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
		echo "ระดับความสำเร็จ<br>";
		echo "ระดับที่ 0 0 คะแนน<br>";
		echo "ระดับที่ 1  ".$rowl['level1']." - ".($rowl['level2']-0.01)." คะแนน<br>";
		echo "ระดับที่ 2  ".$rowl['level2']." - ".($rowl['level3']-0.01)." คะแนน<br>";
		echo "ระดับที่ 3  ".$rowl['level3']." - ".($rowl['level4']-0.01)." คะแนน<br>";
		echo "ระดับที่ 4  ".$rowl['level4']." - ".($rowl['level5']-0.01)." คะแนน<br>";
		echo "ระดับที่ 5  ตั้งแต่ ".$rowl['level5']." คะแนน ขึ้นไป <br>";
?></td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#A3BA1B"><? 
			            $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<=$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }
				        echo $grade; 
						
				  ?></td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B">น้ำหนัก(2) (ความสำคัญ/ความยากง่ายของงาน)</td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#A3BA1B"><?
		echo $weight2;
	  ?></td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B">ค่าคะแนนถ่วงน้ำหนัก  (1)x(2)/100 </td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#A3BA1B"><? 
							  $sw2 =  ($grade*$weight2)/100;
				        echo $sw2; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1"><a name="3" id="3"></a>3. ภาระงานด้านการบริการวิชาการ</td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1"><p>&nbsp;</p></td>
    <td align="right" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ของคณะ        เช่น กรรมการสัปดาห์วันวิทยาศาสตร์,  การบริการแก่สังคมและชุมชน, U2T ,กก วมว</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">ภาระงานของแต่ละโครงการxตัวคูณ</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><strong> ตัวคูณ=1</strong>&nbsp;มีโครงการบริการวิชาการแก่สังคมและชุมชน หรือ มีการให้บริการวิชาการแก่หน่วยงานภายนอก<br />
<strong>ตัวคูณ=2</strong>&nbsp;มีการดำเนินงานตามวงจรคุณภาพ (PDCA) หรือ มีการสรุปผลการให้บริการวิชาการแก่หน่วยงานภายนอก<br />
<strong>ตัวคูณ=3</strong>&nbsp;มีรายงานฉบับสมบูรณ์ของโครงการ<br />
<strong>ตัวคูณ=4</strong>&nbsp;มีการบูรณาการกับการวิจัยหรือการเรียนการสอน<br />
<strong>ตัวคูณ=5</strong>&nbsp;มีการประเมินผลลัพธ์หรือผลกระทบต่อสังคมและชุมชน และได้รับความขอบคุณจากกลุ่มเป้าหมายของโครงการโดยมีหนังสือราชการหรือหลักฐานจากหน่วยงานภายนอกหรือสังคมและชุมชน<br /></td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-service4-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
     <?
   	$query = "SELECT * FROM `workload`,`service4`  where  `service4`.`weight`=`workload`.`id` and  userid=$userid ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?madmin=eval-service4-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-service4-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  
  
  <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.2) งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ <br />
เป็นวิทยากร/ผู้ทรงคุณวุฒิอ่านผลงานวิชาการ /กรรมการสอบวิทยานิพนธ์ <br />
เป็นกรรมการต่าง ๆ /ผู้ทรงคุณวุฒิอื่น ๆ <br />
</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">ภาระงานของแต่ละโครงการxตัวคูณ</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">ตัวคูณ=5</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-service6-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
        <?
   	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=`workload`.`id` and  userid=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?madmin=eval-service6-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-service6-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

<tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.3) การบริการวิชาการที่สร้างรายได้ให้กับคณะวิทยาศาสตร์        เช่น<font color="red"><del> </del></font> การอบรมหลักสูตรระยะสั้น การจัดทำหลักสูตร credit bank       เป็นต้น </td>
    <td align="center" valign="top" bgcolor="#B8F1F0">ภาระงานของแต่ละโครงการxตัวคูณ</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><strong>ตัวคูณ=1</strong>&nbsp;มีโครงการบริการวิชาการแก่สังคมและชุมชน หรือ มีการให้บริการวิชาการแก่หน่วยงานภายนอก<br />
      <strong>ตัวคูณ=2</strong>&nbsp;มีการดำเนินงานตามวงจรคุณภาพ (PDCA) หรือ มีการสรุปผลการให้บริการวิชาการแก่หน่วยงานภายนอก<br />
      <strong>ตัวคูณ=3</strong>&nbsp;มีรายงานฉบับสมบูรณ์ของโครงการ<br />
      <strong>ตัวคูณ=4</strong>&nbsp;มีการบูรณาการกับการวิจัยหรือการเรียนการสอน<br />
      <strong>ตัวคูณ=5</strong>&nbsp;มีการประเมินผลลัพธ์หรือผลกระทบต่อสังคมและชุมชน และได้รับความขอบคุณจากกลุ่มเป้าหมายของโครงการโดยมีหนังสือราชการหรือหลักฐานจากหน่วยงานภายนอกหรือสังคมและชุมชน<br /></td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-service1-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
     <?
   	$query = "SELECT * FROM `workload`,`service1`  where  `service1`.`weight`=`workload`.`id` and  userid=$userid ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?madmin=eval-service1-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-service1-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

<tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.4) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ        เช่น  สารคามพิทยาคม/อาจารย์ที่ปรึกษาวิทยานิพนธ์ให้กับมหาวิทยาลัยอื่น ๆ       ทั้งภาครัฐและเอกชน, ผู้สอน วมว</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">จำนวนชั่วโมงของแต่ละครั้งxตัวคูณ</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">ตัวคูณ=1</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-service3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
        <?
   	$query = "SELECT * FROM  `service3`  where   userid=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['amount']*$row['multiplier'];

	 $sum31=$sum31+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">".$row['amount']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?madmin=eval-service3-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-service3-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>


  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">รวมภาระงานด้านการบริการวิชาการ</td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1">&nbsp;<? 
				        echo "(3.1-3.4) =".round( $sum3,3);
				        echo "<br>(3.5-3.6) =".round( $sum31,3);
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">คะแนนของความสำเร็จของภาระงานด้านการบริการวิชาการ คำนวณจากสูตร </td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><? 
				        $resum=($sum3*100)/(5);
				        $resum=(($sum3*100)/(2*5))+(($sum31*100)/(15*5));
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">ระดับความสำเร็จในด้านภาระการบริการวิชาการ (1)      
      <br />
      <?
      	$ql = "SELECT * FROM `level` where idlevel=3";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
		echo "ระดับความสำเร็จ<br>";
		echo "ระดับที่ 0 0 คะแนน<br>";
		echo "ระดับที่ 1  ".$rowl['level1']." - ".($rowl['level2']-0.01)." คะแนน<br>";
		echo "ระดับที่ 2  ".$rowl['level2']." - ".($rowl['level3']-0.01)." คะแนน<br>";
		echo "ระดับที่ 3  ".$rowl['level3']." - ".($rowl['level4']-0.01)." คะแนน<br>";
		echo "ระดับที่ 4  ".$rowl['level4']." - ".($rowl['level5']-0.01)." คะแนน<br>";
		echo "ระดับที่ 5  ตั้งแต่ ".$rowl['level5']." คะแนน ขึ้นไป <br>";
?></td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><? 
			         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }
				        echo $grade; 

				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">น้ำหนัก(2) (ความสำคัญ/ความยากง่ายของงาน)</td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><?
		echo $weight3;
	  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">ค่าคะแนนถ่วงน้ำหนัก  (1)x(2)/100 </td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><? 
							  $sw3 =  ($grade*$weight3)/100;
				        echo $sw3; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFDB4A">
	<p><a name="4" id="4"></a>4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</p>
	  <font color=blue>
	  <strong>กิจกรรมที่เข้าข่าย</strong> เช่น<br />
        -ทำบุญปีใหม่คณะ หรือวันขึ้นปีใหม่<br />
        -ปีใหม่มหาวิทยาลัย<br />
        -ทำบุญภาควิชา<br />
        -ปีใหม่ภาควิชา<br />
        -ลอยกระทง<br />
        -กฐินมหาวิทยาลัย<br />
      -งาน “ศิลปวัฒนธรรมอุดมศึกา”<br />
-งาน “อมฤตคีตา ตักสิลานคร” เฉลิมพระเกียรติ 150 ปีฯ (งานมหาวิทยาลัย) <br />
-งาน &quot;`มาฆบูชา&quot; (งานมหาวิทยาลัย) <br />
      -ภูมิปัญญาท้องถิ่น<br />
      -งานวันสถาปนาฯ<br />
      -โครงการคุณธรรมบัณฑิตที่พึงประสงค์<br />
      -<a href="http://www.science.msu.ac.th/scith5/newtopic3/2557-007.php" target="_blank">คณะวิทยาศาสตร์ร่วมถวายภัตราหารเพล โครงการอบรมพระสังฆาธิการฯ</a></p>
	  </font>	  </td>
    <td align="center" valign="top" bgcolor="#FFDB4A">ภาระงานของแต่ละโครงการxตัวคูณ</td>
    <td align="left" valign="top" bgcolor="#FFDB4A"><p><img src="images/formula/4-1.JPG" width="508" height="49" /></p>
      <p>ตัวคูณ=1 มีโครงการทำนุบำรุงศิลปะและวัฒนธรรม<br />
        ตัวคูณ=2 มีการดำเนินงานตามวงจรคุณภาพ (PDCA)<br />
        ตัวคูณ=3 มีรายงานฉบับสมบูรณ์<br />
        ตัวคูณ=4 มีการบูรณาการงานทำนุบำรุงศิลปะและวัฒนธรรมกับการเรียนการสอนหรืองานวิจัย<br />
        ตัวคูณ=5 มีการประเมินผลลัพธ์หรือผลกระทบต่อสังคมและชุมชน และได้รับความขอบคุณจากกลุ่มเป้าหมายของโครงการโดยมีหนังสือราชการหรือหลักฐานจากหน่วยงานภายนอกหรือสังคมและชุมชน<br />
        </p></td>
    <td align="right" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A"><? if ($lock04==0) { ?>
      <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-culture-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
            <?
   	$query = "SELECT * FROM `workload`,`culture`  where  `culture`.`weight`=`workload`.`id` and  userid=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum4=$sum4+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\">
	<a href=\"index.php?madmin=eval-culture-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-culture-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFDB4A">รวมภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A">&nbsp;
      <? 
				        echo round($sum4,3); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFDB4A">คะแนนของความสำเร็จของภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม </td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A"><? 
				        $resum=($sum4*100)/(5);
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFDB4A">ระดับความสำเร็จในด้านภาระการทำนุบำรุงศิลปะและวัฒนธรรม (1)      
      <br />
      <?
      	$ql = "SELECT * FROM `level` where idlevel=4";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
		echo "ระดับความสำเร็จ<br>";
		echo "ระดับที่ 0 0 คะแนน<br>";
		echo "ระดับที่ 1  ".$rowl['level1']." - ".($rowl['level2']-0.01)." คะแนน<br>";
		echo "ระดับที่ 2  ".$rowl['level2']." - ".($rowl['level3']-0.01)." คะแนน<br>";
		echo "ระดับที่ 3  ".$rowl['level3']." - ".($rowl['level4']-0.01)." คะแนน<br>";
		echo "ระดับที่ 4  ".$rowl['level4']." - ".($rowl['level5']-0.01)." คะแนน<br>";
		echo "ระดับที่ 5  ตั้งแต่ ".$rowl['level5']." คะแนน ขึ้นไป <br>";
?></td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A"><? 
 
 			             $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }
				        echo $grade; 

				  ?></td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFDB4A">น้ำหนัก(2) (ความสำคัญ/ความยากง่ายของงาน)</td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A"><?
		echo $weight4;
	  ?></td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFDB4A">ค่าคะแนนถ่วงน้ำหนัก  (1)x(2)/100 </td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A"><? 
							  $sw4 =  ($grade*$weight4)/100;
				        echo $sw4; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
  </tr>

  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF"><a name="5" id="5"></a>5    . ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF"><p><img src="images/formula/5-1.JPG" width="526" height="51" />&nbsp;ข้อ 5.1</p>
      <p><img src="images/formula/5-2.JPG" width="452" height="51" /> ข้อ 5.2-5.4 </p></td>
    <td align="right" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  
   <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.1) การบริหารจัดการหลักสูตรรองคณบดี/หัวหน้าภาควิชา/รองหัวหน้าภาควิชา  <font  size="-3"> (
        <?=$coe[5][1]?>
) </font></td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">ตัวคูณ= 1 หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF<br />
      ตัวคูณ= 2 มี มคอ. 3, 5 ครบทุกรายวิชาที่เปิดสอน<br />
      ตัวคูณ= 3 มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ<br />
      ตัวคูณ= 4 มี มคอ. 7 ตามเวลาที่กำหนด<br />
      ตัวคูณ= 5 มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง หรือ กลุ่ม ISO<br /></td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=17&<? echo "userid=$userid&" ?>madmin=eval-other-add" target="_parent">
      <? if ($lock04==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][1];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][1]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "( มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง ) <br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.3)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(มคอ.5) <br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(มคอ.7)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "( มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ) <br><a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "(หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF) <br><a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if($row['filename7'])echo "(ใบรับรอง ISO 17025) <br><a href=\"files/".$row['filename7']."\" target=\"_blank\">".$row['filename7']."</a><br>";
	

if ($lock04==0)  echo "   </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=17&madmin=eval-other-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=17&madmin=eval-other-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.2)  การช่วยงานบริหารจัดการภาควิชา/คณะฯ / ISO 17025 <font  size="-3"> (
        <?=$coe[5][2]?>
) </font></td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">ตัวคูณ=1</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=18&<? echo "userid=$userid&" ?>madmin=eval-other-add" target="_parent">
      <? if ($lock04==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][2];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][2]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=18&madmin=eval-other-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=18&madmin=eval-other-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.3) การพัฒนาองค์กร กรรมการหรือผู้บริหารองค์กร (ภายนอกคณะ) เช่น ผู้ช่วยอธิการบดี        รองคณบดี ผู้ช่วยคณบดีหรือตำแหน่งเทียบเท่า กรรมการภายนอกคณะ        ที่ปรึกษาภายนอกคณะ   <font  size="-3"> (
        <?=$coe[5][3]?>
) </font></td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">ตัวคูณ=1</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=19&<? echo "userid=$userid&" ?>madmin=eval-other-add" target="_parent">
      <? if ($lock04==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][3];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][3]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=19&madmin=eval-other-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=19&madmin=eval-other-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.4) โครงการส่งเสริมวิชาการ/พัฒนานิสิต ภายในคณะ   <font  size="-3"> (
        <?=$coe[5][4]?>
) </font></td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">ตัวคูณ=1</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=20&<? echo "userid=$userid&" ?>madmin=eval-other-add" target="_parent">
      <? if ($lock04==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][4];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=20&madmin=eval-other-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=20&madmin=eval-other-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>


  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.5) การพัฒนาตนเอง   (ไม่เกิน  2  กิจกรรม)  <font  size="-3"> (
        <?=$coe[5][5]?>
)</font></td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">ตัวคูณ=1</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=21&<? echo "userid=$userid&" ?>madmin=eval-other-add" target="_parent">
      <? if ($lock04==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][5];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";

		 $sum52=$sum52+$n; 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][5]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=21&madmin=eval-other-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=21&madmin=eval-other-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

      <tr>
      <td align="left" valign="top"  bgcolor="#BBBBFF">5.6) การบริการวิชาการในระดับชาติ/นานาชาติ  <font  size="-3"> (
          <?=$coe[5][6]?>
) </font>(เป็นคณะกรรมการในการจัดประชุมวิชาการภายในคณะฯ)</td>
      <td align="center" valign="top"  bgcolor="#BBBBFF">&nbsp;</td>
      <td align="left" valign="top"  bgcolor="#BBBBFF">&nbsp;</td>
      <td align="right" valign="top"  bgcolor="#BBBBFF">&nbsp;</td>
      <td align="left" valign="top"  bgcolor="#BBBBFF"><? if ($lock04==0) { ?>
 <a href="index.php<? echo "?userid=$userid&" ?>madmin=eval-service5-add" target="_parent">
   <img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and userid=$userid  ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier']*$coe[5][6];

	$sum51=$sum51+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][5]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock04==0)  
echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?madmin=eval-service5-edit&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?madmin=eval-service5-del&id=".$row['id']."&userid=$userid\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	}	
  ?>

  
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">รวมภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
								if ($sum52>0.1) $sum51=$sum51+0.1; else $sum51=$sum51+$sum52;
				        echo "(5.1)".round($sum5,3); 
				        echo "<br>(5.2-5.5)".round($sum51,3); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">คะแนนของความสำเร็จของภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ </td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 

				        $resum=(($sum5*100)/(10))+(($sum51*100)/(5));
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">ระดับความสำเร็จในด้านช่วยการบริหารจัดการและอื่น ๆ (1)      
      <br />
      <?
      	$ql = "SELECT * FROM `level` where idlevel=5";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
		echo "ระดับความสำเร็จ<br>";
		echo "ระดับที่ 0 0 คะแนน<br>";
		echo "ระดับที่ 1  ".$rowl['level1']." - ".($rowl['level2']-0.01)." คะแนน<br>";
		echo "ระดับที่ 2  ".$rowl['level2']." - ".($rowl['level3']-0.01)." คะแนน<br>";
		echo "ระดับที่ 3  ".$rowl['level3']." - ".($rowl['level4']-0.01)." คะแนน<br>";
		echo "ระดับที่ 4  ".$rowl['level4']." - ".($rowl['level5']-0.01)." คะแนน<br>";
		echo "ระดับที่ 5  ตั้งแต่ ".$rowl['level5']." คะแนน ขึ้นไป <br>";
?></td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
			         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }
				        echo $grade; 
						
				  ?></td>

    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">น้ำหนัก(2) (ความสำคัญ/ความยากง่ายของงาน)</td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><?
		echo $weight5;
	  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">ค่าคะแนนถ่วงน้ำหนัก  (1)x(2)/100 </td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp; </td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
							  $sw5 =  ($grade*$weight5)/100;
				        echo $sw5; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#66CCFF">ผลรวมของค่าคะแนนถ่วง</td>
    <td align="center" valign="top" bgcolor="#66CCFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#66CCFF"><? 
							  $Tsw =  $sw1+$sw2+$sw3+$sw4+$sw5;
				        echo $Tsw; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#66CCFF">สรุปคะแนนส่วนผลสัมฤทธิ์ของงาน   =    ผลรวมของค่าคะแนนถ่วง / จำนวนระดับค่าเป้าหมาย น้ำหนัก </td>
    <td align="center" valign="top" bgcolor="#66CCFF"><?  
		$res=sprintf(" %.2f ",($Tsw /5));
		echo $Tsw."/5 ";  
		?>    </td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#66CCFF"><? 
		echo $res;  
	?>    </td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#66CCFF">คิดเป็นเปอร์เซ็นของภาระงานทั้งหมด (เต็ม <? echo  $percent; ?>  เปอร์เซ็น) </td>
    <td align="center" valign="top" bgcolor="#66CCFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#66CCFF"><? 
		echo  ($res*$percent).'%';  
	?></td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
  </tr>
</table>
</div>
