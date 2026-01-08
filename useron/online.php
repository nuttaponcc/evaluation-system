<?php
/************************************
** Users Online			   **
** Version: 1.1a                   **
** Create on: 1/04/2004            **
** Created by: Pickalo             **
** http://www.phpstorage.com/	   **
** Copyright 2004 PHP Storage      **
************************************/

/**************
** Variables **
**************/
$path = ".";		// Path to script. No trailing /.

$time_out = 90;		// Session Timeout. 60 * 1.5 = 90 (1 1/2 Minute)
$main_site = "202.28.32.130/evaluation";	// ใส่ URL ของเว็บไซต์คุณครับ (ไม่ต้องมี http:// นะ)
$surl = "online.php";		// Url to the script.

$b_link = TRUE;		// ตรงข้อความบอกจำนวนผู้ Online จะให้เป็น Link ไปยังหน้าบอกข้อมูลการ Online ไหม (ต้องการ ใส่ TRUE หรือ ไม่ต้องการ ใส่ FASLE ลงไป)
$target = "_blank";		// Target for the link.
$dateformat = "j/m/Y H:i:s";	// Date format for the record.
$word[0] = "มีคน Online อยู่ 1 คน";	// Word for online. For one user. {c} = 1
$word[1] = "มีคน Online อยู่ {c} คน";// Word for online. For over one user. {c} = Online Count
$word[2] = "Unknown";	// Word to replace unknown referes with.

/*********************************
** Do not edit below this line. **
*********************************/
if(!isset($_GET["action"]) || empty($_GET["action"])) $_GET["action"] = "disp";
$action = $_GET["action"];

if(isset($_GET["page"]) && !empty($_GET["page"])) $_SERVER["HTTP_REFERER"] = urldecode($_GET["page"]);

if(!isset($_SERVER["HTTP_REFERER"]) || empty($_SERVER["HTTP_REFERER"]))
 $_SERVER["HTTP_REFERER"] = "Unknown";

if(isset($_GET["js"]) && $_GET["js"] == 1) $action = "online";
$version = "1.1a";

//+---------------+
//+ Create File --+
//+---------------+
if(!is_file($path."/online.txt")){
 $fp = fopen($path."/online.txt", "w+");
 fclose($fp);
}

if(!is_file($path."/record.txt")){
 $fp = fopen($path."/record.txt", "w+");
 fwrite($fp, "0|<|0|<|0");
 fclose($fp);
}
//+----------------------+
//+ Check if writeable --+
//+----------------------+
if(!is_writeable($path."/online.txt")){
 @chmod($path."/online.txt", 0666);  
 die("online.txt was not CHMODed.<br />\n Please CHMOD it to 666, the script will have tried to CHMOD on its own so try and referesh.<br />\n");
}

if(!is_writeable($path."/record.txt")){
 @chmod($path."/record.txt", 0666);  
 die("record.txt was not CHMODed.<br />\n Please CHMOD it to 666, the script will have tried to CHMOD on its own so try and referesh.<br />\n");
}

//+-------------+
//+ Variables --+
//+-------------+
$fp = @fopen($path."/online.txt", "r");
if($fp == TRUE){
 $t_online = "";
 while (!feof($fp)) $t_online .= fgets($fp, 4096);
 $t_online = str_replace("\r", "", $t_online);
 fclose($fp);
}
$temp = file($path."/record.txt");
@list($record, $date)  = explode("|<|", $temp[0]);
if(!isset($record)) $record = 0;
if(!isset($date)) $date = 0;
unset($temp);


$time_out = time() - $time_out;
$temp = explode("\n", $t_online);
$t_online = "";
for($i=0; $i < count($temp); $i++){
 @list($remote_ip, $time, $referer) = explode("|<|", $temp[$i]);
 if($time >= $time_out)
  if($action == "online" && !strstr($t_online, $remote_ip) && !strstr($remote_ip, $_SERVER["REMOTE_ADDR"]))
   $t_online .= $remote_ip."|<|".$time."|<|".$referer."|<|0\n";
  else if($action == "disp")
   $t_online .= $remote_ip."|<|".$time."|<|".$referer."|<|0\n";
}

if($action == "online")
 $t_online .= $_SERVER["REMOTE_ADDR"]."|<|".time()."|<|".urlencode($_SERVER["HTTP_REFERER"])."|<|0\n";

$temp = explode("\n", $t_online);
$count = count($temp)-1;

if($record < $count){
 $fp = fopen($path."/record.txt", "w");
 flock($fp, LOCK_EX);
 fwrite($fp, $count."|<|".time()."|<|0");
 flock($fp, LOCK_UN);
 fclose($fp);
}
unset($temp);
$fp = fopen($path."/online.txt", "w");
flock($fp, LOCK_EX);
fwrite($fp, $t_online);
flock($fp, LOCK_UN);
fclose($fp);

