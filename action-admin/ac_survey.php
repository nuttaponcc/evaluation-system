<?
include"../tools/connect-eval.php";
     	 $sex=$_POST['rdosex'];
	 $type=$_POST['rdotype'];
	 $department=$_POST['rdodepartment'];
	 $p1=$_POST['optproblem1'];
	 $p2=$_POST['optproblem2'];
	 $p3=$_POST['optproblem3'];
	 $p4=$_POST['optproblem4'];
	 $p5=$_POST['optproblem5'];
	 $p6=$_POST['optproblem6'];
	 $p7=$_POST['optproblem7'];
	 $p8=$_POST['optproblem8'];
	 $p9=$_POST['optproblem9'];
	 $p10=$_POST['optproblem10'];
	 $p11=$_POST['optproblem11'];
	 $p12=$_POST['optproblem12'];
	 $p13=$_POST['optproblem13'];
	 $p14=$_POST['optproblem14'];
	 $p15=$_POST['optproblem15'];
	 $p16=$_POST['optproblem16'];
	 $p17=$_POST['optproblem17'];
	 $p18=$_POST['optproblem18'];
	 $p19=$_POST['optproblem19'];
	 $p20=$_POST['optproblem20'];
	 $p21=$_POST['optproblem21'];
	 $p22=$_POST['optproblem22'];
	 $p23=$_POST['optproblem23'];
	 $comment=$_POST['txtcomment'];
	 
	 $sql="INSERT INTO survey (sex,category,department,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,comment,ip) VALUES 
	                                                  ('$sex','$type','$department','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$p17','$p18','$p19','$p20','$p21','$p22','$p23','$comment','".$_SERVER['REMOTE_ADDR']."') ";
//	 echo      $sql ;
     $result = mysql_query($sql);
      echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php\" />ขอบคุณคุณครับ <br> รอสักครู่...";
	 
													  

?>