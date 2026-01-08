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
.style2 {color: #0000FF}
-->
</style>

<div align="left">
  <p><strong>แก้ไข</strong><?php 
     	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=workload.id and  `seminar`.id=$id  and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_row($result);
  ?>
  </p>
  <p>1. ภาระงานด้านการสอน<br />
    1.7) ที่ปรึกษาวิชาสัมมนา</p>
  <form action="action/edit-seminar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชื่อ-นามสกุลนิสิตและชื่อเรื่อง</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="name" type="text" id="name" value="<? echo $row0[14]; ?>" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ชื่อเรื่อง</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="sname" type="text" id="name2" value="<? echo $row0[15]; ?>" /></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">&nbsp;</td>
    </tr>
    <tr>
      <td width="150" align="left" valign="top" bgcolor="#FFDDFF">จำนวนสัปดาห์ <span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="week" id="week" onchange="javascript:changediv(this.value,this.name);">
        <?
for ($n=1;$n<=15;$n++)
{
     if($n==$row0[7])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textweek"></div>
        ในกรณีเป็นคณะกรรมการสอบที่ไม่ได้เป็นอาจารย์ผู้สอนจะไม่นำจำนวนสัปดาห์ไปคิดคำนวณ</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ภาระงาน44<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?
	$query = "SELECT * FROM `workload` where category=4 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0[8])       echo "<option selected=\"selected\" value=\"".$row['id']. "\" >".$row['detail'].":".$row['name']."(".$row['score'].")  </option>"; else  echo "<option value=\"".$row['id']. "\">".$row['detail'].":".$row['name']."(".$row['score'].")  </option>";;
	   
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textworkload"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <?
for ($n=1;$n<=5;$n++)
{
     if($n==$row0[9])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><span class="style2">ตัวคูณ=1 มีการจัดการให้คำปรึกษา/ควบคุม การฝึกงาน/ ปฏิบัติงานสหกิจ/ฝึกสอน/การทำโครงงาน/ปริญญา นิพนธ์ <br />
ตัวคูณ=2 มีแผนการจัดการให้ คำปรึกษา/ควบคุม การ ฝึกงาน/ปฏิบัติงาน    สหกิจ/ฝึกสอน/การทำโครงงาน/ ปริญญานิพนธ์ และมีการดำเนินการตามแผน <br />
ตัวคูณ=3 นิสิตในที่ปรึกษาผ่านตามเกณฑ์ที่กำหนด/ตาม หลักสูตร/โครงการ <br />
ตัวคูณ=4 ผลงานของนิสิตในที่ปรึกษาได้รับการนำเสนอผลงานในงานประชุมวิชาการระดับชาติหรือนานาชาติ (แบบปากเปล่า หรือแบบโปสเตอร์) <br />
ตัวคูณ=5 ผลงานของนิสิตในที่ปรึกษาได้รับรางวัลระดับชาติหรือนานาชาติ
</span></td>
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
<?
if ($lock_att==1) echo "<!--";
?>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" />
          <? echo "<a href=\"files/".$row0[11]."\" >".$row0[11]."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
 <?
if ($lock_att==1) echo "-->";
?>
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
