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
     	$query = "SELECT * FROM  `service3`  where  `service3`.id=$id  and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
		$result = mysql_query($query);
		$row0 = mysql_fetch_array($result);
  ?>
</p>
  <p>3. ภาระงานด้านการบริการวิชาการ <br />
    3.4) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ  <br />
เช่น  สารคามพิทยาคม/อาจารย์ที่ปรึกษาวิทยานิพนธ์ให้กับมหาวิทยาลัยอื่น ๆ <br />
ทั้งภาครัฐและเอกชน </p>
  <form action="action/edit-service3.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table border="0" cellpadding="5" bgcolor="#FFFFFF">
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="id" type="hidden" value="<? echo $id ?>" />
          ชื่อโครงการ</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input name="name" type="text" id="name" value="<? echo $row0['name']; ?>" size="100" /></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">จำนวนชั่วโมงของแต่ละครั้ง </td>
        <td align="left" valign="top" bgcolor="#BBFFFF">
<select name="amount" id="amount" >
        <option value="1" <? if ($row0['amount']==1) echo 'selected="selected"' ?> >1</option>
        <option value="2" <? if ($row0['amount']==2) echo 'selected="selected"' ?> >2</option>
        <option value="3" <? if ($row0['amount']==3) echo 'selected="selected"' ?> >3</option>
</select>		

        ชั่วโมง</td>
        <td align="left" valign="top" bgcolor="#BBFFFF">แต่ละครั้งไม่เกิน 3 ชั่วโมงต่อสัปดาห์ </td>
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
<?
if ($lock_att==1) echo "<!--";
?>
      <tr>
        <td align="left" valign="top" bgcolor="#BBFFFF">หลักฐาน</td>
        <td align="left" valign="top" bgcolor="#BBFFFF"><input type="file" name="file" />
            <? echo "<a href=\"files/".$row0['filename']."\" >".$row0['filename']."</a> " ?></td>
        <td align="left" valign="top" bgcolor="#BBFFFF">นำหลักฐานทั้งหมดบีบอัดมาเป็นไฟล์เดียว ( ชนิด ZIP หรือ RAR ) </td>
      </tr>
<?
if ($lock_att==1) echo "-->";
?>
    </table>
    <p class="style1">* ใช้ในการคำนวน    </p>
    <p>
      <input type="submit" name="Submit" value="บันทีกขัอมูล" />
    </p>
  </form>

  <p>
  </p>
  <p>หากต้องการเพิ่มเติมแก้ไข กรุณาแจ้งมาที่เบอร์โทรศัพท์ภายใน 1507 หรือ ที่ email : <a href="mailto : kriengkrai.n@msu.ac.th">kriengkrai.n@msu.ac.th</a><br />
    SC2-201/1<br />
    เกรียงไกร นามพุทธา<br />
    ผู้พัฒนาระบบ</p>
</div>
