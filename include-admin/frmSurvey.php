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
	var rdosex = document.form1.rdosex;
	var rdotype = document.form1.rdotype;
	//var txtclass = document.form1.txtclass;
	var rdodepartment = document.form1.rdodepartment;
	//var txtinterest = document.form1.txtinterest;

	if((!rdosex[0].checked) && (!rdosex[1].checked))
	{
		alert("กรุณาระบุเพศ");
		return false;
	}
	
	if((!rdotype[0].checked) && (!rdotype[1].checked) && (!rdotype[2].checked)&& (!rdotype[3].checked))
	{
		alert("กรุณาระบุุสถานภาพ");
		return false;		
	}

	if((!rdodepartment[1].checked)&&(!rdodepartment[2].checked)&&(!rdodepartment[3].checked)&&(!rdodepartment[4].checked)&&(!rdodepartment[5].checked)&&(!rdodepartment[0].checked))
	{
		alert("กรุณาระบุหน่วยงาน");
		return false;
	}
	/*else if((rdodepartment[10].checked) && (txtinterest.value == ""))
	{
		alert("กรุณาระบุหน่วยงานอื่นๆ");
		return false;		
	}*/

//	var txtnum = document.form1.txtnum.value;
//		alert(txtnum);

	//การเข้าถึง radiobutton ของ ตัวเลือกข้อสอบ ในแต่ละข้อ
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

		if(choose_choice == 0)
		{
			alert("กรุณาตอบคำถามในแบบสอบถามข้อที่ "+ i );	
			return false;
		}		
	}
	
	//return false;
}
</script>

<form id="form1" name="form1" method="post" action="../action/ac_survey.php" enctype="application/x-www-form-urlencoded"  onsubmit="return ChkSurverData()">
  <div align="center">
    <table border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFF99">
      <tbody>
        <tr>
          <td height="83" bgcolor="#FFCC00"><div align="center"> <br />
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
                          <td colspan="2" bgcolor="#E2E2E2"><div align="left">
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
                          <td align="left" valign="top"><strong>สถานภาพผู้ตอบ</strong></td>
                          <td align="left" valign="top"><input name="rdotype" value="1" type="radio" />
                            ผู้บริหาร    
                            <input name="rdotype" value="2" type="radio" />
                            อาจารย์    
                            <input name="rdotype" value="3" type="radio" />
                            บุคลากรสายสนับสนุน    
                            <input name="rdotype" value="4" type="radio" />
                          อื่นๆ     </td>
                        </tr>
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
                  </table></td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" cellpadding="4" cellspacing="0">
                      <tbody>
                        <tr>
                          <td colspan="2" align="left" bgcolor="#E2E2E2"><h3><u>ตอนที่ 2</u> ท่านมีความพึงพอใจต่อการให้บริการมากน้อยเพียงใด </h3>
                            (โปรดทำเครื่องหมาย
                            <input value="3" checked="checked" name="f3" type="radio" />
                          หน้าคำตอบที่ตรงกับความเป็นจริง)</td>
                        </tr>
                        <tr>
                          <td><table bgcolor="#8595a3" border="0" cellpadding="3" cellspacing="1" width="99%">
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
                                      <input value="5" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem1" type="radio" />
                                  </div></td>
                                  <td><div align="center">
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
                                  <td colspan="6"><strong>ด้านเนื้อหา</strong></td>
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
                                  <td colspan="6"><strong>ด้านประสิทธิภาพและความปลอดภัย</strong></td>
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
                                  <td colspan="6"><strong>ด้านเจ้าหน้าที่ผู้ให้บริการ</strong></td>
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
                                  <td align="left">17. ความเหมาะสมในการแต่งกาย บุคลิก ลักษณะท่าทางของเจ้าหน้าที่ผู้ให้บริการ </td>
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
                                  <td align="left">18. ความเอาใจใส่ กระตือรือร้น ความพร้อม และมีจิตสำนึกในการให้บริการของผู้ให้บริการ </td>
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
                                <tr bgcolor="#ffffff">
                                  <td align="left">19. เจ้าหน้าที่ให้บริการต่อผู้รับบริการโดยไม่เลือกปฏิบัติตรงไปตรงมา </td>
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
                                <tr bgcolor="#e0e4e8">
                                  <td colspan="6"><strong>ด้านความพึงพอใจต่อคุณภาพการให้บริการ</strong></td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                  <td align="left">20. ระบบสามารถตอบสนองความต้องการของผู้ใช้งานได้ดี </td>
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
                                  <td align="left">21. ระบบสามารถช่วยอำนวยความสะดวกในการปฏิบัติงานได้ดีขึ้น</td>
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
                                <tr bgcolor="#ffffff">
                                  <td align="left">22.  ระบบสามารถช่วยลดระยะเวลาการปฏิบัติงานให้เร็วขึ้นได้</td>
                                  <td><div align="center">
                                      <input value="5" name="optproblem22" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="4" name="optproblem22" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="3" name="optproblem22" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="2" name="optproblem22" type="radio" />
                                  </div></td>
                                  <td><div align="center">
                                      <input value="1" name="optproblem22" type="radio" />
                                  </div></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" bgcolor="#E2E2E2"><h3><u>ตอนที่ 3 </u> ข้อเสนอแนะ<br />
                          </h3></td>
                        </tr>
                        <tr>
                          <td colspan="2"><textarea name="txtcomment" cols="128" rows="5" id="txtcomment"></textarea></td>
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
  <input type="reset" name="Submit2" value="เริ่มใหม่" />
  </div>
</form>
</body>
</html>
