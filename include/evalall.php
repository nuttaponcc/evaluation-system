<?
include"tools/connect-eval.php";
$Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$_SESSION[session_user_id];
$Mresult = mysql_query($Mquery);
$Mrow = mysql_fetch_array($Mresult);

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
				// Coeefficient
	
?>

<div align="center"><strong><br />
<?
if($por==1) echo "ป.01  ข้อตกลงและแบบการประเมินผลสัมฤทธิ์"; else  echo "แบบรายงานผลการปฏิบัติราชการของข้าราชการและพนักงาน สังกัดมหาวิทยาลัยมหาสารคาม แบบ ป.03"; 
?>
  </strong>

  <br />
  <table border="0" cellpadding="5" cellspacing="2" bgcolor="#666666">
    <tr>
      <td align="left" valign="top" bgcolor="#006699"><div align="center"><strong><font color="#FFCC00">กิจกรรม/โครงการ/งาน</font></strong></div>
      <? 
	  		//echo " > $lock03"; 
	  ?></td>
      <td align="left" valign="top" bgcolor="#006699"><div align="center"><strong><font color="#FFCC00">ภาระงาน<br />
      (คำนวณตามเกณฑ์)</font></strong></div></td>
      <td align="left" valign="top" bgcolor="#006699"><div align="center"><strong><font color="#FFCC00">ไฟล์เอกสารประกอบ</font></strong></div></td>
      <td align="left" valign="top" bgcolor="#006699">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#006699">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC"><a name="1" id="1"></a>1. ภาระงานด้านการสอน	  </td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.1) การสอนภาคบรรยาย </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><?  if ($lock03==0) { ?><a href="index.php?menu=eval-lectures-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['t']."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-lectures-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-lectures-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
</td>";
	echo " </tr>";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CECFCE">1.2) การสอนภาคปฏิบัติ</td>
      <td align="center" valign="top" bgcolor="#CECFCE"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CECFCE">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CECFCE">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CECFCE"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".($row['credit']-$row['t'])."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0)echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
	
	    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-practices-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-practices-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>
";
echo "  </tr>	";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CECFCE">1.3) ผู้ประสานงานรายวิชา (2 กลุ่มขึ้นไปในรายวิชาพื้นฐาน ) </td>
      <td align="center" valign="top" bgcolor="#CECFCE"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CECFCE">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CECFCE">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CECFCE"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
        <? if ($lock03==0) { ?>
        <a href="index.php?menu=eval-coordinator-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`course`,`coordinator`  where coordinator.courseid=course.id and coordinator.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-coordinator-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-coordinator-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	</td>";
	echo "  </tr>	";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CECFCE">1.4) การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ</td>
      <td align="center" valign="top" bgcolor="#CECFCE"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CECFCE">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CECFCE">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CECFCE"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-internships-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-internships-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
		</td>
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.5) ที่ปรึกษาโครงการปริญญานิพนธ์    ระดับปริญญาตรี<br /></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
	";
	if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
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
      <td align="left" valign="top" bgcolor="#CCCCCC">1.6)    ที่ปรึกษาวิทยานิพนธ์ ระดับปริญญาโทและเอก</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
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
      <td align="left" valign="top" bgcolor="#CCCCCC">1.7) ที่ปรึกษาวิชาสัมมนา</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
        <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-seminar-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 if($row['workload']==34) $week=1 ; else $week=$row['week'];
	  	$n=$row['score']*$week*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$week."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-seminar-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-seminar-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.8)    อาจารย์ที่ปรึกษาทางด้านวิชาการ </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
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
      <td align="left" valign="top" bgcolor="#CCCCCC">1.9) อาจารย์ที่ปรึกษาด้านกิจกรรม</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0) echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-activity-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-activity-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>		</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.10) กรรมการสอบ Senior Project/วิทยานิพนธ์</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
        <? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-seniorproject-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`seniorproject`  where  `seniorproject`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$sc."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
	";
if ($lock03==0)  echo "
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-seniorproject-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-seniorproject-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  <!--
  <tr>
    <td align="left" valign="top" bgcolor="#CCCCCC">1.11)  การรายงานผลการจัดการเรียนการสอน  </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-rm-add" target="_parent">
        <? if ($lock03==0) { ?>
        <img src="images/add.png" alt="add" width="100" height="30" border="0" />
        <? } ?>
      </a></td>
    </tr>
    <?
   	$query = "SELECT * FROM `course2`,`rm`  where rm.courseid=course2.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['multiplier']*15;
