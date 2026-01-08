<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: ../index.php");
exit();
}

include"../tools/connect-eval.php";

if ($lock03>1) 
{
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?menu=eval1\" /><font color=\"#ff0000\"  > ระบบถูกล็อค ไม่สามารถใช้งานส่วนนี้ได้ </font>";
exit();
}


$id=$_POST['id'];
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal= intval( $_POST['goal']);

$filename=$_POST['filename'];
$session_user_id= $_SESSION[session_user_id];

$sql="DELETE  From `dev`  WHERE  `devid`='$id' ";
$result = mysql_query($sql);
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval-dev\" />ลบข้อมูลเรียบร้อยแล้ว รอสักครู่...";
?>