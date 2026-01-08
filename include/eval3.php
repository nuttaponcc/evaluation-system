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

<div align="center"><strong><br />
<?		if($por==1) echo "แบบ ป.01  "; else  echo "แบบ ป.03"; ?>
 ภาระด้านการบริการวิชาการ
</strong>
 <br />
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
      <td align="left" valign="top" bgcolor="#70E4E1">3. ภาระงานด้านการบริการวิชาการ</td>
      <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#70E4E1">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    </tr>
     <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ของคณะ ฯ</td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-service4-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service4-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
 
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">3.2) งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ   <br />
เป็นวิทยากร/ผู้ทรงคุณวุฒิอ่านผลงานวิชาการ /กรรมการสอบวิทยานิพนธ์ <br />
เป็นกรรมการต่าง ๆ /ผู้ทรงคุณวุฒิอื่น ๆ <br /><br /></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-service6-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service6-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">3.3) การบริการวิชาการที่สร้างรายได้ให้กับคณะ <font color=red></font> <br /></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-service1-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service1-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
      
  <tr>
    <td align="left" valign="top" bgcolor="#CCCCCC">3.4) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ        เช่น  อาจารย์ที่ปรึกษาวิทยานิพนธ์ให้กับมหาวิทยาลัยอื่น ๆ       ทั้งภาครัฐและเอกชน<br /></td>
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
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['amount']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
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
      <td align="left" valign="top" bgcolor="#70E4E1">ระดับความสำเร็จในด้านภาระการบริการวิชาการ (1)<br />
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
  </table>
<blockquote>&nbsp;	</blockquote>
</div>