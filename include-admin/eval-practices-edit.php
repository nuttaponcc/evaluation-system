<?
include"tools/connect-eval.php";
 $userid=$_GET['userid'];
 	    $Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=". $userid;
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);
				echo  "<table bgcolor=ff0000  cellpadding=10 cellspacing=5><tr><td  bgcolor=ff5555 >คุณกำลังเข้าถึงข้อมูลของ  : ".$Mrow ['staffposition']." ".$Mrow ['staffname']."<br>";
				echo "สังกัด :  ".$Mrow ['staffmajor']."<br>โปรดระมัดระวังการแก้ไขข้อมูล </td></tr></table><br>";	
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
  <p><strong> แก้ไข </strong></p>
  <?php 
  
     	$query = "SELECT * FROM `workload`,`course`,`practices`  where practices.courseid=course.id and practices.workload=workload.id and practices.id=$id and  userid=$userid ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
	
  ?>
  <p>1. ภาระงานด้านการสอน<br />
    1.2) การสอนภาคปฏิบัติ</p>
  <form action="action-admin/edit-practices.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF"><input name="id" type="hidden" value="<? echo $id ?>" />
        รายวิชา </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?
	  

	$query = "SELECT * FROM `course` where p>0 ORDER BY `course`.`code` ASC ";

	$result = mysql_query($query);
	       echo "<select name=\"course\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0['courseid'])       echo "<option selected=\"selected\" value=\"".$row['id']. "\" >".$row['id'].")".$row['code']." : ".$row['enname']." ".$row['tcredit']." [".$row['term']."/".$row['ayear']."][กลุ่ม".$row['detail']."]</option>"; else  echo "<option value=\"".$row['id']. "\">".$row['id'].")".$row['code']." : ".$row['enname']." ".$row['tcredit']."  [".$row['term']."/".$row['ayear']."][กลุ่ม".$row['detail']."]</option>";
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
	$query = "SELECT * FROM `workload` where category=2 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0['workload'])      echo "<option selected=\"selected\" value=\"".$row['id']. "\" >".$row['detail'].":".$row['name']." </option>"; else  echo "<option value=\"".$row['id']. "\">".$row['detail'].":".$row['name']." </option>";;
	   
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textworkload"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">จำนวนสัปดาห์ </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><!-- select name="week" id="week" onchange="javascript:changediv(this.value,this.name);">
<?
//for ($n=1;$n<=20;$n++)
//{
   //  if($n==$row0['week'])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
//}
?>
         </select -->
          <input name="week" type="text" id="week"  value="<? echo  $row0['week'] ?>" size="10" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><font color="#ff0000">*นับจำนวนสัปดาห์ที่สอนจริง (ทศนิยม 2 ตำแหน่ง) </font></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ตัวคูณ</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <?
for ($n=3;$n<=5;$n++)
{
     if($n==$row0['multiplier'])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><span class="style2">ตัวคูณ=3 มีรายละเอียดของรายวิชา (มคอ.3) และ รายละเอียดของประสบการณ์ (ถ้ามี) (มคอ.4) <br />
ตัวคูณ=4 มี มคอ.3 และ มคอ.4 (ถ้ามี) และส่งผลการ เรียนภายในระยะเวลาที่คณะกำหนด <br />
ตัวคูณ=5 มีการจัดการเรียนการสอนที่พัฒนาจาก งานวิจัย หรือมีการจัดการความรู้เพื่อพัฒนาการเรียน การสอน หรือมีการนำประสบการณ์จากการให้บริการ วิชาการสู่สังคมหรือชุมชนมาพัฒนาการจัดการเรียน   การสอน </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (มคอ.3)</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" />
          <? echo "<a href=\"files/".$row0['filename']."\" >".$row0['filename']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (มคอ.4)</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="file2" type="file" id="file2" />
          <? echo "<a href=\"files/".$row0['filename2']."\" >".$row0['filename2']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (ใบรายงานผลการเรียน) </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="file3" type="file" id="file3" />
          <? echo "<a href=\"files/".$row0['filename3']."\" >".$row0['filename3']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (การจัดการเรียนการสอนที่พัฒนาจากงานวิจัย หรือ   มีการจัดการความรู้เพื่อพัฒนาการเรียนการสอน หรือ   มีการนำประสบการณ์จากการให้บริการวิชาการสู่สังคมหรือชุมชน   มาพัฒนาการจัดการเรียนการสอน ) </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="file4" type="file" id="file4" />
          <? echo "<a href=\"files/".$row0['filename4']."\" >".$row0['filename4']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <!--tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ระดับค่าเป้าหมาย</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="goal" id="goal" onchange="javascript:changediv(this.value,this.name);">
          <option>เลือก</option>
          <option value="1" selected="selected">1</option>
          <option  value="2">2</option>
          <option  value="3">3</option>
          <option>4</option>
          <option>5</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textgoal"></div></td>
    </tr-->
  </table>
    <br />
    <input type="submit" name="Submit" value="บันทึก" />
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
