<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td width="10" align="right" valign="top" bgcolor="<? if($menu=="weight") echo "#66FF55"; else echo "#FFFFF66";  ?>">		</td>
        <td align="left" bgcolor="#eeccff"><font size="2"> <a href="index.php?menu=weight" ><strong>ค่าน้ำหนัก</strong> </a></br>
        </font> </td>
      </tr>

    </table></td>
  </tr>
  <tr>
    <td  height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td width="10" align="right" valign="top" bgcolor="<? if($menu=="eval") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
        <td align="left" bgcolor="#FFCC00"><font size="2"> <a href="index.php?menu=eval" ><strong><!--ป.01 ข้อตกลงและแบบการประเมินผลสัมฤทธ ิ์-->ป.03  แบบรายงานผลการปฏิบัติราชการ </strong> </a></br>
        </font> </td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="<? if($menu=="eval1") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">1.</font></td>
        <td align="left" bgcolor="#FFFFFF"><font size="2"><a href="index.php?menu=eval1" >ภาระงานด้านการสอน</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="<? if($menu=="eval2") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">2.</font></td>
        <td align="left" bgcolor="#FFFFFF"><font size="2"><a href="index.php?menu=eval2" >ภาระงานด้านวิจัย</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="<? if($menu=="eval3") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">3.</font></td>
        <td align="left" bgcolor="#FFFFFF"><font size="2"><a href="index.php?menu=eval3" > ภาระงานด้านการบริการวิชาการ</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="<? if($menu=="eval4") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">4.</font></td>
        <td align="left" bgcolor="#FFFFFF"><font size="2"><a href="index.php?menu=eval4" > ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="<? if($menu=="eval5") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">5.</font></td>
        <td align="left" bgcolor="#FFFFFF"><font size="2"><a href="index.php?menu=eval5" >ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</a></font></td>
      </tr>
    </table>

      <br />
      <table width="100%" border="0" cellpadding="0" cellspacing="2" >
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="eval") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#eeccff"><font size="2"> <a href="index.php?menu01=eval" ><strong>ป.01 ข้อตกลงและแบบการประเมินผลสัมฤทธิ์</strong> </a></br>
          </font> </td>
        </tr>
		
		<?
		
