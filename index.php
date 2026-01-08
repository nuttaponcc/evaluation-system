<?
session_start();
//echo"$_SESSION[session_log]--".session_id();
//echo"$_SESSION[session_username]";
include"tools/connect-eval.php";

$useragent=$_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc
|iemobile
|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp
|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT'])){
	$mobile=1;
//	echo "Mobile mode";
echo $w='<meta name="viewport" content="width=device-width, initial-scale=0.5">';
}else{
	$mobile=0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="style1.css">


<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>ระบบประเมินภาระงานคณะวิศวกรรมศาสตร์  </title>
<style type="text/css">
<!--
.style5 {
	font-size: 14px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #ffdd00;
	font-family: myFirstFont;
}
a:link {
	color: #8FBF00;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #888800;
}
a:hover {
	text-decoration: underline;
	color: #6699CC;
}
a:active {
	text-decoration: none;
	color: #006633;
}
.style6 {color: #FFFFFF}
.style7 {
	color: #006666
}

#customers {
	font-family: myFirstFont;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #5b0;
  color: white;
}


#customers02 {
	font-family: myFirstFont;
  border-collapse: collapse;
  width: 100%;
}

#customers02 td, #customers02 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers02 tr:nth-child(even){background-color: #f2f2f2;}

#customers02 tr:hover {background-color: #ddd;}

#customers02 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #34a;
  color: white;
}
input[type=text] {
  padding: 5px 5px;
  margin: 5px 0;
  box-sizing: border-box;
  border: 1px solid gray;
  border-radius: 8px;
}
input[type=password] {
  padding: 5px 5px;
  margin: 5px 0;
  box-sizing: border-box;
  border: 1px solid gray;
  border-radius: 8px;
}

-->

