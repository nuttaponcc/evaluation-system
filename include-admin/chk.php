<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: index.php");
exit();
}
include "tools/connect.php";
include "tools/select.php";
?>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td align="left">      <?php

echo"
<table width=700  border=0>
  <tr class=\"mainbox4\" align=\"center\">
    <td width=50><img src=\"images/imenu/users.png\" width=\"16\" height=\"16\" border=\"0\"/>&nbsp;</td>
    <td width=140 align=left>ชื่อ</td>
    <td width=150 align=left>สังกัดหน่วยงาน</td>
  </tr>";
	
	$sql="select * from scdb_user ,scdb_major  where  scdb_user. user_major=scdb_major .major_id and  user_status=1 order by user_major";
	$result=mysql_db_query($dbname,$sql);

	while($r=mysql_fetch_array($result)){
		$user_id=$r[user_id];
		$user_name1=$r[user_name1];
		$user_major=$r[major_name];
		$user_email=$r[user_email];
		$user_date=$r[user_date];
		echo"
    <tr class=\"mainbox9\"> 
	<td align=\"center\" width=50  bgcolor=\"EEEEEE\"><img src=\"images/imenu/user.png\" width=\"16\" height=\"16\" border=\"0\"/>&nbsp;</td>
    <td width=140  bgcolor=\"EEFFEE\">$user_name1&nbsp;</td>
    <td width=150  bgcolor=\"FFEEFF\">$user_major</td>

  </tr>";
	}


echo"</table><br><br>";
?></td>
  </tr>
</table>


