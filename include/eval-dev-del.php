<?
include"tools/connect-eval.php";

$other=$_GET['other'];
   	$query = "SELECT * FROM `dev`  where   devid=".$id;
//	echo "$query";
	$result = mysql_query($query);
    $row = mysql_fetch_assoc($result)

?>

<SCRIPT LANGUAGE="JavaScript">
function changediv(text,name,w){
//alert(name);
switch(name)
{
case 'course':
  document.getElementById("textcourse").innerHTML = text;
  break;
case  "week":
  document.getElementById("textweek").innerHTML = text;
  break;
case  'workload':
if (text=="18")
  {
		document.getElementById("textworkload").innerHTML = "<input type=\"text\" name=\"amount\" />";
  }else{
		document.getElementById("textworkload").innerHTML = "";  
  }
  break;
case  'multiplier':
		switch(text)
			{
				case "1":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1  มีระบบกลไกในการควบคุม กำกับ ประเมิน และพัฒนาหลักสูตร";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มี มคอ. 3, 5 ครบทุกรายวิชาที่เปิดสอน";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มี มคอ. 7 ตามเวลาที่กำหนด";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF";
				  break;
         	}

  break;
case  'goal':
  document.getElementById("textgoal").innerHTML = text;
  break;
default:
  ;
}

}
</SCRIPT><table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>
<div align="left">
  <p><strong>ลบ</strong></p>
  <p><strong>แผนพัฒนารายบุคคล</strong><br /></p>
  <form action="action/del-dev.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#99FFFF"><strong>
        <input name="id" type="hidden" id="id" value="<? echo $id ?>" />
        ชื่อหัวข้อที่จะพัฒนา</strong></td>
      <td align="left" valign="top" bgcolor="#99FFFF"><?  echo $row['subj']; ?></td>
      <td align="left" valign="top" bgcolor="#99FFFF"> </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#99FFFF"><strong>เป้าหมายการพัฒนา</strong></td>
      <td align="left" valign="top" bgcolor="#99FFFF"><?  echo  $row['gold'] ?></td>
      <td align="left" valign="top" bgcolor="#99FFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#99FFFF"><strong>วิธีการพัฒนา</strong></td>
      <td align="left" valign="top" bgcolor="#99FFFF"><pre><?  echo  $row['method'] ?></pre></td>
      <td align="left" valign="top" bgcolor="#99FFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#99FFFF"><strong>ระยะเวลา เริ่มต้นและสิ้นสุด</strong></td>
      <td align="left" valign="top" bgcolor="#99FFFF"><?  echo  $row['ptime']; ?>  </td>
      <td align="left" valign="top" bgcolor="#99FFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#99FFFF">งบประมาณ </td>
      <td align="left" valign="top" bgcolor="#99FFFF"><?  echo  $row['budget']; ?></td>
      <td align="left" valign="top" bgcolor="#99FFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#99FFFF">การวัดผลสำเร็จ</td>
      <td align="left" valign="top" bgcolor="#99FFFF">
<?   echo $row['status']   ?>     </td>
      <td align="left" valign="top" bgcolor="#99FFFF">&nbsp;</td>
    </tr>
  </table>
    <p>
      <input type="submit" name="Submit" value="ลบ" />
    </p>
  </form>

  <p>  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>	</td>
  </tr>
</table>
