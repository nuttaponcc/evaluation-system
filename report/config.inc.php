<meta http-equiv="content-type" content="text/html;charset=tis-620">
<?php

$host = "localhost" ;
$username = "root" ; // ชื่อในการติดต่อ mysql
$password = "1234" ; // password ของคุณในการเชื่อมต่อกับฐานข้อมูล
$db = "db" ;  // ชื่อฐานข้อมูลของคุณ กรุณาระบุให้ครบถ้วนนะครับ

$connect = mysql_connect($host,$username,$password) ;

$home = "http://www.langhong.com" ; // url เว็บไซด์ของคุณ เวลาที่ต้องการเรียก
$admin_email = "ponpoon@hotmail.com" ; // อีเมล์ของคุณ
$yourcode = "ip" ; // รหัสนำหน้าหมายเลขสมาชิกของคุณ เช่น ip00001 , abc00005
$member_num_show = 5 ;  // จำนวนของสมาชิกที่ต้องการให้แสดงต่อ  1 หน้า ในระบบของ admin 

function sendmail_welcome($member_id ,$name, $user_name , $pwd_name1, $email ,$home) {
                 ## ข้อความในการส่งเมล์เมื่อมีผู้สมัครสมาชิก ##
                ##( หากกด Enter เว้นบรรทัด ข้อความของคุณก็จะเว้นบรรทัดด้วย) ##
global $admin_email ;
$subject_mail = "ขอบคุณมากครับ ที่สมัครสมาชิกกับเรา นี่คือรายละเอียดต่างๆในการเข้าสู่ระบบครับ" ; // หัวข้ออีเมล์ 

//----------------------------------------------------------------------- เนื้อหาของอีเมล์ //
$message_mail = "สวัสดีครับคุณ $name 

ยินดีต้อนรับครับ สมาชิกใหม่ หมายเลขสมาชิกของคุณคือ $member_id 

รายละเอียดของคุณในการเข้าสู่ระบบมีดังต่อไปนี้ครับ 

user  =  $user_name 
pwd  =   $pwd_name1 

-- ขอบคุณมากครับ ที่สมัครสมาชิกกับเรา --

แวะมาเยี่ยมเยียนกันบ่อยๆนะครับ $home
" ;
//------------------------------------------------------------------------ จบเนื้อหาของอีเมล์ //

$from = "From:\"$admin_email\"<$admin_email>" ;
if(mail($email,$subject_mail,$message_mail,$from)) {
echo "<br><br><center><font size='3' face='MS Sans Serif'><b>" ;
echo "ขณะนี้รายละเอียดต่างๆของคุณได้ถูกส่งผ่านไปทางอีเมล์แล้วครับ</b></font></center>" ;
}
else {
echo "ไม่สามารถส่งอีเมล์ได้ครับ" ;
}
}


?>
