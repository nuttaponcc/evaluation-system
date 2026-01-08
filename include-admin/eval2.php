<?
include"tools/connect-eval.php";
$userid=$_GET['id'];//../evaluation1-66/
$dir="files/";

			 	 $query = "SELECT * FROM staffinfo where  staffid=$userid";
				$result = mysql_query($query);
				$row = mysql_fetch_assoc($result) ;
				echo	"<strong>ข้อมูลด้านวิจัย 5 ปีย้อนหลังชอง </strong>".$staffp=$row['staffposition']." ".$staffn=$row['staffname'];



			 	$query = "SELECT * FROM `weight`,`wselect` where  weight.id=wselect.wtid and wselect.userid=$userid";
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
<p>วงรอบล่าสุดที่กำลังประเมิน <strong>วงรอบที่ 1 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2567</strong></p>
<div align="left">
  <table border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="22"></a>2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B"><p>&nbsp;</p></td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
        <?=$coe[2][1]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
        <?=$coe[2][2]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234"><!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
        <?=$coe[2][3]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
        <?=$coe[2][4]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  </table>
  <br />
</div>
<hr />
<div align="left">
<p>วงรอบที่ 1 ระหว่างวันที่ 1 กันยายน 2565 - 28 กุมภาพันธ์ 2566
  <?
$dbname = "evaluation1-66";
$dir="../evaluation1-66/files/";
mysql_select_db($dbname,$link);
?>
</p>

<table border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
  <tr>
    <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="222"></a>2. ภาระงานด้านวิจัย</td>
    <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B"><p>&nbsp;</p></td>
    <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
      <?=$coe[2][1]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
  </tr>
  <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
  <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
      <?=$coe[2][2]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234"><!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
  </tr>
  <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
      <?=$coe[2][3]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
  </tr>
  <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
      <?=$coe[2][4]?>
      ) </font></td>
    <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
    <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
  </tr>
  <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
    <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
  </tr>
  <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  <tr>
    <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
    <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
  </tr>
  <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
</table>

<hr />

<div align="left">
  <p>วงรอบที่ 2 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2565
    <?
$dbname = "evaluation2-65";
$dir="../evaluation2-65/files/";
mysql_select_db($dbname,$link);
?>
  </p>
  <table border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="2222"></a>2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B"><p>&nbsp;</p></td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
        <?=$coe[2][1]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
        <?=$coe[2][2]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234"><!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
        <?=$coe[2][3]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
        <?=$coe[2][4]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  </table>
</div>
<div align="left">
  <hr />
  <p>วงรอบที่ 1 ระหว่างวันที่ 1 กันยายน 2564 - 28 กุมภาพันธ์ 2565
    <?
$dbname = "evaluation1-65";
$dir="../evaluation1-65/files/";
mysql_select_db($dbname,$link);
?>
  </p>
  <table border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="2224"></a>2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B"><p>&nbsp;</p></td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
        <?=$coe[2][1]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
        <?=$coe[2][2]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234"><!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
        <?=$coe[2][3]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
        <?=$coe[2][4]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  </table>
  <hr />
  <br />
<br />


<div align="left">
  <p>วงรอบที่ 2 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2564
    <?
$dbname = "evaluation2-64";
$dir="../evaluation2-64/files/";
mysql_select_db($dbname,$link);
?>
  </p>
  <table border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="2222"></a>2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B"><p>&nbsp;</p></td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
        <?=$coe[2][1]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
        <?=$coe[2][2]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234"><!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
        <?=$coe[2][3]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
        <?=$coe[2][4]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  </table>
</div>
</div>
<hr />
<div align="left">
  <p>วงรอบที่ 1 ระหว่างวันที่ 1 กันยายน 2563 - 28 กุมภาพันธ์ 2564
    <?
$dbname = "evaluation1-64";
$dir="../evaluation1-64/files/";
mysql_select_db($dbname,$link);
?>
  </p>
  <table border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
    <tr>
      <td align="left" valign="top" bgcolor="#A3BA1B"><a name="2" id="2223"></a>2. ภาระงานด้านวิจัย</td>
      <td align="center" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B"><p>&nbsp;</p></td>
      <td align="right" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#A3BA1B">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.1)  ทุนวิจัย<font  size="-3"> (
        <?=$coe[2][1]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
				  $sum2=0;
    $query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=$userid ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";

if ($lock04==0) 	echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
	echo "
  </tr>	
		";
	}	
  ?>
    <?
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][1]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>
	";
echo "  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.2)บทความวิชาการ/บทความวิจัย<font  size="-3"> (
        <?=$coe[2][2]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234"><!--strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
      <strong>ตัวคูณ=2 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ใน   Proceedings ทั้งในหรือต่างประเทศ   หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI   หรือ   งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตาม  ประกาศของ สมศ., SCOPUS, ISI<br />
      <strong>ตัวคูณ=3 </strong> มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ   มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการ  วิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน     หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.<br />
      <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
      <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI  --></td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][2]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if($row['filename5'])echo "<a href=\"$dir".$row['filename5']."\" target=\"_blank\">".$row['filename5']."</a><br>";
	if($row['filename6'])echo "<a href=\"$dir".$row['filename6']."\" target=\"_blank\">".$row['filename6']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.3) งานวิจัยที่นำไปสร้างมูลค่าเพิ่ม <font  size="-3"> (
        <?=$coe[2][3]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`      and `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFFFFF\"><div align=\"center\">".$row['score']."x".$row['multiplier']."x".$coe[2][3]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#C8E234">2.4) ผลงานวิชาการ<font  size="-3"> (
        <?=$coe[2][4]?>
        ) </font></td>
      <td align="center" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#C8E234">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C8E234">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.1) เอกสารประกอบการสอน</td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research51`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
   <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.2) เอกสารคำสอน </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research52`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#BAE94B">2.4.3) ตำราหรือหนังสือหนังสือแปล </td>
      <td align="center" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#BAE94B">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#BAE94B">&nbsp;</td>
    </tr>
    <?
   	$query = "SELECT * FROM `research53`  where    `userid`=$userid ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">".$row['name']."  </td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\"><div align=\"center\">1x".$row['multiplier']."x".$row['percent']."%x".$coe[2][4]."=$n</div></td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">";
	if($row['filename'])echo "<a href=\"$dir".$row['filename']."\" target=\"_blank\">".$row['filename']."</a><br>";
	if($row['filename2'])echo "<a href=\"$dir".$row['filename2']."\" target=\"_blank\">".$row['filename2']."</a><br>";
	if($row['filename3'])echo "<a href=\"$dir".$row['filename3']."\" target=\"_blank\">".$row['filename3']."</a><br>";
	if($row['filename4'])echo "<a href=\"$dir".$row['filename4']."\" target=\"_blank\">".$row['filename4']."</a><br>";
	if ($lock04==0) echo "</td>    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">&nbsp;</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#E8FFE8\">
	</td>";
	echo "
  </tr>	
		";
	}	
  ?>
  </table>
</div>
<br />
<br />
