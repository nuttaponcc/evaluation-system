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
  <p><strong>แก้ไข</strong><?php 
  
     	$query = "SELECT * FROM `course`,`rm`  where rm.courseid=course.id and  rm.id=$id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";	
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
	
  ?></p>
  <p>1. ภาระงานด้านการสอน<br />
    1.1) การสอนภาคบรรยาย</p>
  <form action="action/edit-rm.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF"><input name="id" type="hidden" value="<? echo $id ?>" />
        รายวิชา <span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?  
switch($_SESSION[session_user_major])
{	
case  1:
	$cond="  and  code  LIKE '0201%'     or  code  LIKE '0203302'     ";
     break;
case  2:
	$cond="and  code  LIKE '0203%'";
     break;
case  3:
	$cond="and  code  LIKE '0204%'";
     break;
case  4:
	$cond="and  code  LIKE '__02%'   or  code  LIKE '0203558'  ";
     break;
case  22:
	$cond="and  code  LIKE '0203%'";
     break;
default:
	$cond="";  
}

	$query = "SELECT * FROM `course2` where t>=0 $cond   or  code  LIKE '0299%'  ";
	$result = mysql_query($query);
	       echo "<select name=\"course\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0['course'.'id'])       echo "<option selected=\"selected\" value=\"".$row['id']. "\" >".$row['code']." : ".$row['enname']." ".$row['tcredit']." </option>"; else  echo "<option value=\"".$row['id']. "\">".$row['code']." : ".$row['enname']." ".$row['tcredit']." </option>";

	    //echo "<option value=\"".$row['id']. "\">". $row['code']." : ".$row['enname']." ".$row['tcredit']."</option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">เลือกรายวิชาที่สอน ถ้าไม่มี กรุณาแจ้งมาที่ เกรียงไกร นามพุทธา(ผู้พัฒนาระบบ) 
        เบอร์โทรศัพท์ภายใน 1507 หรือ ในระบบ EOffice หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
<?
for ($n=1;$n<=1;$n++)
{
     if($n==$row0['multiplier'])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>  

      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textmultiplier">
        <script language="JavaScript" type="text/javascript">
				javascript:changediv('<? echo $row0['multiplier']?>','multiplier')
	</script></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" /> <? echo "<a href=\"files/".$row0['filename']."\" >".$row0['filename']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
  </table>
    <p class="style1">* ใช้ในการคำนวน     </p>
    <p>
      <input type="submit" name="Submit" value="บันทึก" />
    </p>
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
