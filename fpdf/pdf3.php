<?php

session_start();

include"../tools/connect-eval.php";


$Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$_SESSION[session_user_id];
$Mresult = mysql_query($Mquery);
$Mrow = mysql_fetch_array($Mresult);


$query = "SELECT * FROM `behavior` where   userid  = '$_SESSION[session_user_id] ' ";
$result = mysql_query($query);
$r2 = mysql_fetch_assoc($result);

$query = "SELECT * FROM `staffinfo`  where   staffid = '$_SESSION[session_user_id] ' ";
$result = mysql_query($query);
$r = mysql_fetch_assoc($result);

				$query = "SELECT * FROM `weight`,`wselect` where  weight.id=wselect.wtid and wselect.userid=$session_user_id";
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

$array1[]="1. ภาระงานด้านการสอน";
$array2[]="  1.1) การสอนภาคบรรยาย ";
$array3[]="H";
$array4[]="";

    $sum=0;
   	$query = "SELECT * FROM `workload`,`course`,`lectures`  where lectures.courseid=course.id and lectures.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['t']*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
 $array1[]=' '.$row['code'].": ".$row['enname'].'[กลุ่ม'.$row['detail'].']';
 $array2[]="                                                                                                                                                       (".$row['t']."x".$row['score']."x".$row['week']."x".$row['multiplier'].")" ;
 $array3[]="$n";
// $array4[]=$row['filename'];
 $array4[]="evi.php?type=lectures&id=".$row['id'];
 }
 
$array1[]=" ";
$array2[]="  1.2) การสอนภาคปฏิบัติ ";
$array3[]="H";
$array4[]="";

  	$query = "SELECT * FROM `workload`,`course`,`practices`  where practices.courseid=course.id and practices.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=($row['credit']-$row['t'])*$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
 $array1[]=' '.$row['code'].": ".$row['enname'].'[กลุ่ม'.$row['detail'].']';
 $array2[]="                                                                                                                                                     (".($row['credit']-$row['t'])."x".$row['score']."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
 //$array4[]=$row['filename'];
 $array4[]="evi.php?type=practices&id=".$row['id'];

 }
 
$array1[]=" ";
$array2[]="  1.3) ผู้ประสานงานรายวิชา ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`course`,`coordinator`  where coordinator.courseid=course.id and coordinator.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 $n=$row['score']*$row['week']*$row['multiplier'];
	 $sum=$sum+$n;
 $array1[]=' '.$row['code'].": ".$row['enname'];
 $array2[]="                                                                                                                                                    (".$row['score']."x".$row['week']."x".$row['multiplier'].")";
 $array3[]="$n"; 
// $array4[]=$row['filename'];
 $array4[]="evi.php?type=coordinator&id=".$row['id'];

 }

 $array1[]=" ";
$array2[]="  1.4) การควบคุมการฝึกงาน/ฝึกสอน/สหกิจ";
 $array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`internships`  where  internships.workload=workload.id and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
//	echo "$query";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                    (".$row['score']."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
  $array4[]=$row['filename'];

 }


 $array1[]=" ";
$array2[]="  1.5) ที่ปรึกษาโครงการปริญญานิพนธ์ ระดับปริญญาตรี";
 $array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`undergraduate-advisor`  where  `undergraduate-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                          (".$sc."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }


 $array1[]=" ";
 $array2[]="  1.6) ที่ปรึกษาวิทยานิพนธ์ ระดับปริญญาโทและเอก";
 $array3[]="H";
 $array4[]="";

 $query = "SELECT * FROM `workload`,`graduate-advisor`  where  `graduate-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                          (".$sc."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

 $array1[]=" ";
 $array2[]="  1.7) ที่ปรึกษาวิชาสัมมนา";
 $array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`seminar`  where  `seminar`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name']." ชื่อเรื่อง ".$row['sname'];
 $array2[]="                                                                                                                                                          (".$sc."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

 $array1[]=" ";
 $array2[]="  1.8)    อาจารย์ที่ปรึกษาทางด้านวิชาการ";
 $array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`academic-advisor`  where  `academic-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$sc."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

 
 $array1[]=" ";
 $array2[]="  1.9) อาจารย์ที่ปรึกษาด้านกิจกรรม";
 $array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`activity-advisor`  where  `activity-advisor`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	//echo "$query";

	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['week']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$sc."x".$row['week']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

 
 $array1[]=" ";
 $array2[]="  1.10) กรรมการสอบ Senior Project/วิทยานิพนธ์ ";
 $array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`seniorproject`  where  `seniorproject`.`workload`=`workload`.`id` and  `userid`='".$_SESSION[session_user_id]."' ORDER BY date asc";
	
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
			$sc=$row['score'];
	 $sum=$sum+$n;
 $array1[]="   ".$row['name']." ชื่อเรื่อง ".$row['sname'];
 $array2[]="                                                                                                                                                         (".$sc."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }


 				 if($_SESSION[session_user_major] ==23) $resum=($sum*100)/(180*5); else   $resum=($sum*100)/(240*5);
 $resum=sprintf("%.2f",$resum); 

    	$ql = "SELECT * FROM `level` where idlevel=1";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
				         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }

				$sw1 =  ($grade*$weight1)/100;
switch ($grade) {
    case 1:
        $array1[]="                                                                                                                                                                                        /";
        break;
    case 2:
        $array1[]="                                                                                                                                                                                             /";
        break;
    case 3:
        $array1[]="                                                                                                                                                                                                  /";
        break;
    case 4:
        $array1[]="                                                                                                                                                                                                       /";
        break;
    case 5:
        $array1[]="                                                                                                                                                                                                            /";
         break;
	default:
        $array1[]="";
}				

 $array2[]="  รวมภาระงานด้านการสอน          /  คะแนนของความสำเร็จของภาระงานด้านการสอน คำนวณจากสูตร = $resum                               $sum                                $grade              $weight1               $sw1";
 $array3[]="E";
  $array4[]="";

/*+++++++++++++++++++++++++++++++++*/
$array1[]="2. ภาระงานด้านวิจัย";
$array2[]=" 2.1) งานวิจัยเพื่อสร้างองค์ความรู้ใหม่/รับใช้สังคม ";
$array3[]="H";
 $array4[]="";

 $sum2=0;
   	$query = "SELECT * FROM `workload`,`research1`  where  `workload`.`id` = `research1`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*0.3*$row['multiplier'];
	        $sum2=$sum2+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                        (".$row['score']."x".$row['multiplier']."x30%)";
 $array3[]="$n";
 $array4[]="evi.php?type=research1&id=".$row['id'];
 }

$array1[]="";
$array2[]="  2.2) บทความวิจัยและบทความวิชาการ (Review paper)  ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`research3`  where  `workload`.`id` = `research3`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*0.3*$row['multiplier'];
	        $sum2=$sum2+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                        (".$row['score']."x".$row['multiplier']."x30%)";
 $array3[]="$n";
 $array4[]="evi.php?type=research3&id=".$row['id'];
 }

$array1[]="";
$array2[]="  2.3) งานวิจัยที่นำไปใช้ประโยชน์ ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`research_uses`  where  `workload`.`id` = `research_uses`.`workload`   and `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*0.15*$row['multiplier'];
	        $sum2=$sum2+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (1x".$row['multiplier'].	"x15%)";
 $array3[]="$n";
 $array4[]="evi.php?type=research_uses&id=".$row['id'];
 }
