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
$week=round($_POST['week'],2);
$workload=$_POST['workload'];
$multiplier=$_POST['multiplier'];
$goal= intval( $_POST['goal']);

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

$sql="INSERT INTO practices VALUES(NULL,'$session_user_id','$course','$week','$workload','$multiplier',0,'','$date_today','$year','','','')";
$result = mysql_query($sql);
if(!empty($file)){
//echo $sql;
$ext=strtolower(end(explode('.', $file_name)));

$sql="select max(id) from  practices";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$id_max=$r[0];

$filename="practices1-".$id_max. "." .$ext;
copy($file,"../files/$filename");

$sql="update  practices set  filename='$filename' where id='$id_max' ";
$result = mysql_query($sql);
}



if(!empty($file2)){
//echo $sql;
$ext=strtolower(end(explode('.', $file2_name)));

$filename2="practices2-".$id_max. "." .$ext;
copy($file,"../files/$filename2");

$sql="update  practices set  filename2='$filename2' where id='$id_max' ";
$result = mysql_query($sql);

}


if(!empty($file3)){
//echo $sql;
$ext=strtolower(end(explode('.', $file3_name)));

$filename3="practices3-".$id_max. "." .$ext;
copy($file3,"../files/$filename3");

$sql="update  practices set  filename3='$filename3' where id='$id_max' ";
$result = mysql_query($sql);

}


if(!empty($file4)){
//echo $sql;
$ext=strtolower(end(explode('.', $file4_name)));

$filename4="practices4-".$id_max. "." .$ext;
copy($file,"../files/$filename4");

$sql="update  practices set  filename4='$filename4' where id='$id_max' ";
$result = mysql_query($sql);

}

echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval1\" />เพิ่มข้อมูลเข้าไปแล้ว รอสักครู่...";

?>