//	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['multiplier']."x15=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
 <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-rm-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-rm-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
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
				 if($_SESSION[session_user_major] ==23) $resum=($sum*100)/(180*5); else   $resum=($sum*100)/(240*5);
				        echo round($resum,2); 
				  ?></td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">ระดับความสำเร็จในด้านภาระการสอน (1)
        <br />
      <?
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
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="2"></a>2. ภาระงานด้านวิจัย<br />        <br /></td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.1)  ทุนวิจัย<font  size="-3"> (<?=$coe[2][1]?>)
      </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x<?=$coe[2][1]?></font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research1-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
				  $sum2=0;
   	$query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock03==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research1-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research1-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <!--tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.2)  งานวิจัยเพื่อพัฒนาการเรียนการสอน</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
        <a href="index.php?menu=eval-research2-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
    </tr-->
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research2-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research2-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (<?=$coe[2][2]?>) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x<?=$coe[2][2]?></font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research3-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research3-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <!--tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4) ผลงานที่ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research4-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr-->
    <?
   	$query = "SELECT * FROM `research4`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">1x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research4-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research4-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม  <font  size="-3"> (<?=$coe[2][3]?>) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x<?=$coe[2][3]?></font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research-uses-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research-uses-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research-uses-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4) ผลงานวิชาการ<font  size="-3"> (<?=$coe[2][4]?>) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x<?=$coe[2][4]?>
      </font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research51-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>      <? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research51-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research51-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.2) เอกสารคำสอน</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x<?=$coe[2][5]?></font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research52-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research52-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research52-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x<?=$coe[2][4]?></font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research53-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research53-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research53-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <!--tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.4) e-learning </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-research54-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr-->
    <?
   	$query = "SELECT * FROM `research54`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock03==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-research54-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research54-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B">      รวมภาระงานด้านการวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;
      <? 
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
				 //if($Mrow ['staffposition']=='รองศาสตราจารย์') $resum=($sum2*100)/(1*5); else  
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
							 }elseif($resum<$g4){
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
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ด้านการบริการวิชาการของคณะ <br />
      เช่น กรรมการสัปดาห์วันวิทยาศาสตร์, การบริการแก่สังคมและชุมชน</td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-service4-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service4-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
 
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">3.2)    งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ   <br />
เป็นวิทยากร/ผู้ทรงคุณวุฒิอ่านผลงานวิชาการ /กรรมการสอบวิทยานิพนธ์ <br />
เป็นกรรมการต่าง ๆ /ผู้ทรงคุณวุฒิอื่น ๆ <br /></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-service6-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-service6-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service6-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">3.3) การบริการวิชาการที่สร้างรายได้ให้กับคณะวิทยาศาสตร์ <br />
เช่น gifted, การอบรมหลักสูตรระยะสั้น การจัดทำหลักสูตร credit bank<br />
เป็นต้น<br /></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-service1-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service1-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
      
  <tr>
    <td align="left" valign="top" bgcolor="#CCCCCC">3.4) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ  <br />