$array1[]="2.4) ผลงานวิชาการ";
$array2[]="  2.4.1) เอกสารประกอบการสอน ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `research51`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*0.25*$row['percent']/100;
	        $sum2=$sum2+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                               (1x".$row['multiplier']."x".$row['percent']."%x25%)";
 $array3[]="$n";
 $array4[]="evi.php?type=research51&id=".$row['id'];
 }

$array1[]="2.4) ผลงานวิชาการ";
$array2[]="  2.4.2) เอกสารคำสอน ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `research52`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*0.25*$row['percent']/100;
	        $sum2=$sum2+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                               (1x".$row['multiplier']."x".$row['percent']."%x25%)";
 $array3[]="$n";
 $array4[]="evi.php?type=research52&id=".$row['id'];
 }


$array1[]="2.4) ผลงานวิชาการ";
$array2[]="  2.4.3) ตำราหรือหนังสือ ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `research53`  where    `userid`=".$_SESSION[session_user_id]." ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['multiplier']*0.25*$row['percent']/100;
	        $sum2=$sum2+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                               (1x".$row['multiplier']."x".$row['percent']."%x25%)";
$array3[]="$n";
 $array4[]="evi.php?type=research53&id=".$row['id'];
 }

$Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$_SESSION[session_user_id];
$Mresult = mysql_query($Mquery);
$Mrow = mysql_fetch_array($Mresult);

				 if($Mrow ['staffposition']=='รองศาสตราจารย์') $resum=($sum2*100)/(5); else   $resum=($sum2*100)/(5);
				    $resum=sprintf("%.2f",$resum ); 

		
    	$ql = "SELECT * FROM `level` where idlevel=2";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
				         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }

				$sw2 =  ($grade*$weight2)/100;
switch ($grade) {
    case 1:
        $array1[]="                                                                                                                                                                                        /";
        break;
    case 2:
        $array1[]="                                                                                                                                                                                             /";
        break;
    case 3:
        $array1[]="                                                                                                                                                                                                  /";
        break;
    case 4:
        $array1[]="                                                                                                                                                                         		                              /";
        break;
    case 5:
        $array1[]="                                                                                                                                                                                                            /";
         break;
	default:
        $array1[]="";
}				
//$resum =printf("%d",$resum);
$sum2=round($sum2,2);
 $array2[]="  รวมภาระงานด้านการวิจัย          /  คะแนนของความสำเร็จของภาระงานด้านการวิจัย คำนวณจากสูตร  = $resum                               $sum2                                      $grade              $weight2                 $sw2";
 $array3[]="E";
 $array4[]="";
 
/*+++++++++++++++++++++++++++++++++*/

$array1[]="3. ภาระงานด้านการบริการวิชาการ";
$array2[]="  3.1) การบริการวิชาการในโครงการตามยุทธศาสตร์ด้านการบริการวิชาการของคณะ   ";
$array3[]="H";
 $array4[]="";

 $sum3=0;
   	$query = "SELECT * FROM `workload`,`service4`  where  `service4`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum3=$sum3+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (1x".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }


$array1[]="";
$array2[]="  3.2) งานบริการวิชาการรับเชิญเป็นผู้ทรงคุณวุฒิ เป็นวิทยากร/ผู้ทรงคุณวุฒิอ่านผลงานวิชาการ /กรรมการสอบวิทยานิพนธ์ เป็นกรรมการต่าง ๆ /ผู้ทรงคุณวุฒิอื่น ๆ ";
$array3[]="H";
$array4[]="";

   	$query = "SELECT * FROM `workload`,`service6`  where  `service6`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum3=$sum3+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (1x".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
  $array4[]=$row['filename'];
 }


$array1[]="";
$array2[]="  3.3) การบริการวิชาการที่สร้างรายได้ให้กับคณะวิศวกรรมศาสตร์ ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`service1`  where  `service1`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum3=$sum3+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                          (1x".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

$array1[]="";
$array2[]="  3.4) งานบริการวิชาการรับเชิญรายบุคคล/งานบริการการสอนโรงเรียนต่าง ๆ   ";
$array3[]="H";
$array4[]="";

   	$query = "SELECT * FROM `service3`  where  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['amount']*$row['multiplier'];
	        $sum31=$sum31+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['amount']."x".$row['multiplier'].")";
 $array3[]="$n";
  $array4[]=$row['filename'];
 }
   
 
 if( $sum31=="")$sum31=0;
				        $resum=(($sum3*100)/(2*5))+(($sum31*100)/(15*5));
   $resum=sprintf("%.2f",$resum); 

    	$ql = "SELECT * FROM `level` where idlevel=3";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
				         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }

				$sw3 =  ($grade*$weight3)/100;
