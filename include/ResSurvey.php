<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>แบบประเมินความพึงพอใจระบบประเมินภาระงานบุคลากร(สายวิชาการ) </title>
</head>

<body>
<script language="JavaScript" type="text/javascript">

function ChkSurverData()
{
//alert();
	var rdosex = document.form1.rdosex;
	var rdotype = document.form1.rdotype;
	var rdodepartment = document.form1.rdodepartment;
	var optform = document.form1.optform;

	if((!rdosex[0].checked) && (!rdosex[1].checked))
	{
		alert("กรุณาระบุเพศ");
		return false;
	}
	if(   (!rdotype[0].checked) && (!rdotype[1].checked)&& (!rdotype[2].checked) )
	{
		alert("กรุณาระบุ วุฒิการศึกษาสูงสุด");
		return false;		
	}


	if((!rdodepartment[1].checked)&&(!rdodepartment[2].checked)&&(!rdodepartment[3].checked)&&(!rdodepartment[4].checked)&&(!rdodepartment[5].checked)&&(!rdodepartment[0].checked))
	{
		alert("กรุณาระบุหน่วยงาน");
		return false;
	}


	var num=0;
	for(var i = 1; i <= 3; i++)
	{
		var element_name = "optform"+i;
		var optforms = document.getElementsByName(element_name);		
		
		var choose_choice = 0;	

		for(var j = 0; j < optforms.length; j++)
		{
			if(optforms[j].checked == true)
			{
				choose_choice = 1;
				break;
			}
		}

		if(choose_choice==1)
			{
		        num=num+1;
			}
	}

		if(num < 3)
		{
			alert("กรุณาตอบคำถามตอนที่ 2 รูปแบบค่าถ่วงน้ำหนักให้ครับทุกข้อ"+num+"-"  );	
			return false;
		}		
		
	
	var num=0;
	for(var i = 1; i <= 10; i++)
	{
		var element_name = "optcriteria1"+i;
		var optcriterias = document.getElementsByName(element_name);		
		
		var choose_choice = 0;	

		for(var j = 0; j < optcriterias.length; j++)
		{
			if(optcriterias[j].checked == true)
			{
				choose_choice = 1;
				break;
			}
		}
		if(choose_choice==1)
			{
		        num++;
			}
	}
		if(num < 10)
		{
			alert("กรุณาตอบคำถามตอนที่ 3 ภาระงานด้านการสอนให้ครับทุกข้อ" );	
			return false;
		}		
		
	var num=0;
	for(var i = 1; i <= 4; i++)
	{
		var element_name = "optcriteria2"+i;
		var optcriterias = document.getElementsByName(element_name);		
		
		var choose_choice = 0;	

		for(var j = 0; j < optcriterias.length; j++)
		{
			if(optcriterias[j].checked == true)
			{
				choose_choice = 1;
				break;
			}
		}
		if(choose_choice==1)
			{
		        num++;
			}
	}
	for(var i = 1; i <= 4; i++)
	{
		var element_name = "optcriteria25"+i;
		var optcriterias = document.getElementsByName(element_name);		
		
		var choose_choice = 0;	

		for(var j = 0; j < optcriterias.length; j++)
		{
			if(optcriterias[j].checked == true)
			{
				choose_choice = 1;
				break;
			}
		}
		if(choose_choice==1)
			{
		        num++;
			}
	}
	
			if(num < 8)
		{
			alert("กรุณาตอบคำถามตอนที่ 3 ภาระงานด้านวิจัยให้ครับทุกข้อ" );	
			return false;
		}		
		
	var num=0;
	for(var i = 1; i <= 5; i++)
	{
		var element_name = "optcriteria3"+i;
		var optcriterias = document.getElementsByName(element_name);		
		
		var choose_choice = 0;	

		for(var j = 0; j < optcriterias.length; j++)
		{
			if(optcriterias[j].checked == true)
			{
				choose_choice = 1;
				break;
			}
		}
		if(choose_choice==1)
			{
		        num++;
			}
	}
		if(num < 5)
		{
			alert("กรุณาตอบคำถามตอนที่ 3 ภาระงานด้านบริการวิชาการให้ครับทุกข้อ" );	
			return false;
		}		
	var optcriteria4 = document.form1.optcriteria4;	
	if((!optcriteria4[1].checked)&&(!optcriteria4[2].checked)&&(!optcriteria4[3].checked)&&(!optcriteria4[4].checked)&&(!optcriteria4[0].checked))
	{	
		alert("กรุณาตอบคำถามตอนที่ 3 ภาระงานด้านภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม" );	
		return false;
	}

     var num=0;
	for(var i = 1; i <= 5; i++)
	{
		var element_name = "optcriteria5"+i;
		var optcriterias = document.getElementsByName(element_name);		
		
		var choose_choice = 0;	

		for(var j = 0; j < optcriterias.length; j++)
		{
			if(optcriterias[j].checked == true)
			{	
				choose_choice = 1;
				break;
			}
		}
		if(choose_choice==1)
			{
		        num++;
			}
	}
		if(num < 5)
		{
			alert("กรุณาตอบคำถามตอนที่ 3 ภาระงานด้านบริหารและอื่นๆให้ครับทุกข้อ" );	
			return false;
		}		
	
var num=0;
	for(var i = 1; i <= 22; i++)
	{
	
		var element_name = "optproblem"+i;
		var optproblems = document.getElementsByName(element_name);		

		var choose_choice = 0;	
		
		for(var j = 0; j < optproblems.length; j++)
		{
					if(optproblems[j].checked == true)
			{
				choose_choice = 1;
				break;
			}
		}
			if(choose_choice==1)
			{
		        num++;
			}
		}
		if(num < 21)
		{
			alert("กรุณาตอบคำถามตอนที่ 4 ความพึงพอใจในการใช้โปรแกรมการกรอกแบบประเมินฯ ให้ครับทุกข้อ" );	
			return false;
		}		

	
	//return false;
}
</script>

