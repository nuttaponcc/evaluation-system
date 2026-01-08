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
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 เอกสารประกอบการสอนหรือบทความวิชาการที่ตีพิมพ์ในระดับชาติหรือนานาชาติ  ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 เอกสารคำสอน";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 หนังสือหรือตำราที่มีการตรวจอ่านโดยผู้ทรงคุณวุฒิ หรือ หนังสือที่จัดพิมพ์โดยสำนักพิมพ์ที่ได้รับการยอมรับ หรือ e-learning ในรายวิชาของคณะวิทยาศาสตร์";
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
  <p>2. ภาระงานด้านวิจัย<br />
    2.4) ผลงานวิชาการ    <br />
    2.4.2) เอกสารคำสอน </p>
  <form action="action/add-research52.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <option value="4">4</option>
        </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><div id="textmultiplier">
        <script language="JavaScript" type="text/javascript">
				javascript:changediv('3','multiplier')
	  </script>
      </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">อัตราส่วนในการมีส่วนร่วมทำ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="percent" type="text" id="percent" size="10" />
        %</td>
      <td align="left" valign="top" bgcolor="#E9FAA3">เติมตัวเลขทศนิยม ไม่เกิน 2 ตำแหน่งเช่น 33.33 (เติมตัวเลขและจุดอย่างเดียว) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- เอกสารผลงานให้เป็นไปตามประกาศ ก.พ.อ. เรื่อง หลักเกณฑ์และวิธีการพิจารณาแต่งตั้งบุคคลให้ดำรงตำแหน่ง ผศ. รศ.และ ศ. (ฉบับที่ 2) พ.ศ.2550 <br />
        **นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file4" type="file" id="file4" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- บทความวิชาการฉบับเต็ม <br />
        **นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
