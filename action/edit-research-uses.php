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
$budget=$_POST['budget'];
$tname="research_uses";

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];


$file2=$_FILES['file2']['tmp_name'];
$file2_name=$_FILES['file2']['name'];
$file2_size=$_FILES['file2']['size'];
$file2_type=$_FILES['file2']['type'];


$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE   `".$tname."`   SET `name`='$name',`multiplier`='$multiplier',`workload`='$workload'  WHERE  `id`='$id' ";
//echo $sql;
$result = mysql_query($sql);

if(!empty($file)){
$ext=strtolower(end(explode('.', $file_name)));
$filename="research-uses1-".$id. "." .$ext;
copy($file,"../files/$filename");
$sql="update   `".$tname."` set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file2)){
//echo $sql;
$ext=strtolower(end(explode('.', $file2_name)));
$filename2="research-uses2-".$id. "." .$ext;
copy($file2,"../files/$filename2");
$sql="update    `".$tname."`  set  filename2='$filename2' where id='$id' ";
$result = mysql_query($sql);
}


echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval2\" />แก้ไขข้อมูลเรียบร้อยแล้ว รอสักครู่...";

?>