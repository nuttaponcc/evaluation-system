<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: ../index.php");
exit();
}

include"../tools/connect-eval.php";

if ($lock03>0) 
{
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?menu=eval1\" /><font color=\"#ff0000\"  > ระบบถูกล็อค ไม่สามารถใช้งานส่วนนี้ได้ </font>";
exit();
}


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

$sql="INSERT INTO `undergraduate-advisor` VALUES(NULL,'$session_user_id','$week','$workload','$multiplier',0,'','$date_today','$year','$name')";
$result = mysql_query($sql);
if(!empty($file)){
//echo $sql;
$ext=strtolower(end(explode('.', $file_name)));

$sql="select max(id) from  `undergraduate-advisor` ";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$id_max=$r[0];

$filename="undergraduate-advisor".$id_max. "." .$ext;
copy($file,"../files/$filename");

$sql="update  `undergraduate-advisor` set  filename='$filename' where id='$id_max' ";
$result = mysql_query($sql);
}
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval1\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>