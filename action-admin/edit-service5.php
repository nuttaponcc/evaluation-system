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
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid#3\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}
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

$sql="UPDATE  `service5` SET `name`='$name',`weight`='$workload',`multiplier`='$multiplier' WHERE  `service5`.`id`='$id' ";
$result = mysql_query($sql);

//echo $sql;
if(!empty($file)){
$ext=strtolower(end(explode('.', $file_name)));
$filename="service5".$id. "." .$ext;
copy($file,"../files/$filename");

$sql="update  `service5` set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}
$userid=$_GET['userid'];

echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#3\" />แก้ไขข้อมูลเรียบร้อยแล้ว รอสักครู่...";

?>