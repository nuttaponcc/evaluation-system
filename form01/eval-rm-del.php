<?
include"tools/connect-eval01.php";

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
 // document.getElementById("textworkload").innerHTML = w;
  break;
case  'multiplier':
		switch(text)
			{
				case "1":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีรายงานผลการจัดการเรียนการสอน (มคอ.5) ";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มี มคอ.3 และ มคอ. 4 (ถ้ามี) และส่งผลการเรียนภายในระยะเวลาที่คณะกำหนด";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีรายงานรายวิชา (มคอ. 5) หรือรายงานรายวิชาภาคสนาม (มคอ.6) ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มี มคอ. 5 และ มคอ.6 (ถ้ามี) และมีการพัฒนาหรือปรับปรุงการจัดการเรียนการสอน กลยุทธ์การสอน หรือการประเมินผลการเรียนรู้ ";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 มีการจัดการเรียนการสอนที่พัฒนาจากงานวิจัย หรือ มีการจัดการความรู้เพื่อพัฒนาการเรียนการสอน หรือ มีการนำประสบการณ์จากการให้บริการวิชาการสู่สังคมหรือชุมชน มาพัฒนาการจัดการเรียนการสอน ";
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
  <p><strong>ลบ</strong><?php 
  
     	$query = "SELECT * FROM  `course`,`rm`  where rm.courseid=course.id and   rm.id=$id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
	
  ?></p>
  <p>1. ภาระงานด้านการสอน<br />
    1.11) การรายงานผลการจัดการเรียนการสอน </p>
  <form action="action/del-rm.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF"><input name="id" type="hidden" value="<? echo $id ?>" />
        รายวิชา</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?
	$query = "SELECT * FROM `course2` where  id=".$row0['course'.'id'] ;
	$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
echo $row['code']." : ".$row['enname']." ".$row['tcredit'];
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ตัวคูณ</td>
      <td align="left" valign="top" bgcolor="#FFDDFF">
<?
     echo $row0['multiplier'];
?>
</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textmultiplier"></div></td>
    </tr>
  </table>
  
    <p class="style1">
      <input name="filename" type="hidden" value="<? echo $row0['filename'];?>" />
    </p>
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
