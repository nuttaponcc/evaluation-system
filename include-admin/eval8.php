<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	color: #809F00;
}
-->
</style>
</head>

<body>
  <form id="form1" name="form1" method="post" action="action/act-eval8.php">

<?
include"tools/connect-eval.php";
$id=$_GET['id'];

   	$query = "SELECT * FROM `behavior2`  where  userid='".$id."' ORDER BY 'date' asc";
	$result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
	$n = mysql_num_rows($result);
	if($n==0)
	{
	
?>


  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td align="left"><div class="style1">ป.02 (สำหรับผู้ประเมิน)</div><br />
        <br />
		ผู้ถูกประเมินคือ<br />

<?


	    $Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$id;
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);
			
				if($row['status'])$percent=50; else $percent=70;
				//echo "test  $weight1  $weight2  $weight3 $weight4 $weight5";
				echo "ข้อมูลของ  : ".$Mrow ['staffposition']." ".$Mrow ['staffname']."<br>";
				echo "สังกัด :  ".$Mrow ['staffmajor']."<br>";


?>
        <input name="id" type="hidden" id="id" value="<?  echo $id  ?>" />
</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table border="0" cellpadding="2" cellspacing="2">
        <col width="175" />
        <col width="64" span="2" />
        <col width="17" />
        <col width="229" />
        <col width="64" span="2" />
        <col width="17" />
        <col width="166" />
        <col width="60" />
        <col width="64" />
        <tr>
          <td align="left">2.&nbsp; พฤติกรรมการปฏิบัติราชการ</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFCC00"> ก.สมรรถนะหลัก (สำหรับข้าราชการและพนักงานทุกคน)</td>
          <td width="64" bgcolor="#FFCC00">(1)ระดับสมรรถนะที่คาดหวัง</td>
          <td width="64" bgcolor="#FFCC00">(2)ระดับสมรรถนะที่แสดงออก</td>
          <td width="17" bgcolor="#FFCC00">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC00">ข.สมรรถนะเฉพาะตามลักษณะงานที่ปฏิบัติ    (สำหรับข้าราชการและพนักงานตามตำแหน่งที่รับผิดชอบ ตามที่ ก.บ.ม. กำหนด)</td>
          <td width="64" bgcolor="#FFCC00">(3)ระดับสมรรถนะที่คาดหวัง</td>
          <td width="64" bgcolor="#FFCC00">(4)ระดับสมรรถนะที่แสดงออก</td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFFF99">&nbsp;ก. 1    การมุ่งผลสัมฤทธิ์</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><label for="textfield"></label>
            <select name="beh11" size="1" id="beh11" >
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5" selected="selected">5</option>
            </select></td>
          <td width="17" bgcolor="#FFFF99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFFF99">ข. 1 การคิดวิเคราะห์</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh21" size="1" id="beh21" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFFF99">&nbsp;ก. 2    การบริการที่ดี</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh12" size="1" id="beh12" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          <td width="17" bgcolor="#FFFF99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFFF99">ข. 2 การดำเนินการเชิงรุก</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh22" size="1" id="beh22" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFFF99">&nbsp;ก. 3    การสั่งสมความเชี่ยวชาญในงานอาชีพ</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh13" size="1" id="beh13" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          <td width="17" bgcolor="#FFFF99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFFF99">ข. 3 ความผูกพันที่มีต่อส่วนราชการ</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh23" size="1" id="beh23" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFFF99">&nbsp;ก. 4    การยึดมั่นในความถูกต้องชอบธรรมและจริยธรรม</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh14" size="1" id="beh14" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          <td width="17" bgcolor="#FFFF99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFFF99">ข. 4 การมองภาพองค์รวม</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh24" size="1" id="beh24" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFFF99">&nbsp;ก. 5    การทำงานเป็นทีม</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh15" size="1" id="beh15" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          <td width="17" bgcolor="#FFFF99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFFF99">ข. 5 การใส่ใจและพัฒนาผู้อื่น</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh25" size="1" id="beh25" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          </tr>
        <tr>
          <td width="175" bgcolor="#FFFF99">&nbsp;</td>
          <td width="64" align="center" bgcolor="#FFFF99">&nbsp;</td>
          <td width="64" bgcolor="#FFFF99">&nbsp;</td>
          <td width="17" bgcolor="#FFFF99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFFF99">ข. 6 ความเข้าใจผู้อื่น</td>
          <td width="64" align="center" bgcolor="#FFFF99">5</td>
          <td width="64" bgcolor="#FFFF99"><select name="beh26" size="1" id="beh26" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5" selected="selected">5</option>
          </select></td>
          </tr>
        <tr>
          <td width="175"></td>
          <td width="64"></td>
          <td width="64"></td>
          <td width="17"></td>
          <td width="229"></td>
          <td width="64"></td>
          <td width="64"></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <input name="ac" type="hidden" id="ac" value="add" />
