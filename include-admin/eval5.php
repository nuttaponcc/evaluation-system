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
    <td align="left" valign="top" bgcolor="#BBBBFF">
      <? if ($lock1==0) { ?>    <a href="index.php?other=17&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a>   <? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">";
	if($row['filename'])echo "( มีระบบกลไกในการควบคุม กำกับ ประเมิน และพัฒนาหลักสูตร ) <br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.3)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(มคอ.5) <br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(มคอ.7)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "( มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ) <br><a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "(หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF) <br><a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock1==0) echo "</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=17&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=17&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#BBBBFF"><? if ($lock1==0) { ?>      <a href="index.php?other=18&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
 ";
if ($lock1==0)  echo "      <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=18&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=18&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#BBBBFF"><? if ($lock1==0) { ?>      <a href="index.php?other=19&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "       <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=19&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=19&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#BBBBFF"><? if ($lock1==0) { ?>      <a href="index.php?other=20&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "       <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=20&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=20&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#BBBBFF"><? if ($lock1==0) { ?>      <a href="index.php?other=21&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "       <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=21&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=21&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#BBBBFF"><? if ($lock1==0) { ?>      <a href="index.php?other=22&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "       <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=22&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=22&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
    <td align="left" valign="top" bgcolor="#BBBBFF"><? if ($lock1==0) { ?>      <a href="index.php?other=23&menu=eval-other-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a><? } ?></td>
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
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\"><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "       <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#D9D9FF\">
	<a href=\"index.php?other=23&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?other=23&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
				        echo $sum5; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#9B9BFF">คะแนนของความสำเร็จของภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ </td>
    <td align="center" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#9B9BFF">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#9B9BFF"><? 
				        $resum=($sum5*100)/(5);
				        round($resum,2); 
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
</table>

</div>