<?
include"tools/connect-eval.php";
$other=$_GET['other'];

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
</SCRIPT>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<div align="left">
  <p><strong>ลบ</strong> 
    <?php 
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=$other  and `other`.`id`=$id and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";		
		//echo  $query;
		$result = mysql_query($query);
		$row0 = mysql_fetch_row($result);
  ?>
  </p>
  <p>5. ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ<br />
  <?
	$query = "SELECT * FROM `workload` where category=$other ";
	$result = mysql_query($query);
   $row = mysql_fetch_assoc($result);

        echo  $row ['detail'];
?>		
  </p>
  <form action="action/del-other.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชื่อภาระงาน</td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><? echo $row0[12]; ?></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">ภาระงานอื่นๆ</td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><?
	$query = "SELECT * FROM `workload` where category=$other  and id=".$row0[13];
	$result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    echo $row['name'];
	  ?></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">ตัวคูณ</td>
      <td align="left" valign="top" bgcolor="#F3F2F7">
          <?  echo  $row0[7];  ?></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">&nbsp;</td>
    </tr>
  </table>
    <p>
      <input type="submit" name="Submit" value="ยืนยันการลบ" />
    </p>
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
