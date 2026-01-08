<?
		include"tools/connect-eval.php";
?>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td>
		
<div align="left">
<table border="0" cellpadding="5" cellspacing="2" bgcolor="#666666">
  <tr>
    <td width="624" align="left" valign="top" bgcolor="#65C0ED"><div align="center">ชื่อหัวข้อที่จะพัฒนา</div></td>
    <td width="84" align="left" valign="top" bgcolor="#65C0ED"><a href="index.php?menu=eval-dev-add" target="_parent"><img src="images/add.png" alt="add" border="0" /></a></td>
  </tr>
            <?
   	$query = "SELECT * FROM `dev`  where   devuserid='".$_SESSION[session_user_id]."' ORDER BY devid asc";
//	echo "$query";
	$result = mysql_query($query);
	$i=1;
     while ($row = mysql_fetch_assoc($result)) {

		echo "
  <tr>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFeecA\">".$i++.". ".$row['subj']."</td>
    <td align=\"left\" valign=\"top\" bgcolor=\"#FFeecA\">
	<a href=\"index.php?menu=eval-dev-edit&id=".$row['devid']."\" target=\"_parent\"><img src=\"images/edit.png\"  alt=\"edit\"   border=\"0\" /></a>
	<a href=\"index.php?menu=eval-dev-del&id=".$row['devid']."\" target=\"_parent\"><img src=\"images/delete.png\" alt=\"delete\"   border=\"0\" />	</td>
  </tr>	
		";
	}	
  ?>
</table>

</div>
	</td>
  </tr>
</table>
