<?php session_start();  
include "common.php";  
include_once "fbconnect.php";  
  
if (isset($_SESSION['user']))   
echo '<a href="logout.php">Logout</a>';   
else   
echo '<a href="$loginUrl">Login</a>';   
if(!isset($_SESSION['user']))   
{  
    echo '<a href="$loginUrl"><img src="images/f-connect.png" alt="Connect to your Facebook Account"></a>'  
}   
else   
{   
    $email = "'" . $_SESSION['user'] . "'";   
    $query = sprintf("SELECT * FROM newmember WHERE email = %s",$email);   
    $res = mysql_query($query) or die('Query failed: ' . mysql_error() . "<br>\n$sql");   
    $row = mysql_fetch_array($res);   
    echo $row['name'];  
    echo "<b>   GENDER : </b>" . $row['gender'];   
    echo "<b>   EMAIL : </b>" . $row['email'];   
}  
?>

<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top News</title>

<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
body {
	background-color: #666666;
}
</style>

</head>

<body>


<div class="container">
<div id="header"><img src="Top News Logo.jpg" width="206" height="92" alt="Top News" />
  <form method="get" action="http://search.freefind.com/find.html" id="search" target="main">
    <p>
      <input type="hidden" name="si" value="20115984" />
      <input type="hidden" name="pid" value="r" />
      <input type="hidden" name="n" value="0" />
      <input type="hidden" name="_charset_" value="" />
      <input type="hidden" name="bcd" value="&#247;" />
      <input type="text" name="query" size="40" placeholder="Search for headlines..." />
    </p>
</form>
</div>	

<div id="page">
  <div class="title"></div>

  <div id="ads" align="left">
    <ul id="sidebar">
    <li class="sidebar-element"><a href="index.html">Home</a></li>
        <li class="sidebar-element"><a href="espn.html" target="main">Sports</a></li>
        <li class="sidebar-element"><a href="finance.html" target="main">Finance</a></li>
        <li class="sidebar-element"><a href="worldnews.html" target="main">World News</a></li>
        <li class="sidebar-element"><a href="localnews.html" target="main">Local News</a></li>
        <li class="sidebar-element"><a href="entertainment.html" target="main">Entertainment</a></li>
        <li class="sidebar-element"><a href="music.html" target="main">Music</a></li>
        <li class="sidebar-element"><a href="weather.html" target="main">Weather</a></li>    
        <li class="sidebar-element"><a href="" target="main">Contact</a></li>
    </ul>
  
  </div>
  
  <div id="content"></div>
	<p>
    </p>
	<p>&nbsp;</p>
</div>

<div id="centerpage">
  
  <iframe name="main" 
	src="home.html" 
    iframe width="100%"
    scrolling="yes"
    height="487" 
    width="1000"
	frameborder="0">
  
  <p>&nbsp;</p>
<p>&nbsp;</p>
</iframe>
</div>

<a class="janrainEngage" href="#">Sign-In</a>

<div id="footer">
	<p class="legal">&nbsp;</p>
</div>

</div>





</body>
</html>
