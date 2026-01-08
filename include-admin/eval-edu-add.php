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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีการจัดการให้คำปรึกษา/ควบคุม การฝึกงาน/ปฏิบัติงาน  สหกิจ/ฝึกสอน/การทำโครงงาน/ปริญญานิพนธ์";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มีแผนการจัดการให้ คำปรึกษา/ควบคุม การฝึกงาน/ปฏิบัติงานสหกิจ/ฝึกสอน/ การทำโครงงาน/ปริญญานิพนธ์  และมีการดำเนินการตามแผน";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 นิสิตในที่ปรึกษาผ่านตามเกณฑ์ที่กำหนด/ตามหลักสูตร/โครงการ  ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 ผลงานของนิสิตในที่ปรึกษาได้รับการเผยแพร่รูปแบบใดรูปแบบหนึ่ง ";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 ผลงานของนิสิตในที่ปรึกษาได้รับรางวัลยกย่องเชิดชูเกียรติ ";
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
    1.12) รายวิชาศึกษาทั่วไป </p>
  <form action="action-admin/add-edu.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF">รหัสวิชา</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="name" type="text" id="name" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ชื่อวิชา</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="sname" type="text" id="sname" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
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
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
