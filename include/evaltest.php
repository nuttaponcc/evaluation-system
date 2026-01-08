<?
include"tools/connect-eval.php";
				$query = "SELECT * FROM `weight`,`wselect` where  weight.id=wselect.wtid and wselect.userid=$session_user_id";
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
				if($row['status'])$percent=50; else $percent=70;
				//echo "test  $weight1  $weight2  $weight3 $weight4 $weight5";
?>
<div align="left">
<table border="0" cellpadding="5" cellspacing="2" bgcolor="#666666">
  <tr>
    <td align="left" valign="top" bgcolor="#65C0ED"><div align="center">กิจกรรม/โครงการ/งาน</div></td>
    <td align="left" valign="top" bgcolor="#65C0ED"><div align="center">ภาระงาน<br />
    (คำนวณตามเกณฑ์)</div></td>
    <td align="left" valign="top" bgcolor="#65C0ED"><div align="center">ไฟล์เอกสารประกอบ</div></td>
    <td align="left" valign="top" bgcolor="#65C0ED">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#65C0ED">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FF99CC">1. ภาระงานด้านการสอน</td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.1) การสอนภาคบรรยาย </td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><? if ($lock03==0) { ?><a href="index.php?menu=eval-lectures-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
  <?
    $sum=0;
   	$query = "SELECT * FROM `workload`,`course`,`lectures`  where lectures.courseid=course.id and lectures.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$row['t']."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-lectures-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-lectures-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>";
	echo " </tr>";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.2) การสอนภาคปฏิบัติ</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-practices-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
   <?
   	$query = "SELECT * FROM `workload`,`course`,`practices`  where practices.courseid=course.id and practices.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['credit']-$row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".($row['credit']-$row['t'])."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0)echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
	
	    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-practices-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-practices-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>
";
echo "  </tr>	";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.3) ผู้ประสานงานรายวิชา</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-coordinator-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
  </tr>
    <?
   	$query = "SELECT * FROM `workload`,`course`,`coordinator`  where coordinator.courseid=course.id and coordinator.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['credit']*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$row['credit']."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-coordinator-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-coordinator-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	</td>";
	echo "  </tr>	";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.4) การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-internships-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
    <?
   	$query = "SELECT * FROM `workload`,`internships`  where  internships.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
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
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-internships-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-internships-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		</td>
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.5) ที่ปรึกษาโครงการปริญญานิพนธ์    ระดับปริญญาตรี<br /></td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-ug-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
      <?
   	$query = "SELECT * FROM `workload`,`undergraduate-advisor`  where  `undergraduate-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
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
	if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-ug-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-ug-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-g-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
        <?
   	$query = "SELECT * FROM `workload`,`graduate-advisor`  where  `graduate-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
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
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-g-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-g-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-seminar-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
          <?
   	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-seminar-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-seminar-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.8)    อาจารย์ที่ปรึกษาทางด้านวิชาการ</td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-academic-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
            <?
   	$query = "SELECT * FROM `workload`,`academic-advisor`  where  `academic-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
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
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-academic-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-academic-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-activity-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
  </tr>
              <?
   	$query = "SELECT * FROM `workload`,`activity-advisor`  where  `activity-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
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
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-activity-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-activity-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>		</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.10) กรรมการสอบ Senior Project/วิทยานิพนธ์ </td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
      <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-seniorproject-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
          <?
   	$query = "SELECT * FROM `workload`,`seniorproject`  where  `seniorproject`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
	";
if ($lock03==0)  echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-seniorproject-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-seniorproject-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>

<tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.11)  การรายงานผลการจัดการเรียนการสอน  </td>
    <td align="center" valign="top" bgcolor="#FFCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-rm-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>
   <?
   	$query = "SELECT * FROM `course`,`rm`  where rm.courseid=course.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['multiplier']*15;
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\">".$row['multiplier']."x15=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
 <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-rm-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-rm-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  
  
  <tr>
    <td align="left" valign="top" bgcolor="#FFCCCC">1.12) รายวิชาศึกษาทั่วไป </td>
    <td align="center" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFCCCC">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFCCCC"><a href="index.php?menu=eval-edu-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>
          <?
   	$query = "SELECT * FROM `edu`  where   `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">".$row['name']."  : ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><div align=\"center\"></div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFE8E8\">
	<a href=\"index.php?menu=eval-edu-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-edu-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
