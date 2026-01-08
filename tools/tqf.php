<?php

$host = "localhost";
$username = "root";
$password = "sciscience138";
$dbname = "scitqfdb";
$link = mysql_connect($host,$username,$password);
mysql_select_db($dbname,$link);
mysql_query("SET character_set_results=tis620");
mysql_query("SET character_set_client='tis620'");
mysql_query("SET character_set_connection='tis620'");
mysql_query("collation_connection = tis620_thai_ci");
mysql_query("collation_database = tis620_thai_ci");
mysql_query("collation_server = tis620_thai_ci");

if(!$link) {
echo"<h3>ERROR : ไม่สามารถติดต่อฐานข้อมูลได้</h3>";
exit();
}


?>