<?php
session_start();
if( $_SESSION[session_log]<>session_id())
{
header("Location: ../index.php");
exit();
}
//include"../tools/connect-eval.php";

$session_user_id= $_SESSION[session_user_id];

include"tools/connect-eval.php";
$Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$_SESSION[session_user_id];
$Mresult = mysql_query($Mquery);
$Mrow = mysql_fetch_array($Mresult);

 		if(!( $Mrow ['p']) )
		{  
				header("Location: http://202.28.32.130/evaluation/iindex.php");
				exit();		
				echo "ไม่สามารถให้งานระบบได้";
		}

$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

	    $query2 = "SELECT * FROM  `staffinfo`  where staffinfo.staffmajor='ภาควิชาฟิสิกส์' or  staffinfo.staffid='560' or  staffinfo.staffid='365' or  staffinfo.staffid='513'  ORDER BY staffname asc ";
		$result2 = mysql_query($query2);
		
		echo "<table border=0 cellpadding=10 ><tr><td align=center>";
		echo "<strong>ตรวจสอบข้อมูลของบุคลากรภาควิชาฟิสิกส์</strong><br><br>";
		echo "<table border=1 cellpadding=5 >";
		$i=1;
 if($Mrow ['p']==2)
 {
  $str ="<td align=cenetr>คะแนนดิบ<br>ด้านการสอน</td><td align=center>คะแนนดิบ<br>ด้านวิจัย</td><td align=center>คะแนนดิบ<br>ด้านการบริการ<br>วิชาการ</td><td align=center>คะแนนดิบ<br>ด้านทำนุบำรุงศิลปะ<br>และวัฒนธรรม</td><td align=center>คะแนนดิบด้าน<br>ช่วยการบริหาร<br>จัดการและอื่น ๆ</td>";
  }else{
  $str="";
  }
  
  echo "<tr><td align=center>ลำดับที่</td><td align=center> ชื่อ </td><td align=center> </td><td align=center> </td><td align=center> </td><td align=center> </td><td align=center>ดูข้อมูลและ<br>หลักฐาน</td>$str</tr>";

		 while ($row2 = mysql_fetch_array($result2))
		 {
/************เริ่มคะแนนดิบ***********/
 if($Mrow ['p']<2)
 {
  $str="";
  }else{
	
	 
/***************************  ด้านการสอน *********************/		 
    $sum=0;
   	$query = "SELECT * FROM `workload`,`course`,`lectures`  where lectures.courseid=course.id and lectures.workload=workload.id and  userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
        }		 
		 
   	$query = "SELECT * FROM `workload`,`course`,`practices`  where practices.courseid=course.id and practices.workload=workload.id and  userid='".$row2['staffid']."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['credit']-$row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
}

   	$query = "SELECT * FROM `workload`,`course`,`coordinator`  where coordinator.courseid=course.id and coordinator.workload=workload.id and  userid='".$row2['staffid']."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['credit']*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
}
  	$query = "SELECT * FROM `workload`,`internships`  where  internships.workload=workload.id and  userid='".$row2['staffid']."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 if($row['score']>0)
	 {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
		}else{
	 		$n=$row['amount']*$row['week']*$row['multiplier'];		
			$sc=$row['amount'];
		}	
	 $sum=$sum+$n;
	 }
	 
	 $query = "SELECT * FROM `workload`,`undergraduate-advisor`  where  `undergraduate-advisor`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	 }
	
	   	$query = "SELECT * FROM `workload`,`graduate-advisor`  where  `graduate-advisor`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	 }
	 
	   	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	 }
	   	$query = "SELECT * FROM `workload`,`academic-advisor`  where  `academic-advisor`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	 }
	    	$query = "SELECT * FROM `workload`,`activity-advisor`  where  `activity-advisor`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
}

   	$query = "SELECT * FROM `workload`,`seniorproject`  where  `seniorproject`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	}	  	 
	
	   	$query = "SELECT * FROM `course`,`rm`  where rm.courseid=course.id and  userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=15;
	 $sum=$sum+$n;
	 }
/*************************  วิจัย ****************************************/	 
     $sum2=0;
	 $buf="";
   	$query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
}

  	$query = "SELECT * FROM `research4`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `research51`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
}

echo   	$query = "SELECT * FROM `research52`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";

	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `research53`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `research54`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
}				 
/******************ด้านการบริการวิชาการ****************/
$sum3=0;
$query = "SELECT * FROM `workload`,`service1`  where  `service1`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
}	 

  	$query = "SELECT * FROM `workload`,`service2`  where  `service2`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
}

   	$query = "SELECT * FROM `workload`,`service3`  where  `service3`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
	}
/**********************ด้านทำนุบำรุงศิลปะและวัฒนธรรม********************/
$sum4=0;
	$query = "SELECT * FROM `workload`,`culture`  where  `culture`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum4=$sum4+$n;
}

/******************* ด้านช่วยการบริหารจัดการและอื่น ๆ ***********************/
$sum5=0;
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
}

   	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	}
	
	   	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	}
	
	     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	}
	
	  	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	}
	
	     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=22 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	 }
	 
	    	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=23 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
	}
	
/******************** แสดงผลคะแนนดิบ  *************/

 $str ="<td align=cenetr>$sum</td><td align=center>$sum2</td><td align=center>$sum3</td><td align=center>$sum4</td><td align=center>$sum5</td><td><a href=\"fpdf/apdf2.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.02</a></td><td align=center><a href=\"index.php?menu=eval8&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />ประเมินพฤติกรรม</a></td>";
  

/***********จบคะแนนดิบ************/
		 
}		 
		         echo "<tr><td align=center>".$i++."</td><td >".$row2['staffposition']." ".$row2 ['staffname']."</td><td><a href=\"fpdf/acover.php?id=".$row2['staffid']."\"  target=\"_blank\">ปก</a></td><td><a href=\"fpdf/apdf.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.01</a></td><td><a href=\"fpdf/apdf3.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.03</a></td><td><a href=\"fpdf/apdf4.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.04</a></td><td><a href=\"index.php?menu=sf&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />หลักฐาน</a>$str </td>
</tr>";
		 }
		 echo"</table>";
		 echo"</td></tr></table>";

?>