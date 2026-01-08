<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
//header("Location: ../index.php");
//exit();
}
include"../tools/connect-eval.php";
$id=$_POST['id'];
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal= intval( $_POST['goal']);

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE`rm` SET `courseid`='$course',`week`='$week',`workload`='$workload',`multiplier`='$multiplier',`gold`='$goal' WHERE `rm`.`id`='$id' ";
$result = mysql_query($sql);
if(!empty($file)){
//echo $sql;
$ext=strtolower(end(explode('.', $file_name)));


$filename="rm".$id. "." .$ext;
copy($file,"../files/$filename");

$sql="update  rm set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval1\" />แก้ไขข้อมูลเรียบร้อยแล้ว รอสักครู่...";

?>