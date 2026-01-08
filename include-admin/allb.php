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

	    $query2 = "SELECT * FROM  `staffinfo`, `wselect` where (staffinfo.staffmajor='คณะผู้บริหาร'  or  staffinfo.staffmajor='ภาควิชาชีววิทยา'    or  staffinfo.staffmajor='ภาควิชาคณิตศาสตร์'   or  staffinfo.staffmajor='ภาควิชาเคมี'   or  staffinfo.staffmajor='ภาควิชาฟิสิกส์' )  and  staffinfo.staffid>0 and wselect.userid= staffinfo.staffid ORDER BY  staffmajor,staffname asc ";
		$result2 = mysql_query($query2);
		
		echo "<table border=0 cellpadding=10 ><tr><td align=center>";
		echo "<strong>ตรวจสอบข้อมูลของบุคลากร</strong><br><br>";
		echo "<table border=1 cellpadding=5 >";
		$i=1;
 if($Mrow ['b']==2)
 {
  $str ="<td align=cenetr>คะแนนดิบด้านการสอน</td><td align=center>คะแนนดิบด้านวิจัย(รวม)</td><td align=center>2.1</td><td align=center>2.2</td><td align=center>2.3</td><td align=center>2.4</td><td align=center>2.5</td><td align=center>2.6.1</td><td align=center>2.6.2</td><td align=center>2.6.3</td><td align=center>2.6.4</td><td align=center>คะแนนดิบด้านการบริการวิชาการ(3.1-3.4)</td><td align=center>คะแนนดิบด้านการบริการวิชาการ(3.5)</td><td align=center>คะแนนดิบด้านทำนุบำรุงศิลปะและวัฒนธรรม</td><td align=center>คะแนนดิบด้านช่วยการบริหารจัดการและอื่น ๆ(5.1)</td><td align=center>คะแนนดิบด้านช่วยการบริหารจัดการและอื่น ๆ
(5.2-5.4)</td><td>คะแนนเต็ม 70%(1)</td><td>คะแนนเต็ม 70%(2)</td><td>คะแนนเต็ม 70%(3)</td><td>คะแนนเต็ม 70%(4)</td>";
  }else{
  $str="";
  }
  
  echo "<tr><td align=center>ลำดับที่</td><td align=center> ชื่อ </td><td align=center>เลือกรูปแบบที่ </td><td align=center> หน่วยงาน </td>$str</tr>";

		 while ($row2 = mysql_fetch_array($result2))
		 {
		 
		 $r1="";
		 $r2="";
		 $r3="";
		 $r4="";
		 $r5="";
		 $r61="";
		 $r62="";
		 $r63="";
		 $r64="";
		 
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
	 		$n=$row['score']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
	}	  	

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
	
				 if($row2['staffmajor'] =='คณะผู้บริหาร') $resum=($sum*100)/(180*5); else   $resum=($sum*100)/(240*5);
				        $score1=round($resum,2); 

				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;

						 $resum="$resum"; if($resum<$g1){
							    $grade1=1;
							 }elseif($resum<$g2){
							    $grade1=2;
							 }elseif($resum<$g3){
							    $grade1=3;
							 }elseif($resum<$g4){
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
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
			$r1=$r1+$n;
}

   	$query = "SELECT * FROM `workload`,`research2`  where  `workload`.`id` = `research2`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
			$r2=$r2+$n;
}

   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
			$r3=$r3+$n;
}

  	$query = "SELECT * FROM `research4`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier'];
	        $sum2=$sum2+$n;
			$r4=$r4+$n;
}

   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`   and `userid`='".$row2['staffid']."'  ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum2=$sum2+$n;
			$r5=$r5+$n;
}
   	$query = "SELECT * FROM `research51`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$row['percent']/100;			
	        $sum2=$sum2+$n;
			$r61=$r61+$n;	
}

   	$query = "SELECT * FROM `research52`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$row['percent']/100;	
	        $sum2=$sum2+$n;
			$r62=$r62+$n;	
}

   	$query = "SELECT * FROM `research53`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
			$r63=$r63+$n;	
}

   	$query = "SELECT * FROM `research54`  where    `userid`='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
//	 		$n=$row['multiplier'];
	 		$n=$row['multiplier']*$row['percent']/100;
	        $sum2=$sum2+$n;
			$r64=$r64+$n;	
}				 

				 if($row2 ['staffposition']=='รองศาสตราจารย์') $resum=($sum2*100)/(1*5); else   $resum=($sum2*100)/(1*5);						
				        $score2=round($resum,2); 
// ระดับความสำเร็จ

				         $g0=0;
				         $g1=90;
				         $g2=180;
				         $g3=270;
				         $g4=360;

						$resum="$resum"; if($resum<$g1){
							    $grade2=1;
							 }elseif($resum<$g2){
							    $grade2=2;
							 }elseif($resum<$g3){
							    $grade2=3;
							 }elseif($resum<$g4){
							    $grade2=4;
							 }else{
							    $grade2=5;
							 }

					 	if($resum<=$g0){
							    $grade22=0;
							 }else$resum="$resum"; if($resum<$g1){
							    $grade22=1;
							 }elseif($resum<$g2){
							    $grade22=2;
							 }elseif($resum<$g3){
							    $grade22=3;
							 }elseif($resum<$g4){
							    $grade22=4;
							 }else{
							    $grade22=5;
							 }

				         $g0=0;
				         $g1=70;
				         $g2=140;
				         $g3=220;
				         $g4=290;

						$resum="$resum"; if($resum<$g1){
							    $grade23=1;
							 }elseif($resum<$g2){
							    $grade23=2;
							 }elseif($resum<$g3){
							    $grade23=3;
							 }elseif($resum<$g4){
							    $grade23=4;
							 }else{
							    $grade23=5;
							 }

					 	if($resum<=$g0){
							    $grade24=0;
							 }else$resum="$resum"; if($resum<$g1){
							    $grade24=1;
							 }elseif($resum<$g2){
							    $grade24=2;
							 }elseif($resum<$g3){
							    $grade24=3;
							 }elseif($resum<$g4){
							    $grade24=4;
							 }else{
							    $grade24=5;
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

  	$query = "SELECT * FROM `workload`,`service4`  where  `service4`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
}

  	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
}

  	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=`workload`.`id` and  userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 		$n=$row['score']*$row['multiplier'];

	 $sum3=$sum3+$n;
}
     $sum31=0;
   	$query = "SELECT * FROM `service3`  where   userid='".$row2['staffid']."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {

	 $n=$row['amount'];
	 $sum31=$sum31+$n;
	}
	
					        $resum=($sum3*100)/(5);
				        $resum=(($sum3*100)/(2*5))+(($sum31*100)/(15*5));
				        $score3= round($resum,2); 

				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;
						 
					 	$resum="$resum"; if($resum<$g1){
							    $grade3=1;
							 }elseif($resum<$g2){
							    $grade3=2;
							 }elseif($resum<$g3){
							    $grade3=3;
							 }elseif($resum<$g4){
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

				         $g1=40;
				         $g2=60;
				         $g3=80;
				         $g4=100;

					 	$resum="$resum"; if($resum<$g1){
							    $grade4=1;
							 }elseif($resum<$g2){
							    $grade4=2;
							 }elseif($resum<$g3){
							    $grade4=3;
							 }elseif($resum<$g4){
							    $grade4=4;
							 }else{
							    $grade4=5;
							 }

/******************* ด้านช่วยการบริหารจัดการและอื่น ๆ ***********************/
$sum5=0;
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*0.4;
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum5=$sum5+$n;
			 
}
	$sum51=0;
   	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*0.3;
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
			 $sum51=$sum51+$n;
			 
	}
	   	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*0.1;
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
	 $sum51=$sum51+$n;
			 
	}
	
	     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid='".$row2['staffid']."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*0.2;
     if($row['id']==50)$txt="(".$row['name'].")"; else $txt="";
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
					        $resum=($sum5*100)/(10);
				        $resum=(($sum5*100)/(10))+(($sum51*100)/(5));					
				        $score5= round($resum,2); 

				         $g1=5;
				         $g2=10;
				         $g3=16;
				         $g4=21;
						 	
					 	$resum="$resum"; if($resum<$g1){
							    $grade5=1;
							 }elseif($resum<$g2){
							    $grade5=2;
							 }elseif($resum<$g3){
							    $grade5=3;
							 }elseif($resum<$g4){
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
				$weight1=$row['w1'];
				$weight2=$row['w2'];
				$weight3=$row['w3'];
				$weight4=$row['w4'];
				$weight5=$row['w5'];
				if($row['status'])$percent=50; else $percent=70;
				
$Tlevel=($grade1*$weight1+$grade2*$weight2+$grade3*$weight3+$grade4*$weight4+$grade5*$weight5)/100;
$p1=$Tlevel/5;
$p2=$p1*$percent;

$Tlevel2=($grade1*$weight1+$grade22*$weight2+$grade3*$weight3+$grade4*$weight4+$grade5*$weight5)/100;
$p21=$Tlevel2/5;
$p22=$p21*$percent;

$Tlevel3=($grade1*$weight1+$grade23*$weight2+$grade3*$weight3+$grade4*$weight4+$grade5*$weight5)/100;
$p31=$Tlevel3/5;
$p32=$p31*$percent;

$Tlevel4=($grade1*$weight1+$grade24*$weight2+$grade3*$weight3+$grade4*$weight4+$grade5*$weight5)/100;
$p41=$Tlevel4/5;
$p42=$p41*$percent;


 $str ="<td align=center><strong>$sum</strong><br><font color=green>score:$score1</font><br><font color=blue>level:$grade1</font></td><td align=center><strong>$sum2</strong><br><font color=green>score:$score2</font><br><font color=blue>level:$grade2</font></td><td align=center><strong>($sum3)($sum31)</strong><br><font color=green>score:$score3</font><br><font color=blue>level:$grade3</font></td><td align=center><strong>$sum4</strong><br><font color=green>score:$score4</font><br><font color=blue>level:$grade4</font></td><td align=center><strong>($sum5)($sum51)</strong><br><font color=green>score:$score5</font><br><font color=blue>level:$grade5</font></td><td>$Tlevel(จากระดับและค่าถ่วงน้ำหนัก)<br>$p1(เต็ม 1 )<br>$p2(เต็ม70%)</td><td><a href=\"fpdf/apdf2.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.02</a></td><td align=center><a href=\"index.php?menu=eval8&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />ประเมินพฤติกรรม</a></td>";
  
 $str ="<td align=center><strong>$sum</strong></td><td align=center><strong>$sum2</strong></td><td align=center><strong>$r1</strong></td><td align=center><strong>$r2</	strong></td><td align=center><strong>$r3</strong></td><td align=center><strong>$r4</strong></td><td align=center><strong>$r5</strong></td><td align=center><strong>$r61</strong></td><td align=center><strong>$r62</strong></td><td align=center><strong>$r63</strong></td><td align=center><strong>$r64</strong></td><td align=center><strong>$sum3</strong></td><td align=center><strong>$sum31</strong></td><td align=center><strong>$sum4</strong></td><td align=center><strong>$sum5</strong></td><td align=center><strong>$sum51</strong></td><td>$p2</td><td>$p22</td><td>$p32</td><td>$p42</td></td>";

/******************** แสดงผลคะแนนดิบ  *************/

// $str ="<td align=cenetr>$sum</td><td align=center>$sum2</td><td align=center>($sum3)($sum31)</td><td align=center>$sum4</td><td align=center>($sum5)($sum51)</td><td><a href=\"fpdf/apdf2.php?id=".$row2['staffid']."\"  target=\"_blank\">ป.02</a></td><td align=center><a href=\"index.php?menu=eval8&id=".$row2['staffid']."\" >ดูข้อมูลและ<br />ประเมินพฤติกรรม</a></td>";
  

/***********จบคะแนนดิบ************/
		 
}		 
		         echo "<tr><td align=center>".$i++."</td><td >".$row2['staffposition']." ".$row2 ['staffname']."</td><td> ".$row2 ['wtid']."</td><td> ".$row2 ['staffmajor']."</td>$str 
</tr>";
		 }
		 echo"</table>";
		 echo"</td></tr></table>";

?>