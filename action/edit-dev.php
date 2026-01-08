<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: ../index.php");
exit();
}
include"../tools/connect-eval.php";
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal= intval( $_POST['goal']);
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