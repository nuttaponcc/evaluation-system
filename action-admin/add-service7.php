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
if ($lock04>0) 
{
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid#3\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}

$userid=$_GET['userid'];
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$amount=$_POST['amount'];
$name=$_POST['name'];
$weight=$_POST['workload'];
$tname="service7";

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

echo $sql="INSERT INTO `".$tname."` VALUES(NULL,'$userid','$multiplier','$amount','','$date_today','$year','$name',0)";

$result = mysql_query($sql);
if(!empty($file)){
//echo $sql;
$ext=strtolower(end(explode('.', $file_name)));

$sql="select max(id) from  `".$tname."` ";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$id_max=$r[0];

$filename="$tname".$id_max. "." .$ext;
copy($file,"../files/$filename");

$sql="update  `".$tname."` set  filename='$filename' where id='$id_max' ";
$result = mysql_query($sql);
}
echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#3\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";
?>