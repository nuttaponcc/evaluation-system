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
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid#5\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}
$course=$_POST['course'];

$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];
$name=$_POST['name'];
$weight=$_POST['workload'];

$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="UPDATE`other` SET `name`='$name',`weight`='$weight',`multiplier`='$multiplier' WHERE  `other`.`id`='$id' ";
//echo $sql;
$result = mysql_query($sql);


if(!empty($file)){
//echo $sql;
$ext=strtolower(end(explode('.', $file_name)));
$filename="other1-".$id. "." .$ext;
copy($file,"../files/$filename");
$sql="update  other set  filename='$filename' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file2)){
//echo $sql;
$ext=strtolower(end(explode('.', $file2_name)));
$filename2="other2-".$id. "." .$ext;
copy($file2,"../files/$filename2");
$sql="update  other set  filename2='$filename2' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file3)){
//echo $sql;
$ext=strtolower(end(explode('.', $file3_name)));
$filename3="other3-".$id. "." .$ext;
copy($file3,"../files/$filename3");
$sql="update  other set  filename3='$filename3' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file4)){
//echo $sql;
$ext=strtolower(end(explode('.', $file4_name)));
$filename4="other4-".$id. "." .$ext;
copy($file4,"../files/$filename4");
$sql="update  other set  filename4='$filename4' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file5)){
//echo $sql;
$ext=strtolower(end(explode('.', $file5_name)));
$filename5="other5-".$id. "." .$ext;
copy($file5,"../files/$filename5");
$sql="update  other set  filename5='$filename5' where id='$id' ";
$result = mysql_query($sql);
}

if(!empty($file6)){
//echo $sql;
$ext=strtolower(end(explode('.', $file6_name)));
$filename6="other6-".$id. "." .$ext;
copy($file6,"../files/$filename6");
$sql="update  other set  filename6='$filename6' where id='$id' ";
$result = mysql_query($sql);
}

echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#5\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>