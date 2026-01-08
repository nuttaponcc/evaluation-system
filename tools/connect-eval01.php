<?php

$host = "localhost";
$username = "root";
$password = "1234";
$dbname = "evaluation1";
//$dbname = "evaldb01";
$lock1 = 1;
$lock2 = 1;
$lock03 = 1;
$lock003 = 1;
$lock04=1;
$lock05=0;
$lock_att=0;
$por=1;

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


	
	      $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l1=1 and dt>now() ";
		$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	$lock1=0;

	    $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l1=1 and dt>now() ";
		$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	$lock03=0;

	    $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l2=1 and dt>now() ";
		$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	$lock04=0;

		    $sql = "SELECT * FROM  `timeline`  where tlid=2 and tlstart < now() and tlstop > now() ";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
			    $lock1 = 0;			//echo "ระบบยังเปิดรับการกรอบแบบ ป.01 ";			
			}

				$query = "SELECT * FROM `coefficient` where cid <6  ORDER BY `coefficient`.`cid` ASC";
				$result = mysql_query($query);
				$i=1;
		 while ($row = mysql_fetch_assoc($result)) {
				$coe[$i][1]=$row['c1'];
				$coe[$i][2]=$row['c2'];
				$coe[$i][3]=$row['c3'];
				$coe[$i][4]=$row['c4'];
				$coe[$i][5]=$row['c5'];
				$coe[$i][6]=$row['c6'];
				$coe[$i][7]=$row['c7'];
				$coe[$i][8]=$row['c8'];
				$coe[$i][9]=$row['c9'];
				$i++;
		}					
	$lock1=1;
?>