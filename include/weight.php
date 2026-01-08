<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<? 
include"tools/connect-eval.php";
?>
<style type="text/css">
<!--
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	color: #FFFF00;
}
-->
</style>
</head>

<body>


  <table width="100%" border="0" cellpadding="5" cellspacing="10" background="images/bg2.png">
    <tr>
      <td align="left" bgcolor="#024475"><div class="style1">ค่าถ่วงน้ำหนัก</div></td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td>ค่าน้ำหนัก (2) ความสำคัญ/ความยากง่ายของงาน<br />
                   คณาจารย์สามารถเลือกค่าถ่วงน้ำหนักที่ใช้ในการประเมิน วงรอบที่ 1 ระหว่างวันที่ 1 ตุลาคม 2567  - 28 กุมภาพันธ์  2568   <br />
            โดยสามารถเลือกใช้ได้เพียง 1 รูปแบบในการประเมินฯเท่านั้น</td>
          </tr>
        </table>
        <br />
        <form id="form1" name="form1" method="post" action="action/update-weight.php">
          <table  id="customers">
            <tr>
              <th >&nbsp;</th>
              <th align="center">รูปแบบ</th>
              <th align="center">การสอน(%)</th>
              <th align="center">งานวิจัยและผลงานทางวิชาการ(%)</th>
              <th align="center">บริการวิชาการ(%)</th>
              <th align="center">ทำนุบำรุงฯ(%)</th>
              <th align="center">บริหารจัดการและอื่น ๆ (%)</th>
            </tr>
			<?
				$query = "SELECT * FROM `wselect` where userid=$session_user_id";
				$result = mysql_query($query);
				$row = mysql_fetch_assoc($result);
				$n = mysql_num_rows($result);
				if ($n>0)
				{
					$chk =$row['wtid'];
					$status =$row['status'];
				}else{
					$chk ="none";					
					echo "<br><font color=\"ff0000\">คุณยังไม่เลือกค่าถ่วงน้ำหนัก </font>";
				}
				$query = "SELECT * FROM `weight` where 1 ";
				$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
if($chk==$row['id'])$schk="checked=\"checked\" "; else $schk="";
	 echo "
            <tr> 
              <td align=\"center\"><input name=\"sweight\" type=\"radio\" value=\"".$row['id']."\"   $schk /></td>
              <td align=\"center\">".$row['name']."</td>
              <td align=\"center\">".$row['w1']."</td>
              <td align=\"center\">".$row['w2']."</td>
              <td align=\"center\">".$row['w3']."</td>
              <td align=\"center\">".$row['w4']."</td>
              <td align=\"center\">".$row['w5']."</td>
            </tr>	 
	 ";  
	}	
			?>
          </table>
          <br />
          <label>
		  <? 
 				   if($status==1)     { echo "<input name=\"status\" type=\"checkbox\" id=\"status\"  value=\"checked\"  checked=\"checked\" />"; }else{
									echo "<input name=\"status\" type=\"checkbox\" id=\"status\"  value=\"checked\"  />"; }
		  ?>
          เฉพาะพนักงานใหม่ ใช้สูตร 50%-50%</label>
          <input name="chk" type="hidden" value="<? echo $chk ?>" />			    

          <p>
            <input type="submit" name="Submit" value="บันทึก" />
          </p>
        </form>
        <p>&nbsp;</p></td>
    </tr>
</table>
  <p>&nbsp;</p>
</body>
</html>
