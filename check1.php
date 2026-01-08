<?php
session_start();

$in_log=$_POST[in_log];
$in_pw=$_POST[in_pw];

if(!empty($in_log)){
include"tools/connect.php";
  $querys = "select * from scdb_user where user_name = '$in_log' ";
  $result = mysql_query($querys,$link);
 $r=mysql_fetch_array($result);
 
 include"tools/connect-eval.php";
  $sql = "select * from staffinfo  where staffid = '".$r[user_id]."' ";
  //echo  $sql;
  $res = mysql_query($sql);
  $row=mysql_fetch_array($res);


  if($in_log== $r[user_name]  && $in_pw == $r[user_password]  ){
   $_SESSION[session_user_name1]=$r[user_name1];
   $_SESSION[session_user_id]=$r[user_id];
   $_SESSION[session_user_major] = $r[user_major];
   $_SESSION[session_user_acadposition] = $row[acadposition];
	 $_SESSION[session_log]= session_id();
	  $_SESSION[session_username]=$in_log;
	  $_SESSION[session_password]=$in_pw;
	  $_SESSION[session_group] = $group1;
	  if ($r[user_id]==482)$_SESSION[session_level] = 1; else $_SESSION[session_level] = 0;  
	  
      mysql_close($link); 
	 header("Location: index.php");
  }else {
 header("Location: index.php");
}
}


?>
