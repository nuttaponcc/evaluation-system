<?
include"tools/connect-eval.php";

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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีรายละเอียดของรายวิชา (มคอ.3) และ รายละเอียดของประสบการณ์ (ถ้ามี) (มคอ.4) ";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มี มคอ.3 และ มคอ. 4 (ถ้ามี) และส่งผลการเรียนภายในระยะเวลาที่คณะกำหนด";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีรายละเอียดของรายงานรายวิชา (มคอ. 3)  และมีรายละเอียดของรายงานรายวิชาประสบการณ์  (ถ้ามี)(มคอ.4) ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มี มคอ. 3    และ  มคอ.4 (ถ้ามี) และส่งผลการเรียนภายในระยะเวลาที่คณะกำหนด ";
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
.style2 {color: #0000FF}
-->
</style>

<div align="left">
  <p><strong>เพิ่ม</strong></p>
  <p>1. ภาระงานด้านการสอน<br />
  1.3) ผู้ประสานงานรายวิชา (2 กลุ่มขึ้นไปในรายวิชาพื้นฐาน ) </p>
  <form action="action/add-coordinator.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF">รายวิชา  </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?
	  	  


	$query = "SELECT * FROM `course` where  1  or  code  LIKE '0299%'  or  code  LIKE '12%'  or  code  LIKE '0506%'  ORDER BY `course`.`code` ASC ";
//		$query = "SELECT * FROM `course`  where  user1 like '%".$_SESSION[session_user_id]."%'   ORDER BY `course`.`code` ASC ";

	$result = mysql_query($query);
	       echo "<select name=\"course\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">". $row['code']." : ".$row['enname']." ".$row['tcredit']." [".$row['term']."/".$row['ayear']."][กลุ่ม".$row['detail']."]</option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">เลือกรายวิชาที่สอน ถ้าไม่มี กรุณาแจ้งมาที่ เกรียงไกร นามพุทธา(ผู้พัฒนาระบบ) 
        เบอร์โทรศัพท์ภายใน 1507 หรือ ในระบบ EOffice หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th </a><br />
        ในกรณีชื่อวิชาไม่มีในระบบกรุณาแจ้งรายละเอียดของวิชานั้นๆให้ครบด้วยครับเช่น<br />
  <font color="#ff0000"">รหัสวิชา 0201309  ชื่อวิชา  Mathematical Packages   3 (2-2-5)  จำนวน 3 หน่วยกิต แบ่งเป็น ทฤษฎี 2 หน่วยกิต และปฏิบัติ 1 หน่วยกิต </font></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ภาระงาน44</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?
	$query = "SELECT * FROM `workload` where category=12 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">".$row['detail'].":".$row['name']."(".$row['score'].") </option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textworkload"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">จำนวนสัปดาห์ </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="week" id="week" onchange="javascript:changediv(this.value,this.name);">
          <option value="1" selected="selected">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textweek"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ตัวคูณ</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><span class="style2">ตัวคูณ=3 มีรายละเอียดของรายวิชา (มคอ.3) และ รายละเอียดของประสบการณ์ (ถ้ามี) (มคอ.4) <br />
ตัวคูณ=4 มี มคอ.3 และ มคอ.4 (ถ้ามี) และส่งผลการ เรียนภายในระยะเวลาที่คณะกำหนด <br />
ตัวคูณ=5 มีการจัดการเรียนการสอนที่พัฒนาจาก งานวิจัย หรือมีการจัดการความรู้เพื่อพัฒนาการเรียน การสอน หรือมีการนำประสบการณ์จากการให้บริการ วิชาการสู่สังคมหรือชุมชนมาพัฒนาการจัดการเรียน   การสอน </span></td>
    </tr>
 <?
if ($lock_att==1) echo "<!--";
?>
   <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">สามารถหาหลักฐานได้ที่ <a href="http://202.28.32.130/scitqf/">ระบบจัดเก็บ มคอ.</a></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (มคอ.3)</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (มคอ.4)</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="file2" type="file" id="file2" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (ใบรายงานผลการเรียน) </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="file3" type="file" id="file3" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (การจัดการเรียนการสอนที่พัฒนาจากงานวิจัย หรือ   มีการจัดการความรู้เพื่อพัฒนาการเรียนการสอน หรือ   มีการนำประสบการณ์จากการให้บริการวิชาการสู่สังคมหรือชุมชน   มาพัฒนาการจัดการเรียนการสอน ) </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="file4" type="file" id="file4" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
 <?
if ($lock_att==1) echo "-->";
?>

  </table>
    <input type="submit" name="Submit" value="Submit" />
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
