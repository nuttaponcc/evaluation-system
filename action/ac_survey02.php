<?
session_start();
include"../tools/connect-eval.php";
     	 $sex=$_POST['rdosex'];
	 $type=$_POST['rdotype'];
	 $department=$_POST['rdodepartment'];

	 $f1=$_POST['optform1'];
	 $f2=$_POST['optform2'];
	 $f3=$_POST['optform3'];

	 $c11=$_POST['optcriteria11'];
	 $c12=$_POST['optcriteria12'];
	 $c13=$_POST['optcriteria13'];
	 $c14=$_POST['optcriteria14'];
	 $c15=$_POST['optcriteria15'];
	 $c16=$_POST['optcriteria16'];
	 $c17=$_POST['optcriteria17'];
	 $c18=$_POST['optcriteria18'];
	 $c19=$_POST['optcriteria19'];
	 $c110=$_POST['optcriteria110'];
	 $c111=$_POST['optcriteria111'];

	 $c21=$_POST['optcriteria11'];
	 $c22=$_POST['optcriteria12'];
	 $c23=$_POST['optcriteria13'];
	 $c24=$_POST['optcriteria14'];
	 $c251=$_POST['optcriteria251'];
	 $c252=$_POST['optcriteria252'];
	 $c253=$_POST['optcriteria253'];
	 $c254=$_POST['optcriteria254'];
	 
	 $c31=$_POST['optcriteria31'];
	 $c32=$_POST['optcriteria32'];
	 $c33=$_POST['optcriteria33'];
	 $c34=$_POST['optcriteria34'];
	 $c35=$_POST['optcriteria35'];

	 $c4=$_POST['optcriteria4'];

	 $c51=$_POST['optcriteria51'];
	 $c52=$_POST['optcriteria52'];
	 $c53=$_POST['optcriteria53'];
	 $c54=$_POST['optcriteria54'];
	 $c55=$_POST['optcriteria55'];

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
	 $comment=$_POST['txtform'];
	 $comment2=$_POST['txtcriteria'];
	 $comment3=$_POST['txtsystem'];
	 
	$sql="INSERT INTO survey (sex,category,department,f1,f2,f3,c11,c12,c13,c14,c15,c16,c17,c18,c19,c110,c111,c21,c22,c23,c24,c251,c252,c253,c254,c31,c32,c33,c34,c35,c4,c51,c52,c53,c54,c55,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,comment,comment2,comment3,ip,userid,confines,year) VALUES 
	                                                  ('$sex','$type','$department','$f1','$f2,','$f3','$c11','$c12','$c13','$c14','$c15','$c16','$c17','$c18','$c19','$c110','$c111','$c21','$c22','$c23','$c24','$c251','$c252','$c253','$c254','$c31','$c32','$c33','$c34','$c35','$c4','$c51','$c52','$c53','$c54','$c55','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$p17','$p18','$p19','$p20','$p21','$p22','$p23','$comment','$comment2','$comment3','".$_SERVER['REMOTE_ADDR']."','".$_SESSION[session_user_id] ."','2','2013') ";

     $result = mysql_query($sql);
    echo "<meta http-equiv=\"Refresh\" content=\"1;URL=../index.php\" />ขอบคุณคุณครับ <br> รอสักครู่...";
	 
													  

?>