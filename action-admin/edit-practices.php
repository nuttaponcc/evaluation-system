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
$week=round($_POST['week'],2);
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];


$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];

$file2=$_FILES['file2']['tmp_name'];
$file2_name=$_FILES['file2']['name'];
$file2_size=$_FILES['file2']['size'];
$file2_type=$_FILES['file2']['type'];

$file3=$_FILES['file3']['tmp_name'];
$file3_name=$_FILES['file3']['name'];
$file3_size=$_FILES['file3']['size'];
$file3_type=$_FILES['file3']['type'];

$file4=$_FILES['file4']['tmp_name'];
$file4_name=$_FILES['file4']['name'];
$file4_size=$_FILES['file4']['size'];
$file4_type=$_FILES['file4']['type'];
$userid=$_GET['userid'];

$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE`practices` SET `courseid`='$course',`week`='$week',`workload`='$workload',`multiplier`='$multiplier' WHERE `practices`.`id`='$id' ";
$result = mysql_query($sql);

if(!empty($file)){
//echo $sql;
$ext=strtolower(end(explode('.', $file_name)));
$filename="practices1-".$id. "." .$ext;
copy($file,"../files/$filename");
$sql="update  practices set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file2)){
//echo $sql;
$ext=strtolower(end(explode('.', $file2_name)));
$filename2="practices2-".$id. "." .$ext;
copy($file2,"../files/$filename2");
$sql="update  practices set  filename2='$filename2' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file3)){
//echo $sql;
$ext=strtolower(end(explode('.', $file3_name)));
$filename3="practices3-".$id. "." .$ext;
copy($file3,"../files/$filename3");
$sql="update  practices set  filename3='$filename3' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file4)){
//echo $sql;
$ext=strtolower(end(explode('.', $file4_name)));
$filename4="practices4-".$id. "." .$ext;
copy($file4,"../files/$filename4");
$sql="update  practices set  filename4='$filename4' where id='$id' ";
$result = mysql_query($sql);
}


echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#1\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>