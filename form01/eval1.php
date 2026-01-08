<?
include"tools/connect-eval01.php";
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
?>

<div align="center">
  <strong><br />
<?
if($por==1) echo "แบบ ป.01  "; else  echo "แบบ ป.03"; 
?>
 ภาระด้านการสอน
</strong> 
<table width="100%" border="0" cellpadding="5" cellspacing="2"  id="customers02">
    <tr>
      <th align="left" valign="top" bgcolor="#65C0ED"><div align="center">กิจกรรม/โครงการ/งาน</div></th>
      <th align="left" valign="top" bgcolor="#65C0ED"><div align="center">ภาระงาน<br />
      (คำนวณตามเกณฑ์)</div></th>
      <th align="left" valign="top" bgcolor="#65C0ED">&nbsp;</th>
      <th align="left" valign="top" bgcolor="#65C0ED">&nbsp;</th>
      <th align="left" valign="top" bgcolor="#65C0ED">&nbsp;</th>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">1. ภาระงานด้านการสอน</td>
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
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-lectures-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
    </tr>
    <?
    $sum=0;
   	$query = "SELECT * FROM `workload`,`course`,`lectures`  where lectures.courseid=course.id and lectures.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['t']*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" >".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['t']."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" >";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
if ($lock1==0) 	echo "</td>
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-lectures-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-lectures-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.2) การสอนภาคปฏิบัติ</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(หน่วยกิต)x(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-practices-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".($row['credit']-$row['t'])."x".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" >";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock1==0) echo "</td>
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
	
	    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-practices-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-practices-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.3) ผู้ประสานงานรายวิชา</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-coordinator-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['code'].":".$row['enname']." [".$row['term']."/".$row['ayear']."]</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" >";
	if($row['filename'])echo "(มคอ.3)<br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.4)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(ใบรายงานผลการเรียน)<br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(การจัดการเรียนการสอน..)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock1==0)  echo "</td>
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-coordinator-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-coordinator-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" 	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.4) การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-internships-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-internships-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-internships-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.5) ที่ปรึกษาโครงการปริญญานิพนธ์    ระดับปริญญาตรี<br /></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-ug-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
        </a>  <? } ?>      </td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-ug-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-ug-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
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
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-g-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-g-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-g-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
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
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-seminar-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$week."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-seminar-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-seminar-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.8)    อาจารย์ที่ปรึกษาทางด้านวิชาการ</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(สัปดาห์)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp; </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-academic-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-academic-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-academic-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
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
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-activity-advisor-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$row['week']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-activity-advisor-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-activity-advisor-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">1.10 กรรมการสอบ Senior Project/วิทยานิพนธ์/ </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?menu=eval-lectures-add" target="_parent"></a>
        <? if ($lock1==0) { ?>
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
    <td align=\"left\" valign=\"top\" >".$row['name']." ชื่อเรื่อง ".$row['sname']." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$sc."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-seniorproject-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-seniorproject-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
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
      <td align="left" valign="top" bgcolor="#CCCCCC">
        <? if ($lock1==0) { ?>    <a href="index.php?menu=eval-rm-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" />
          
      </a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `course2`,`rm`  where rm.courseid=course2.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['multiplier']*15;
//	 $sum=$sum+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" >".$row['code'].":".$row['enname']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['multiplier']."x15=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-rm-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-rm-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	</td>";
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
				        echo $sum; 
				  ?></td>
                  <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">คะแนนของความสำเร็จของภาระงานด้านการสอน คำนวณจากสูตร </td>
      <td align="center" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#FF99CC"><? 
				 if($_SESSION[session_user_major] ==23) $resum=($sum*100)/(180*5); else   $resum=($sum*100)/(240*5);
				        echo $resum; 
				  ?></td>
      <td align="left" valign="top" bgcolor="#FF99CC">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="left" valign="top" bgcolor="#FF99CC">ระดับความสำเร็จในด้านภาระการสอน (1)<br />
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
      	$weight1=45;
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
  </table>
</div>
<div align="center"></div>