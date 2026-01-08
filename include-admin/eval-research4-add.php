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
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มีการยื่นขอสิทธิบัตรหรืออนุสิทธิบัตร หรือมีการติดตามแก้ไข ปรับปรุง เพื่อให้ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัติ";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร";
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
    2.4) ผลงานที่ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร</p>
  <form action="action-admin/add-research4.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <option value="2">2</option>
        <option value="5">5</option>
        </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><span class="style2">ตัวคูณ=2 มีการยื่นขอสิทธิบัตรหรืออนุสิทธิบัตร หรือมีการติดตามแก้ไข ปรับปรุง เพื่อให้ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร <br />
ตัวคูณ=5 ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (เอกสารที่แสดงขั้นตอนการยื่นขอสิทธิบัตรหรืออนุสิทธิบัตร) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (สิทธิบัตรหรืออนุสิทธิบัตร) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file2" type="file" id="file2" /></td>
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
