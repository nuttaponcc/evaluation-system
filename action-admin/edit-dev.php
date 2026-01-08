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
if ($lock03>0) 
{
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}
$week=$_POST['week'];

$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];
$name=$_POST['name'];
$sname=$_POST['sname'];
$tname="dev";

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE dev SET `subj`='$subj',`gold`='$gold',`method`='$method' ,`ptime`='$ptime' ,`budget`='$budget' ,`status`='$status' WHERE `devid`='$id' ";
//echo $sql;
$result = mysql_query($sql);

echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval-dev\" />แก้ไขข้อมูลเรียบร้อยแล้ว รอสักครู่...";

?>