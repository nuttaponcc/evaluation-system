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

<div align="center"><strong><br />
<?		if($por==1) echo "แบบ ป.01  "; else  echo "แบบ ป.03"; ?>
 ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ
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
        <? if ($lock1==0) { ?>
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
    <td align=\"left\" valign=\"top\" >".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][1]."=$n</div></td>
    <td align=\"left\" valign=\"top\" >";
	if($row['filename'])echo "( มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง ) <br><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "(มคอ.3)<br><a href=\"files/".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "(มคอ.5) <br><a href=\"files/".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "(มคอ.7)<br><a href=\"files/".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "( มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ) <br><a href=\"files/".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "(หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF) <br><a href=\"files/".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if($row['filename7'])echo "(ใบรับรอง ISO 17025) <br><a href=\"files/".$row['filename7']."\" target=\"_blank\">".$row['filename7']."</a><br>";
	
if ($lock1==0)  echo "   </td>
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?other=17&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=17&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.2)  การช่วยงานบริหารจัดการภาควิชา/คณะฯ / ISO 17025 <font  size="-3"> (
          <?=$coe[5][2]?>
) </font></td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=18&menu=eval-other-add" target="_parent">
        <? if ($lock1==0) { ?>
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
    <td align=\"left\" valign=\"top\" >".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][2]."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
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
        <? if ($lock1==0) { ?>
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
    <td align=\"left\" valign=\"top\" >".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][3]."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
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
        <? if ($lock1==0) { ?>
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
    <td align=\"left\" valign=\"top\" >".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?other=20&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=20&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

    
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.5) การพัฒนาตนเอง <font  size="-3"> (
          <?=$coe[5][5]?>
) </font> (ไม่เกิน 2 กิจกรรม) </td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><a href="index.php?other=21&menu=eval-other-add" target="_parent">
        <? if ($lock1==0) { ?>
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
	 $sum52=$sum52+$n;
	 
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" >".$row['name'].$txt." </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][5]."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?other=21&menu=eval-other-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"  width=\"100\" height=\"30\" border=\"0\" /></a>
	<a href=\"index.php?other=21&menu=eval-other-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"  width=\"100\" height=\"30\" border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">5.6) การบริการวิชาการในระดับชาติ/นานาชาติ <font  size="-3"> (<?=$coe[5][6]?>
) </font> (เป็นคณะกรรมการในการจัดประชุมวิชาการภายในคณะฯ)</td>
      <td align="center" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><? if ($lock1==0) { ?><a href="index.php?menu=eval-service5-add" target="_parent"><img src="images/add.png" alt="add"  border="0" />
        
      </a><? } ?></td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier']*$coe[5][6];

	 $sum51=$sum51+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" >".$row['name']."</td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[5][6]."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
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
						if ($sum52>0.1) $sum51=$sum51+0.1; else $sum51=$sum51+$sum52;
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
      <td align="left" valign="top" bgcolor="#9B9BFF">ระดับความสำเร็จในด้านช่วยการบริหารจัดการและอื่น ๆ (1)      <br />
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
  </table>
</div>