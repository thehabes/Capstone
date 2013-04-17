<?php
if(!isset($_SESSION['user']))   
{   
    $app_id        = "479870955414382";   
    $app_secret    = "785736c8cac506ef4d716239d28128c5";   
    $site_url    = "http://topnews.no-ip.org"; 
	
	include "src/facebook.php";   
$facebook = new Facebook(array(   
    'appId'        => $app_id,   
    'secret'    => $app_secret,   
    ));   
$user = $facebook->getUser(); 

if($user){   
    // Get logout URL   
    $logoutUrl = $facebook->getLogoutUrl();   
}else{   
    // Get login URL   
    $loginUrl = $facebook->getLoginUrl(array(   
        'scope'            => 'read_stream, publish_stream, user_about_me, email',   
        'redirect_uri'    => $site_url,   
        ));   
}   

if($user){   
  
    try{   
        $user_profile = $facebook->api('/me');   
		

$con=mysql_connect("localhost","root","root");   
if(!$con)   
{   
    die("Could not connect to MySQL");   
}   
mysql_select_db("FBusers",$con) or die ("could not open database");   
$name = "'" . $user_profile['name'] . "'";   
$email = "'" . $user_profile['email'] . "'";   
$gender = "'" . $user_profile['gender'] . "'";   
$bio = GetSQLValueString($user_profile['bio'], "text");  
$query = sprintf("SELECT * FROM new WHERE email = %s",$email);   
$res = mysql_query($query) or die('Query failed: ' . mysql_error() . "<br>\n$sql");   
if(mysql_num_rows($res) == 0)   
{   
    $iquery = sprintf("INSERT INTO newmember values('',%s,%s,%s,%s,'yes')",$name,$email,$gender,$bio);   
    $ires = mysql_query($iquery) or die('Query failed: ' . mysql_error() . "<br>\n$sql");   
    $_SESSION['user'] = $user_profile['email'];   
}   
else   
{   
    $row = mysql_fetch_array($res);   
    $_SESSION['user'] = $row['email'];   
}   
    
	
?>