<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: ../index.php");
exit();
}

include"../tools/connect-eval.php";

$userid=$_GET['userid'];
//echo "lock1=$lock1 lock03=$lock03  lock04=$lock04" ;
if ($lock04>0) 
{
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid#2\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}


$id=$_POST['id'];
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];

$filename=$_POST['filename'];
$session_user_id= $_SESSION[session_user_id];

$sql="DELETE  From `research51`  WHERE `research51`.`id`='$id' ";
$result = mysql_query($sql);
if(!empty($filename)){
$filename="../files/$filename";
unlink($filename);
}
//echo $sql;
$userid=$_GET['userid'];
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#2\" />ลบข้อมูลเรียบร้อยแล้ว รอสักครู่...";


?>