switch ($grade) {
    case 1:
        $array1[]="                                                                                                                                                                                        /";
        break;
    case 2:
        $array1[]="                                                                                                                                                                                             /";
        break;
    case 3:
        $array1[]="                                                                                                                                                                                                  /";
        break;
    case 4:
        $array1[]="                                                                                                                                                                                                       /";
        break;
    case 5:
        $array1[]="                                                                                                                                                                                                            /";
         break;
	default:
        $array1[]="";
}				

 $array2[]="  รวมภาระงานด้านการบริการวิชาการ  /  คะแนนของความสำเร็จของภาระงานด้านการบริการวิชาการ คำนวณจากสูตร = $resum          $sum3,$sum31                                         $grade              $weight3                 $sw3";
 $array3[]="E";
 $array4[]="";
/*+++++++++++++++++++++++++++++++++*/


$array1[]="4. ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม";
$array2[]="   ";
$array3[]="H";
 $array4[]="";

 $sum4=0;
   	$query = "SELECT * FROM `workload`,`culture`  where  `culture`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum4=$sum4+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (1x".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

   $num=($sum4*100)/(5);
   $resum=sprintf("%.2f",$num); 

    	$ql = "SELECT * FROM `level` where idlevel=4";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
				         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }

				$sw4 =  ($grade*$weight4)/100;
switch ($grade) {
    case 1:
        $array1[]="                                                                                                                                                                                        /";
        break;
    case 2:
        $array1[]="                                                                                                                                                                                             /";
        break;
    case 3:
        $array1[]="                                                                                                                                                                                                  /";
        break;
    case 4:
        $array1[]="                                                                                                                                                                                                       /";
        break;
    case 5:
        $array1[]="                                                                                                                                                                                                            /";
         break;
	default:
        $array1[]="";
}		

 $array2[]="  รวมภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม /คะแนนของความสำเร็จของภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม= $resum          $sum4                                        $grade              $weight4                 $sw4";
 $array3[]="E";
 $array4[]="";
 
/*++++++++++++++++++++++++++++++++++++++++++*/



$array1[]="5 . ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ";
$array2[]="   5.1) การบริหารจัดการหลักสูตรรองคณบดี/หัวหน้าภาควิชา/รองหัวหน้าภาควิชา  ";
$array3[]="H";
 $array4[]="";

 $sum5=0;
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=17 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][1];
	        $sum5=$sum5+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	"x".$coe[5][1].")";
 $array3[]="$n";
// $array4[]=$row['filename'];
 $array4[]="evi.php?type=other&id=".$row['id'];
 }

$array1[]="";
$array2[]="   5.2) การช่วยงานบริหารจัดการภาควิชา/คณะฯ";
$array3[]="H";
 $array4[]="";

     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=18 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][2];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	"x".$coe[5][2].")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }


$array1[]="";
$array2[]="   5.3) การพัฒนาองค์กร กรรมการหรือผู้บริหารองค์กร (ภายนอกคณะ) เช่น ผู้ช่วยอธิการบดี รองคณบดี ผู้ช่วยคณบดีหรือตำแหน่งเทียบเท่า กรรมการภายนอกคณะ ที่ปรึกษาภายนอกคณะ ";
$array3[]="H";
 $array4[]="";

     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=19 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][3];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	"x".$coe[5][3].")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }


$array1[]="";
$array2[]="   5.4) โครงการส่งเสริมวิชาการ/พัฒนานิสิต ภายในคณะ  ";
$array3[]="H";
 $array4[]="";

     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=20 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][4];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	"x".$coe[5][1].")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

$array1[]="";
$array2[]="   5.5) การพัฒนาตนเอง  (ไม่เกิน 2 กิจกรรม) ";
$array3[]="H";
 $array4[]="";

     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][5];
	        $sum52=$sum52+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	"x".$coe[5][5].")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }


$array1[]="";
$array2[]="  5.6) การบริการวิชาการในระดับชาติ/นานาชาติ ";
$array3[]="H";
 $array4[]="";

   	$query = "SELECT * FROM `workload`,`service5`  where  `service5`.`weight`=`workload`.`id` and  userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier']*$coe[5][6];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier']."x".$coe[5][6].")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }
/*
$array1[]="";
$array2[]="   5.5) การเข้าร่วมกิจกรรมอื่นๆ";
$array3[]="H";
 $array4[]="";

     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=22 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }

$array1[]="";
$array2[]="   5.6) การเข้าร่วมกิจกรรมอื่นๆ ";
$array3[]="H";
 $array4[]="";



     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=21 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }
 $array1[]="";
$array2[]="   5.7) อื่นๆ ";
$array3[]="H";
 $array4[]="";
     	$query = "SELECT * FROM `workload`,`other`  where  `other`.`weight`=`workload`.`id` and  `workload`.`category`=23 and   userid='".$_SESSION[session_user_id]."' ORDER BY date asc";
	$result = mysql_query($query);
     while ($row = mysql_fetch_assoc($result)) {
	 		$n=$row['score']*$row['multiplier'];
	        $sum51=$sum51+$n;
 $array1[]="   ".$row['name'];
 $array2[]="                                                                                                                                                         (".$row['score']."x".$row['multiplier'].	")";
 $array3[]="$n";
 $array4[]=$row['filename'];
 }
*/
								if ($sum52>0.1) $sum51=$sum51+0.1; else $sum51=$sum51+$sum52;

   $num=(($sum5*100)/(10))+(($sum51*100)/(5));
   $resum=sprintf("%.2f",$num); 

    	$ql = "SELECT * FROM `level` where idlevel=5";
  	    $rl = mysql_query($ql);
        $rowl = mysql_fetch_array($rl);
				         $g1=$rowl['level1'];
				         $g2=$rowl['level2'];
				         $g3=$rowl['level3'];
				         $g4=$rowl['level4'];
				         $g5=$rowl['level5'];
						 $resum="$resum"; if($resum<$g1){
							    $grade=0;
							 }elseif($resum<$g2){
							    $grade=1;
							 }elseif($resum<$g3){
							    $grade=2;
							 }elseif($resum<$g4){
							    $grade=3;
							 }elseif($resum<$g5){
							    $grade=4;
							 }else{
							    $grade=5;
							 }

				$sw5 =  ($grade*$weight5)/100;