เช่น  สารคามพิทยาคม/อาจารย์ที่ปรึกษาวิทยานิพนธ์ให้กับมหาวิทยาลัยอื่น ๆ <br />
ทั้งภาครัฐและเอกชน <br /></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?>
      <a href="index.php?menu=eval-service3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>        <? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `service3`  where   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['amount']*$row['multiplier'];

	 $sum31=$sum31+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['amount']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
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
				        echo "(3.1-3.3) =".round( $sum3,3);
				        echo "<br>(3.4) =".round( $sum31,3);
				  ?></td>
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#70E4E1">คะแนนของความสำเร็จของภาระงานด้านการบริการวิชาการ คำนวณจากสูตร </td>
      <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#70E4E1"><? 
				        $resum=(($sum3*100)/(2*5))+(($sum31*100)/(15*5));
				        echo round($resum,2); 
				  ?></td>
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#70E4E1">ระดับความสำเร็จในด้านภาระการบริการวิชาการ (1)      <br />
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
      <td align="left" valign="top" bgcolor="#FFDB4A"><a name="4" id="4"></a>4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
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
      <td align="left" valign="top" bgcolor="#FFDB4A">ระดับความสำเร็จในด้านภาระการทำนุบำรุงศิลปะและวัฒนธรรม (1)      <br />
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
      <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.1) การบริหารจัดการหลักสูตรรองคณบดี/หัวหน้าภาควิชา/รองหัวหน้าภาควิชา  <font  size="-3"> (<?=$coe[5][1]?> ) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=17&menu=eval-other-add" target="_parent">
        <? if ($lock03==0) { ?>
        <img src="images/add.png" alt="add" width="100" height="30" border="0" />
        <? } ?>
      </a></td>
    </tr>
    
    <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][1];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][1]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">";
	if($row['filename'])echo "( มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง ) <br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.3)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(มคอ.5) <br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(มคอ.7)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "( มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ) <br><a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "(หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF) <br><a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if($row['filename7'])echo "(ใบรับรอง ISO 17025) <br><a href=\"files/".$row['filename7']."\" target=\"_blank\">".$row['filename7']."</a><br>";
	
if ($lock03==0)  echo "   </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?other=17&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=17&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.2)  การช่วยงานบริหารจัดการภาควิชา/คณะฯ <font  size="-3">  / ISO 17025(
          <?=$coe[5][2]?>
) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=18&menu=eval-other-add" target="_parent">
        <? if ($lock03==0) { ?>
        <img src="images/add.png" alt="add" width="100" height="30" border="0" />
        <? } ?>
      </a></td>
    </tr>
    
    <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][2];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][2]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?other=18&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=18&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.3) การพัฒนาองค์กร กรรมการหรือผู้บริหารองค์กร (ภายนอกคณะ) เช่น ผู้ช่วยอธิการบดี        รองคณบดี ผู้ช่วยคณบดีหรือตำแหน่งเทียบเท่า กรรมการภายนอกคณะ        ที่ปรึกษาภายนอกคณะ  <font  size="-3"> (
          <?=$coe[5][3]?> 
      ) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=19&menu=eval-other-add" target="_parent">
        <? if ($lock03==0) { ?>
        <img src="images/add.png" alt="add" width="100" height="30" border="0" />
        <? } ?>
      </a></td>
    </tr>
    
    <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][3];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][3]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?other=19&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=19&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.4) โครงการส่งเสริมวิชาการ/พัฒนานิสิต ภายในคณะ  <font  size="-3"> (
          <?=$coe[5][4]?>
) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=20&menu=eval-other-add" target="_parent">
        <? if ($lock03==0) { ?>
        <img src="images/add.png" alt="add" width="100" height="30" border="0" />
        <? } ?>
      </a></td>
    </tr>
    
    <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][4];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?other=20&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=20&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.5) การพัฒนาตนเอง<font  size="-3">&nbsp; </font> (ไม่เกิน 2 กิจกรรม)  <font  size="-3"> (
          <?=$coe[5][5]?>
)</font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=21&menu=eval-other-add" target="_parent">
        <? if ($lock03==0) { ?>
        <img src="images/add.png" alt="add" width="100" height="30" border="0" />
        <? } ?>
      </a></td>
    </tr>
    
    <?
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][5];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][5]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?other=21&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=21&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
      <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.6) การบริการวิชาการในระดับชาติ/นานาชาติ  <font  size="-3"> (
          <?=$coe[5][6]?>
) </font>(เป็นคณะกรรมการในการจัดประชุมวิชาการ)</td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock03==0) { ?><a href="index.php?menu=eval-service5-add" target="_parent"><img src="images/add.png" alt="add"  border="0" />
        
      </a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and      userid=$userid ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier']*$coe[5][6];

	 $sum51=$sum51+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">".$row['name']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][6]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\">
	<a href=\"index.php?menu=eval-service5-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service5-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
				        echo "(5.1)".round($sum5,3); 
				        echo "<br>(5.2-5.6)".round($sum51,3); 
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
      <td align="left" valign="top" bgcolor="#9B9BFF">ระดับความสำเร็จในด้านช่วยการบริหารจัดการและอื่น ๆ (1)<br />
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
				        echo "$Tsw"; 
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
