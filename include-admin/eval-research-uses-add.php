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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มีงานวิจัยตีพิมพ์เผยแพร่ใน Proceedings หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ  มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการวิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติหรือระดับนานาชาติ หรือ ผลงานวิจัยถูกนำไปใช้ประโยชน์โดยมีหนังสือรับรองจากผู้นำไปใช้ประโยชน์หรือหน่วยงานภายนอกหรือชุมชน";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5  มีผลงานวิจัยเผยแพร่ไปยังกลุ่มเป้าหมายหรือผู้เกี่ยวข้องและมีการนำไปใช้ประโยชน์ในเชิงสาธารณะ หรือในเชิงพาณิชย์ หรือในเชิงนโยบาย โดยมีการรับรองการใช้ประโยชน์จริงจากหน่วยงานหรือชุมชน";
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
.style2 {color: #0000FF}
-->
</style>

<div align="left">
  <p><strong>เพิ่ม</strong></p>
  <p>2. ภาระงานด้านวิจัย<br />
  2.3) งานวิจัยที่นำไปใช้ประโยชน์</p>
  <form action="action-admin/add-research-uses.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" size="100" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">การมีส่วนร่วมกับโครงการ <span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><?
	$query = "SELECT * FROM `workload` where category=26 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">".sprintf(" %.2f ",$row['score']).":".$row['name']." </option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><div id="textworkload"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <option value="3">3</option>
        <option value="5">5</option>
        </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><span class="style2"><strong>ตัวคูณ=3 มีผลงานวิจัยที่นำไปใช้ประโยชน์เชิงสาธารณะ/นโยบาย/พาณิชย์ (นับซ้ำได้ ไม่ซ้ำหน่วยงาน)
หน่วยงานที่นำไปใช้ประโยชน์ต้องเป็นหน่วยงานภายนอกมหาวิทยาลัยเท่านั้น
ไม่นับหลักฐานการนำไปใช้ประโยชน์จากเว็บไซด์<br />

ตัวคูณ=5 มีผลงานนวัตกรรมที่สามารถสร้างมูลค่าเพิ่มให้กับหน่วยงานได้
นวัตกรรม หมายถึง การนำแนวความคิดใหม่หรือการใช้ประโยชน์จากสิ่งที่มีอยู่แล้วใช้ในรูปแบบใหม่ เพื่อทำให้เกิดประโยชน์ในการพัฒนานิสิต ชุมชน สังคม และประเทศชาติ อาทิเช่น การทำนวัตกรรมผ่านการวิจัย และพัฒนางานวิจัยไปสู่นวัตกรรม นวัตกรรมไม่ได้จำกัดแค่สิ่งประดิษฐ์ทางเทคโนโลยี นวัตกรรมอาจเป็นความคิดหรือวิธีปฏิบัติใหม่ที่นำไปใช้ให้เกิดประโยชน์ได้ อาทิ การผสมผสานวิชาต่าง ๆ จนเกิดนวัตกรรมด้านหลักสูตร การคิดระบบ Voting ใหม่ก็ถือเป็นนวัตกรรมด้านนโยบาย</strong></span></td>
    </tr>    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (หนังสือขอบคุณและงานวิจัยตีพิมพ์หรือรูปเล่มรายงานการวิจัยฉบับสมบูรณ์) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"> นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (หนังสือรับรองการนำงานวิจัยไปใช้ประโยชน์และงานวิจัยตีพิมพ์หรือรูปเล่มรายงานการวิจัยฉบับสมบูรณ์ ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file2" type="file" id="file2" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"> นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
  </table>
    <p class="style1">* ใช้ในการคำนวน    </p>
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
