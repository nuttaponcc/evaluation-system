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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 (กรณี 2.1) มีผลงานวิจัยตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI หรือ (กรณี 2.2) มีผลงานวิจัยเผยแพร่ไปยังกลุ่มเป้าหมายหรือผู้เกี่ยวข้องและมีการนำไปใช้ประโยชน์ในเชิงสาธารณะ หรือในเชิงพาณิชย์ หรือในเชิงนโยบาย โดยมีการรับรองการใช้ประโยชน์จริงจากหน่วยงานหรือชุมชน";
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
  2.2) บทความวิชาการ/บทความวิจัย </p>
  <form action="action/add-research3.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ชื่อบทความ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" size="100" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">การมีส่วนร่วมกับโครงการ <span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><?
	$query = "SELECT * FROM `workload` where category=25 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">".sprintf(" %.2f ",$row['score']).":".$row['name']."(".$row['score'].")  </option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><div id="textworkload"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
	        <option value="1">1</option>
	        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><strong>ตัวคูณ=1 </strong>มีงานวิจัยตีพิมพ์เผยแพร่ในProceedings  ตามเกณฑ์ประกาศ ก.พ.อ. ที่ใช้ปัจจุบัน<br />
        <strong>ตัวคูณ=2 </strong>มีงานวิจัยตีพิมพ์เผยแพร่ใน  Proceedings ระดับชาติ  หรือตีพิมพ์ในวารสารวิชาการที่ปรากฏในฐานข้อมูล TCIกลุ่ม 2<br />
        <strong>ตัวคูณ=3 </strong> มีงานวิจัยตีพิมพ์เผยแพร่ในวารสารวิชาการที่ปรากฏในฐานข้อมูล TCIกลุ่ม 1   <br />
        <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล วิชาการระดับนานาชาติตามประกาศ  ก.พ.อ. หรือระเบียบคณะกรรมการการอุดมศึกษาว่าด้วยหลักเกณฑ์การพิจารณาวารสารทางวิชาการสำหรับเผยแพร่ผลงานทางวิชาการ  ปรากฏอยู่ในฐานข้อมูล Scopus หรือ อนุสิทธิบัตร<br />
        <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการระดับนานาชาติที่ตีพิมพ์เผยแพร่ในวารสารปรากฏอยู่ในฐานข้อมูล ISI หรือมีสิทธิบัตร</td>
    </tr>
 <?
if ($lock_att==1) echo "<!--";
?>
   <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (มีงานวิจัยตีพิมพ์เผยแพร่ในProceedings  ระดับชาติ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">-บทความวิจัยหรือบทความวิชาการฉบับเต็ม (full paper)  ที่ได้รับการตีพิมพ์แล้ว</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (มีงานวิจัยตีพิมพ์เผยแพร่ใน  Proceedings ระดับนานาชาติ  หรือตีพิมพ์ในวารสารวิชาการที่ปรากฏในฐานข้อมูล TCIกลุ่ม 2) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file2" type="file" id="file2" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">-บทความวิจัยหรือบทความวิชาการฉบับเต็ม (full paper)  ที่ได้รับการตีพิมพ์แล้ว <br />
        - เอกสารที่แสดงชื่อวารสาร/ฐานข้อมูล </td>
    </tr>
   
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (มีงานวิจัยตีพิมพ์เผยแพร่ในวารสารวิชาการที่ปรากฏในฐานข้อมูล TCIกลุ่ม 1  หรือมีอนุสิทธิบัตร .
        ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file3" type="file" id="file42" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- บทความวิจัยหรือบทความวิชาการฉบับเต็ม (full paper)  ที่ได้รับการตีพิมพ์แล้ว <br />
        - เอกสารที่แสดงชื่อวารสาร/ฐานข้อมูล </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล วิชาการระดับนานาชาติตามประกาศ  ก.พ.อ. หรือระเบียบคณะกรรมการการอุดมศึกษาว่าด้วยหลักเกณฑ์การพิจารณาวารสารทางวิชาการสำหรับเผยแพร่ผลงานทางวิชาการ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file4" type="file" id="file4" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- บทความวิจัยหรือบทความวิชาการฉบับเต็ม (full paper) ที่ได้รับการตีพิมพ์แล้ว <br />
        - หรือมี  DOI <br />
        - เอกสารที่แสดงชื่อวารสาร/ฐานข้อมูล </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน ( มีผลงานวิจัยหรือบทความวิชาการระดับนานาชาติที่ตีพิมพ์เผยแพร่ในวารสารปรากฏอยู่ในฐานข้อมูล ISI หรือมีสิทธิบัตร) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file5" type="file" id="file5" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- บทความวิจัยหรือบทความวิชาการฉบับเต็ม (full paper) ที่ได้รับการตีพิมพ์แล้ว <br />
- หรือมี  DOI <br />
- เอกสารที่แสดงชื่อวารสาร/ฐานข้อมูล </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (หลักฐานอื่นๆ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file6" type="file" id="file6" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
<?
if ($lock_att==1) echo "-->";
?>
  </table>
    <p class="style1">* ใช้ในการคำนวน    <br />
      โดยที่งานวิจัยตีพิมพ์เผยแพร่หรือผลงานทางวิชาการ ที่ได้รับการตีพิมพ์ 1 ผลงาน สามารถนำมาใช้ใน<br />
    การประเมินได้ 1 วงรอบ เป็นผลงานที่ไม่เกิน 2 ปีปฏิทิน (ตัวอย่าง 1 มกราคม - 31 ธันวาคม)</p>
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