<div align="center">
  <table border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFF99">
    <tbody>
      <tr>
        <td height="83" bgcolor="#FFCC00"><br />
<div align="center">	<font color=ff0000 size=5 > <strong>แบบประเมินความพึงพอใจ</strong> </font> <br />
                <h3>แบบประเมินความพึงพอใจระบบประเมินภาระงานบุคลากร(สายวิชาการ) <br />
                  คณะวิทยาศาสตร์ มหาวิทยาลัยมหาสารคาม<br /><br />

<?
    $cond=" p23=0 ";
	$sql="select * from survey where $cond  ";
	$res=mysql_query($sql);
	$total=mysql_num_rows($res);
	echo "<font color=blue> ผู้ตอบแบบประเมินความพึงพอใจจำนวน $total คน</font>";
?>				  
                  <br />

                </h3>
        </div></td>
      </tr>
      <tr>
        <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td><table border="0" cellpadding="5" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#E2E2E2"><div align="left">
                            <h3><u>ตอนที่ 1</u> ข้อมูลทั่วไปของผู้ใช้บริการ</h3>
                            (โปรดทำเครื่องหมาย
                            <input value="3" checked="checked" name="$fn" type="radio" />
                          หน้าคำตอบที่ตรงกับความเป็นจริง) </div></td>
                      </tr>
                      <tr>
                        <td width="100" align="left" valign="top"><strong>เพศ</strong></td>
                        <td width="674" align="left" valign="top">
                          ชาย 
<?
	$sql="select * from survey where $cond and sex = 1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>				  
คน						  
                        หญิง 
                          ชาย 
<?
	$sql="select * from survey where $cond and sex = 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>				  
คน						</td></tr>
                      <tr>
                        <td align="left" valign="top">วุฒิการศึกษาสูงสุด</td>
                        <td align="left" valign="top">
                          ปริญญาตรี
                            <?
	$sql="select * from survey where $cond and category= 1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font>";
?>
คน   
                            
                          ปริญญาโท
<?
	$sql="select * from survey where $cond and category= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน    
                          
                        ปริญญาเอก
