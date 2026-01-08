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

<form id="form1" name="form1" method="post" action="action/ac_survey.php" enctype="application/x-www-form-urlencoded"  onsubmit="return ChkSurverData()">
  <div align="center">
    <table border="0" cellpadding="0" cellspacing="5">
      <tbody>
        <tr>
          <td height="83"><br />
<div align="center">	 <font size=5 ><strong>แบบประเมินความพึงพอใจ</strong></font>  <br />
                  <h3>แบบประเมินความพึงพอใจระบบประเมินภาระงานบุคลากร(สายวิชาการ) <br />
                    คณะวิทยาศาสตร์ มหาวิทยาลัยมหาสารคาม<br />
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
                          <td colspan="2"><div align="left">
                              <h3><u>ตอนที่ 1</u> ข้อมูลทั่วไปของผู้ใช้บริการ</h3>
                            (โปรดทำเครื่องหมาย
                            <input value="3" checked="checked" name="f1" type="radio" />
                          หน้าคำตอบที่ตรงกับความเป็นจริง) </div></td>
                        </tr>
                        <tr>
                          <td width="100" align="left" valign="top"><strong>เพศ</strong></td>
                          <td width="674" align="left" valign="top"><input name="rdosex" value="1" type="radio" />
                            ชาย     
                            <input name="rdosex" value="2" type="radio" />
                          หญิง </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">วุฒิการศึกษาสูงสุด</td>
                          <td align="left" valign="top"><input name="rdotype" value="1" type="radio" />
                            ปริญญาตรี   
                              <input name="rdotype" value="2" type="radio" />
                            ปริญญาโท   
                            <input name="rdotype" value="3" type="radio" />
                          ปริญญาเอก</td></tr>
                      </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td><table border="0" cellpadding="5" cellspacing="0" width="100%">
                        <tr>
                          <td width="14%" align="left"><strong>หน่วยงาน</strong></td>
                          <td align="left"><input name="rdodepartment" value="0" type="radio" />
                          ภาควิชาคณิตศาสตร์</td>
                          <td align="left"><input name="rdodepartment" value="1" type="radio" />
                          ภาควิชาเคมี</td>
                        </tr>
                        <tr>
                          <td align="left"></td>
                          <td align="left"><input name="rdodepartment" value="2" type="radio" />
                          ภาควิชาชีววิทยา</td>
                          <td align="left"><input name="rdodepartment" value="3" type="radio" />
                          ภาควิชาฟิสิกส์</td>
                        </tr>
                        <tr>
                          <td align="left"></td>
                          <td align="left"><input name="rdodepartment" value="4" type="radio" />
                          คณะผู้บริหาร</td>
                          <td align="left"><input name="rdodepartment" value="5" type="radio" />
                          สำนักงานเลขานุการ</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td> </td>
                        </tr>
                  </table>
                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><h3><u>ตอนที่ 2</u> ท่านคิดว่าคะแนนของถ่วงน้ำหนักแต่ละรูปแบบเหมาะสมมากน้อยเพียงใด </h3>
                          (โปรดทำเครื่องหมาย
                            <input value="3" checked="checked" name="f3" type="radio" />
หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                      </tr>
                      <tr>
                        <td><table border="1" cellspacing="0" cellpadding="0" width="887">
                          <tr>
                            <td colspan="6" valign="top">&nbsp;</td>
                            <td colspan="5" valign="top"><div align="center"><strong>ระดับความ</strong>เหมาะสม</div></td>
                            </tr>
                          <tr>
                            <td width="62" valign="top"><p align="center">รูปแบบที่</p></td>
                            <td width="66" valign="top"><p align="center">การสอน </p></td>
                            <td width="63" valign="top"><p align="center">งานวิจัย </p></td>
                            <td width="103" valign="top"><p align="center">บริการวิชาการ </p></td>
                            <td width="85" valign="top"><p align="center">ทำนุบำรุงฯ </p></td>
                            <td width="104" valign="top"><p align="center">การช่วยงานบริหาร <br />
                              และอื่น    ๆ </p></td>
                            <td><div align="center"><strong>มากที่สุด</strong></div></td>
                            <td><div align="center"><strong>มาก</strong></div></td>
                            <td><div align="center"><strong>ปานกลาง</strong></div></td>
                            <td><div align="center"><strong>น้อย</strong></div></td>
                            <td><div align="center"><strong>น้อยที่สุด</strong></div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top"><p align="center">1 </p></td>
                            <td width="66" valign="top"><p align="center">45 </p></td>
                            <td width="63" valign="top"><p align="center">35 </p></td>
                            <td width="103" valign="top"><p align="center">10 </p></td>
                            <td width="85" valign="top"><p align="center">5 </p></td>
                            <td width="104" valign="top"><p align="center">5 </p></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <input value="5" name="optform1" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="4" name="optform1" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="3" name="optform1" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="2" name="optform1" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="1" name="optform1" type="radio" />
                            </div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top"><p align="center">2</p></td>
                            <td width="66" valign="top"><p align="center">45 </p></td>
                            <td width="63" valign="top"><p align="center">30 </p></td>
                            <td width="103" valign="top"><p align="center">15 </p></td>
                            <td width="85" valign="top"><p align="center">5 </p></td>
                            <td width="104" valign="top"><p align="center">5 </p></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <input value="5" name="optform2" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="4" name="optform2" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="3" name="optform2" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="2" name="optform2" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="1" name="optform2" type="radio" />
                            </div></td>
                          </tr>
                          <tr>
                            <td width="62" valign="top"><p align="center">3</p></td>
                            <td width="66" valign="top"><p align="center">45 </p></td>
                            <td width="63" valign="top"><p align="center">30 </p></td>
                            <td width="103" valign="top"><p align="center">10 </p></td>
                            <td width="85" valign="top"><p align="center">5 </p></td>
                            <td width="104" valign="top"><p align="center">10 </p></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <input value="5" name="optform3" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="4" name="optform3" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                              <input value="3" name="optform3" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="2" name="optform3" type="radio" />
                            </div></td>
                            <td bgcolor="#ffffff"><div align="center">
                                <input value="1" name="optform3" type="radio" />
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
                      <td colspan="2" align="left"><h3><u>ตอนที่ 3</u> ท่านความพึงพอใจต่อเกณฑ์การประเมิน ในแต่ละด้านเพียงใด</h3>
                        (โปรดทำเครื่องหมาย
                        <input value="3" checked="checked" name="f3" type="radio" />
                        หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                    </tr>
                    <tr>
                      <td><table bgcolor="#FFFFFF" border="1" cellpadding="3" cellspacing="1" width="99%">
                          <tbody>
                            <tr align="center" bgcolor="#cccccc">
                              <td rowspan="2" align="center" bgcolor="#FFFFFF"><div align="center"><strong>หัวข้อ</strong></div></td>
                              <td colspan="5" align="center" bgcolor="#FFFFFF"><div align="center"><strong>ระดับความพึงพอใจ</strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="center"><strong>มากที่สุด</strong></div></td>
                              <td><div align="center"><strong>มาก</strong></div></td>
                              <td><div align="center"><strong>ปานกลาง</strong></div></td>
                              <td><div align="center"><strong>น้อย</strong></div></td>
                              <td><div align="center"><strong>น้อยที่สุด</strong></div></td>
                            </tr>
                            <tr bgcolor="#e0e4e8">
                              <td colspan="6" bgcolor="#FFFFFF"><strong>กระบวนการขั้นตอน/กระบวนการ</strong></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left"><strong>1. ภาระงานด้านการสอน</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.1  การสอนภาคบรรยาย</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria11" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria11" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria11" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria11" type="radio" />
                              </div></td>
                              <td><div align="center">
                                <input value="1" name="optcriteria11" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.2  การสอนภาคปฏิบัติ</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria12" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria12" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria12" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria12" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria12" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.3  ผู้ประสานงานรายวิชา</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria13" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria13" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria13" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria13" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria13" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.4  การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria14" type="radio" />
                              </div></td>
                              <td><div align="center">
                                <input value="4" name="optcriteria14" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria14" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria14" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria14" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.5  ที่ปรึกษาโครงการปริญญานิพนธ์ ระดับปริญญาตรี </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria15" type="radio" />
                              </div></td>
                              <td><div align="center">
                                <input value="4" name="optcriteria15" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria15" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria15" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria15" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.6  ที่ปรึกษาวิทยานิพนธ์ ระดับปริญญาโทและเอก </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria16" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria16" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria16" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria16" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria16" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.7  ที่ปรึกษาวิชาสัมมนา</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria17" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria17" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria17" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria17" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria17" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.8  อาจารย์ที่ปรึกษาทางด้านวิชาการ </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria18" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria18" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria18" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria18" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria18" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.9  อาจารย์ที่ปรึกษาด้านกิจกรรม </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria19" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria19" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria19" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria19" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria19" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">1.10  กรรมการสอบ  Senior Project/วิทยานิพนธ์/คณะกรรมการสอบสัมมนา/กรรมการคุมสอบ</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria110" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria110" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria110" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria110" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria110" type="radio" />
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
                              <td align="left">2.  ภาระงานด้านวิจัย </td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.1 งานวิจัยเพื่อสร้างองค์ความรู้ใหม่/รับใช้สังคม</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria21" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria21" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria21" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria21" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria21" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.2 งานวิจัยเพื่อพัฒนาการเรียนการสอน</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria22" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria22" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria22" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria22" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria22" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.3 บทความวิจัยและบทความวิชาการ (Review paper)</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria23" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria23" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria23" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria23" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria23" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">2.4  ผลงานที่ได้รับการจดสิทธิบัตรหรืออนุสิทธิบัตร</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria24" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria24" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria24" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria24" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria24" type="radio" />
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
                                  <input value="5" name="optcriteria251" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria251" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria251" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria251" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria251" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;2.4.2  เอกสารคำสอน </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria252" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria252" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria252" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria252" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria252" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;2.4.3  ตำราหรือหนังสือแปล</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria253" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria253" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria253" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria253" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria253" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;2.4.4 e-learning </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria254" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria254" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria254" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria254" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria254" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3. ภาระงานด้านการบริการวิชาการ</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ด้านการบริการวิชาการของคณะ
      ( เช่น คณะกรรมในโครงการ วมว. )  / โครงการความร่วมมือกับโรงเรียนจุฬาภรณ์ / สัปดาห์วิทยาศาสตร์</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria31" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria31" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria31" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria31" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria31" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.2) การบริการวิชาการในระดับชาติ/นานาชาติ (เป็นคณะกรรมการในการจัดประชุมวิชาการ)</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria32" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria32" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria32" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria32" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria32" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.3) โครงการบริการวิชาการแก่สังคมและชุมชน</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria33" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria33" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria33" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria33" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria33" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.4)    งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria34" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria34" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria34" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria34" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria34" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">3.5) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ เช่น สารคามพิทยาคม /อาจารย์ที่ปรึกษาวิทยานิพนธ์ให้กับมหาวิทยาลัยอื่น ๆ ทั้งภาครัฐและเอกชน </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria35" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria35" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria35" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria35" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria35" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp; ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria4" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria4" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria4" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria4" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria4" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5    . ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.1)  การบริหารจัดการหลักสูตร/โครงการส่งเสริมวิชาการ</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria51" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria51" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria51" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria51" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria51" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.2)  การช่วยงานบริหารจัดการภาควิชา/คณะฯ</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria52" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria52" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria52" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria52" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria52" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.3)  การพัฒนาตนเองต่างๆ</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria53" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria53" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria53" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria53" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria53" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.4)  การพัฒนาองค์กรอื่น กรรมการหรือผู้บริหารองค์กรอื่น</td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria54" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria54" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria54" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria54" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria54" type="radio" />
                              </div></td>
                            </tr>
                            <tr bgcolor="#ffffff">
                              <td align="left">5.5)  การเข้าร่วมกิจกรรมอื่นๆ </td>
                              <td><div align="center">
                                  <input value="5" name="optcriteria55" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="4" name="optcriteria55" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="3" name="optcriteria55" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="2" name="optcriteria55" type="radio" />
                              </div></td>
                              <td><div align="center">
                                  <input value="1" name="optcriteria55" type="radio" />
                              </div></td>
                            </tr>
                          </tbody>
                      </table>
                        <p>&nbsp;</p></td>
                    </tr>
                    <tr>
                      <td colspan="2"><h3>ข้อเสนอแนะ(ตอนที่3)<br />
                      </h3></td>
                    </tr>
                    <tr>
                      <td colspan="2"><textarea name="txtcriteria" cols="128" rows="5" id="txtcriteria"></textarea></td>
                    </tr>
                      <tbody>
                        <tr>
                          <td colspan="2" align="left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left"><h3><u>ตอนที่ 4</u> ความพึงพอใจในการใช้โปรแกรมการกรอกแบบประเมินฯ </h3>
                            (โปรดทำเครื่องหมาย
                            <input value="3" checked="checked" name="f3" type="radio" />
                          หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                        </tr>
                        <tr>
                          <td><table border="1" cellpadding="3" cellspacing="1" width="99%">
                              <tbody>
                                <tr align="center">
                                  <td rowspan="2" align="center"><div align="center"><strong>หัวข้อ</strong></div></td>
                                  <td colspan="5" align="center"><div align="center"><strong>ระดับความพึงพอใจ</strong></div></td>
                                </tr>
                                <tr>
                                  <td><div align="center"><strong>มากที่สุด</strong></div></td>
                                  <td><div align="center"><strong>มาก</strong></div></td>
                                  <td><div align="center"><strong>ปานกลาง</strong></div></td>
                                  <td><div align="center"><strong>น้อย</strong></div></td>
                                  <td><div align="center"><strong>น้อยที่สุด</strong></div></td>
                                </tr>
                                <tr>
                                  <td colspan="6"><strong>กระบวนการขั้นตอน/กระบวนการ</strong></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">1. มีการจัดหมวดหมู่ของรายการใช้งานได้อย่างชัดเจน</td>
                                  <td bgcolor="#ffffff"><div align="center">
                                      <input value="5" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td bgcolor="#ffffff"><div align="center">
                                    <input value="4" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td bgcolor="#ffffff"><div align="center">
                                      <input value="3" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td bgcolor="#ffffff"><div align="center">
                                      <input value="2" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td bgcolor="#ffffff"><div align="center">
                                      <input value="1" name="optproblem1" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">2. มีเมนูการใช้งานง่าย ไม่ซับซ้อน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem2" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem2" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem2" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem2" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem2" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">3. การเข้าถึงระบบทำได้ง่าย รวดเร็ว</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem3" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem3" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem3" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem3" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem3" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">4. มีฟังก์ชันครอบคลุมการทำงาน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem4" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem4" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem4" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem4" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem4" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">5. ระบบมีขั้นตอนการทำงานเป็นลำดับเข้าใจง่าย</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem5" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem5" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem5" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem5" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem5" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">6. ระบบมีการแสดงผลข้อมูลที่รวดเร็ว</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem6" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem6" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem6" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem6" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem6" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#e0e4e8">
                                  <td colspan="6" bgcolor="#FFFFFF"><strong>ด้านเนื้อหา</strong></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">7. ข้อมูลในระบบครอบคลุมความต้องการของผู้ใช้งาน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem7" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem7" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem7" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem7" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem7" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">8. ข้อมูลในระบบมีความถูกต้อง  ชัดเจน  น่าเชื่อถือ </td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem8" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem8" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem8" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem8" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem8" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">9. รายงานผลในระบบฯ  สามารถนำไปเป็นข้อมูลการตัดสินใจของผู้บริหารได้  </td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem9" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem9" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem9" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem9" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem9" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">10. ระบบแสดงข้อมูลได้อย่างเหมาะสม  ครบถ้วน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem10" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem10" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem10" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem10" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem10" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">11. ข้อมูลในระบบมีความเป็นปัจจุบัน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem11" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem11" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem11" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem11" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem11" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#e0e4e8">
                                  <td colspan="6" bgcolor="#FFFFFF"><strong>ด้านประสิทธิภาพและความปลอดภัย</strong></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">12. ระบบฯ แสดงข้อมูลได้อย่างเหมาะสม ครบถ้วน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem12" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem12" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem12" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem12" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem12" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">13. ระบบฯ มีการตรวจสอบสถานะผู้ใช้งาน</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem13" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem13" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem13" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem13" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem13" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">14. ระบบฯ มีการป้องกันข้อมูลเสียหาย</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem14" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem14" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem14" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem14" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem14" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">15. ระบบฯ มีการเก็บรักษาข้อมูลอย่างมีประสิทธิภาพและปลอดภัย</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem15" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem15" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem15" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem15" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem15" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#e0e4e8">
                                  <td colspan="6" bgcolor="#FFFFFF"><strong>ด้านเจ้าหน้าที่ผู้ให้บริการ</strong></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">16. เจ้าหน้าที่สามารถตอบคำถาม หรือแก้ไขปัญหาจากการใช้งานได้ รวดเร็ว </td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem16" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem16" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem16" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem16" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem16" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">17. ความเอาใจใส่ กระตือรือร้น ความพร้อม และมีจิตสำนึกในการให้บริการของผู้ให้บริการ </td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem17" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem17" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem17" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem17" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem17" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">18. เจ้าหน้าที่ให้บริการต่อผู้รับบริการโดยไม่เลือกปฏิบัติ ตรงไปตรงมา </td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem18" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem18" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem18" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem18" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem18" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#e0e4e8">
                                  <td colspan="6" bgcolor="#FFFFFF"><strong>ด้านความพึงพอใจต่อคุณภาพการให้บริการ</strong></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">19. ระบบสามารถตอบสนองความต้องการของผู้ใช้งานได้ดี </td>
                                  <td><div align="center">
                                    <input value="5" name="optproblem19" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem19" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem19" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem19" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem19" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">20. ระบบสามารถช่วยอำนวยความสะดวกในการปฏิบัติงานได้ดีขึ้น</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem20" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem20" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem20" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem20" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem20" type="radio" />
                                  </div></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">21.  ระบบสามารถช่วยลดระยะเวลาการปฏิบัติงานให้เร็วขึ้นได้</td>
                                  <td><div align="center">
                                    <input value="5" name="optproblem21" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem21" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem21" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem21" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem21" type="radio" />
                                  </div></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" bgcolor="#FFFFFF"><h3>ข้อเสนอแนะ (ตอนที่ 4) <br />
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
    <input type="submit" name="Submit" value="ส่งแบบสอบถาม" />
  &nbsp;
  <input type="reset" name="Submit2" value="เริ่มใหม่" >
  </div>
</form>
</body>
</html>
