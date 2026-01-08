<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
//header("Location: ../index.php");
//exit();
}
include"../tools/connect-eval.php";
$id=$_POST['id'];
$beh11=$_POST['beh11'];
$beh12=$_POST['beh12'];
$beh13=$_POST['beh13'];
$beh14=$_POST['beh14'];
$beh15=$_POST['beh15'];
$beh21=$_POST['beh21'];
$beh22=$_POST['beh22'];
$beh23=$_POST['beh23'];
$beh24=$_POST['beh24'];
$beh25=$_POST['beh25'];
$beh26=$_POST['beh26'];
$ac=$_POST['ac'];

$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

if ($ac=="add")
{
echo		$sql="INSERT INTO `behavior2` VALUES(NULL,'$id','$beh11','$beh12','$beh13','$beh14','$beh15','$beh21','$beh22','$beh23','$beh24','$beh25','$beh26','$year','','$date_today')";
		$result = mysql_query($sql);
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?menu=eval6\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";
		
}else{
$sql="
UPDATE `behavior2` SET 
`beh11` = '$beh11',
`beh12` = '$beh12',
`beh13` = '$beh13',
`beh14` = '$beh14',
`beh15` = '$beh15',
`beh21` = '$beh21',
`beh22` = '$beh22',
`beh23` = '$beh23',
`beh24` = '$beh24',
`beh25` = '$beh25',
`beh26` = '$beh26' 
WHERE `userid` =".$id;
$result = mysql_query($sql);
//echo $sql;
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php\" />แก้ไขข้อมูลเข้าไปแล้ว รอสักครู่...";
}

?>