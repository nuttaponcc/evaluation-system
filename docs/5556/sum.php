<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>สรุปโครงการ วงรอบที่ 2 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2561  </title>
<style type="text/css">
<!--
body {
	background-color: #FFFFCC;
}
-->
</style></head>

<body>
<p align="center"><strong>สรุปโครงการ <br />
  ใช้ในการประเมิน วงรอบที่ 1 ระหว่างวันที่ 1 กันยายน 2561 - 28 กุมภาพันธ์ 2562  </strong></p>
<div align="center"></div>
<p align="center"><br />
</p>

<div align="center">สามารถเพิ่มโครงการได้ที่ <a href="http://202.28.32.130/sciproject/index.php?menu=proview" target="_blank">ระบบบันทึกโครงการ</a>
  <table border="0" cellpadding="0" cellspacing="10">
    <tr>
      <td valign="top"><table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
        <tr>
          <td bgcolor="#FF9999">&nbsp;&nbsp;&nbsp;เครื่องมือค้นหา</td>
        </tr>
        <tr>
          <td><form id="form1" name="form1" method="get" action="">
              <table border="0" cellspacing="2" cellpadding="0">
                <tr>
                  <td bgcolor="#FFBBBD">หน่วยงาน</td>
                  <td bgcolor="#FFBBBD"><?
     include "../../../sciproject/tools/connect3.php";

		         					$sql1="SELECT * FROM `agencies` ";
					$result1=mysql_query($sql1);
					$agencies=$_GET['agencies'];
					$subj=$_GET['subj'];
					$idcode=$_GET['idcode'];
					
					echo "<select name=\"agencies\">";				
					while($row1=mysql_fetch_array($result1))
					{
					        if($row1['agid']==$agencies)$tchk="selected=\"selected\"" ; else $tchk="" ;
							if($row1['agname']=="ไม่ระบุ") $str="ทั้งหมด"; else $str=$row1['agname'];
							echo "  <option  value=\"".$row1['agid']."\"   $tchk/> ".$str."</option>";						  
					       $agen[$row1['agid']]=$row1['agname'];
					}
		  ?></td>
                </tr>
<tr><td>รหัสโครงการ</td><td  align=\"left\"   ><input name="idcode" type="text" value="<? echo $idcode  ?>" /> </td></tr>				
                <tr>
                  <td bgcolor="#FFBBBD">หัวข้อโครงการ</td>
                  <td bgcolor="#FFBBBD"><input name="subj" type="text" id="subj" value="<? echo $subj ?>" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="ค้นหา" /></td>
                </tr>
              </table>
          </form></td>
        </tr>
      </table></td>
      <td valign="top"><table border="1" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td align="left"  valign="top" bgcolor="#66CCCC"><? 
	 
if($agencies>0)
{
      $str_agencies="and agenid=$agencies";
}else  $str_agencies="";

if($subj!="")
{
      $str_subj="and  prosubj like \"%$subj%\"";
}else  $str_subj="";

if($idcode!="")
{
      $str_idcode="and  idcode like \"%$idcode%\"";
}else  $str_idcode="";

 	 $sql=" SELECT * FROM `project`  where ((`startdate`< '2018-03-01' and `startdate` > '2017-08-31' ) or  (`enddate`< '2018-03-01' and `enddate` >  '2017-08-31' ) or  (`startdate`<  '2018-03-01'  and `enddate` > '2017-08-31' )) and `status`>0   $str_agencies  $str_subj   $str_idcode  ORDER BY `project`.`agenid` ASC";

	 $result=mysql_query($sql);	
	 $num=mysql_num_rows($result);
	 $str=" bgcolor=\"#88ccff\" "; 

	 echo "จำนวนโครงการที่แสดง $num โครงการ";
	 
	 echo "<font size=2 ><table border=\"0\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CCCCCC\">
  <tr>
    <td $str>หน่วยงาน</td>
    <td $str>รหัสโครงการ</td>
    <td $str>ชื่อโครงการ</td>
    <td $str>ประเภทโครงการ</td>
    <td $str>วันเริ่มโครงการ</td>
    <td $str>วันสิ้นสุดโครงการ</td>
    <td $str>หลักฐานโครงการ</td>
    <td $str>รูปภาพ</td>
    <td $str>รายงานฉบับสมบูรณ์</td>
    <td $str>สถานะ</td>
  </tr>";
  $i=1;
	 while($row = mysql_fetch_array($result))
	 {
	 
if($i<0) $str=" align=\"left\"  bgcolor=\"#fdfdfd\"";  else  $str=" align=\"left\"  bgcolor=\"#ffffff\""; 
$i=$i*-1;


if ( $row['status']>0 )$tstat="<font color=blue>". $statarr[$row['status']] ."</font>"; else $tstat="<font color=red>". $statarr[$row['status']] ."(จะไม่แสดง)</font>";

	 $sql1=" SELECT * FROM  `proattach`   where   category=0 and  proid=".$row['proid']  ;
	 $result1=mysql_query($sql1);	
	  $f1="";
	  $i=0;
	 while($row1=mysql_fetch_array($result1))
	 {
	 $i++;
        $f1=$f1." <fieldset>  <legend>  &#8226; หลักฐาน  $i </legend> <a   target=\"_blank\"  href=\"../../../sciproject/". $row1['attlocation']."/".$row1['attfile']."\" >".$row1['attfile']."</a></fieldset>";
	 }

	 $sql1=" SELECT * FROM  `proattach`   where   category=1 and  proid=".$row['proid']  ;
	 $result1=mysql_query($sql1);	
	  $f2="";
	 while($row1=mysql_fetch_array($result1))
	 {
        $f2=$f2." <a   target=\"_blank\"  href=\"../../../sciproject/". $row1['attlocation']."/".$row1['attfile']."\" ><img  border=2 src=\"../../../sciproject/". $row1['attlocation']."/".$row1['attfile']."\"  width=50 heigth=50 /></a>";
	 }
	 
	 $sql1=" SELECT * FROM  `proattach`   where   category=2 and  proid=".$row['proid']  ;
	 $result1=mysql_query($sql1);	
	  $f3="";
	 while($row1=mysql_fetch_array($result1))
	 {
        $f3=$f3." <a   target=\"_blank\"  href=\"../../../sciproject/". $row1['attlocation']."/".$row1['attfile']."\" >".$row1['attfile']."</a><br>";
	 }
	 

	     echo "<tr><td $str> ".  $agen[$row['agenid']] ." </td><td $str>". $row['idcode']  ."</td><td $str> ". $row['prosubj']  ."   </br><font color=\"#008800\"> ".  $row['prosuben'] ." </font></td><td $str> ".   $categoryarr[$row['procategory']] ." </td><td $str>". $row['startdate']  ."</td><td $str>". $row['enddate']  ."</td><td $str>  ".$f1 . "  </td><td align=center  $str>  ". $f2 ." </td><td $str>  ".$f3.  " </td><td $str>  ".$tstat  .  " </td></tr>";
		 


	 }
	       echo "</tabel></font>";

?>          </td>
        </tr>
      </table>
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
