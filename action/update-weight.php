<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
//header("Location: ../index.php");
//exit();
}
include"../tools/connect-eval.php";
$chk1=$_POST['chk'];
$sweight=$_POST['sweight'];
$date=date( 'Y-m-d H:i:s' ); 

	   //$sql= "DELETE FROM `wselect` where userid=$session_user_id";
      // $result = mysql_query($sql);
	  //echo "$chk <br>";
	  if ($status=="checked")  $status1=1; else  $status1=0;
	  if($sweight==0)$sweight=1;
	  if($chk=="none")
	  {
	   $sql= "INSERT INTO `wselect` (`wsid` ,`userid` ,`wtid` ,`status` ,`datec` )VALUES (NULL , '$session_user_id', '$sweight','$status1','$date')";
       $result = mysql_query($sql);
}else{
	   $sql= "UPDATE `wselect` SET `wtid` = '$sweight',`datem` = '$date' ,`status` = '$status1'  WHERE `wselect`.`userid` =$session_user_id LIMIT 1 ";
       $result = mysql_query($sql);
}
//echo $sql;
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=weight\" />บันทึกข้อมูลเข้าไปแล้ว รอสักครู่...";

?>