switch ($grade) {
    case 1:
        $array1[]="                                                                                                                                                                                        /";
        break;
    case 2:
        $array1[]="                                                                                                                                                                                             /";
        break;
    case 3:
        $array1[]="                                                                                                                                                                                                  /";
        break;
    case 4:
        $array1[]="                                                                                                                                                                                                       /";
        break;
    case 5:
        $array1[]="                                                                                                                                                                                                            /";
         break;
	default:
        $array1[]="";
}		

 $array2[]="  รวมภาระงานด้านช่วยการบริหารฯและอื่น ๆ  /  คะแนนของความสำเร็จของภาระงานด้านช่วยการบริหารฯและอื่น ๆ  = $resum              $sum5,$sum51                                  $grade              $weight5              $sw5";

 $array3[]="E";
 $array4[]="";
 
 $Tsw =  $sw1+$sw2+$sw3+$sw4+$sw5;
  $array1[]="                                                                                                                                                                                                                                    100                 ". $Tsw;
 $array2[]=" ";
 $array3[]="H";
 $array4[]="";

/*++++++++++++++++++++++++++++++++++++++++++*/
/*----------------------------------------------------------------------------------------------------------------------*/
require('fpdf.php');
 
//$pdf=new FPDF();

$pdf=new FPDF( 'L' , 'mm' , 'A4' );
//$pdf=new FPDF( 'L' , 'mm' , array( 297,225 ));


$pdf->AddPage();

$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=6;
//$pdf->SetFillColor(255,255, 200); 
$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนา


$narray=count($array1);

if($narray>11)$loop=11; else $loop=$narray;
$cnt=0;
$pdf->SetDrawColor(200,200, 200); 
$pdf->SetLineWidth(.1);

for($n=5;$n<=30;$n++)
{
	 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
}

for($lp=0;$lp<$loop;$lp++)
{

$pdf->SetDrawColor(0,0, 0); 

   if(($array3[$cnt]=="H")||($array3[$cnt]=="E"))$pdf->SetFont('THSarabun','b',13);

   if($array3[$cnt]=="E")  {
            $pdf->SetFillColor(220,220, 220); 
            $pdf->Rect($x1, 48+($lp-$st)*12, $x2-$x1, $h*2 , 'F');
   			$pdf->Line($x1,48+($lp-$st)*12, $x2, 48+($lp-$st)*12); 
   			$pdf->Line($x1,59+($lp-$st)*12, $x2, 59+($lp-$st)*12); 
   }
   elseif($array3[$cnt]=="H")  {
            $pdf->SetFillColor(240,240, 240); 
            $pdf->Rect($x1, 48+($lp-$st)*12, $x2-$x1, $h*2-2 , 'F');
			$pdf->Line($x1,59+($lp-$st)*12, 205, 59+($lp-$st)*12);
   }


	$pdf->SetXY(15,46+$lp*12);
	$pdf->Write(10,$array1[$cnt]);
	$pdf->SetXY(15,52+$lp*12);
	$pdf->Write(10,$array2[$cnt]);
if ($array4[$cnt]!="")
{
	$pdf->SetFont('THSarabun','u',13);
	$pdf->SetXY(15,51+$lp*12);
    $pdf->Write(10,' หลักฐาน ( http://202.28.32.130/evaluation/files/'.$array4[$cnt].' )','http://202.28.32.130/evaluation/files/'.$array4[$cnt]);
	$pdf->SetFont('THSarabun','',13);
}
	
    if($array3[$cnt]=="H")$pdf->SetFont('THSarabun','',13);
	
	if($array3[$cnt]!="H")
	{
	     $pdf->SetXY(190,52+$lp*12);
	     $pdf->Write(10,$array3[$cnt]);
	}
	
	
	
    $pdf->Line($x1,59+$lp*12, 205, 59+$lp*12);
	$cnt++;
}	

/*======================== เริ่มทำรายงาน  ================================*/
$pdf->SetFillColor(255,255, 255); 
$pdf->Rect($x1, $y1+$h*4, $x2-$x1, $h*3 , 'F');

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.2);
$n=4;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=7;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=4;
 $pdf->Line($x1+170,$y1+$n*$h, $x1+170, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+190, $y2);
 $pdf->Line($x1+215,$y1+$n*$h, $x1+215, $y2);
 $pdf->Line($x1+230,$y1+$n*$h, $x1+230, $y2);
 $pdf->Line($x1+250,$y1+$n*$h, $x1+250, $y2);
$n=6;
 $pdf->Line($x1+195,$y1+$n*$h, $x1+195, $y2);
 $pdf->Line($x1+200,$y1+$n*$h, $x1+200, $y2);
 $pdf->Line($x1+205,$y1+$n*$h, $x1+205, $y2);
 $pdf->Line($x1+210,$y1+$n*$h, $x1+210, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+215, $y1+$n*$h);

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->SetTextColor(0,0,0); 

$h=5;
$pdf->SetFont('THSarabun','',13);

