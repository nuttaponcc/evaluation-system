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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5  มีผลงานวิจัยตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI ";
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
  <p><strong>แก้ไข</strong>
    <?php 
     	$query = "SELECT * FROM `research1`  where  `research1`.id=$id  and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
  ?>
  </p>
  <p>2. ภาระงานด้านวิจัย<br />
    2.1)  ทุนวิจัย</p>
  </p>
  <form action="action/edit-research1.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" value="<? echo $row0['name']; ?>" size="100" /></td>
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
  
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <?
     if($row0[2]==0)         echo " <option value=\"0\" selected=\"selected\">0</option>"; else echo " <option value=\"0\">0</option>";
     if($row0[2]==1)      	   echo " <option value=\"1\" selected=\"selected\">1</option>"; else echo " <option value=\"1\">1</option>";
     if($row0[2]==2)         echo " <option value=\"2\" selected=\"selected\">2</option>"; else echo " <option value=\"2\">2</option>";
     if($row0[2]==3)         echo " <option value=\"3\" selected=\"selected\">3</option>"; else echo " <option value=\"3\">3</option>";
     if($row0[2]==4)         echo " <option value=\"4\" selected=\"selected\">4</option>"; else echo " <option value=\"4\">4</option>";
     if($row0[2]==5)         echo " <option value=\"5\" selected=\"selected\">5</option>"; else echo " <option value=\"5\">5</option>";

?>
      </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><p class="style2"><strong>จำนวนงบประมาณสนับสนุนโครงการวิจัย</strong><br />
          <strong>ทุนภายนอก หรือ ทุนภายใน  </strong><br />
ตัวคูณ=5 ตั้งแต่ 300,000 ขึ้นไป<br />
ตัวคูณ=4 ตั้งแต่ 200,000 บาท-299,999 บาท<br />
ตัวคูณ=3 ตั้งแต่ 100,000 บาท-199,999 บาท<br />
ตัวคูณ=2 ตั้งแต่ 60,000 บาท-99,999 บาท<br />
ตัวคูณ=1  ตั้งแต่ 1 บาท-59,999 บาท<br />
ตัวคูณ=0 ไม่มีเงินทุน <br />

<!--strong>ทุนภายใน</strong><br />
ตัวคูณ=2.5 ตั้งแต่ 150,000 ขึ้นไป<br />
ตัวคูณ=2 ตั้งแต่ 100,000 บาท-149,999 บาท<br />
ตัวคูณ=1.5 ตั้งแต่ 60,000 &ndash;  99,999 บาท<br />
ตัวคูณ=1 ตั้งแต่ 30,000 &ndash;  59,999 บาท<br />
ตัวคูณ=0.5 ตั้งแต่ 1-  29,999 บาท<br />
ตัวคูณ=0 ไม่มีเงินทุน<br /--></p></td>
    </tr>
<?
if ($lock_att==1) echo "<!--";
?>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3"><strong>หลักฐาน   </strong><br />
-ประกาศทุน หรือ สัญญารับทุน </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" />
        <? echo "<a href=\"files/".$row0['filename']."\" >".$row0['filename']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
	<?
if ($lock_att==1) echo "-->";
?>

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
