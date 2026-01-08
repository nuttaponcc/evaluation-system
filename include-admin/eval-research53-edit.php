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
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 เอกสารประกอบการสอน";
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
  <p><strong>แก้ไข</strong>
    <?php 
     	$query = "SELECT * FROM `research53`  where  `research53`.id=$id  and  userid=$userid ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
  ?>
  </p>
  <p>2. ภาระงานด้านวิจัย<br />
    2.4) ผลงานวิชาการ<br />
  2.4.3) ตำราหรือหนังสือ</p>
  <form action="action-admin/edit-research53.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="name" type="text" id="name" value="<? echo $row0['name']; ?>" /></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
        <?
for ($n=5;$n<=5;$n++)
{
     if($n==$row0['multiplier'])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
      </select></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">ตัวคูณ=5 หนังสือหรือตำราที่จัดพิมพ์โดยสำนักพิมพ์ที่ได้รับการยอมรับ </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">อัตราส่วนในการมีส่วนร่วมทำ</td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="percent" type="text" id="percent" value="<? echo $row0['percent'] ?>" size="10" />
        %</td>
      <td align="left" valign="top" bgcolor="#E9FAA3">เติมตัวเลขทศนิยม ไม่เกิน 2 ตำแหน่งเช่น 33.33 (เติมตัวเลขและจุดอย่างเดียว) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input type="file" name="file" />
          <? echo "<a href=\"files/".$row0['filename']."\" >".$row0['filename']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3"> - หนังสือให้เป็นไปตามประกาศ ก.พ.อ. เรื่อง หลักเกณฑ์และวิธีการพิจารณาแต่งตั้งบุคคลให้ดำรงตำแหน่งผศ. รศ.และ ศ. ( ฉบับ  ปีปัจจุบัน )<br />
        **
        นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#E9FAA3">หลักฐาน (อื่นๆ) </td>
      <td align="left" valign="top" bgcolor="#E9FAA3"><input name="file4" type="file" id="file4" />
          <? echo "<a href=\"files/".$row0['filename4']."\" >".$row0['filename4']."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#E9FAA3">- ตำราให้เป็นไปตามประกาศ ก.พ.อ. เรื่อง หลักเกณฑ์และวิธีการพิจารณาแต่งตั้งบุคคลให้ดำรงตำแหน่งผศ. รศ.และ ศ. ( ฉบับ  ปีปัจจุบัน )<br />
        **นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
