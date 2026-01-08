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
$weight=$_POST['workload'];

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

$file5=$_FILES['file5']['tmp_name'];
$file5_name=$_FILES['file5']['name'];
$file5_size=$_FILES['file5']['size'];
$file5_type=$_FILES['file5']['type'];

$file6=$_FILES['file6']['tmp_name'];
$file6_name=$_FILES['file6']['name'];
$file6_size=$_FILES['file6']['size'];
$file6_type=$_FILES['file6']['type'];

$file7=$_FILES['file7']['tmp_name'];
$file7_name=$_FILES['file7']['name'];
$file7_size=$_FILES['file7']['size'];
$file7_type=$_FILES['file7']['type'];

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


if(!empty($file7)){
//echo "***************************";
$ext=strtolower(end(explode('.', $file7_name)));
$filename7="other7-".$id. "." .$ext;
copy($file7,"../files/$filename7");
$sql="update  other set  filename7='$filename7' where  id='$id' ";
$result = mysql_query($sql);

}


echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php?menu=eval5\" />แก้ไขข้อมูลเรียบร้อยแล้ว รอสักครู่...";

?>