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

<div align="left"><p><strong>แก้ไข</strong>
    <?php 
     	$query = "SELECT * FROM `workload`,`culture`  where  `culture`.`weight`=workload.id and `culture`.id=$id  and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_row($result);
  ?>
</p>
  <p>4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</p>
  <form action="action/del-culture.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชื่อโครงการ</td>
      <td align="left" valign="top" bgcolor="#FFFF99"><? echo $row0['12']; ?></td>
      <td align="left" valign="top" bgcolor="#FFFF99">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">การมีส่วนร่วมกับโครงการ </td>
      <td align="left" valign="top" bgcolor="#FFFF99"><?
	$query = "SELECT * FROM `workload` where category=16 and id=".$row0[13];
	$result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    echo  $row['detail'].":".$row['name'];
		  ?></td>
      <td align="left" valign="top" bgcolor="#FFFF99">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">ตัวคูณ<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFFF99">
	  <? echo $row0[7]; ?></td>
      <td align="left" valign="top" bgcolor="#FFFF99">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFF99">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#FFFF99"><? echo "<a href=\"files/".$row0[4]."\" >".$row0[9]."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFFF99">&nbsp;</td>
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
