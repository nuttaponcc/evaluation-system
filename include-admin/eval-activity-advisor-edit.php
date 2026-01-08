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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีการจัดการบริการให้คำปรึกษาทางวิชาการและแนะแนวทางการใช้ชีวิตที่ถูกต้องแก่นิสิต";
				  break;
				case "2":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=2 มีการจัดการบริการข้อมูลข่าวสารที่เป็นประโยชน์ต่อนิสิต";
				  break;
				case "3":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=3 มีการจัดกิจกรรมเพื่อพัฒนาประสบการณ์ทางวิชาการหรือปลูกฝังคุณธรรมจริยธรรมให้แก่นิสิต";
				  break;
				case "4":
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=4 มีการประเมินผล คุณภาพของการให้บริการให้คำปรึกษาการบริการข้อมูลและนำผลการประเมินมาปรับปรุงคุณภาพการให้บริการ";
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
  <p><strong>แก้ไข</strong>
    <?php 
     	$query = "SELECT * FROM `workload`,`activity-advisor`  where  `activity-advisor`.`workload`=workload.id and  `activity-advisor`.id=$id  and  userid=$userid ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_row($result);
  ?>
  </p>
  <p>1. ภาระงานด้านการสอน<br />
    1.9) อาจารย์ที่ปรึกษาด้านกิจกรรม</p>
  <form action="action-admin/edit-activity-advisor.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellpadding="5" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="id" type="hidden" value="<? echo $id ?>" />
        ชั้นปี/ชมรม </td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input name="name" type="text" id="name" value="<? echo $row0[14]; ?>" /></td>
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
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textweek"></div></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ภาระงาน44<span class="style1">*</span></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><?
	$query = "SELECT * FROM `workload` where category=11";
	$result = mysql_query($query);
	       echo "<select name=\"workload\" onchange=\"javascript:changediv(this.value,this.name);\">";
while ($row = mysql_fetch_assoc($result)) {
     if($row['id']==$row0[8])       echo "<option selected=\"selected\" value=\"".$row['id']. "\" >".$row['detail'].":".$row['name']." </option>"; else  echo "<option value=\"".$row['id']. "\">".$row['detail'].":".$row['name']." </option>";;
	   
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
      <td align="left" valign="top" bgcolor="#FFDDFF"><span class="style2">ตัวคูณ=1 มีการจัดการบริการให้คำปรึกษาทางวิชาการ และแนะแนวทางการใช้ชีวิตที่ถูกต้องแก่นิสิต <br />
ตัวคูณ=2 มีการจัดการบริการข้อมูลข่าวสารที่เป็น ประโยชน์ต่อนิสิต <br />
ตัวคูณ=3 มีการจัดกิจกรรมเพื่อพัฒนาประสบการณ์ทาง วิชาการหรือปลูกฝังคุณธรรมจริยธรรมให้แก่นิสิต <br />
ตัวคูณ=4 มีการประเมินผลคุณภาพของการให้บริการให้ คำปรึกษาการบริการข้อมูลและนำผลการประเมินมา ปรับปรุงคุณภาพการให้บริการ </span></td>
    </tr>
    <!--tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">ระดับค่าเป้าหมาย</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><select name="goal" id="goal" onchange="javascript:changediv(this.value,this.name);">
          <option>เลือก</option>
          <option value="1">1</option>
          <option  value="2">2</option>
          <option  value="3">3</option>
          <option>4</option>
          <option selected="selected">5</option>
      </select></td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><div id="textgoal"></div></td>
    </tr-->
    <tr>
      <td align="left" valign="top" bgcolor="#FFDDFF">หลักฐาน</td>
      <td align="left" valign="top" bgcolor="#FFDDFF"><input type="file" name="file" />
          <? echo "<a href=\"files/".$row0[11]."\" >".$row0[11]."</a> " ?></td>
      <td align="left" valign="top" bgcolor="#FFDDFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
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
