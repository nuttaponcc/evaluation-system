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

 		if(!( $Mrow ['b']))
		{  
				header("Location: http://202.28.32.130/evaluation/iindex.php");
				exit();		
				echo "ไม่สามารถให้งานระบบได้";
		}

$date_today=date( 'Y-m-d H:i:s' ); 
$year=date("Y");

	    $query2 = "SELECT * FROM  `staffinfo`  where staffinfo.staffmajor='ภาควิชาชีววิทยา'    or   staffinfo.staffid='240' or  staffinfo.staffid='500'  ORDER BY staffname asc ";
		$result2 = mysql_query($query2);
		
		echo "<table border=0 cellpadding=10 ><tr><td align=center>";
		echo "<strong>ตรวจสอบข้อมูลของบุคลากรภาควิชาชีววิทยา</strong><br><br>";
		echo "<table border=1 cellpadding=5 >";
		$i=1;
 if($Mrow ['b']==2)
 {
  $str ="<td align=cenetr>คะแนนดิบ<br>ด้านการสอน</td><td align=center>คะแนนดิบ<br>ด้านวิจัย</td><td align=center>คะแนนดิบ<br>ด้านการบริการ<br>วิชาการ<br>(3.1-3.3)(3.4)</td><td align=center>คะแนนดิบ<br>ด้านทำนุบำรุงศิลปะ<br>และวัฒนธรรม</td><td align=center>คะแนนดิบด้าน<br>ช่วยการบริหาร<br>จัดการและอื่น ๆ<br>(5.1)
(5.2-5.6)</td><td> </td><td> </td><td> </td><td align=center> </td><td>30% </td><td>รวม 70%+30% </td>";
  }else{
  $str="";
  }
  
  echo "<tr><td align=center>ลำดับที่</td><td align=center> ชื่อ </td><td align=center> </td><td align=center> </td><td align=center> </td><td align=center>ดูข้อมูลและ<br>หลักฐาน</td>$str</tr>";

		 while ($row2 = mysql_fetch_array($result2))
		 {
/************เริ่มคะแนนดิบ***********/
 if($Mrow ['b']<2)
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
	 $n=$row['score']*$row['week']*$row['multiplier'];
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
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	 }
	 
	   	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
 	 if($row['workload']==34) $week=1 ; else $week=$row['week'];
	 		$n=$row['score']*$week*$row['multiplier'];
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
	 		$n=$row['score']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	}	  	
/*
 $query = "SELECT * FROM `workload`,`course`,`adjunct`  where adjunct.courseid=course.id and adjunct.workload=workload.id and  userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
}

   	$query = "SELECT * FROM `workload`,`is-advisor`  where  `is-advisor`.`workload`=`workload`.`id` and  `userid`='".$row2['staffid']."' 	ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
}
	*/
				 if($row2['staffmajor'] =='คณะผู้บริหาร') $resum=($sum*100)/(180*5); else   $resum=($sum*100)/(240*5);
				        $score1=round($resum,2); 

      	$ql = "SELECT * FROM `level` where idlevel=1";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
  			             $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade1=0;
							 }elseif($resum<$g2){
							    $grade1=1;
							 }elseif($resum<$g3){
							    $grade1=2;
							 }elseif($resum<$g4){
							    $grade1=3;
							 }elseif($resum<$g5){
							    $grade1=4;
							 }else{
							    $grade1=5;
							 }
 
	
   	$query = "SELECT * FROM `course`,`rm`  where rm.courseid=course.id and  userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=15;
	// $sum=$sum+$n;
	 }
/*************************  วิจัย ****************************************/	 
     $sum2=0;
	 $buf="";
 	$query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=".$row2['staffid']." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][1];
	        $sum2=$sum2+$n;
}

