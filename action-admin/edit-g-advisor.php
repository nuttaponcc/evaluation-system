<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
//header("Location: ../index.php");
//exit();
}
include"../tools/connect-eval.php";

$userid=$_GET['userid'];
//echo "lock1=$lock1 lock03=$lock03  lock04=$lock04" ;
if ($lock04>0) 
{
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid#1\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}
$course=$_POST['course'];

$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];
$name=$_POST['name'];

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE`graduate-advisor` SET `name`='$name',`week`='$week',`workload`='$workload',`multiplier`='$multiplier' WHERE  `graduate-advisor`.`id`='$id' ";
$result = mysql_query($sql);
if(!empty($file)){

$ext=strtolower(end(explode('.', $file_name)));


$filename="graduate-advisor".$id. "." .$ext;
copy($file,"../files/$filename");

$sql="update  `graduate-advisor` set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#1\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>