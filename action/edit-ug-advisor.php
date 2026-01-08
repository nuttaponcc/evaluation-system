<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
//header("Location: ../index.php");
//exit();
}
include"../tools/connect-eval.php";
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal= intval( $_POST['goal']);
$name=$_POST['name'];

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE`undergraduate-advisor` SET `name`='$name',`week`='$week',`workload`='$workload',`multiplier`='$multiplier' WHERE  `undergraduate-advisor`.`id`='$id' ";
$result = mysql_query($sql);

if(!empty($file)){
$ext=strtolower(end(explode('.', $file_name)));


$filename="undergraduate-advisor".$id. "." .$ext;
copy($file,"../files/$filename");

$sql="update  `undergraduate-advisor` set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval1\" />แก้ไขข้อมูลเรียบร้อยแล้ว รอสักครู่...";

?>