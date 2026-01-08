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
							  document.getElementById("textmultiplier").innerHTML = "";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มีการดำเนินงานตามวงจรคุณภาพ (PDCA) หรือ มีการสรุปผลการ ให้บริการวิชาการแก่หน่วยงานภายนอก";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีรายงานฉบับสมบูรณ์ของโครงการ";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มีการบูรณาการกับการวิจัยหรือการเรียนการสอน";
				  break;
				case "5":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=5 มีการประเมินผลลัพธ์หรือผลกระทบต่อสังคมและชุมชน และได้รับความขอบคุณจากกลุ่มเป้าหมายของโครงการโดยมีหนังสือราชการหรือหลักฐานจากหน่วยงานภายนอกหรือสังคมและชุมชน";
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
     	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=workload.id and `service6`.id=$id  and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_row($result);
  ?>
</p>
  <p>3. ภาระงานด้านการบริการวิชาการ <br />
  3.4)    งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ เป็นวิทยากร/ผู้ทรงคุณวุฒิอ่านผลงานวิชาการ เป็นกรรมการต่าง ๆ /ผู้ทรงคุณวุฒิอื่น ๆ อ่านผลงานอาจารย์ 3,4 / กรรมการตรวจประเมินประกันคุณภาพการศึกษา</p>
  <form action="action/edit-service6.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="0" cellpadding="5" bgcolor="#FFFFFF">
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="id" type="hidden" value="<? echo $id ?>" />
          ชื่อโครงการ</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="name" type="text" id="name" value="<? echo $row0['12']; ?>" size="80" /></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">--</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">การมีส่วนร่วมกับโครงการ </td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><?
	$query = "SELECT * FROM `workload` where category=24 ";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0[13])       echo "<option selected=\"selected\" value=\"".$row['id']. "\" >".$row['name']."(".$row['score'].")</option>"; else  echo "<option value=\"".$row['id']. "\">".$row['name']." (".$row['score'].")</option>";;
	   
	}	
	      echo "</select> ";
	  ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">ตัวคูณ<span class="style1">*</span></td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><select name="multiplier" id="multiplier" onchange="javascript:changediv(this.value,this.name);">
          <?
for ($n=1;$n<=1;$n++)
{
     if($n==$row0[7])      echo " <option value=\"$n\" selected=\"selected\">$n</option>"; else echo " <option value=\"$n\">$n</option>";
}
?>
        </select></td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><div id="textmultiplier">
          <script language="JavaScript" type="text/javascript">
				javascript:changediv('<? echo $row0[7]?>','multiplier')
	    </script>
        </div></td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">หลักฐาน</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input type="file" name="file" />
            <? echo "<a href=\"files/".$row0[4]."\" >".$row0[9]."</a> " ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
