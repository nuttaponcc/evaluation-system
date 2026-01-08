<?
session_start();
include"../tools/connect.php";
$querys = "select * from scdb_user, scdb_major  where  scdb_user.user_major=scdb_major.major_id and user_id = '$_SESSION[session_user_id] ' ";
//echo $querys;
$result = mysql_query($querys,$link);
$r=mysql_fetch_array($result);

include"../tools/connect-eval.php";

if ($act==go) 
{
$staffid=$_POST['staffid'];

            $date_today=date( 'Y-m-d H:i:s' ); 
$query = "UPDATE `staffinfo` SET 
`staffname` = '$staffname',
`staffposition` = '$staffposition',
`staffmajor` = '$staffmajor',
`staffedu` = '$staffedu',
`staffcategory` = '$staffcategory',
`commander` = '$commander',
`commanderposition` = '$commanderposition' ,
`date` = '$date_today' , 
`ptime` = '$ptime' 
WHERE staffid = '$_SESSION[session_user_id] '";
$result = mysql_query($query);
//echo $query;			
	    if ($menu=="cover") header("Location: ../fpdf/cover.php");
	    if ($menu==1) echo header("Location: ../fpdf/pdf.php");
	    if ($menu==2) echo header("Location: ../fpdf/pdf2.php");
	    if ($menu==3) echo header("Location: ../fpdf/pdf3.php");
	    if ($menu==4) echo header("Location: ../fpdf/pdf4.php");
	    if ($menu=="dev") echo header("Location: ../fpdf/pdfdev.php");

		
}       


$query = "SELECT * FROM `staffinfo`  where   staffid = '$_SESSION[session_user_id] ' ";
$result = mysql_query($query);
$n = mysql_num_rows($result);

			if ($n>0)
				{
						$r=mysql_fetch_array($result);
				}else{
					$query = "INSERT INTO `staffinfo` (`staffid` ,`staffname` ,`staffposition` ,`staffmajor` ,`staffedu` ,`staffcategory` ,`commander` ,`commanderposition`)
                                                                                                 VALUES ('".$_SESSION[session_user_id]."', '".$r['user_name1']."', '', '".$r['major_name']."', '', '', '', '');";
					$result = mysql_query($query);
					$querys = "SELECT * FROM `staffinfo`  where   staffid = '$_SESSION[session_user_id] ' ";
					$result = mysql_query($querys);
					$r=mysql_fetch_array($result);																							 				
				}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Report</title>
</head>
<body>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td><form id="form1" name="form1" method="post" action="report.php">
      <?
	    if ($menu=="cover") echo "<p><strong>ตรวจสอบรายละเอียดให้ถูกต้องเพื่อสร้างปกรายงาน  </strong></p>";
	    if ($menu==1) echo "<p><strong>ตรวจสอบรายละเอียดให้ถูกต้องเพื่อสร้างรายงาน ป.01 </strong></p>";
	    if ($menu==2) echo "<p><strong>ตรวจสอบรายละเอียดให้ถูกต้องเพื่อสร้างรายงาน ป.02 </strong></p>";
	    if ($menu==3) echo "<p><strong>ตรวจสอบรายละเอียดให้ถูกต้องเพื่อสร้างรายงาน ป.03 </strong></p>";
	    if ($menu==4) echo "<p><strong>ตรวจสอบรายละเอียดให้ถูกต้องเพื่อสร้างรายงาน ป.04 </strong></p>";
	  ?>
      <table border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td>ชื่อผู้รับการประเมิน</td>
          <td>&nbsp;</td>
          <td><input name="staffname" type="text" id="staffname" value="<?  echo $r['staffname']; ?>" size="50" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>ตำแหน่ง/ระดับ</td>
          <td>&nbsp;</td>
          <td><input name="staffposition" type="text" id="staffposition" value="<?  echo $r['staffposition']; ?>" size="50" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>สังกัด</td>
          <td>&nbsp;</td>
          <td><input name="staffmajor" type="text" id="staffmajor" value="<?  echo $r['staffmajor']; ?>" size="50" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>คุณวุฒิ</td>
          <td>&nbsp;</td>
          <td><label>
            <select name="staffedu" id="staffedu">
			<?
  if($r['staffedu']=="ปริญญาตรี") echo "<option value=\"ปริญญาตรี\" selected=\"selected\">ปริญญาตรี</option>"; else echo "<option value=\"ปริญญาตรี\" >ปริญญาตรี</option>";  if($r['staffedu']=="ปริญญาโท") echo "<option value=\"ปริญญาโท\" selected=\"selected\">ปริญญาโท</option>"; else echo "<option value=\"ปริญญาโท\" >ปริญญาโท</option>";  if($r['staffedu']=="ปริญญาเอก") echo "<option value=\"ปริญญาเอก\" selected=\"selected\">ปริญญาเอก</option>"; else echo "<option value=\"ปริญญาเอก\" >ปริญญาเอก</option>"; 
			?>
            </select>
          </label></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>ประเภทบุคลากร</td>
          <td>&nbsp;</td>
          <td><select name="staffcategory" id="staffcategory">

			<?
  if($r['staffcategory']=="ข้าราชการ") echo "<option value=\"ข้าราชการ\" selected=\"selected\">ข้าราชการ</option>"; else echo "<option value=\"ข้าราชการ\" >ข้าราชการ</option>";  if($r['staffcategory']=="พนักงานในสถาบันอุดมศึกษา") echo "<option value=\"พนักงานในสถาบันอุดมศึกษา\" selected=\"selected\">พนักงานในสถาบันอุดมศึกษา</option>"; else echo "<option value=\"พนักงานในสถาบันอุดมศึกษา\" >พนักงานในสถาบันอุดมศึกษา</option>";  
  if($r['staffcategory']=="ลูกจ้างชั่วคราว") echo "<option value=\"ลูกจ้างชั่วคราว\" selected=\"selected\">ลูกจ้างชั่วคราว</option>"; else echo "<option value=\"ลูกจ้างชั่วคราว\" >ลูกจ้างชั่วคราว</option>"; 
			?>
                              </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>ระยะเวลาทำงาน</td>
          <td>&nbsp;</td>
          <td><input name="ptime" type="text" id="ptime" value="<?  echo $r['ptime']; ?>" size="50" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>ชื่อผู้บังคับบัญชา/ผู้ประเมิน</td>
          <td>&nbsp;</td>
          <td><input name="commander" type="text" id="commander" value="<?  echo $r['commander']; ?>" size="50" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>ตำแหน่ง/ระดับ</td>
          <td>&nbsp;</td>
          <td><input name="commanderposition" type="text" id="commanderposition" value="<?  echo $r['commanderposition']; ?>" size="50" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="menu" type="hidden" id="menu" value="<? echo $menu ?>" />
            <input name="act" type="hidden" id="act" value="go" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value="สร้างรายงาน" />
            <input type="reset" name="Submit2" value="Reset" />
          </label></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>
