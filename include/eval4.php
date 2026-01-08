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

<div align="center">
  <strong><br />

<?		if($por==1) echo "แบบ ป.01  "; else  echo "แบบ ป.03"; ?>
 ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม
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
      <td align="left" valign="top" bgcolor="#E3A72B">4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
      <td align="center" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B"><? if ($lock03==0) { ?><a href="index.php?menu=eval-culture-add" target="_parent"><img src="images/add.png" alt="add"  border="0" /></a>      <? } ?>    </td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`culture`  where  `culture`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_array($result)) {

	 		$n=$row['score']*$row['multiplier'];
			if($row[0]<115) $nac1= $nac1+1;
			elseif($row[0]>117) $nac3= $nac3+1;
			else  $nac2= $nac2+1;
            

	 $sum4=$sum4+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" > $row[name] <br> <font  size=2 color=blue>$row[2]</font> </td>
    <td align=\"left\" valign=\"top\" ><div align=\"center\">1x".$row['score']."x".$row['multiplier']."=$n</div></td>
    <td align=\"left\" valign=\"top\" ><a href=\"files/".$row['filename']."\" target=\"_blank\">".$row['filename']."</div></td>
";
if ($lock03==0)  echo "   
    <td align=\"left\" valign=\"top\" >&nbsp;</td>
    <td align=\"left\" valign=\"top\" >
	<a href=\"index.php?menu=eval-culture-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-culture-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" />	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  
    <tr>
      <td align="left" valign="top" bgcolor="#E3A72B">
      <? 
	  $nac=$nac1+$nac2+$nac3;
	  if($nac>0)
	  {
	  ?>
      <strong>สรุปโครงการที่เข้าร่วมทั้งหมด  <?=$nac?> โครงการ</strong><br />
      โครงการมหาวิทยาลัย   <? echo $nac3 ?> โครงการ<br />
      โครงการคณะ <? echo $nac1?> โครงการ<br />
      โครงการภาควิชาที่สังกัด  <? echo $nac2?> โครงการ<br />
      <? } ?>
      </td>
      <td  valign="top" bgcolor="#E3A72B"><br /></td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E3A72B">รวมภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
      <td align="center" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B">
      <? 
				        echo $sum4; 
				  ?></td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E3A72B">คะแนนของความสำเร็จของภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม </td>
      <td align="center" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B"><? 
				        $resum=($sum4*100)/(5);
				        echo $resum; 
				  ?></td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E3A72B">ระดับความสำเร็จในด้านภาระการทำนุบำรุงศิลปะและวัฒนธรรม (1)<br />
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
      <td align="center" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B"><? 
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
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E3A72B">น้ำหนัก(2) (ความสำคัญ/ความยากง่ายของงาน)</td>
      <td align="center" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B"><?
		echo $weight4;
	  ?></td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E3A72B">ค่าคะแนนถ่วงน้ำหนัก  (1)x(2)/100 </td>
      <td align="center" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#E3A72B"><? 
							  $sw4 =  ($grade*$weight4)/100;
				        echo $sw4; 
				  ?></td>
      <td align="left" valign="top" bgcolor="#E3A72B">&nbsp;</td>
    </tr>
  </table>
</div>
