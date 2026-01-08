<?php
include "tools/connect.php";
$date_today=date("Y-m-d");
$time_today=date("H:i:s");

    $filedSQL = "user_id,group_id, user_name1, user_major, user_ location, user_name, user_password, user_email, user_pictures,user_date, user_time";
    $dataSQL = "'','$grouplevel[$i]', '$user_name1', '$usermajor[$i]', '$level[$i]', '$user_name', '$user_password',
	'$user_email','$in_image','$date_today','$time_today'";
    $sqlx = "insert into scdb_user (".$filedSQL.") values (".$dataSQL.")";
    mysql_select_db($dbname,$link);
 echo"<h3> เพิ่มข้อมูลเรียบร้อยแล้วครับ</h3>";
 echo"$date_today";
echo"$time_today";
?>