";
echo "
  </tr>	
		";
	}	
  ?>
  
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
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
  </tr>
  
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">ระดับความสำเร็จในด้านภาระการสอน (1)</td>
      <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#FF99CC"><? 
				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;
						 $resum="$resum"; if($resum<$g1){
							    $grade=1;
							 }elseif($resum<$g2){
							    $grade=2;
							 }elseif($resum<$g3){
							    $grade=3;
							 }elseif($resum<$g4){
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
      <td align="left" valign="top" bgcolor="#A3BA1B">2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.1)  งานวิจัยเพื่อสร้างองค์ความรู้ใหม่/รับใช้สังคม</td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research1-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                  <?
				  $sum2=0;
   	$query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock03==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research1-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research1-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.2)  งานวิจัยเพื่อพัฒนาการเรียนการสอน</td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research2-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
  </tr>
                   <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research2-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research2-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
 <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.3) บทความวิชาการ (Review paper)</td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research3-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research3-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานที่ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร</td>
    <td align="center" valign="top" bgcolor="#C8E234"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research4-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research4`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research4-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research4-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ</td>
    <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)</font></td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research51-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>      <? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research51`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research51-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research51-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)</font></td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research52-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research52`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research52-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research52-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือ</td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)</font></td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research53-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                    <?
   	$query = "SELECT * FROM `research53`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research53-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research53-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.4) e-learning </td>
    <td align="center" valign="top" bgcolor="#BAE94B"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)</font></td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research54-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
                      <?
   	$query = "SELECT * FROM `research54`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	<a href=\"index.php?menu=eval-research54-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research54-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

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
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B">ระดับความสำเร็จในด้านภาระการจัย (1)</td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#A3BA1B"><? 
				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;
						 $resum="$resum"; if($resum<$g1){
							    $grade=1;
							 }elseif($resum<$g2){
							    $grade=2;
							 }elseif($resum<$g3){
							    $grade=3;
							 }elseif($resum<$g4){
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
    <td align="left" valign="top" bgcolor="#70E4E1">3. ภาระงานด้านการบริการวิชาการ</td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
 <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ด้านการบริการวิชาการของคณะ
      ( เช่น คณะกรรมในโครงการ วมว. )  / โครงการความร่วมมือกับโรงเรียนจุฬาภรณ์ / สัปดาห์วิทยาศาสตร์</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-service4-add" target="_parent"><img src="images/add.png" alt="add"  border="0" /> </a>      <? } ?></td>
  </tr>
     <?
   	$query = "SELECT * FROM `workload`,`service4`  where  `service4`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service4-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service4-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.2) การบริการวิชาการในระดับชาติ/นานาชาติ (เป็นคณะกรรมการในการจัดประชุมวิชาการ)</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock03==0) { ?><a href="index.php?menu=eval-service5-add" target="_parent"><img src="images/add.png" alt="add"  border="0" />
      
    </a><? } ?></td>
  </tr>
     <?
   	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service5-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service5-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.3) การบริการวิชาการแก่สังคมและชุมชน</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-service1-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
     <?
   	$query = "SELECT * FROM `workload`,`service1`  where  `service1`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service1-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service1-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.4)    งานบริการวิชาการให้แก่หน่วยงานภายนอก</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-service2-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
        <?
   	$query = "SELECT * FROM `workload`,`service2`  where  `service2`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service2-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service2-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

<tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.5)    งานบริการวิชาการรับเชิญรายบุคคลจากหน่วยงานภายนอก</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-service3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
        <?
   	$query = "SELECT * FROM `workload`,`service3`  where  `service3`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service3-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service3-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
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
				        echo round( $sum3,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">คะแนนของความสำเร็จของภาระงานด้านการบริการวิชาการ คำนวณจากสูตร </td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><? 
				        $resum=($sum3*100)/(5);
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">ระดับความสำเร็จในด้านภาระการบริการวิชาการ (1)</td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><? 
				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;
						 $resum="$resum"; if($resum<$g1){
							    $grade=1;
							 }elseif($resum<$g2){
							    $grade=2;
							 }elseif($resum<$g3){
							    $grade=3;
							 }elseif($resum<$g4){
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
    <td align="left" valign="top" bgcolor="#FFDB4A">4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-culture-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
  </tr>
            <?
   	$query = "SELECT * FROM `workload`,`culture`  where  `culture`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum4=$sum4+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFAA\">
	<a href=\"index.php?menu=eval-culture-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-culture-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#FFDB4A">ระดับความสำเร็จในด้านภาระการทำนุบำรุงศิลปะและวัฒนธรรม (1)</td>
    <td align="center" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFDB4A">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#FFDB4A"><? 
				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;
						 $resum="$resum"; if($resum<$g1){
							    $grade=1;
							 }elseif($resum<$g2){
							    $grade=2;
							 }elseif($resum<$g3){
							    $grade=3;
							 }elseif($resum<$g4){
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
    <td align="left" valign="top" bgcolor="#9B9BFF">5    . ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  
   <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.1)  การบริหารจัดการหลักสูตร/โครงการส่งเสริมวิชาการ</td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=17&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=17&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=17&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.2)  การช่วยงานบริหารจัดการภาควิชา/คณะฯ</td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=18&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=18&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=18&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.3)  การพัฒนาตนเองต่างๆ</td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=19&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=19&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=19&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.4)  การพัฒนาองค์กรอื่นๆ</td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=20&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=20&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=20&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.5)  จิตอาสาอื่นๆ</td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=21&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=21&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=21&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.6)  การเข้าร่วมกิจกรรมอื่นๆ </td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=22&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=22 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=22&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=22&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#BBBBFF">5.7) อื่นๆ</td>
    <td align="center" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BBBBFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BBBBFF"><a href="index.php?other=23&menu=eval-other-add" target="_parent">
      <? if ($lock03==0) { ?>
      <img src="images/add.png" alt="add" width="100" height="30" border="0" />
      <? } ?>
    </a></td>
  </tr>

  <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=23 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=23&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=23&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">รวมภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
				        echo round($sum5,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">คะแนนของความสำเร็จของภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ </td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
				        $resum=($sum5*100)/(5);
				        echo round($resum,2); 
				  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">ระดับความสำเร็จในด้านช่วยการบริหารจัดการและอื่น ๆ (1)</td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;
						 $resum="$resum"; if($resum<$g1){
							    $grade=1;
							 }elseif($resum<$g2){
							    $grade=2;
							 }elseif($resum<$g3){
							    $grade=3;
							 }elseif($resum<$g4){
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
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
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
		?>
    </td>
    <td align="left" valign="top" bgcolor="#66CCFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#66CCFF"><? 
		echo $res;  
	?>
    </td>
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
