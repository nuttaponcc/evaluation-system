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
							  document.getElementById("textmultiplier").innerHTML = "ตัวคูณ=1 มีโครงการบริการวิชาการแก่สังคมและชุมชน หรือ มีการให้บริการวิชาการแก่หน่วยงานภายนอก";
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
     	$query = "SELECT * FROM  `service7`  where   `service7`.id=$id  and  userid=$userid ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
  ?>
</p>
  <p>3. ภาระงานด้านการบริการวิชาการ <br />
  3.6) งานบริการสอนโครงการ วมว /โครงการความร่วมมือกับโรงเรียนจุฬาภรณ์  /งานตามยุทธศาสตร์ของคณะ /มหาวิทยาลัย</p>
  <form action="action-admin/edit-service7.php?<? echo "userid=$userid" ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="0" cellpadding="5" bgcolor="#FFFFFF">
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="id" type="hidden" value="<? echo $id ?>" />
          ชื่อโครงการ</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="name" type="text" id="name" value="<? echo $row0['name']; ?>" size="100" /></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">จำนวนชั่วโมงของแต่ละครั้ง </td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="amount" type="text" id="amount" value="<? echo $row0['amount']; ?>" />
          ชั่วโมง</td>
        <td align="left" valign="top" bgcolor="#BBFFFF">กรุณากรอกเป็นตัวเลขเท่านั้น</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">จำนวนสัปดาห์</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><select name="multiplier" id="multiplier">
            <?
	  for($n=1;$n<=15;$n++)
	  {
	            if ($n==$row0['multiplier']) $sn=' selected="selected" '; else $sn='';
	           echo  '<option value="'.$n.'" '.$sn.'>'.$n.'</option> ';
		}
	  ?>
          </select>
          สัปดาห์</td>
        <td align="left" valign="top" bgcolor="#BBFFFF">ไม่เกิน 15 สัปดาห์ </td>
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