if($count == 0) $count = str_replace("{c}", "0", $word[1]);
else if($count == 1) $count = str_replace("{c}", "1", $word[0]);
else if($count > 1) $count = str_replace("{c}", $count, $word[1]);

/*************************
** Display Users online **
*************************/
if($action == "online"){
 if($b_link == TRUE) $count = "<a href=\\\"".$surl."\\\" target=\\\"".$target."\\\">".$count."</a>";
 echo "document.write(\"".$count."\");";  
}

/***********************
** Display Users Page **
***********************/
else if($action == "disp" || $action == "display"){
 $fp = @fopen("online.html", "r");
 if($fp == TRUE){
  $template = "";
  while (!feof($fp))
   if(!$template .= fgets($fp, 4096)) die("Template file could not be read.");
 } else die("Template file could not be opened.");

 //+--------------+
 //+ Get Colors --+
 //+--------------+
 if(ereg("\\[color( \"[^\"]*\")*\\]", $template, $t_colors)){
  $template = ereg_replace("\\[color([^\\]]*)*\\]", "", $template);
  $t_colors["0"] = str_replace("[color ", "", $t_colors["0"]);
  $t_colors["0"] = str_replace("]", "", $t_colors["0"]);

  $c = 0;
  $temp = explode(" ", $t_colors["0"]);
  for($i=0; $i < count($temp); $i++){
   if(!empty($temp[$i])){
    $color[$c] = str_replace("\"", "", $temp[$i]);
    $c++;
   }
  }
  unset($t_colors);
  unset($c);
  unset($temp);
 }

 /********************
 ** Get Users Table **
 ********************/
 $start = strpos($template, "<!-- Start -->"); 
 $end = strpos($template, "<!-- End -->"); 
 $header = substr($template, 0, $start-1);
 $footer = substr($template, $end+13, strlen($template));
 $table = substr($template, $start+14, $end-$start-14);

 $c = 0;
 $replace = "";
 $temp = explode("\n", $t_online);
 for($i=0; $i < count($temp)-1; $i++){
  @list($remote_ip, $time, $referer, $user_agent) = explode("|<|", $temp[$i]);
  $total = 0;
 
  for($b=0; $b < count($temp)-1; $b++){
   @list(,, $t_referer) = explode("|<|", $temp[$b]);
   if($referer == $t_referer) $total++;
  }

  $temp2 = str_replace("{online}", $total, $table);
  if($referer == "Unknown"){
   $temp2 = eregi_replace("<a [^>]*>", "", $temp2);
   $temp2 = str_replace("{page}", $word[2], $temp2);
   $temp2 = eregi_replace("</a>", "", $temp2);
  }
  if(!isset($used[$referer])){
   if(isset($color[$c])){
    $temp2 = str_replace("{color}", $color[$c], $temp2);
    $c++;
    if($c >= count($color)) $c = 0;
   }

   $replace .= str_replace("{page}", urldecode($referer), $temp2);
  }
  $used[$referer] = TRUE;
 }

 /****************
 ** Format Date **
 ****************/
 $date = date($dateformat, $date);

 /********************
 ** Format Template **
 ********************/
 $header = str_replace("{count}", $count, $header);
 $footer = str_replace("{count}", $count, $footer);

 if(substr(strtolower($main_site),0,7) != "http://") $main_site = "http://".$main_site;
 $header = str_replace("{site}", $main_site, $header);
 $footer = str_replace("{site}", $main_site, $footer);

 if(substr(strtolower($main_site),0,7) != "http://") $link = "http://".$main_site;
 else $link = $main_site;
 $header = str_replace("{link}", $link, $header);
 $footer = str_replace("{link}", $link, $footer);

 $header = str_replace("{record}", $record." คน เมื่อ ".$date, $header);
 $footer = str_replace("{record}", $record." คน เมื่อ ".$date, $footer);

 $header = str_replace("{copyright}", "สนับสนุนโดย : <a href=\"http://www.phpstorage.com\" target=\"_blank\">Users Online ".$version."</a><br />\nCopyright 2004 <a href=\"http://www.phpstorage.com\" target=\"_blank\">PHP Storage</a><br />\n", $header);
 $footer = str_replace("{copyright}", "สนับสนุนโดย : <a href=\"http://www.phpstorage.com\" target=\"_blank\">Users Online ".$version."</a><br />\nCopyright 2004 <a href=\"http://www.phpstorage.com\" target=\"_blank\">PHP Storage</a><br />\n", $footer);

 echo $header.$replace.$footer;
}
?>