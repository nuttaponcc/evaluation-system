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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีโครงการทำนุบำรุงศิลปะและวัตนธรรม";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มีการดำเนินงานตามวงจรคุณภาพ (PDCA) ";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีรายงานฉบับสมบูรณ์";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มีการบูรณาการงานทำนุบำรุงศิลปะและวัฒนธรรมกับการเรียนการสอนหรืองานวิจัย";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 มีการประเมินผลลัพธ์หรือผลกระทบต่อสังคมและชุมชน และ   ได้รับความขอบคุณจากกลุ่มเป้าหมายของโครงการโดยมีหนังสือราชการหรือหลักฐานจากหน่วยงานภายนอกหรือสังคมและชุมชน ";
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
  <p>4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</p>
  <form action="action-admin/add-culture.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#FFFF99"><input name="name" type="text" id="name" size="100" /></td>
      <td align="left" valign="top" bgcolor="#FFFF99"><p>ตัวอย่างโครงการทำนุบำรุงศิลปะและวัฒนธรรม</p>
        <p>-ประเพณีสงกรานต์ มหาวิทยาลัยมหาสารคาม<br />
          -ประเพณีสงกรานต์ คณะวิทยาศาสตร์<br />
          -ทำบุณตักบาตร  คณะวิทยาศาสตร์<br />
          -ปฐมนิเทศนิสิตปีที่ 1 มหาวิทยาลัยมหาสารคาม<br />
          -ปฐมนิเทศนิสิตปีที่ 1 คณะวิทยาศาสตร์<br />
          -ปฐมนิเทศนิสิตปีที่ 1 ภาควิชา<br />
          -ปฐมนิเทศนิสิตใหม่ บัณฑิตศึกษา คณะวิทยาศาสตร์<br />
          -โครงการ 1 คณะ 1 ศิลปวัฒนธรรม ถวายเทียนพรรษา ณ วัดป่าดอนหนาด<br />
          -พิธีบายศรีสู่ขวัญนิสิตใหม่ ประจำปีการศึกษา 2557<br />
          -โครงการพี่น้องร้องเพลง คณะวิทยาศาสตร์  ประจำปีการศึกษา 2557<br />
        </p></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">การมีส่วนร่วมกับโครงการ </td>
      <td align="left" valign="top" bgcolor="#FFFF99"><?
	$query = "SELECT * FROM `workload` where category=29 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">".$row['name']." (".$row['score'].")</option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFFF99"><div id="textworkload"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFFF99"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5" selected="selected">5</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFFF99"><strong>ตัวคูณ=1</strong> มีโครงการทำนุบำรุงศิลปะและวัฒนธรรม <br />
        <strong>ตัวคูณ=2</strong> มีการดำเนินงานตามวงจรคุณภาพ (PDCA) <br />
        <strong>ตัวคูณ=3</strong> มีรายงานฉบับสมบูรณ์ <br />
        <strong>ตัวคูณ=4</strong> มีการบูรณาการงานทำนุบำรุงศิลปะและวัฒนธรรมกับการเรียนการสอนหรืองานวิจัย <br />
        <strong>ตัวคูณ=5</strong> มีการประเมินผลลัพธ์หรือผลกระทบต่อสังคมและชุมชน และได้รับความขอบคุณจากกลุ่มเป้าหมายของโครงการโดยมีหนังสือราชการหรือหลักฐานจากหน่วยงานภายนอกหรือสังคมและชุมชน
<!--div id="textmultiplier">
          <script language="JavaScript" type="text/javascript">
				javascript:changediv('1','multiplier')
	  </script>
      </div--></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#FFFF99"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#FFFF99">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
