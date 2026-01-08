<style>
.twenty-px{
    margin : 10px 200px 20px 20px;
	text-align: left;
	}
</style>
<?
$pageURL2='202.28.32.138/evaluation/index.php?madmin=eval2&id='.$_SESSION[session_staff] ;
echo "<div class='twenty-px' > <strong>ดูงานวิจัยย้อนหลัง ".$_SESSION[session_staff2]."</strong><br />";

				$url= "http://".str_replace("evaluation","evaluation1-67",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 66 - ก.พ. 67</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-66",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 66 - ส.ค. 66</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-66",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 65 - ก.พ. 66</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-65",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 65 - ส.ค. 65</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-65",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 64 - ก.พ. 65</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-64",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 64 - ส.ค. 64</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-64",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 63 - ก.พ. 64</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-63",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 63 - ส.ค. 63</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-63",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 62 - ก.พ. 63</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-62",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 62 - ส.ค. 62</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-62",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 61 - ก.พ. 62</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-61",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 61 - ส.ค. 61</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-61",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 60 - ก.พ. 61</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-60",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 60 - ส.ค. 60</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-60",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 59 - ก.พ. 60</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-59",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : มี.ค. 59 - ส.ค. 59</a></br>';
				$url= "http://".str_replace("evaluation","evaluation1-59",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่1 : ก.ย. 58 - มี.ค. 59</a></br>';
				$url= "http://".str_replace("evaluation","evaluation2-58",$pageURL2 ); 
				if ( $_SESSION[session_user_id])	 echo '<a href="'.$url.'" target="_blank">วงรอบที่2 : เม.ย. 58 - ส.ค. 58</a></br>';
echo "</div>";

?>
