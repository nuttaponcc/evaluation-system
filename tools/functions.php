<?php
function displaydate($x){
	$date_m=array("January","February","March","April","May","June","July","August","September","October","Novembre","December");
	
	$date_array=explode("-",$x);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$date_m[$m];
	$displaydate="$d $m $y";
	return  $displaydate;
}

function datethai($date,$tmp){

	$day=substr("$date",8,2);
	$month=substr("$date",5,2);
	$month=(int)$month-1;
	$year=substr("$date",0,4);
	$year=$year+543;
if ($tmp){	
	$thaimonth=array("มกราคม","กุมภาพันธ์ ","มีนาคม"," เมษายน ","พฤษภาคม ","มิถุนายน"," กรกฏาคม ","สิงหาคม ","กันยายน "," ตุลาคม  ","พฤศจิกายน "," ธันวาคม");
	$month=	$thaimonth[$month];
	return $day."    ".$month."  ".$year;
}	
else
{
	$thaimonth=array("01","02","03","04","05","06","07","08","09","10","11","12");	$month=	$thaimonth[$month];
	return $day." / ".$month." / ".$year;
}
};

function checkmail($addr) {
	if (!eregi_replace("^[a-zA-Z0-9_]+@[a_aA-Z0-9\-\.]+$",$addr)) return false;
	return true;
};

function permissuser($uid,$fid,$action){// $uid= group_id, $fid = $user_app_id, $action = $aut_??
$sql="select * from scdb_authority  where group_id='$uid' and user_app_id='$fid' and $action = 1";
$rs=mysql_query($sql);
$n=mysql_num_rows($rs);
if($n > 0) return true;
else return false;
};
?>