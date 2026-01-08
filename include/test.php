<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><p><br />
      </p>
      <p>
	  <?
		include"tools/connect-eval.php";
	    $sql = "SELECT * FROM  `timeline`  where tlid=3";
		$res = mysql_query($sql);
		$row=mysql_fetch_array($res);			  
				echo 'เวลาเข้าสู่ระบบ :       '. date('d-m-Y  / H:i:s') ."\n";
				$t=date('d-m-Y  / H:i:s',strtotime($row['tlstop']));
				$tdiff=strtotime(date('d-m-Y   H:i:s'))-strtotime($row['tlstop']);
				echo "<br> $t    ".date(' H:i:s',$tdiff);
	  ?>
	  </p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
