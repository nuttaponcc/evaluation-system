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
    <td align="left" valign="top" bgcolor="#70E4E1">3. ภาระงานด้านการบริการวิชาการ</td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.1) การบริการวิชาการแก่สังคมและชุมชน</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock1==0) { ?><a href="index.php?menu=eval-service1-add" target="_parent"><img src="images/add.png" alt="add"  border="0" />
      
    </a><? } ?></td>
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
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service1-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service1-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

  <tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.2)    งานบริการวิชาการให้แก่หน่วยงานภายนอก</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock1==0) { ?><a href="index.php?menu=eval-service2-add" target="_parent"><img src="images/add.png" alt="add"  border="0" /></a><a href="index.php?menu=eval-service1-add" target="_parent">
      
    </a><? } ?></td>
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
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service2-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service2-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>

<tr>
    <td align="left" valign="top" bgcolor="#B8F1F0">3.3)     งานบริการวิชาการรับเชิญรายบุคคลจากหน่วยงานภายนอก</td>
    <td align="center" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#B8F1F0">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#B8F1F0"><? if ($lock1==0) { ?><a href="index.php?menu=eval-service3
	-add" target="_parent"><img src="images/add.png" alt="add"  border="0" /></a>      <? } ?>    </td>
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
if ($lock1==0)  echo "   
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#ccf0FF\">
	<a href=\"index.php?menu=eval-service3-edit&id=".$row['id']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-service3-del&id=".$row['id']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" /></a>	
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
				        echo $sum3; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#70E4E1">คะแนนของความสำเร็จของภาระงานด้านการบริการวิชาการ คำนวณจากสูตร </td>
    <td align="center" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#70E4E1"><? 
				        $resum=($sum3*100)/(5);
				        round($resum,2); 
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
							  $sw =  ($grade*$weight3)/100;
				        echo $sw; 
				  ?></td>
    <td align="left" valign="top" bgcolor="#70E4E1">&nbsp;</td>
  </tr>

</table>

</div>