$host = "localhost";
$username = "root";
$password = "sciscience";
$dbname = "evaluation";
$link = mysql_connect($host,$username,$password);
mysql_select_db($dbname,$link);
$sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l1=1 and dt>now() ";
	$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	
				{
					$go="http://202.28.32.130/evaluation1/"; 
					$go1="menu"; 
					}
					else 
					{
						$go="";
						$go1="menu01"; 
					}	
		?>
        
		<tr>
          <td align="right" valign="top" bgcolor="<? if($menu01=="eval1") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">1.</font></td>
          <td align="left" bgcolor="#CCCCCC"><font size="2"><a href="<?=$go;?>index.php?<?=$go1;?>=eval1" >ภาระงานด้านการสอน</a></font></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="<? if($menu01=="eval2") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">2.</font></td>
          <td align="left" bgcolor="#CCCCCC"><font size="2"><a href="<?=$go;?>index.php?<?=$go1;?>=eval2" >ภาระงานด้านวิจัย</a></font></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="<? if($menu01=="eval3") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">3.</font></td>
          <td align="left" bgcolor="#CCCCCC"><font size="2"><a href="<?=$go;?>index.php?<?=$go1;?>=eval3" > ภาระงานด้านการบริการวิชาการ</a></font></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="<? if($menu01=="eval4") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">4.</font></td>
          <td align="left" bgcolor="#CCCCCC"><font size="2"><a href="<?=$go;?>index.php?<?=$go1;?>=eval4" > ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</a></font></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="<? if($menu01=="eval5") echo "#66FF55"; else echo "#FFFFFFF"; ?>"><font size="2">5.</font></td>
          <td align="left" bgcolor="#CCCCCC"><font size="2"><a href="<?=$go;?>index.php?<?=$go1;?>=eval5" >ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</a></font></td>
        </tr>
      </table> 

      <!--table border=1 bgcolor=ff8888> 
	  <tr><td>
	  <strong>*หมายเหตุ</strong><br />
	  ป.01เมื่อกรอก ป.03 เสร็จ เช้าวันที่ 23 กุมภาพันธ์ 2560 (9.00น) ระบบจะทำการคัดลอกข้อมูลไปที่ ป.01 อัตโนมัติ)
	  </td></tr></table-->	   </td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="2" >
      <tr>
        <td width="10" align="right" valign="top" bgcolor="<? if($menu=="eval6") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
        <td align="left" bgcolor="#eeccff"><font size="2"> <a href="index.php?menu=eval6" ><strong>พฤติกรรมการปฏิบัติราชการ 	</strong> </a></br>
        </font> (ประเมินตนเอง) </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="2" >
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="eval-dev") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#eeccff"><font size="2"> <a href="index.php?menu=eval-dev" ><strong>แบบฟอร์มแผนพัฒนารายบุคคล</strong> </a></br>
          </font> </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<?
	//if (($_SESSION[session_user_id]==482)||($_SESSION[session_user_id]==247))
	{
	?>
	<Table width="100%" border="0" cellpadding="0" cellspacing="1">
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"></td>
        <td align="left" bgcolor="#E6E6E6">พิมพ์รายงาน</td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/pdf.jpg" width="16" height="16" /></td>
        <td align="left" bgcolor="#E6E6E6"><font size="2"><a href="include/report.php?menu=cover" target="_blank"  >พิมพ์ ปก </a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/pdf.jpg" width="16" height="16" /></td>
        <td align="left" bgcolor="#E6E6E6"><font size="2"><a href="include/report.php?menu=1" target="_blank"  >พิมพ์ ป.01</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/pdf.jpg" width="16" height="16" /></td>
        <td align="left" bgcolor="#E6E6E6"><font size="2"><a href="include/report.php?menu=2" target="_blank"  >พิมพ์ ป.02</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/pdf.jpg" width="16" height="16" /></td>
        <td align="left" bgcolor="#E6E6E6"><font size="2"><a href="include/report.php?menu=3" target="_blank" >พิมพ์ ป.03</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/pdf.jpg" width="16" height="16" /></td>
        <td align="left" bgcolor="#E6E6E6"><font size="2"><a href="include/report.php?menu=4" target="_blank" >พิมพ์ ป.04</a></font></td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/pdf.jpg" width="16" height="16" /></td>
        <td align="left" bgcolor="#E6E6E6"><font size="2"><a href="include/report.php?menu=dev" target="_blank"  >แบบฟอร์มแผนพัฒนารายบุคคล</a></font></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table> 

	<?
	}
	?>	</td>
  </tr>
  <tr>
    <td>
	<? 
		include"tools/connect-eval.php";
	    $Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$_SESSION[session_user_id];
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);
//	echo  "  ".$Mrow ['m']."  ".$Mrow ['p']."  ".$Mrow ['b']."  ".$Mrow ['c']."  ".$Mrow ['a'];
	
		if( $Mrow ['m']||$Mrow ['p']||$Mrow ['b']||$Mrow ['c']||$Mrow ['a']) {  
	
	?>
      <table width="100%" border="0" cellpadding="0" cellspacing="2" >
        <tr>
          <td align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FF9900">&nbsp;สำหรับคณะกรรมการ</td>
        </tr>
<?  if($Mrow ['m']){  ?>		
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FFCC66"><font size="2"> <a href="index.php?madmin=mboard" ><strong>ภาควิชาคณิตศาสตร์  </strong> </a></br>
          </font></td>
        </tr>
<? }  if($Mrow ['p']){  ?>		
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FFCC66"><font size="2"> <a href="index.php?madmin=pboard" ><strong>ภาควิชาฟิสิกส์ </strong> </a></br>
          </font></td>
        </tr>
<? }  if($Mrow ['b']){  ?>		
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FFCC66"><font size="2"> <a href="index.php?madmin=bboard" ><strong>ภาควิชาชีววิทยา </strong> </a></br>
          </font></td>
        </tr>
<? }  if($Mrow ['c']){  ?>		
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FFCC66"><font size="2"> <a href="index.php?madmin=cboard" ><strong>ภาควิชาเคมี </strong> </a></br>
          </font></td>
        </tr>
<? }  if($Mrow ['a']){  ?>		
        <tr>
          <td align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FFCC66"><font size="2"> <a href="index.php?madmin=iboard" ><strong>สํานักงานเลขานุการ</strong> </a></br>
          </font></td>
        </tr>
<? }  if($Mrow ['a']){  ?>		
        <tr>
          <td width="10" align="right" valign="top" bgcolor="<? if($menu=="chk") echo "#66FF55"; else echo "#FFFFF66"; ?>">&nbsp;</td>
          <td align="left" bgcolor="#FFCC66"><font size="2"> <a href="index.php?madmin=aboard" ><strong>คณะผู้บริหาร</strong> </a></br>
          </font></td>
        </tr>
<? }   ?>		
      </table>
      <p>
        <? } ?>
      </p>
    <p><br />
      <strong>หากมีข้อสงสัยติดต่อ</strong><br />
    <img src="http://202.28.32.138/eoffice/data/file_document/127934.jpg" width="146" height="146" />    </p></td>
  </tr>
</table>
