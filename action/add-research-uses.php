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

//$sql="INSERT INTO `".$tname."` VALUES('','$session_user_id','$multiplier',0,'','$date_today','$year','$name','','','','','','$workload')";
 $sql="INSERT INTO `".$tname."`  (userid, multiplier,gold,date,year,name,workload,budget)  VALUES('".$_SESSION[session_user_id]."','$multiplier',0,'$date_today','$year','$name','$workload',0)";

$result = mysql_query($sql);


$sql="select max(id) from  `".$tname."` ";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$id_max=$r[0];


if(!empty($file)){
$ext=strtolower(end(explode('.', $file_name)));

$filename="research-uses1-".$id_max. "." .$ext;
copy($file,"../files/$filename");

$sql="update   `".$tname."`   set  filename='$filename' where id='$id_max' ";
$result = mysql_query($sql);
}


if(!empty($file2)){
//echo $sql;
$ext=strtolower(end(explode('.', $file2_name)));

$filename2="research-uses2-".$id_max. "." .$ext;
copy($file,"../files/$filename2");

$sql="update   `".$tname."`   set  filename2='$filename2' where id='$id_max' ";
$result = mysql_query($sql);

}


echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval2\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>