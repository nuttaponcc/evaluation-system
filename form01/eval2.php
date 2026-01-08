<?
include"tools/connect-eval01.php";
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
?>

<div align="center">
  <strong><br />
<?		if($por==1) echo "แบบ ป.01  "; else  echo "แบบ ป.03"; ?>
 ภาระด้านการวิจัย
 </strong><br />
<table width="100%" border="0" cellpadding="5" cellspacing="2"   id="customers02">
    <tr>
      <td align="left" valign="top" bgcolor="#65C0ED"><div align="center">กิจกรรม/โครงการ/งาน</div></td>
      <td align="left" valign="top" bgcolor="#65C0ED"><div align="center">ภาระงาน<br />
      (คำนวณตามเกณฑ์)</div></td>
      <td align="left" valign="top" bgcolor="#65C0ED"><div align="center">ไฟล์เอกสารประกอบ</div></td>
      <td align="left" valign="top" bgcolor="#65C0ED">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#65C0ED">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B">2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.1)  ทุนวิจัย<font  size="-3"> (
          <?=$coe[2][1]?>
      ) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x30%</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
      <a href="index.php?menu=eval-research1-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
				  $sum2=0;
   	 $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*0.3;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x30%=$n</div></td>
   <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock1==0) 	echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
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
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
        <a href="index.php?menu=eval-research2-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>
      <? } ?></td>
    </tr-->
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
	<a href=\"index.php?menu=eval-research2-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research2-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.2) บทความวิชาการ/บทความวิจัย<font  size="-3"> (
          <?=$coe[2][2]?>
      ) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x30%</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
      <a href="index.php?menu=eval-research3-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	 $query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=" .$_SESSION[session_user_id]." ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x30%=$n</div></td>
   <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
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
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
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
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">1x".$row['multiplier']."=$n</div></td>
   <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
	<a href=\"index.php?menu=eval-research4-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research4-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม<font  size="-3">(
          <?=$coe[2][3]?>
      ) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x10%</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
      <a href="index.php?menu=eval-research-uses-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`   and `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x10%=$n</div></td>
   <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
	<a href=\"index.php?menu=eval-research-uses-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research-uses-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4) ผลงานวิชาการ<font  size="-3"> (
          <?=$coe[2][4]?>
      ) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x30%</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
      <a href="index.php?menu=eval-research51-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a>      <? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."%=$n</div></td>
   <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
	<a href=\"index.php?menu=eval-research51-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research51-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.2) เอกสารคำสอน </td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x30%</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
      <a href="index.php?menu=eval-research52-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."%=$n</div></td>
    <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
	<a href=\"index.php?menu=eval-research52-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research52-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">2.4.3) ตำราหรือหนังสือ</td>
      <td align="center" valign="top" bgcolor="#CCCCCC"><font  size="-3">(ภาระงาน)x(ตัวคูณ)x(เปอร์เซ็นต์การทำ)x30%</font></td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>
      <a href="index.php?menu=eval-research53-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."%=$n</div></td>
    <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
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
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?>      <a href="index.php?menu=eval-research54-add" target="_parent"><img src="images/add.png" alt="add" width="100" height="30" border="0" /></a><? } ?></td>
    </tr-->
    <?
   	$query = "SELECT * FROM `research54`  where    `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%=$n</div></td>
    <td align=\"left\" valign=\"top\">";
	if($row['filename'])echo "<a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock1==0) echo "</td>    <td align=\"left\" valign=\"top\">&nbsp;</td>
    <td align=\"left\" valign=\"top\">
	<a href=\"index.php?menu=eval-research54-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-research54-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	

	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B">รวมภาระงานด้านการวิจัย<br /></td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;<? 
				        echo $sum2; 
				  ?></td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    
    
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B">คะแนนของความสำเร็จของภาระงานด้านการวิจัย คำนวณจากสูตร </td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#A3BA1B"><? 
				 				 //if($Mrow ['staffposition']=='รองศาสตราจารย์') $resum=($sum2*100)/(1*5); else   
								 $resum=($sum2*100)/(5);
				        echo $resum; 
				  ?></td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B">ระดับความสำเร็จในด้านภาระการจัย (1)
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
  </table>
</div>