$pdf->SetXY(15,4);
$pdf->Write(10,'                แบบรายงานผลการปฏิบัติราชการของข้าราชการและพนักงาน สังกัดมหาวิทยาลัยมหาสารคาม  ตามข้อตกลงการประเมินผลสัมฤทธิ์ของงานและข้อตกลงการประเมินพฤติกรรมการปฏิบัติราชการ          แบบ  ป.03');
$pdf->SetXY(15,4+$h*1);
$pdf->Write(10,'                                                                                       รอบการประเมิน  วงรอบที่ 1 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2567   ');
/*
$pdf->SetXY(15,4+$h*2);
$pdf->Write(10,'  ชื่อผู้รับการประเมิน   .....'. $r['staffname'].'......ตำแหน่ง/ระดับ ........'. $r['staffposition'].'.......... สังกัด .................คณะวิศวกรรมศาสตร์............');
$pdf->SetXY(15,4+$h*3);
$pdf->Write(10,'  ชื่อผู้บังคับบัญชา/ผู้ประเมิน ......'. $r['commander'].'.......  ตำแหน่ง/ระดับ .......'. $r['commanderposition'].'........');
*/
$pdf->SetXY(145,4+$h*2);
$pdf->Cell(10,10,'ชื่อผู้รับการประเมิน ...'. $r['staffname'].'....ตำแหน่ง/ระดับ ....'. $r['staffposition'].'... สังกัด คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหาสารคาม ',0,1,'C');
$pdf->SetXY(145,4+$h*3);
$pdf->Cell(10,10,'ชื่อผู้บังคับบัญชา/ผู้ประเมิน ......'. $r['commander'].'.......  ตำแหน่ง/ระดับ .......'. $r['commanderposition'].'.......',0,1,'C');
$h=6;

$pdf->SetXY(15,4+$h*3);
$pdf->SetFont('THSarabun','b',14);
$pdf->Write(10,' 1. ผลสัมฤทธิ์ของงาน');
$pdf->SetFont('THSarabun','',13);

