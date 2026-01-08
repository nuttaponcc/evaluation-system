<?
include"tools/connect-eval.php";
$other=$_GET['other'];
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
							  //document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1  มีระบบกลไกในการควบคุม กำกับ ประเมิน และพัฒนาหลักสูตร";
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มี มคอ. 3, 5 ครบทุกรายวิชาที่เปิดสอน";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มี มคอ. 7 ตามเวลาที่กำหนด";
				  break;
				case "5":
//							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF";
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง";
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
  <p>5. ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ<br />
  <?
	$query = "SELECT * FROM `workload` where category=$other ";
	$result = mysql_query($query);
   $row = mysql_fetch_assoc($result);

        echo  $row ['detail'];
?>		
  </p>
  <form action="action-admin/add-other.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">ชื่อภาระงาน</td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="name" type="text" id="name" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">Ex. กรรมการและเลขานุการหลักสูตรคณิตศาสตรศึกษา</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">ภาระงานอื่นๆ<span class="style1">*</span> </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><?
	$query = "SELECT * FROM `workload` where category=$other ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
	    echo "<option value=\"".$row['id']. "\">".$row['name']." (".$row['score'].")</option>";
	}	
	      echo "</select> ";
	  ?></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
          <?
		  if($other==17)$loop=5; else $loop=1;
for ($n=1;$n<=$loop;$n++)
{
     if($n==1)      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
        </select></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">
	  <?
	  if($other==17)
	  echo "
ตัวคูณ= 1   หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF<br />
ตัวคูณ= 2  มี มคอ. 3, 5 ครบทุกรายวิชาที่เปิดสอน<br />
ตัวคูณ= 3  มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ<br />
ตัวคูณ= 4  มี มคอ. 7 ตามเวลาที่กำหนด<br />
ตัวคูณ= 5  มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง หรือ กลุ่ม ISO<br />
	  "; else echo "ตัวคูณ =1";
	  ?>	  </td>
    </tr>
	<? if($other!=17) {?>  
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input type="file" name="file" /></td>  
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
	<?  }else{  ?>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน ( มีการพัฒนาและปรับปรุงหลักสูตรอย่างต่อเนื่อง  ) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input type="file" name="file" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน (มคอ.3) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="file2" type="file" id="file2" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน (มคอ.5) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="file3" type="file" id="file3" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน (มคอ.7) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="file4" type="file" id="file4" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน ( มีการประเมินหลักสูตรอย่างน้อยตามกรอบเวลาที่กำหนดในเกณฑ์มาตรฐานหลักสูตรฯ ) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="file5" type="file" id="file5" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน (หลักสูตรผ่านการประเมินตามกรอบมาตรฐาน TQF) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="file6" type="file" id="file6" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#F3F2F7">หลักฐาน ( ใบรับรอง ISO  17025 ) </td>
      <td align="left" valign="top" bgcolor="#F3F2F7"><input name="file7" type="file" id="file7" /></td>
      <td align="left" valign="top" bgcolor="#F3F2F7">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
    </tr>
	<? } ?>
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
