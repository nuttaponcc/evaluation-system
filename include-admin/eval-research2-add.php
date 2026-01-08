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
    2.2)  งานวิจัยเพื่อพัฒนาการเรียนการสอน</p>
  <form action="action-admin/add-research2.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"></span><strong>ตัวคูณ=1</strong> มีงานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย <br />
          <strong>ตัวคูณ=2 มีงานวิจัยตีพิมพ์เผยแพร่ใน Proceedings ทั้งในหรือต่างประเทศ หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI หรือ งานวิจัยที่ตีพิมพ์เผยแพร่ระดับนานาชาติที่ไม่ปรากฏอยู่ในฐานข้อมูลตามประกาศของ สมศ., SCOPUS, ISI</strong> <br />
          <strong>ตัวคูณ=3 มีงานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการวิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน   หรืองานวิจัยตีพิมพ์เผยแพร่ระดับนานาชาติที่ปรากฏในฐานข้อมูลตามประกาศ สมศ.</strong><br />
          <strong>ตัวคูณ=4</strong> มีผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus  หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ <br />
          <strong>ตัวคูณ=5</strong> มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (งานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">-ประกาศ/สัญญารับทุน<br />
        นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (งานวิจัยตีพิมพ์เผยแพร่ใน Proceedings หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file2" type="file" id="file2" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">-บทความวิจัยฉบับเต็ม (full paper)  ที่ได้รับการตีพิมพ์แล้ว<br />
        นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (งานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ  มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการวิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน  หรือ งานวิจัยที่ตีพิมพ์
        เผยแพร่ระดับนานาชาติในฐานข้อมูลอื่น ที่มีปรากฏอยู่ใน
        ประกาศของ สมศ.
        ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file3" type="file" id="file3" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- ประกาศหรือสัญญารับทุนวิจัยจากภายนอก<br />
        - งานวิจัยในชั้นเรียน<br />
        - รายงานโครงการบริการวิชาการจากงานวิจัย<br />
        นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (ผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopusหรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติ
        (review paper) ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file4" type="file" id="file4" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- บทความวิจัยฉบับเต็ม (full paper) ที่ได้รับการตีพิมพ์แล้ว <br />
        - DOI <br />
        - เอกสารที่แสดงชื่อวารสาร/ฐานข้อมูล <br />
        นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (มีผลงานวิจัยหรือบทความวิชาการที่ตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file5" type="file" id="file5" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- บทความวิจัยฉบับเต็ม (full paper) ที่ได้รับการตีพิมพ์แล้ว <br />
        - DOI <br />
        - เอกสารที่แสดงชื่อวารสาร/ฐานข้อมูล <br />
        นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (หลักฐานตีพิมพ์นานาชาติที่ไม่อยู่ในประกาศ สมศ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file6" type="file" id="file6" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