$pdf->SetXY(15,6+$h*4);
$pdf->Write(10,'                                                                                                                                                                               ภาระงาน        ระดับเป้าหมาย');
$pdf->SetXY(15,4+$h*6);
$pdf->Write(10,'                                                                                                                                                                                                 1   2   3    4   5');
$pdf->SetXY(15,4+$h*5);
$pdf->Write(10,'                                                                    กิจกรรม/โครงการ/งาน                                                                             ');
$pdf->SetXY(15,4+$h*5);
$pdf->SetFont('THSarabun','',10);
$pdf->Write(10,'                                                                                                                                                                                                                               (คำนวณตามเกณฑ์)');
$pdf->SetFont('THSarabun','',12);
$pdf->SetXY(15,3+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                            ค่าคะแนน       น้ำหนัก(2)         ค่าคะแนน');
$pdf->SetXY(15,7+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                              ที่ได้(1)      (ความสำคัญ /       ถ่วงน้ำหนัก');
$pdf->SetXY(15,11+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                                             ความยากง่าย      (1)x(2)/100');
$pdf->SetXY(15,15+$h*4);
$pdf->Write(10,'                                                                                                                                                                                                                                                                ของงาน');

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.1);
$pdf->SetXY(150,189);
$pdf->Write(0,'หน้าที่ '.$pdf->PageNo().'  จาก '.(round((($narray+2)/13)+.5)+2).' หน้า  ');//. $narray.' array');


/*  -------------------------------------------------------------------------------------------------------------------------------- */

while ($cnt<$narray)
{

$pdf->AddPage();
$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=6;
//$pdf->SetFillColor(255,255, 200); 

$pdf->SetDrawColor(200,200, 200); 
$pdf->SetLineWidth(.1);

for($n=1;$n<=30;$n++)
{
	 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
}

$loop=$cnt+13;	
$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.1);

$pdf->SetFont('THSarabun','',13);

if($narray<$loop)$loop=$narray;
$st=$cnt;
for($lp=$st;$lp<$loop;$lp++)
{
   if(($array3[$cnt]=="H")||($array3[$cnt]=="E"))$pdf->SetFont('THSarabun','b',13);

   if($array3[$cnt]=="E")  {
            $pdf->SetFillColor(220,220, 220); 
            $pdf->Rect($x1, 23+($lp-$st)*12, $x2-$x1, $h*2 , 'F');
   			$pdf->Line($x1,23+($lp-$st)*12, $x2, 23+($lp-$st)*12); 
   			$pdf->Line($x1,35+($lp-$st)*12, $x2, 35+($lp-$st)*12); 
   }
   elseif($array3[$cnt]=="H")  {
            $pdf->SetFillColor(240,240, 240); 
            $pdf->Rect($x1, 24+($lp-$st)*12, $x2-$x1, $h*2-2 , 'F');
			$pdf->Line($x1,35+($lp-$st)*12, 205, 35+($lp-$st)*12);
   }else{ 
   				$pdf->Line($x1,35+($lp-$st)*12, 205, 35+($lp-$st)*12);
   }

	$pdf->SetXY(15,22+($lp-$st)*12);
	$pdf->Cell(0,10,$array1[$cnt]);
	$pdf->SetXY(15,28+($lp-$st)*12);
	$pdf->Write(10,$array2[$cnt]);
	
	if ($array4[$cnt]!="")
{

//    $pdf->Write(10,' หลักฐาน ( http://202.28.32.130/evaluation/files/'.$array4[$cnt].' )','http://202.28.32.130/evaluation/files/'.$array4[$cnt]);
	$pdf->SetFont('THSarabun','u',13);
	$pdf->SetXY(15,26+($lp-$st)*12);
    $pdf->Write(10,'   หลักฐาน ( http://202.28.32.130/evaluation/files/'.$array4[$cnt].' )','http://202.28.32.130/evaluation/files/'.$array4[$cnt]);
	$pdf->SetFont('THSarabun','',13);

}

   if(($array3[$cnt]=="H")||($array3[$cnt]=="E"))$pdf->SetFont('THSarabun','',13);
	if(!(($array3[$cnt]=="H")||($array3[$cnt]=="E")))
	{
	$pdf->SetXY(190,28+($lp-$st)*12);
	     $pdf->Write(10,$array3[$cnt]);
	}
	$cnt++;
}	


$pdf->SetFillColor(255,255, 255); 
$pdf->Rect($x1, $y1+$h*0, $x2-$x1, $h*3 , 'F');

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.2);
$n=0;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=3;
 $pdf->Line($x1,$y1+$n*$h, $x2, $y1+$n*$h);
$n=0;
 $pdf->Line($x1+170,$y1+$n*$h, $x1+170, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+190, $y2);
 $pdf->Line($x1+215,$y1+$n*$h, $x1+215, $y2);
 $pdf->Line($x1+230,$y1+$n*$h, $x1+230, $y2);
 $pdf->Line($x1+250,$y1+$n*$h, $x1+250, $y2);
$n=2;
 $pdf->Line($x1+195,$y1+$n*$h, $x1+195, $y2);
 $pdf->Line($x1+200,$y1+$n*$h, $x1+200, $y2);
 $pdf->Line($x1+205,$y1+$n*$h, $x1+205, $y2);
 $pdf->Line($x1+210,$y1+$n*$h, $x1+210, $y2);
 $pdf->Line($x1+190,$y1+$n*$h, $x1+215, $y1+$n*$h);

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',13);


$pdf->SetXY(15,6+$h*0);
$pdf->Write(10,'                                                                                                                                                                               ภาระงาน        ระดับเป้าหมาย');
$pdf->SetXY(15,4+$h*2);
$pdf->Write(10,'                                                                                                                                                                                                 1   2   3    4   5');
$pdf->SetXY(15,4+$h*1);
$pdf->Write(10,'                                                                    กิจกรรม/โครงการ/งาน                                                                             ');
$pdf->SetXY(15,4+$h*1);
$pdf->SetFont('THSarabun','',10);
$pdf->Write(10,'                                                                                                                                                                                                                               (คำนวณตามเกณฑ์)');
$pdf->SetFont('THSarabun','',12);
$pdf->SetXY(15,3+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                            ค่าคะแนน       น้ำหนัก(2)         ค่าคะแนน');
$pdf->SetXY(15,7+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                              ที่ได้(1)      (ความสำคัญ /       ถ่วงน้ำหนัก');
$pdf->SetXY(15,11+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                                             ความยากง่าย      (1)x(2)/100');
$pdf->SetXY(15,15+$h*0);
$pdf->Write(10,'                                                                                                                                                                                                                                                                ของงาน');

$pdf->SetXY(150,189);
$pdf->Write(0,'หน้าที่ '.$pdf->PageNo().'  จาก '.(round((($narray+2)/13)+.5)+2).' หน้า  ');//. $narray.' array');

//$pdf->AddPage();

}	

/*---------------------------------Last------------------------------------------*/

$pdf->AddPage();

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->SetLineWidth(.1);


$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',13);

$h=7;
$res=sprintf(" %.2f ",($Tsw /5));
$pdf->SetXY(15,6+$h*0);
$pdf->Write(10,"   (8)  สรุปคะแนนส่วนผลสัมฤทธิ์ของงาน   =    ผลรวมของค่าคะแนนถ่วง / จำนวนระดับค่าเป้าหมาย น้ำหนัก   =      $Tsw / 5       =   ". $res);
$pdf->SetXY(15,4+$h*1);
$pdf->Write(10,'                                                                คิดเป็นเปอร์เซ็นของภาระงานทั้งหมด (เต็ม '.$percent.' เปอร์เซ็น)                         =    '.($res*$percent).'%');
$pdf->SetXY(15,4+$h*3);
$pdf->Write(10,'                                                              ลายมือชื่อ ........................................................................... (ผู้รับการประเมิน)');
$pdf->SetXY(15,4+$h*4);
$pdf->Write(10,'                                                                       วันที่………….เดือน………………………….พ.ศ………..');
$pdf->Line($x1,$h*6+3, $x2, $h*6+3);


$pdf->SetXY(15,4+$h*6);
$pdf->Write(10,'   (9) ผู้ประเมินและผู้รับการประเมินได้ตกลงร่วมกันและเห็นพ้องกันแล้ว (ระบุข้อมูลใน (1) (2) (3) และ (5) ให้ครบ จึงลงลายมือชื่อไว้เป็นหลักฐาน (ลงนามเมื่อจัดทำข้อตกลง)
');
$pdf->SetXY(15,4+$h*8);
$pdf->Write(10,'               ลายมือชื่อ ........................................................................... (ผู้ประเมิน)        ');
$pdf->SetXY(15,4+$h*9);
$pdf->Write(10,'                        วันที่………….เดือน………………………….พ.ศ………..');
$pdf->Line($x1,$h*11+3, $x2, $h*11+3);

$pdf->SetXY(15,4+$h*11);
$pdf->Write(10,'   (10)  ความเห็นเพิ่มเติมของผู้ประเมิน (ระบุข้อมูลเมื่อสิ้นรอบการประเมิน) ');
$pdf->SetXY(15,4+$h*12);
$pdf->Write(10,'              1)  จุดเด่น และ หรือ สิ่งที่ควรปรับปรุงแก้ไข   ………………………………………...….….….………...…………………………………...……………………………………......…………………………………………………………......……………………');
$pdf->SetXY(15,4+$h*13);
$pdf->Write(10,'        …………………………………………...….….….………...…………………………………...……………………………………......……………………………………………………………………………………………………………………..…………......…………………… ');
$pdf->SetXY(15,4+$h*14);
$pdf->Write(10,'        …………………………………………...….….….………...…………………………………...……………………………………......……………………………………………………………………………………………………………………..…………......…………………… ');
$pdf->SetXY(15,4+$h*15);
$pdf->Write(10,'              2)  ข้อเสนอแนะเกี่ยวกับวิธีส่งเสริมและพัฒนา ……………………………….……...….….….………...…………………………………...……………………………………......…………………………………………………………......……………………');
$pdf->SetXY(15,4+$h*16);
$pdf->Write(10,'        …………………………………………...….….….………...…………………………………...……………………………………......……………………………………………………………………………………………………………………..…………......…………………… ');
$pdf->SetXY(15,4+$h*17);
$pdf->Write(10,'        …………………………………………...….….….………...…………………………………...……………………………………......……………………………………………………………………………………………………………………..…………......…………………… ');
$pdf->Line($x1,$h*19+3, $x2, $h*19+3);


$pdf->SetXY(15,4+$h*19);
$pdf->Write(10,'   11)  ผู้ประเมินและผู้รับการประเมินได้เห็นชอบผลการประเมินแล้ว (ระบุข้อมูลใน (4) (6) (7)  (8) และ (10) ให้ครบ)  จึงลงลายมือชื่อไว้เป็นหลักฐาน (ลงนามเมื่อสิ้นรอบการประเมิน)');
$pdf->SetXY(15,4+$h*21);
$pdf->Write(10,'           ลายมือชื่อ………………………………………………………………(ผู้ประเมิน)                      ลายมือชื่อ………………………………………………………………(ผู้รับการประเมิน)                     ');
$pdf->SetXY(15,4+$h*22);
$pdf->Write(10,'             วันที่………….เดือน……………………………………..พ.ศ………………………                          วันที่………….เดือน……………………………………..พ.ศ………………………');


$pdf->SetXY(150,189);
$pdf->Write(0,'หน้าที่ '.$pdf->PageNo().'  จาก '.(round((($narray+2)/13)+.5)+2).' หน้า  ');//. $narray.' array');

/*.......................................................................................*/


$pdf->AddPage();

$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.5);

$pdf->Line($x1,$y1, $x2, $y1);
$pdf->Line($x1,$y1, $x1, $y2);
$pdf->Line($x2,$y1, $x2, $y2);
$pdf->Line($x1,$y2, $x2, $y2);

$pdf->Line($x1,$h*16, $x2, $h*16);

$pdf->SetXY(15,4+$h*0);
$pdf->Write(10,' 2. พฤติกรรมการปฏิบัติราชการ');


$x1=15;
$y1=5;
$x2=285;
$y2=185;
$h=6;

$pdf->SetTextColor(0,0,0); 

$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนา
$pdf->SetFont('THSarabun','',13);


$pdf->SetDrawColor(0,0,0); 
$pdf->SetLineWidth(.1);


$pdf->SetFont('THSarabun','',13);
$pdf->SetXY(15,4+$h*2);
$pdf->Write(10,'            ก. สมรรถนะหลัก                 (1) ระดับ       (2) ระดับ                      ข. สมรรถนะเฉพาะตาม           (3) ระดับ        (4) ระดับ');
$pdf->SetXY(15,4+$h*3);
$pdf->Write(10,'         (สำหรับข้าราชการและ             สมรรถนะ      สมรรถนะ                         ลักษณะงานที่ปฏิบัติ           สมรรถนะ         สมรรถนะ');
$pdf->SetXY(15,4+$h*4);
$pdf->Write(10,'            พนักงาน ทุกคน)                ที่คาดหวัง       ที่แสดงออก               (สำหรับข้าราชการและพนักงาน       ที่คาดหวัง       ที่แสดงออก');
$pdf->SetXY(15,4+$h*5);
$pdf->Write(10,'                                                                                                เฉพาะตามตำแหน่งที่รับผิดชอบ');
$pdf->SetXY(15,4+$h*6);
$pdf->Write(10,'                                                                                                       ตามที่ ก.บ.ม. กำหนด)');
$pdf->SetXY($x1+5,4+$h*7);
$pdf->Write(10,'ก. 1 การมุ่งผลสัมฤทธิ์');
$pdf->SetXY($x1+5,4+$h*8);
$pdf->Write(10,'ก. 2 การบริการที่ดี');
$pdf->SetXY($x1+5,4+$h*9);
$pdf->Write(10,'ก. 3 การสั่งสมความเชี่ยวชาญ');
$pdf->SetXY($x1+5,4+$h*10);
$pdf->Write(10,'         ในงานอาชีพ');
$pdf->SetXY($x1+5,4+$h*11);
$pdf->Write(10,'ก. 4 การยึดมั่นในความถูกต้อง');
$pdf->SetXY($x1+5,4+$h*12);
$pdf->Write(10,'      ชอบธรรมและจริยธรรม');
$pdf->SetXY($x1+5,4+$h*13);
$pdf->Write(10,'ก. 5 การทำงานเป็นทีม');


$x1=10;
$y1=8;
$x2=110;
$y2=86;
$h=6;

$pdf->Line($x1+10,$y1+10, $x2-10, $y1+10);
$pdf->Line($x1+10,$y1+10+$h*5, $x2-10, $y1+10+$h*5);
$pdf->Line($x1+10,$y1+10+$h*6, $x2-10, $y1+10+$h*6);
$pdf->Line($x1+10,$y1+10+$h*7, $x2-10, $y1+10+$h*7);
//$pdf->Line($x1+10,$y1+10+$h*8, $x2-10, $y1+10+$h*8);
$pdf->Line($x1+10,$y1+10+$h*9, $x2-10, $y1+10+$h*9);
//$pdf->Line($x1+10,$y1+10+$h*10, $x2-10, $y1+10+$h*10);
$pdf->Line($x1+10,$y1+10+$h*11, $x2-10, $y1+10+$h*11);
$pdf->Line($x1+10,$y1+10+$h*13, $x2-10, $y1+10+$h*13);
$pdf->Line($x1+10,$y1+10, $x1+10, $y2+10);
$pdf->Line($x1+50,$y1+10, $x1+50, $y2+10);
$pdf->Line($x1+70,$y1+10, $x1+70, $y2+10);
$pdf->Line($x2-10,$y1+10, $x2-10, $y2+10);

$x1=100;
$y1=8;
$x2=200;
$y2=86;
$h=6;

$pdf->SetXY($x1+10,4+$h*7);
$pdf->Write(10,'ข.1 การคิดวิเคราะห์');
$pdf->SetXY($x1+10,4+$h*8);
$pdf->Write(10,'ข.2 การดำเนินการเชิงรุก');
$pdf->SetXY($x1+10,4+$h*9);
$pdf->Write(10,'ข.3 ความผูกพันที่มีต่อส่วนราชการ');
$pdf->SetXY($x1+10,4+$h*10);
$pdf->Write(10,'ข.4 การมองภาพองค์รวม');
$pdf->SetXY($x1+10,4+$h*11);
$pdf->Write(10,'ข.5 การใส่ใจและพัฒนาผู้อื่น');
$pdf->SetXY($x1+10,4+$h*12);
$pdf->Write(10,'ข.6 ความเข้าใจผู้อื่น');


$pdf->Line($x1+10,$y1+10, $x2-10, $y1+10);
$pdf->Line($x1+10,$y1+10+$h*5, $x2-10, $y1+10+$h*5);
$pdf->Line($x1+10,$y1+10+$h*6, $x2-10, $y1+10+$h*6);
$pdf->Line($x1+10,$y1+10+$h*7, $x2-10, $y1+10+$h*7);
$pdf->Line($x1+10,$y1+10+$h*8, $x2-10, $y1+10+$h*8);
$pdf->Line($x1+10,$y1+10+$h*9, $x2-10, $y1+10+$h*9);
$pdf->Line($x1+10,$y1+10+$h*10, $x2-10, $y1+10+$h*10);
//$pdf->Line($x1+10,$y1+10+$h*11, $x2-10, $y1+10+$h*11);
$pdf->Line($x1+10,$y1+10+$h*13, $x2-10, $y1+10+$h*13);
$pdf->Line($x1+10,$y1+10, $x1+10, $y2+10);
$pdf->Line($x1+53,$y1+10, $x1+53, $y2+10);
$pdf->Line($x1+70,$y1+10, $x1+70, $y2+10);
$pdf->Line($x2-10,$y1+10, $x2-10, $y2+10);


$x1=58;


$pdf->SetXY($x1+10,4+$h*7);
$pdf->Write(10,'5                 '.$r2['beh11']);
$pdf->SetXY($x1+10,4+$h*8);
$pdf->Write(10,'5                 '.$r2['beh12']);
$pdf->SetXY($x1+10,4+$h*9);
$pdf->Write(10,'5                 '.$r2['beh13']);
$pdf->SetXY($x1+10,4+$h*10);
//$pdf->Write(10,'3                 '.$r2['beh14']);
$pdf->SetXY($x1+10,4+$h*11);
$pdf->Write(10,'5                 '.$r2['beh14']);
$pdf->SetXY($x1+10,4+$h*13);
$pdf->Write(10,'5                 '.$r2['beh15']);

$x1=58;

$pdf->SetXY($x1+101,4+$h*7);
$pdf->Write(10,'5                 '.$r2['beh21']);
$pdf->SetXY($x1+101,4+$h*8);
$pdf->Write(10,'5                 '.$r2['beh22']);
$pdf->SetXY($x1+101,4+$h*9);
$pdf->Write(10,'5                 '.$r2['beh23']);
$pdf->SetXY($x1+101,4+$h*10);
$pdf->Write(10,'5                 '.$r2['beh24']);
$pdf->SetXY($x1+101,4+$h*11);
$pdf->Write(10,'5                 '.$r2['beh25']);
$pdf->SetXY($x1+101,4+$h*12);
$pdf->Write(10,'5                 '.$r2['beh26']);

$x1=190;
$y1=8;
$x2=290;
$y2=86;
$h=6;

$pdf->Line($x1+10,$y1+10, $x2-10, $y1+10);
$pdf->Line($x1+10,$y1+10+$h*5, $x2-10, $y1+10+$h*5);
$pdf->Line($x1+10,$y1+10+$h*6, $x2-10, $y1+10+$h*6);
$pdf->Line($x1+10,$y1+10+$h*7, $x2-10, $y1+10+$h*7);
$pdf->Line($x1+10,$y1+10+$h*8, $x2-10, $y1+10+$h*8);
$pdf->Line($x1+10,$y1+10+$h*9, $x2-10, $y1+10+$h*9);
$pdf->Line($x1+10,$y1+10+$h*10, $x2-10, $y1+10+$h*10);
$pdf->Line($x1+10,$y1+10+$h*11, $x2-10, $y1+10+$h*11);
$pdf->Line($x1+10,$y1+10+$h*13, $x2-10, $y1+10+$h*13);
$pdf->Line($x1+10,$y1+10, $x1+10, $y2+10);
$pdf->Line($x1+50,$y1+10, $x1+50, $y2+10);
$pdf->Line($x1+70,$y1+10, $x1+70, $y2+10);
$pdf->Line($x2-10,$y1+10, $x2-10, $y2+10);

$x1=10;
$y1=110;
$x2=290;
$y2=176;
$h=6;

$pdf->SetXY(15,4+$h*19);
$pdf->Write(10,' ผู้รับการประเมินได้รายงานผลการปฏิบัติราชการ และผู้ประเมินได้รับรายงานผลการปฏิบัติราชการเรียบร้อยแล้ว จึงลงลายมือชื่อไว้เป็นหลักฐาน');
$pdf->SetXY(15,4+$h*22);
$pdf->Write(10,'                           ลายมือชื่อ………………………………………………………………(ผู้ประเมิน)                      ลายมือชื่อ………………………………………………………………(ผู้รับการประเมิน)                     ');
$pdf->SetXY(15,4+$h*23);
$pdf->Write(10,'                             วันที่………….เดือน……………………………………..พ.ศ………………………                       วันที่………….เดือน……………………………………..พ.ศ………………………');

$pdf->SetXY(150,189);
$pdf->Write(0,'หน้าที่ '.$pdf->PageNo().'  จาก '.(round((($narray+2)/13)+.5)+2).' หน้า  ');//. $narray.' array');

$pdf->Output();

?>.
