<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: ../index.php");
exit();
}

include"../tools/connect-eval.php";

$id=$_POST['id'];
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];

$filename=$_POST['filename'];
$filename2=$_POST['filename2'];
$filename3=$_POST['filename3'];
$filename4=$_POST['filename4'];

$userid=$_GET['userid'];

$session_user_id= $_SESSION[session_user_id];

$sql="DELETE  From `practices`  WHERE `practices`.`id`='$id' ";
$result = mysql_query($sql);

if(!empty($filename)){
$filename="../files/$filename";
unlink($filename);
}
if(!empty($filename2)){
$filename2="../files/$filename2";
unlink($filename2);
}
if(!empty($filename3)){
$filename3="../files/$filename3";
unlink($filename3);
}
if(!empty($filename4)){
$filename4="../files/$filename4";
unlink($filename4);
}

echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#1\" />ลบข้อมูลเรียบร้อยแล้ว รอสักครู่...";
?>