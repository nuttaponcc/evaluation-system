<?php

$host = "localhost";
$username = "root";
$password = "1234";
$dbname = "evaluation";
$lock1 = 1;
$lock2 = 1;
$lock03 = 1;
$lock003 = 1;
$lock04=1;
$lock05=0;
$lock_att=0;
$goal=0;
$por=1;

$link = mysql_connect($host,$username,$password);
mysql_select_db($dbname,$link);
mysql_query("SET character_set_results=tis620");
mysql_query("SET character_set_client='tis620'");
mysql_query("SET character_set_connection='tis620'");
mysql_query("collation_connection = tis620_thai_ci");
mysql_query("collation_database = tis620_thai_ci");
mysql_query("collation_server = tis620_thai_ci");

	/*				
		if(  $_SESSION[session_user_major] =='1')//คณิตศาสตร์
		{
		    $sql = "SELECT * FROM  `timeline`  where tlid=5 and tlstop>now()";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
				$lock03 = 0;		//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			}
		}			

		if(  $_SESSION[session_user_major] =='2') //ชีววิทยา
		{
		    $sql = "SELECT * FROM  `timeline`  where tlid=8 and tlstop>now()";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
				$lock03 = 0;		//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			}
		}			

		if(  $_SESSION[session_user_major] =='3') //ชีววิทยา
		{
		    $sql = "SELECT * FROM  `timeline`  where tlid=6 and tlstop>now()";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
				$lock03 = 0;		//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			}
		}			

		if(  $_SESSION[session_user_major] =='4') //ฟิสิกส์
		{
		    $sql = "SELECT * FROM  `timeline`  where tlid=7 and tlstop>now()";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
				$lock03 = 0;		//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			}
		}			

		if(  $_SESSION[session_user_major] =='23') //ผู้บริหาร
		{
		    $sql = "SELECT * FROM  `timeline`  where tlid=9 and tlstop>now()";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
				$lock03 = 0;		//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			}
		}			
*/

//หัวหน้าภาค
//if(  $_SESSION[session_user_id] =='365' || $_SESSION[session_user_id] =='205' || $_SESSION[session_user_id] =='240'  || $_SESSION[session_user_id] =='333'   )		$lock03=0;

//ทั้งหมด
		    $sql = "SELECT * FROM  `timeline`  where tlid=3 and tlstart < now() and tlstop > now() ";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
			    $lock03 = 0;			//echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";			
			}

			
			
		    $sql = "SELECT * FROM  `timeline`  where tlid=1 and tlstart < now() and tlstop > now() ";
			$res = mysql_query($sql);
			if($row=mysql_fetch_array($res))
			{
			     $lock1 = 0;			//echo "ระบบยังเปิดรับการกรอบแบบ ป.01 ";			
			}

//				$lock03 = 0;
// กรณีพิเศษ ( $_SESSION[session_user_id] =='577' )||( $_SESSION[session_user_id] =='503' )||( $_SESSION[session_user_id] =='641' )||( $_SESSION[session_user_id] =='601' )||
//if(( $_SESSION[session_user_id] =='482' )||( $_SESSION[session_user_id] =='218' ))		$lock03=0;


$lock2 = 0;
//$lock03 = 1;
//$lock04 = 1;


	    $sql = "SELECT * FROM  `timeline`  where tlid=4 and tlstart < now() and tlstop>now() ";
		$res = mysql_query($sql);
	if( $row=mysql_fetch_array($res))
	{
	    $sql2 = "SELECT * FROM  `staffinfo`  where staffid='".$_SESSION[session_user_id]."' and (m=2 or c=2 or p=2 or  b=2)";
		$res2 = mysql_query($sql2);

	if($row2=mysql_fetch_array($res2))
		{
			//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			$lock04 = 0;
			}else{ 						
			//	echo "ปิดระบบการกรอก แบบ ป.03";
			$lock04 = 1;
		}
	}	
	
	   $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l1=1 and dt>now() ";
		$res = mysql_query($sql);
if ($res) {
   	if( $row=mysql_fetch_array($res))	$lock01=0;
}
if ($res) {
	    $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l3=1 and dt>now() ";
		$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	$lock03=0;
}
if ($res) {
	    $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l2=1 and dt>now() ";
		$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	$lock04=0;
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
			
/*
	if($_SESSION[session_user_id]==569) 
		{
			//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			$lock03 = 0;
			}else{ 						
			//	echo "ปิดระบบการกรอก แบบ ป.03";
			$lock03 = 1;
		}
		
	if(($_SESSION[session_user_id]==240)  || ($_SESSION[session_user_id]==482)) //|| ($_SESSION[session_user_id]==333)
		{
			//	echo "ระบบยังเปิดรับการกรอบแบบ ป.03 ";
			$lock04 = 0;
			}else{ 						
			//	echo "ปิดระบบการกรอก แบบ ป.03";
			$lock04 = 1;
		}
		*/
//$lock03 = 0;	
//			    $lock1 = 0;			

if(!$link) {
echo"<h3>ERROR : ไม่สามารถติดต่อฐานข้อมูลได้</h3>";
exit();
}
$lock1 = 1;	

?>