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
-->
</style>

<div align="left">
  <p><strong>แก้ไข</strong>
    <?php 
     	$query = "SELECT * FROM `research2`  where  `research2`.id=$id  and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
  ?>
  </p>
  <p>2. ภาระงานด้านวิจัย<br />
    2.2) งานวิจัยเพื่อพัฒนาการเรียนการสอน</p>
  <form action="action/edit-research2.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" value="<? echo $row0['7']; ?>" size="100" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">การมีส่วนร่วมกับโครงการ <span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><?
	$query = "SELECT * FROM `workload` where category=26 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0['workload'])       echo "<option selected=\"selected\"  value=\"".$row['id']. "\">".$row['name']."(".$row['score'].")  </option>";  else  echo "<option value=\"".$row['id']. "\">".$row['name']."(".$row['score'].") </option>";
	   
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><div id="textworkload"></div></td>
    </tr>
    <!--tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">งบประมาณ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="budget" type="text" id="budget" value="<?  echo $row0['budget'];  ?>" />
        บาท</td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr-->
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <?
for ($n=1;$n<=5;$n++)
{
     if($n==$row0[2])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
      </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><div id="textmultiplier">
        <script language="JavaScript" type="text/javascript">
				javascript:changediv('<? echo $row0[2]?>','multiplier')
	  </script>
      </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (งานวิจัยที่ได้รับทุนวิจัยภายในคณะหรือภายในมหาวิทยาลัย) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" />
          <? echo "<a href=\"files/".$row0['filename']."\" >".$row0['filename']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (งานวิจัยตีพิมพ์เผยแพร่ใน Proceedings หรือตีพิมพ์ในวารสารภายในประเทศทั้งที่ปรากฏและไม่ปรากฎในฐานข้อมูล TCI) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file2" type="file" id="file2" />
          <? echo "<a href=\"files/".$row0['filename2']."\" >".$row0['filename2']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (งานวิจัยที่ได้รับทุนจากภายนอกมหาวิทยาลัย หรือ  มีงานวิจัยที่บูรณาการกระบวนการวิจัยกับการจัดการเรียนการสอนหรือการบริการวิชาการ หรือมีงานวิจัยเพื่อพัฒนาการเรียนการสอน) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file3" type="file" id="file3" />
          <? echo "<a href=\"files/".$row0['filename3']."\" >".$row0['filename3']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (ผลงานวิจัยตีพิมพ์เผยแพร่ในฐานข้อมูล Scopus หรือบทความวิชาการที่ได้รับเผยแพร่ระดับชาติหรือระดับนานาชาติ ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file4" type="file" id="file4" />
          <? echo "<a href=\"files/".$row0['filename4']."\" >".$row0['filename4']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (มีผลงานวิจัยเผยแพร่ไปยังกลุ่มเป้าหมายหรือผู้เกี่ยวข้องและมีการนำไปใช้ประโยชน์ในเชิงสาธารณะ หรือในเชิงพาณิชย์ หรือในเชิงนโยบาย โดยมีการรับรองการใช้ประโยชน์จริงจากหน่วยงานหรือชุมชน) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file5" type="file" id="file5" />
          <? echo "<a href=\"files/".$row0['filename5']."\" >".$row0['filename5']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (อื่นๆ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file6" type="file" id="file6" />
          <? echo "<a href=\"files/".$row0['filename6']."\" >".$row0['filename6']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
  </table>
    <p class="style1">* ใช้ในการคำนวน    </p>
    <p>
      <input type="submit" name="Submit" value="บันทึก" />
    </p>
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
