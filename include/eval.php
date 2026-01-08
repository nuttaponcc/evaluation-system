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

<div align="center">
  <p><strong><br />
  <?
if($por==1) echo "ป.01  ข้อตกลงและแบบการประเมินผลสัมฤทธิ์"; else  echo "แบบรายงานผลการปฏิบัติราชการของข้าราชการและพนักงาน สังกัดมหาวิทยาลัยมหาสารคาม แบบ ป.03"; 
?>
    </strong>  </p>
  <p>
  <? include "include/eval1.php";?>
  <? include "include/eval2.php";?>
  <? include "include/eval3.php";?>
  <? include "include/eval4.php";?>
  <? include "include/eval5.php";?>
  </p>
  <table border="0" cellpadding="5" cellspacing="2" bgcolor="#666666">

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
