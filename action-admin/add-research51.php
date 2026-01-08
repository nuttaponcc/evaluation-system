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
echo "<meta http-equiv=\"Refresh\" content=\"3;URL=../index.php?madmin=eval&id=$userid#2\" /><font color=\"#ff0000\"  >ระบบยังไม่อนุญาตให้มีการเพิ่มเติม ลบ หรือแก้ไขข้อมูล</font>";
exit();
}

         $userid=$_GET['userid'];
$course=$_POST['course'];
$week=$_POST['week'];
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal=$_POST['goal'];
$name=$_POST['name'];
$tname="research51";
$percent=round($_POST['percent'],2);

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

$session_user_id= $_SESSION[session_user_id];
$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

$sql="INSERT INTO `".$tname."` VALUES(NULL,'$userid','$multiplier',0,'','$date_today','$year','$name','','','','$percent')";
$result = mysql_query($sql);


$sql="select max(id) from  `".$tname."` ";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$id_max=$r[0];


if(!empty($file)){
$ext=strtolower(end(explode('.', $file_name)));

$filename="research511-".$id_max. "." .$ext;
copy($file,"../files/$filename");

$sql="update  research51 set  filename='$filename' where id='$id_max' ";
$result = mysql_query($sql);
}


if(!empty($file2)){
//echo $sql;
$ext=strtolower(end(explode('.', $file2_name)));

$filename2="research512-".$id_max. "." .$ext;
copy($file,"../files/$filename2");

$sql="update  research51 set  filename2='$filename2' where id='$id_max' ";
$result = mysql_query($sql);

}


if(!empty($file3)){
//echo $sql;
$ext=strtolower(end(explode('.', $file3_name)));

$filename3="research513-".$id_max. "." .$ext;
copy($file3,"../files/$filename3");

$sql="update  research51 set  filename3='$filename3' where id='$id_max' ";
$result = mysql_query($sql);

}


if(!empty($file4)){
//echo $sql;
$ext=strtolower(end(explode('.', $file4_name)));

$filename4="research514-".$id_max. "." .$ext;
copy($file,"../files/$filename4");

$sql="update  research51 set  filename4='$filename4' where id='$id_max' ";
$result = mysql_query($sql);

}

echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?madmin=eval&id=$userid#2\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>