<? if ($lock2==0) {   ?> <input type="submit" name="button" id="button" value="บันทึก" /> <? } ?>
  <input type="reset" name="button2" id="button2" value="เริ่มใหม่" />
  <br />
  <?
}else{
  ?>
  <br />
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td align="left"><div class="style1">
        <div class="style1">ป.02 (สำหรับผู้ประเมิน)</div>
        <br />
        <br />
ผู้ถูกประเมินคือ<br />
<?


	    $Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$id;
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);
			
				if($row['status'])$percent=50; else $percent=70;
				//echo "test  $weight1  $weight2  $weight3 $weight4 $weight5";
				echo "ข้อมูลของ  : ".$Mrow ['staffposition']." ".$Mrow ['staffname']."<br>";
				echo "สังกัด :  ".$Mrow ['staffmajor']."<br>";


?>
<input name="id" type="hidden" id="id" value="<?  echo $id  ?>" />
</div></td>
    </tr>
    <tr>
      <td align="left" valign="top"><table border="0" cellpadding="2" cellspacing="2">
        <col width="175" />
        <col width="64" span="2" />
        <col width="17" />
        <col width="229" />
        <col width="64" span="2" />
        <col width="17" />
        <col width="166" />
        <col width="60" />
        <col width="64" />
        <tr>
          <td align="left">2.&nbsp; พฤติกรรมการปฏิบัติราชการ</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FF9900"> ก.สมรรถนะหลัก (สำหรับข้าราชการและพนักงานทุกคน)</td>
          <td width="64" bgcolor="#FF9900">(1)ระดับสมรรถนะที่คาดหวัง</td>
          <td width="64" bgcolor="#FF9900">(2)ระดับสมรรถนะที่แสดงออก</td>
          <td width="17" bgcolor="#FF9900">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FF9900">ข.สมรรถนะเฉพาะตามลักษณะงานที่ปฏิบัติ    (สำหรับข้าราชการและพนักงานตามตำแหน่งที่รับผิดชอบ ตามที่ ก.บ.ม. กำหนด)</td>
          <td width="64" bgcolor="#FF9900">(3)ระดับสมรรถนะที่คาดหวัง</td>
          <td width="64" bgcolor="#FF9900">(4)ระดับสมรรถนะที่แสดงออก</td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFCC99">&nbsp;ก. 1    การมุ่งผลสัมฤทธิ์</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><label for="textfield"></label>
            <select name="beh11" size="1" id="beh11" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh11']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
            </select>  </td>
          <td width="17" bgcolor="#FFCC99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC99">ข. 1 การคิดวิเคราะห์</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh21" size="1" id="beh21" >

<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh21']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFCC99">&nbsp;ก. 2    การบริการที่ดี</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh12" size="1" id="beh12" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh12']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
         </select></td>
          <td width="17" bgcolor="#FFCC99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC99">ข. 2 การดำเนินการเชิงรุก</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh22" size="1" id="beh22" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh22']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFCC99">&nbsp;ก. 3    การสั่งสมความเชี่ยวชาญในงานอาชีพ</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh13" size="1" id="beh13" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh13']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
          </select></td>
          <td width="17" bgcolor="#FFCC99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC99">ข. 3 ความผูกพันที่มีต่อส่วนราชการ</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh23" size="1" id="beh23" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh23']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFCC99">&nbsp;ก. 4    การยึดมั่นในความถูกต้องชอบธรรมและจริยธรรม</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh14" size="1" id="beh14" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh14']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
          </select></td>
          <td width="17" bgcolor="#FFCC99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC99">ข. 4 การมองภาพองค์รวม</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh24" size="1" id="beh24" >
 <?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh24']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
 
          </select></td>
          </tr>
        <tr>
          <td width="175" align="left" bgcolor="#FFCC99">&nbsp;ก. 5    การทำงานเป็นทีม</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh15" size="1" id="beh15" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh15']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
         </select></td>
          <td width="17" bgcolor="#FFCC99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC99">ข. 5 การใส่ใจและพัฒนาผู้อื่น</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh25" size="1" id="beh25" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh25']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
          </select></td>
          </tr>
        <tr>
          <td width="175" bgcolor="#FFCC99">&nbsp;</td>
          <td width="64" align="center" bgcolor="#FFCC99">&nbsp;</td>
          <td width="64" bgcolor="#FFCC99">&nbsp;</td>
          <td width="17" bgcolor="#FFCC99">&nbsp;</td>
          <td width="229" align="left" bgcolor="#FFCC99">ข. 6 ความเข้าใจผู้อื่น</td>
          <td width="64" align="center" bgcolor="#FFCC99">5</td>
          <td width="64" bgcolor="#FFCC99"><select name="beh26" size="1" id="beh26" >
<?
			for($i=1;$i<=5;$i++)
			{
                  if($row['beh26']==$i) echo " <option value=\"$i\" selected=\"selected\">$i</option>"; else  echo " <option value=\"$i\" >$i</option>";  
			}
?>
         </select></td>
          </tr>
        <tr>
          <td width="175"></td>
          <td width="64"></td>
          <td width="64"></td>
          <td width="17"></td>
          <td width="229"></td>
          <td width="64"></td>
          <td width="64"></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <input name="ac" type="hidden" id="ac" value="edit" />
  <? if ($lock2==0) {   ?>
  <input type="submit" name="button3" id="button3" value="บันทึกแก้ไข" />
  <? } ?>
  <input type="reset" name="button22" id="button22" value="เริ่มใหม่" />
<br />
  <?
}
  ?>


  <br />
</form>
</body>
</html>