<?
	$sql="select * from survey where $cond and category= 3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td></tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td><table border="0" cellpadding="5" cellspacing="0" width="100%">
                      <tr>
                        <td width="14%" align="left"><strong>หน่วยงาน</strong></td>
                        <td align="left"><input name="rdodepartment" value="0" type="radio" />
                        ภาควิชาคณิตศาสตร์
                          <?
	$sql="select * from survey where $cond and department= 0 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td>
                        <td align="left"><input name="rdodepartment" value="1" type="radio" />                        
                        ภาควิชาเคมี
                          <?
	$sql="select * from survey where $cond and department= 1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td>
                      </tr>
                      <tr>
                        <td align="left"></td>
                        <td align="left"><input name="rdodepartment" value="2" type="radio" />
                        ภาควิชาชีววิทยา
                          <?
	$sql="select * from survey where $cond and department= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td>
                        <td align="left"><input name="rdodepartment" value="3" type="radio" />
                        ภาควิชาฟิสิกส์ 
                          <?
	$sql="select * from survey where $cond and department= 3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td>
                      </tr>
                      <tr>
                        <td align="left"></td>
                        <td align="left"><input name="rdodepartment" value="4" type="radio" />
                        คณะผู้บริหาร
                          <?
	$sql="select * from survey where $cond and department= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td>
                        <td align="left"><input name="rdodepartment" value="5" type="radio" />
                        สำนักงานเลขานุการ 
                          <?
	$sql="select * from survey where $cond and department= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