div.ex1 {
  margin-left: 400px;
}
.navbar {
  overflow: hidden;
  background-color: #555;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color:  #Fa2;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f0f0f0;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="100%">
  <tr>
    <td align="right" bgcolor="#000000" >
<!--     button -->
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">สามารถดูข้อมูลการประเมินย้อนหลังได้ที่นี่</button>
  <div id="myDropdown" class="dropdown-content">
<!--     button -->
	  
	  <?  
	  			$pageURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
				$url= "http://".str_replace("evaluation","evaluation1-67",$pageURL ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 66 - ก.พ. 67</a>';

		?>
  </div>
</div>
      </td>
  </tr>  
  <tr>
	  <td align="left" bgcolor ="ffffff" background="images/header02-1.png" >
        <table width="100%" height=210 border="0" cellpadding="5" cellspacing="0" background="images/header03.png">
  <tr>
    <td>

        <div class="ex1" align="left"> <h3><strong>ระบบประเมินการปฎิบัติราชการ</br>
          สำหรับข้าราชการและพนักงานสายวิชาการ
              </strong><div class="style7"><strong> คณะวิศวกรรมศาสตร์ มหาวิทยาลัยมหาสารคาม <font color="#FF0000"><br />
              </font>วงรอบที่ 1 ระหว่างวันที่ 1 ตุลาคม 2567  - 28 กุมภาพันธ์  2568
                <br />
               <!--font color=red  size=2> <img src='images/loading.gif' width="20" /> ปิดระบบ ป.03 ในวันที่ 19 กุมภาพันธ์ 2567 เวลา 23:59:59 น. </font--><br />
                <?
		if( $_SESSION[session_log]==session_id())
			{
			 				echo  "ชื่อผู้ใช้ [". $_SESSION[session_user_name1] . "]";
			 				echo  "[". $_SESSION[session_user_id] . "]";
			 				echo  "[". $_SESSION[session_user_major] . "]";
			}				
?>
                <p></p>
                </strong></div></h3><strong>
              <!--วงรอบที่ 1 ระหว่างวันที่ 1 มีนาคม - 31 สิงหาคม 2567 -->
              </strong>
        </div>          
    </td>
  </tr>
</table>
  
    </td>
  </tr>
  <tr>
    <td  bgcolor="#dddddd">
<? if( $_SESSION[session_log])  { ?>
<div class="navbar">
  <a href="index.php?menu=weight">ค่าน้ำหนัก</a>
  
      <?

  $sql = "SELECT * FROM  `uspac`  where sid=".$_SESSION[session_user_id] ." and l1=1 and dt>now() ";
	$res = mysql_query($sql);
    	if( $row=mysql_fetch_array($res))	
				{
					$go="http://202.28.32.138/evaluation1/"; 
				    $go1="menu"; 
					}
					else 
					{
						$go="";
					 	$go1="menu01"; 
					}	
if($por==3) {						
	?>

  <div class="dropdown">
    <button class="dropbtn">ป.01 
      <i class="fa fa-caret-down"></i>
    </button>
        <div class="dropdown-content">
      <a href="<?=$go;?>index.php?<?=$go1;?>=eval">ภาระงานทุกด้าน</a>
      <a href="<?=$go;?>index.php?<?=$go1;?>=eval1">ภาระงานด้านการสอน</a>
      <a href="<?=$go;?>index.php?<?=$go1;?>=eval2">ภาระงานด้านวิจัย</a>
      <a href="<?=$go;?>index.php?<?=$go1;?>=eval3">ภาระงานด้านการบริการวิชาการ</a>
      <a href="<?=$go;?>index.php?<?=$go1;?>=eval4">ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</a>
      <a href="<?=$go;?>index.php?<?=$go1;?>=eval5">ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</a>
    </div>
  </div> 
  <? } ?>
  <div class="dropdown">
    <button class="dropbtn">
  <?   if($por==3) echo "ป.03"; else echo "ป.01"; ?> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index.php?menu=eval">ภาระงานทุกด้าน</a>
      <a href="index.php?menu=eval1">ภาระงานด้านการสอน</a>
      <a href="index.php?menu=eval2">ภาระงานด้านวิจัย</a>
      <a href="index.php?menu=eval3">ภาระงานด้านการบริการวิชาการ</a>
      <a href="index.php?menu=eval4">ภาระงานด้านทำนุบำรุงศิลปะและวัฒนธรรม</a>
      <a href="index.php?menu=eval5">ภาระงานด้านช่วยการบริหารจัดการและอื่น ๆ</a>
    </div>
  </div> 
    <a href="index.php?menu=eval6">พฤติกรรมการปฏิบัติราชการ</a>
    <a href="index.php?menu=eval-dev">แบบฟอร์มแผนพัฒนารายบุคคล</a>

    <div class="dropdown">
    <button class="dropbtn">พิมพ์รายงาน
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="include/report.php?menu=cover">พิมพ์ ปก</a>
      <a href="include/report.php?menu=1">พิมพ์ ป.01</a>
      <a href="include/report.php?menu=2">พิมพ์ ป.02</a>
  <?   if($por==3) echo ' 
      <a href="include/report.php?menu=3">พิมพ์ ป.03</a>
      <a href="include/report.php?menu=4">พิมพ์ ป.04</a>
      <a href="include/report.php?menu=dev">แบบฟอร์มแผนพัฒนารายบุคคล</a>
	  ';
?>       	  
    </div>
  </div> 
<?
		include"tools/connect-eval.php";
	    $Mquery = "SELECT * FROM  `staffinfo`  where staffinfo.staffid=".$_SESSION[session_user_id];
		$Mresult = mysql_query($Mquery);
		$Mrow = mysql_fetch_array($Mresult);
		if( $Mrow ['m']||$Mrow ['p']||$Mrow ['b']||$Mrow ['c']||$Mrow ['a']) {  
?>

    <div class="dropdown">
    <button class="dropbtn">คณะกรรมการ
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมโยธา</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิชาวิศวกรรมการผลิต</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิชาวิศวกรรมเครื่องกล</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมชีวภาพและอาหาร</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมสิ่งแวดล้อม</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมเมคาทรอนิกส์</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมไฟฟ้า</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมปฏิบัติ</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขารถไฟความเร็วสูง</a><? }  ?>	
    <?  if($Mrow [m]){  ?>		  <a href="index.php?madmin=mboard">สาขาวิศวกรรมยานยนต์ไฟฟ้า</a><? }  ?>	

    </div>
  </div> 
<? }   ?>		
  <div class="dropdown">
    <button class="dropbtn">เกี่ยวกับระบบ
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
<font size=4>  
<a href="docs/คู่มือการประเมินฯ-แก้ไข-16-มิย.65-แก้ไขเพิ่มเติม67.pdf" target="_blank" >คู่มือการปฏิบัติงาน </a> 
<a href="docs/กำหนดการการประเมินปี 67 วงรอบ 2.pdf"  target="_blank"  >กำหนดการ--</a>
<a href="index.php?menu=workload" target="_blank" >ภาระงานปี44 </a>
<a href="index.php?menu=research" target="_blank" >งานวิจัยที่เคยใช้แล้ว </a>
<a href="index.php?menu=logout">ออกจากระบบ</a></font></font></font>
    </div>
  </div> 
  <?  }else{
	  	echo '<div class="navbar">	<div class="dropdown">
    <button class="dropbtn">เกี่ยวกับระบบ
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
<font size=4>   
<a href="docs/คู่-มือการประเมินฯ-แก้ไข-16-มิย.65.pdf" target="_blank" ><strong>คู่มือการปฏิบัติงาน </strong></a> 
<a href="docs/กำหนดการการประเมินปี 67 วงรอบ 2.pdf" target="_blank" ><strong>กำหนดการ</strong></a>
<a href="include/workload.php" target="_blank" ><strong>ภาระงานปี44 </strong></a>
    </div></div>';
	  } ?>
  		  <div align="left">
	  </div>	 
       </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="160" valign="top" bgcolor="#999">
			<?
			    if( $_SESSION[session_log]<>session_id())
   						{
			?>
			<form name="form1" method="post" action="check.php" onSubmit="return checkForm(this)">
			  <table width="100%" border="0" id="customers">
			    <tr>
			      <th align="left">Sign in</th>
		        </tr>
			    <tr>
			      <td align="left"><h4>Username <br />
			        <input name="in_log" type="text" size="30" placeholder="User name... " />
			        <br />
			        Password <br />
			        <input name="in_pw" type="password"  size="30" placeholder="Password... " />
			        <br />
			        <input name="button"  type="submit"  value="Log In" />
		          </h6></td>
		        </tr>
		      </table>
			</form>
			<?
			}else{
			    //include "include/menu01.php";
			}
/*
   include"tools/connect-eval.php";
     $querys = "SELECT * FROM `stat` ORDER BY `stat`.`id` DESC";			
  $result = mysql_query($querys,$link);
  $row=mysql_fetch_array($result);
  $amount1=$row['id'];
  $querys = "SELECT count(*) FROM `stat` where user = '".$_SESSION[session_user_id]."' ORDER BY `stat`.`id` DESC";			
  $result = mysql_query($querys,$link);
  $row=mysql_fetch_array($result);
  $amount2=$row[0];
    //------ Begin    user on line 
	$database="evaluation";
  $timeoutseconds = 600;
  $timestamp=time();
  $timeout=$timestamp-$timeoutseconds;
//echo   $sql="INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')";
  mysql_db_query($database, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')") or die("Useronline Database INSERT Error");

//หลังจากนั้นเช็คว่า คนเยี่ยมชมหมายเลข IP ใด เกินกำหนดเวลาที่ตั้งไว้แล้ว ให้ลบออกฐานข้อมูล
mysql_db_query($database, "DELETE FROM useronline WHERE timestamp<$timeout") or die("Useronline Database DELETE Error");

//ให้นับจำนวนเรคคอร์ดในตารางทั้งหมด ที่มี IP ต่างกัน ว่ามีเท่าไหร่ โดย IP เดียวกันให้นับเป็นคนเดียว
$result=mysql_db_query($database, "SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'") or die("Useronline Database SELECT Error");

//ค่าที่ได้ ก็คือจำนวนคนออนไลน์นั่นเอง
$user =mysql_num_rows($result);

   //------ Begin    user on line 

  echo "<br />
<table border=0 cellpadding=0 cellspaccing=2  width=100%>
<tr><td bgcolor=FFFF88 align=center>สถิติการเข้าใช้ทั้งหมด </td></tr>
<tr><td bgcolor=FFFFff   align=center>$amount1 ครั้ง</td></tr>
<tr><td bgcolor=FFFF88 align=center>สถิติการเข้าใช้ของท่าน </td></tr>
<tr><td bgcolor=FFFFff   align=center>$amount2 ครั้ง</td></tr>
<tr><td bgcolor=FFFF88 align=center>จำนวนคนที่อยู่ในระบบ </td></tr>
<tr><td bgcolor=FFFF88 align=center>".date("Y-m-d ")."<br>".date("H:i",strtotime("-10 minutes"))."-".date("H:i")." น.</td></tr>
<tr><td bgcolor=FFFFff   align=center>$user  คน</td></tr>
</table>";

   mysql_close($link); 
*/

//if ($mobile==0)echo '</td><td align="center"  valign="top" > ';
			?>		
            <table width="100%" border="0" cellspacing="10" cellpadding="0" bgcolor="#FFFFFF">
              <tr>
                <td align="center"><div class="style5">
                  <?
				
		if( $_SESSION[session_log]==session_id())
			{


//				$query = " SELECT * FROM `survey`  where userid = '$_SESSION[session_user_id]' ";
//				$result = mysql_query($query);
//				$row = mysql_num_rows($result);
//				if($row==0)
//				{
//                            echo "<p><font color=FF0000 ><strong>คุณยังไม่กรอกแบบสอบภาม โปรดกรอกแบบสอบถามก่อนใช้งานระบบ </strong></font></br>";
//							if($menu!="frmsurvey")echo "<meta http-equiv=\"Refresh\" content=\"1;URL=index.php?menu=frmsurvey\" /> รอสักครู่...</p>";
							
//				}else{

				$query = " SELECT * FROM `wselect`  where userid = '$_SESSION[session_user_id]' ";
				$result = mysql_query($query);
				$row = mysql_num_rows($result);
				if($row==0)
				{
                            echo "<p><font color=FF0000 ><strong>คุณยังไม่เลือกค่าน้ำหนัก  กรุณาเลือกค่าน้ำหนักก่อนใช้งานระบบ </strong></font></br>";
							if($menu!="weight")echo "<meta http-equiv=\"Refresh\" content=\"1;URL=index.php?menu=weight\" /> รอสักครู่...</p>";
							
				}
//}
			    if(isset($_GET["menu"]))
				{
						 $i=$_GET["menu"];
						include "include/$i.php";						
				}elseif(isset($_GET["menu01"]))
				{
						 $i=$_GET["menu01"];
						 echo "<center>";
						include "form01/$i.php";						
						 echo "</center>";
				}elseif(isset($_GET["madmin"]))
				{
                        $i=$_GET["madmin"];
						include "include-admin/$i.php";						
				}else{
						include "include/home.php";		
						}
				
/*			
	switch ($i) {
    case 'eval':
               include "include/eval.php";	
        break;
    case 'manual':
               include "include/manual.php";	
        break;
    case 'about':
               include "include/about.php";	
        break;
    case 'faq':
               include "include/faq.php";	
        break;
    case 'evaladd':
               include "include/eval-add.php";	
        break;
    case 'logout':
               include "include/logout.php";	
        break;
		default : 
               include "include/home.php";		
}
*/
			}else{
              // include "include/intro.php";	
			}				
?>
                </div></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#333333">        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
              </table></td>
  </tr>
</table>

<div align="center"></div>
</body>
</html>
