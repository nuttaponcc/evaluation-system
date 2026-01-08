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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 (กรณี 2.1) มีผลงานวิจัยตีพิมพ์เผยแพร่ในวารสารที่มีชื่อปรากฏอยู่ในฐานข้อมูล ISI หรือ (กรณี 2.2) มีผลงานวิจัยเผยแพร่ไปยังกลุ่มเป้าหมายหรือผู้เกี่ยวข้องและมีการนำไปใช้ประโยชน์ในเชิงสาธารณะ หรือในเชิงพาณิชย์ หรือในเชิงนโยบาย โดยมีการรับรองการใช้ประโยชน์จริงจากหน่วยงานหรือชุมชน";
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

<div align="left"><p><strong>แก้ไข</strong>
    <?php 
     	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=workload.id and `service6`.id=$id  and  userid=$userid ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_row($result);
  ?>
</p>
  <p>3. ภาระงานด้านการบริการวิชาการ <br />
  3.4)    งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ</p>
  <form action="action-admin/del-service6.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="0" cellpadding="5" bgcolor="#FFFFFF">
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="id" type="hidden" value="<? echo $id ?>" />
          ชื่อโครงการ</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><? echo $row0['12']; ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">การมีส่วนร่วมกับโครงการ </td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><?
	$query = "SELECT * FROM `workload` where category=24 and id=".$row0[13];
	$result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    echo  $row['detail'].":".$row['name'];
		  ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">ตัวคูณ<span class="style1">*</span></td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><? echo $row0[7]; ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">หลักฐาน</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><? echo "<a href=\"files/".$row0[4]."\" >".$row0[9]."</a> " ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
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