คน </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td> </td>
                      </tr>
                  </table>
                  <table width="800" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#E7E3E7"><h3><u>ตอนที่ 2</u> ท่านคิดว่าคะแนนของถ่วงน้ำหนักแต่ละรูปแบบเหมาะสมมากน้อยเพียงใด </h3>
                        (โปรดทำเครื่องหมาย
                          <input value="3" checked="checked" name="f3" type="radio" />
หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                    </tr>
                    <tr>
                      <td><table border="1" cellspacing="0" cellpadding="0" width="887">
                          <tr>
                            <td colspan="6" valign="top">&nbsp;</td>
                            <td colspan="5" valign="top" bgcolor="#CECFCE"><div align="center"><strong>ระดับความ</strong>เหมาะสม</div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top" bgcolor="#CECFCE"><p align="center">รูปแบบที่</p></td>
                            <td width="66" valign="top" bgcolor="#CECFCE"><p align="center">การสอน </p></td>
                            <td width="63" valign="top" bgcolor="#CECFCE"><p align="center">งานวิจัย </p></td>
                            <td width="103" valign="top" bgcolor="#CECFCE"><p align="center">บริการวิชาการ </p></td>
                            <td width="85" valign="top" bgcolor="#CECFCE"><p align="center">ทำนุบำรุงฯ </p></td>
                            <td width="104" valign="top" bgcolor="#CECFCE"><p align="center">การช่วยงานบริหาร <br />
                            และอื่น    ๆ </p></td>
                            <td bgcolor="#cccccc"><div align="center"><strong>มากที่สุด</strong></div></td>
                            <td bgcolor="#cccccc"><div align="center"><strong>มาก</strong></div></td>
                            <td bgcolor="#cccccc"><div align="center"><strong>ปานกลาง</strong></div></td>
                            <td bgcolor="#cccccc"><div align="center"><strong>น้อย</strong></div></td>
                            <td bgcolor="#cccccc"><div align="center"><strong>น้อยที่สุด</strong></div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top" bgcolor="#FFCCCC"><p align="center">1 </p></td>
                            <td width="66" valign="top" bgcolor="#FFCCCC"><p align="center">45 </p></td>
                            <td width="63" valign="top" bgcolor="#FFCCCC"><p align="center">35 </p></td>
                            <td width="103" valign="top" bgcolor="#FFCCCC"><p align="center">10 </p></td>
                            <td width="85" valign="top" bgcolor="#FFCCCC"><p align="center">5 </p></td>
                            <td width="104" valign="top" bgcolor="#FFCCCC"><p align="center">5 </p></td>
<?
//	$sql="select * ";
?>							
                            <td bgcolor="#ffffff"><div align="center">
                              <?
	$fn="f1";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top" bgcolor="#FFCCCC"><p align="center">2</p></td>
                            <td width="66" valign="top" bgcolor="#FFCCCC"><p align="center">45 </p></td>
                            <td width="63" valign="top" bgcolor="#FFCCCC"><p align="center">30 </p></td>
                            <td width="103" valign="top" bgcolor="#FFCCCC"><p align="center">15 </p></td>
                            <td width="85" valign="top" bgcolor="#FFCCCC"><p align="center">5 </p></td>
                            <td width="104" valign="top" bgcolor="#FFCCCC"><p align="center">5 </p></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$fn="f2";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top" bgcolor="#FFCCCC"><p align="center">3</p></td>
                            <td width="66" valign="top" bgcolor="#FFCCCC"><p align="center">45 </p></td>
                            <td width="63" valign="top" bgcolor="#FFCCCC"><p align="center">30 </p></td>
                            <td width="103" valign="top" bgcolor="#FFCCCC"><p align="center">10 </p></td>
                            <td width="85" valign="top" bgcolor="#FFCCCC"><p align="center">5 </p></td>
                            <td width="104" valign="top" bgcolor="#FFCCCC"><p align="center">10 </p></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$fn="f3";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                            </div></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table>
                  <p>
                    <strong>ข้อเสนอแนะ(ตอนที่2)</strong><br />
                    <textarea name="txtform" cols="128" rows="5" id="txtform"></textarea>
                  </p>
                <p>&nbsp;</p></td>
              </tr>
              <tr>
                <td align="center"><table width="100%" border="0" cellpadding="4" cellspacing="0">
                    <tr>
                      <td colspan="2" align="left" bgcolor="#E2E2E2"><h3><u>ตอนที่ 3</u> ท่านความพึงพอใจต่อเกณฑ์การประเมิน ในแต่ละด้านเพียงใด</h3>
                        (โปรดทำเครื่องหมาย
                        <input value="3" checked="checked" name="f3" type="radio" />
                      หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                    </tr>
                    <tr>
                      <td><table bgcolor="#8595a3" border="1" cellpadding="3" cellspacing="1" width="99%">
                          <tbody>
                            <tr align="center" bgcolor="#cccccc">
                              <td rowspan="2" align="center"><div align="center"><strong>หัวข้อ</strong></div></td>
                              <td colspan="5" align="center"><div align="center"><strong>ระดับความพึงพอใจ</strong></div></td>
                            </tr>
                            <tr>
                              <td bgcolor="#cccccc"><div align="center"><strong>มากที่สุด</strong></div></td>
                              <td bgcolor="#cccccc"><div align="center"><strong>มาก</strong></div></td>
                              <td bgcolor="#cccccc"><div align="center"><strong>ปานกลาง</strong></div></td>
                              <td bgcolor="#cccccc"><div align="center"><strong>น้อย</strong></div></td>
                              <td bgcolor="#cccccc"><div align="center"><strong>น้อยที่สุด</strong></div></td>
                            </tr>
                            <tr bgcolor="#e0e4e8">
                              <td colspan="6"><strong>กระบวนการขั้นตอน/กระบวนการ</strong></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left" bgcolor="#FF9999"><strong>1. ภาระงานด้านการสอน</strong></td>
                              <td bgcolor="#FF9999">&nbsp;</td>
                              <td bgcolor="#FF9999">&nbsp;</td>
                              <td bgcolor="#FF9999">&nbsp;</td>
                              <td bgcolor="#FF9999">&nbsp;</td>
                              <td bgcolor="#FF9999">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.1  การสอนภาคบรรยาย</td>
                              <td><div align="center">
                                  <?
	$fn="c11";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.2  การสอนภาคปฏิบัติ</td>
                              <td><div align="center">
                                <?
	$fn="c12";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.3  ผู้ประสานงานรายวิชา</td>
                              <td><div align="center">
                                  <?
	$fn="c13";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.4  การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ </td>
                              <td><div align="center">
                                  <?
	$fn="c14";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.5  ที่ปรึกษาโครงการปริญญานิพนธ์ ระดับปริญญาตรี </td>
                              <td><div align="center">
                                  <?
	$fn="c15";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.6  ที่ปรึกษาวิทยานิพนธ์ ระดับปริญญาโทและเอก </td>
                              <td><div align="center">
                                  <?
	$fn="c16";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.7  ที่ปรึกษาวิชาสัมมนา</td>
                              <td><div align="center">
                                  <?
	$fn="c17";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.8  อาจารย์ที่ปรึกษาทางด้านวิชาการ </td>
                              <td><div align="center">
                                  <?
	$fn="c18";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.9  อาจารย์ที่ปรึกษาด้านกิจกรรม </td>
                              <td><div align="center">
                                  <?
	$fn="c19";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.10  กรรมการสอบ  Senior Project/วิทยานิพนธ์/คณะกรรมการสอบสัมมนา/กรรมการคุมสอบ</td>
                              <td><div align="center">
                                  <?
	$fn="c110";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <!-- tr bgcolor="#ffffff">
                              <td align="left">1.11 การรายงานผลการจัดการเรียนการสอน </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria111" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria111" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria111" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria111" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria111" type="radio" />
                              </div></td>
                            </tr-->
                            <tr bgcolor="#ffffff">
                              <td align="left" bgcolor="#66CC33">2.  ภาระงานด้านวิจัย </td>
                              <td bgcolor="#66CC33">&nbsp;</td>
                              <td bgcolor="#66CC33">&nbsp;</td>
                              <td bgcolor="#66CC33">&nbsp;</td>
                              <td bgcolor="#66CC33">&nbsp;</td>
                              <td bgcolor="#66CC33">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.1 งานวิจัยเพื่อสร้างองค์ความรู้ใหม่/รับใช้สังคม</td>
                              <td><div align="center">
                                  <?
	$fn="c21";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.2 งานวิจัยเพื่อพัฒนาการเรียนการสอน</td>
                              <td><div align="center">
                                  <?
	$fn="c22";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.3 บทความวิจัยและบทความวิชาการ (Review paper)</td>
                              <td><div align="center">
                                  <?
	$fn="c23";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.4  ผลงานที่ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร</td>
                              <td><div align="center">
                                  <?
	$fn="c24";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.6  ผลงานวิชาการ</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left"> &nbsp;&nbsp;&nbsp;2.4.1  เอกสารประกอบการสอน</td>
                              <td><div align="center">
                                  <?
	$fn="c251";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;2.4.2  เอกสารคำสอน </td>
                              <td><div align="center">
                                  <?
	$fn="c252";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;2.4.3  ตำราหรือหนังสือแปล</td>
                              <td><div align="center">
                                  <?
	$fn="c253";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;2.4.4 e-learning </td>
                              <td><div align="center">
                                  <?
	$fn="c254";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left" bgcolor="#00FFFF">3. ภาระงานด้านการบริการวิชาการ</td>
                              <td bgcolor="#00FFFF">&nbsp;</td>
                              <td bgcolor="#00FFFF">&nbsp;</td>
                              <td bgcolor="#00FFFF">&nbsp;</td>
                              <td bgcolor="#00FFFF">&nbsp;</td>
                              <td bgcolor="#00FFFF">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ด้านการบริการวิชาการของคณะ
      ( เช่น คณะกรรมในโครงการ วมว. )  / โครงการความร่วมมือกับโรงเรียนจุฬาภรณ์ / สัปดาห์วิทยาศาสตร์</td>
                              <td><div align="center">
                                  <?
	$fn="c31";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.2) การบริการวิชาการในระดับชาติ/นานาชาติ (เป็นคณะกรรมการในการจัดประชุมวิชาการ)</td>
                              <td><div align="center">
                                  <?
	$fn="c32";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.3) โครงการบริการวิชาการแก่สังคมและชุมชน</td>
                              <td><div align="center">
                                  <?
	$fn="c33";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.4)    งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ</td>
                              <td><div align="center">
                                  <?
	$fn="c34";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.5) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ เช่น สารคามพิทยาคม /อาจารย์ที่ปรึกษาวิทยานิพนธ์ให้กับมหาวิทยาลัยอื่น ๆ ทั้งภาครัฐและเอกชน </td>
                              <td><div align="center">
                                  <?
	$fn="c35";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left" bgcolor="#FFCC00">4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
                              <td bgcolor="#FFCC00">&nbsp;</td>
                              <td bgcolor="#FFCC00">&nbsp;</td>
                              <td bgcolor="#FFCC00">&nbsp;</td>
                              <td bgcolor="#FFCC00">&nbsp;</td>
                              <td bgcolor="#FFCC00">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp; ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
                              <td><div align="center">
                                  <?
	$fn="c4";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left" bgcolor="#C8A9E9">5    . ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</td>
                              <td bgcolor="#C8A9E9">&nbsp;</td>
                              <td bgcolor="#C8A9E9">&nbsp;</td>
                              <td bgcolor="#C8A9E9">&nbsp;</td>
                              <td bgcolor="#C8A9E9">&nbsp;</td>
                              <td bgcolor="#C8A9E9">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.1)  การบริหารจัดการหลักสูตร/โครงการส่งเสริมวิชาการ</td>
                              <td><div align="center">
                                <?
	$fn="c51";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.2)  การช่วยงานบริหารจัดการภาควิชา/คณะฯ</td>
                              <td><div align="center">
                                  <?
	$fn="c52";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.3)  การพัฒนาตนเองต่างๆ</td>
                              <td><div align="center">
                                  <?
	$fn="c53";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.4)  การพัฒนาองค์กรอื่น กรรมการหรือผู้บริหารองค์กรอื่น</td>
                              <td><div align="center">
                                  <?
	$fn="c54";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.5)  การเข้าร่วมกิจกรรมอื่นๆ </td>
                              <td><div align="center">
                                  <?
	$fn="c55";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                              <td><div align="center">
                                  <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                              </div></td>
                            </tr>
                          </tbody>
                      </table>
                      <p>&nbsp;</p></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#E2E2E2"><h3>ข้อเสนอแนะ(ตอนที่3)<br />
                      </h3></td>
                    </tr>
                    <tr>
                      <td colspan="2"><textarea name="txtcriteria" cols="128" rows="5" id="txtcriteria"></textarea></td>
                    </tr>
                    <tbody>
                      <tr>
                        <td colspan="2" align="left" bgcolor="#FFFF9C">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left" bgcolor="#E2E2E2"><h3><u>ตอนที่ 4</u> ความพึงพอใจในการใช้โปรแกรมการกรอกแบบประเมินฯ </h3>
                          (โปรดทำเครื่องหมาย
                          <input value="3" checked="checked" name="f3" type="radio" />
                        หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                      </tr>
                      <tr>
                        <td><table bgcolor="#8595a3" border="1" cellpadding="3" cellspacing="1" width="99%">
                            <tbody>
                              <tr align="center" bgcolor="#cccccc">
                                <td rowspan="2" align="center"><div align="center"><strong>หัวข้อ</strong></div></td>
                                <td colspan="5" align="center"><div align="center"><strong>ระดับความพึงพอใจ</strong></div></td>
                              </tr>
                              <tr>
                                <td bgcolor="#cccccc"><div align="center"><strong>มากที่สุด</strong></div></td>
                                <td bgcolor="#cccccc"><div align="center"><strong>มาก</strong></div></td>
                                <td bgcolor="#cccccc"><div align="center"><strong>ปานกลาง</strong></div></td>
                                <td bgcolor="#cccccc"><div align="center"><strong>น้อย</strong></div></td>
                                <td bgcolor="#cccccc"><div align="center"><strong>น้อยที่สุด</strong></div></td>
                              </tr>
                              <tr bgcolor="#e0e4e8">
                                <td colspan="6"><strong>กระบวนการขั้นตอน/กระบวนการ</strong></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">1. มีการจัดหมวดหมู่ของรายการใช้งานได้อย่างชัดเจน</td>
                                <td><div align="center">
                                    <?
	$fn="p1";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">2. มีเมนูการใช้งานง่าย ไม่ซับซ้อน</td>
                                <td><div align="center">
                                    <?
	$fn="p2";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">3. การเข้าถึงระบบทำได้ง่าย รวดเร็ว</td>
                                <td><div align="center">
                                    <?
	$fn="p3";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">4. มีฟังก์ชันครอบคลุมการทำงาน</td>
                                <td><div align="center">
                                    <?
	$fn="p4";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">5. ระบบมีขั้นตอนการทำงานเป็นลำดับเข้าใจง่าย</td>
                                <td><div align="center">
                                    <?
	$fn="p5";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">6. ระบบมีการแสดงผลข้อมูลที่รวดเร็ว</td>
                                <td><div align="center">
                                    <?
	$fn="p6";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#e0e4e8">
                                <td colspan="6"><strong>ด้านเนื้อหา</strong></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">7. ข้อมูลในระบบครอบคลุมความต้องการของผู้ใช้งาน</td>
                                <td><div align="center">
                                    <?
	$fn="p7";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">8. ข้อมูลในระบบมีความถูกต้อง  ชัดเจน  น่าเชื่อถือ </td>
                                <td><div align="center">
                                    <?
	$fn="p8";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">9. รายงานผลในระบบฯ  สามารถนำไปเป็นข้อมูลการตัดสินใจของผู้บริหารได้  </td>
                                <td><div align="center">
                                    <?
	$fn="p9";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">10. ระบบแสดงข้อมูลได้อย่างเหมาะสม  ครบถ้วน</td>
                                <td><div align="center">
                                    <?
	$fn="p10";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">11. ข้อมูลในระบบมีความเป็นปัจจุบัน</td>
                                <td><div align="center">
                                    <?
	$fn="p11";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#e0e4e8">
                                <td colspan="6"><strong>ด้านประสิทธิภาพและความปลอดภัย</strong></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">12. ระบบฯ แสดงข้อมูลได้อย่างเหมาะสม ครบถ้วน</td>
                                <td><div align="center">
                                    <?
	$fn="p12";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">13. ระบบฯ มีการตรวจสอบสถานะผู้ใช้งาน</td>
                                <td><div align="center">
                                    <?
	$fn="p13";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">14. ระบบฯ มีการป้องกันข้อมูลเสียหาย</td>
                                <td><div align="center">
                                    <?
	$fn="p14";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">15. ระบบฯ มีการเก็บรักษาข้อมูลอย่างมีประสิทธิภาพและปลอดภัย</td>
                                <td><div align="center">
                                    <?
	$fn="p15";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#e0e4e8">
                                <td colspan="6"><strong>ด้านเจ้าหน้าที่ผู้ให้บริการ</strong></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">16. เจ้าหน้าที่สามารถตอบคำถาม หรือแก้ไขปัญหาจากการใช้งานได้ รวดเร็ว </td>
                                <td><div align="center">
                                    <?
	$fn="p16";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">17. ความเอาใจใส่ กระตือรือร้น ความพร้อม และมีจิตสำนึกในการให้บริการของผู้ให้บริการ </td>
                                <td><div align="center">
                                    <?
	$fn="p17";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">18. เจ้าหน้าที่ให้บริการต่อผู้รับบริการโดยไม่เลือกปฏิบัติ ตรงไปตรงมา </td>
                                <td><div align="center">
                                    <?
	$fn="p18";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#e0e4e8">
                                <td colspan="6"><strong>ด้านความพึงพอใจต่อคุณภาพการให้บริการ</strong></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">19. ระบบสามารถตอบสนองความต้องการของผู้ใช้งานได้ดี </td>
                                <td><div align="center">
                                    <?
	$fn="p19";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">20. ระบบสามารถช่วยอำนวยความสะดวกในการปฏิบัติงานได้ดีขึ้น</td>
                                <td><div align="center">
                                    <?
	$fn="p20";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                              <tr bgcolor="#ffffff">
                                <td align="left">21.  ระบบสามารถช่วยลดระยะเวลาการปฏิบัติงานให้เร็วขึ้นได้</td>
                                <td><div align="center">
                                    <?
	$fn="p14";
	$sql="select * from survey where $cond and $fn= 5 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 4 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=3 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn= 2 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                                <td><div align="center">
                                    <?
	$sql="select * from survey where $cond and $fn=1 ";
	$res=mysql_query($sql);
	$num=mysql_num_rows($res);
	echo "<font color=blue>  $num </font></br><font color=green>  ( ".round($num*100/$total,2)."% )</font>";
?>
                                </div></td>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
                      <tr>
                        <td colspan="2" bgcolor="#E2E2E2"><h3>ข้อเสนอแนะ (ตอนที่ 4) <br />
                        </h3></td>
                      </tr>
                      <tr>
                        <td colspan="2"><textarea name="txtsystem" cols="128" rows="5" id="txtsystem"></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2"><div align="center"> </div></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td> </td>
              </tr>
            </tbody>
        </table></td>
      </tr>
    </tbody>
  </table>
 </div>
</body>
</html>