/*
   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*0;
	        $sum2=$sum2+$n;
}
*/
   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][2];
	        $sum2=$sum2+$n;
}
/*
  	$query = "SELECT * FROM `research4`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*0;
	        $sum2=$sum2+$n;
}
*/

   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`   and `userid`='".$row2['staffid']."'  ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[2][3];
	        $sum2=$sum2+$n;
}
   	$query = "SELECT * FROM `research51`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;			
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `research52`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;	
	        $sum2=$sum2+$n;
}

   	$query = "SELECT * FROM `research53`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$coe[2][4]*$row['percent']/100;
	        $sum2=$sum2+$n;
}


				 //if($row2 ['staffposition']=='รองศาสตราจารย์') $resum=($sum2*100)/(1*5); else   
				        $resum=($sum2*100)/(1*5);						
				        $score2=round($resum,2); 

      	$ql = "SELECT * FROM `level` where idlevel=2";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
  			             $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade2=0;
							 }elseif($resum<$g2){
							    $grade2=1;
							 }elseif($resum<$g3){
							    $grade2=2;
							 }elseif($resum<$g4){
							    $grade2=3;
							 }elseif($resum<$g5){
							    $grade2=4;
							 }else{
							    $grade2=5;
							 }						
							 
/******************ด้านการบริการวิชาการ****************/
$t=">>";
$sum3=0;

  	$query = "SELECT * FROM `workload`,`service4`  where  `service4`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];
	 $sum3=$sum3+$n;
	 $t="$t+$n";
}

  	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
	 $t="$t+$n";
}

  	$query = "SELECT * FROM `workload`,`service1`  where  `service1`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];
	 $sum3=$sum3+$n;
	 $t="$t+$n";
}

 $sum31=0;
   	$query = "SELECT * FROM `service3`  where   userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 $n=$row['amount']*$row['multiplier'];
	 $sum31=$sum31+$n;
	 $t="$t+$n";
	}
	
   
				        $resum=($sum3*100)/(5);
				        $resum=(($sum3*100)/(2*5))+(($sum31*100)/(15*5));
				        $score3= round($resum,2); 


      	$ql = "SELECT * FROM `level` where idlevel=3";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
  			             $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade3=0;
							 }elseif($resum<$g2){
							    $grade3=1;
							 }elseif($resum<$g3){
							    $grade3=2;
							 }elseif($resum<$g4){
							    $grade3=3;
							 }elseif($resum<$g5){
							    $grade3=4;
							 }else{
							    $grade3=5;
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
				        $resum=($sum4*100)/(5);
				        $score4= round($resum,2); 

      	$ql = "SELECT * FROM `level` where idlevel=4";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
  			             $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade4=0;
							 }elseif($resum<$g2){
							    $grade4=1;
							 }elseif($resum<$g3){
							    $grade4=2;
							 }elseif($resum<$g4){
							    $grade4=3;
							 }elseif($resum<$g5){
							    $grade4=4;
							 }else{
							    $grade4=5;
							 }						

/******************* ด้านช่วยการบริหารจัดการและอื่น ๆ ***********************/
$sum5=0;
$sum51=0;
$sum52=0;
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][1];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;

}
	$sum51=0;
   	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][2];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
			 $sum51=$sum51+$n;
			 
	}
	   	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][3];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
			 
	}
	
	     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][4];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
			 
	}
	
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$row2['staffid']."'  ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][5];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum52=$sum52+$n;
	 }	

  	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier']*$coe[5][6];
	 $sum51=$sum51+$n;
}
	 
/*	
	  	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	}
	
	     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=22 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	 }
	 
	    	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=23 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
	}
	*/
									if ($sum52>0.1) $sum51=$sum51+0.1; else $sum51=$sum51+$sum52;

					        $resum=($sum5*100)/(10);
				        $resum=(($sum5*100)/(10))+(($sum51*100)/(5));					
				        $score5= round($resum,2); 


      	$ql = "SELECT * FROM `level` where idlevel=5";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
  			             $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade5=0;
							 }elseif($resum<$g2){
							    $grade5=1;
							 }elseif($resum<$g3){
							    $grade5=2;
							 }elseif($resum<$g4){
							    $grade5=3;
							 }elseif($resum<$g5){
							    $grade5=4;
							 }else{
							    $grade5=5;
							 }						

/******************** แสดงผลคะแนนดิบ  *************/

				$query = "SELECT * FROM `weight`,`wselect` where  weight.id=wselect.wtid and wselect. userid='".$row2['staffid']."'  ";
				$result = mysql_query($query);
				if($row = mysql_fetch_assoc($result))
				{

				}else{
				$query = "SELECT * FROM `weight` where 1 limit 1";
				$result = mysql_query($query);
				$row = mysql_fetch_assoc($result);
				}
				$style=$row['wtid'];
				
				$weight1=$row['w1'];
				$weight2=$row['w2'];
				$weight3=$row['w3'];
				$weight4=$row['w4'];
				$weight5=$row['w5'];
				if($row['status'])$percent=50; else $percent=70;
				
$Tlevel=($grade1*$weight1+$grade2*$weight2+$grade3*$weight3+$grade4*$weight4+$grade5*$weight5)/100;
$p1=$Tlevel/5;
$p2=$p1*$percent;

$beh=0;
$beh1=0;

$sql2 = "SELECT * FROM `behavior2` where   userid  = '".$row2['staffid']."' ";
$res2 = mysql_query($sql2);
if($r2 = mysql_fetch_array($res2))
{

$level[1]=0;
$level[2]=0;
$level[3]=0;
$level[4]=0;
$level[5]=0;

$level[$r2['beh11']]++;
$level[$r2['beh12']]++;
$level[$r2['beh13']]++;
$level[$r2['beh14']]++;
$level[$r2['beh15']]++;

$level[$r2['beh21']]++;
$level[$r2['beh22']]++;
$level[$r2['beh23']]++;
$level[$r2['beh24']]++;
$level[$r2['beh25']]++;
$level[$r2['beh26']]++;

$beh1=round(($level[5]*3+$level[4]*2+$level[3])/33,2) ;
$beh=$beh1*30 ;
}

if($percent==70)  
{
     $behBuf=$beh; 
	 }else {
				 $behBuf=($beh/30)*50;
	 }
                 $total=$p2+$behBuf;

$sql2="
INSERT INTO `stscore` (
`id_st` ,
`style` ,
`score1` ,
`level1` ,
`score2` ,
`level2` ,
`score3` ,
`level3` ,
`score4` ,
`level4` ,
`score5` ,
`level5` ,
`res` ,
`per1` ,
`per2` ,
`per3`
)
VALUES (
'".$row2['staffid']."', '$style', '$score1', '$grade1', '$score2', '$grade2', '$score3', '$grade3', '$score4', '$grade4', '$score5', '$grade5', '$Tlevel', '$p1', '$p2', '$beh'
)
";

$sql3 = "
UPDATE `stscore` SET 
`style` = '$style',
`score1` = '$score1',
`level1` = '$grade1',
`score2` = '$score2',
`level2` = '$grade2',
`score3` = '$score3',
`level3` = '$grade3',
`score4` = '$score4',
`level4` = '$grade4',
`score5` = '$score5',
`level5` = '$grade5',
`res` = '$Tlevel',
`per1` = '$p1',
`per2` = '$p2',
`per3` = '$beh' 
WHERE `id_st` ='".$row2['staffid']."'
";

//echo  "$sql2<br>";
if(!($resSQL=mysql_query($sql2))) $resSQL=mysql_query($sql3);

 $str ="<td align=center><strong>$sum</strong> <br><font color=green>score:$score1</font><br><font color=blue>level:$grade1</font></td><td align=center><strong>$sum2</strong><br><font color=green>score:$score2</font><br><font color=blue>level:$grade2</font></td><td align=center><strong>($sum3)($sum31)</strong><br><font color=green>score:$score3</font><br><font color=blue>level:$grade3</font></td><td align=center><strong>$sum4</strong><br><font color=green>score:$score4</font><br><font color=blue>level:$grade4</font></td><td align=center><strong>($sum5)($sum51)</strong><br><font color=green>score:$score5</font><br><font color=blue>level:$grade5</font></td><td>$Tlevel(จากระดับและค่าถ่วงน้ำหนัก)<br>$p1(เต็ม 1 )<br>$p2(เต็ม$percent%)</td><td><a href=\"fpdf/apdf2.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.02</a></td><td><a href=\"fpdf/apdf4.php?id=".$row2['staffid']."&sc30=$beh1&sc70=$p1\"  target=\"_blank\">ป.04</a></td><td align=center><a href=\"index.php?menu=eval8&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />ประเมินพฤติกรรม</a></td><td>$beh</td><td>$total</td>";
  

/******************** แสดงผลคะแนนดิบ  *************/

// $str ="<td align=cenetr>$sum</td><td align=center>$sum2</td><td align=center>($sum3)($sum31)</td><td align=center>$sum4</td><td align=center>($sum5)($sum51)</td><td><a href=\"fpdf/apdf2.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.02</a></td><td align=center><a href=\"index.php?menu=eval8&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />ประเมินพฤติกรรม</a></td>";
  

/***********จบคะแนนดิบ************/
		 
}		 
		         echo "<tr><td align=center>".$i++."</td><td >".$row2 ['staffname']."  <br> <font size=1 color=888888>($weight1:$weight2:$weight3:$weight4:$weight5) </font></td><td><a href=\"fpdf/acover.php?id=".$row2['staffid']."\"  target=\"_blank\">ปก</a></td><td><a href=\"fpdf/apdf.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.01</a></td><td><a href=\"fpdf/apdf3.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.03</a></td><td><a href=\"index.php?madmin=eval&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />หลักฐาน</a>$str </td>
</tr>";
		 }
		 echo"</table>";
		 echo"</td></tr></table>";

?>