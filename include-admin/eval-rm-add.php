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
  <p><strong>เพิ่ม</strong></p>
  <p>1. ภาระงานด้านการสอน<br />
    1.11) การรายงานผลการจัดการเรียนการสอน </p>
  <form action="action-admin/add-rm.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF">รายวิชา * </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?

	
	$query = "SELECT * FROM `course`  where t>=0  ";
	$result = mysql_query($query);
	       echo "<select name=\"course\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">". $row['code']." : ".$row['enname']." ".$row['tcredit']."</option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">เลือกรายวิชาที่สอน ถ้าไม่มี กรุณาแจ้งมาที่ เกรียงไกร นามพุทธา(ผู้พัฒนาระบบ) 
        เบอร์โทรศัพท์ภายใน 1507 หรือ ในระบบ EOffice หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
          <option value="1">1</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textmultiplier">
	<script language="JavaScript" type="text/javascript">
				javascript:changediv('1','multiplier')
	</script>
	  </div></td>
    </tr>
<!--
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ระดับค่าเป้าหมาย<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="goal" id="goal" onchange="javascript:changediv(this.value,this.name);">
          <option>เลือก</option>
          <option value="1" selected="selected">1</option>
          <option  value="2">2</option>
          <option  value="3">3</option>
          <option>4</option>
          <option>5</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textgoal"></div></td>
    </tr>
	-->
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน (มคอ.5)</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
  </table>
    <p class="style1">* ใช้ในการคำนวน     </p>
    <p>
      <input type="submit" name="Submit" value="Submit" />
    </p>
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
