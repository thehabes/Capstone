<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top News</title>

<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="fb-root"></div>
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '542850419100800', // App ID
      channelUrl : '//topnews.no-ip.org/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional init code here
    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        // connected
        testAPI();
      } else if (response.status === 'not_authorized') {
        // not_authorized
        login();
      } else {
        login();
        // not_logged_in
      }
    });

  };

  function login() {
      FB.login(function(response) {
          if (response.authResponse) {
              // connected
          } else {
              // cancelled
          }
      });
  }

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
    });
  }

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>

<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>
<?php


  require 'facebook.php';


$facebook = new Facebook(array(
  'appId'  => '542850419100800',
  'secret' => '998f621eeb2c44a00ea4d4c91a7d5539',
));

// Get User ID
$user = $facebook->getUser();

?>

<?php
if ($user) {
  try {
    // Get the user profile data you have permission to view
    $user_profile = $facebook->api('/me');
    echo "<pre>";
    print_r($user_profile);
    echo "</pre>";
  } catch (FacebookApiException $e) {
    $user = null;
  }
} else {
  die('<script>top.location.href="'.$facebook->getLoginUrl().'";</script>');
}

echo 'this should always work';

 ?>

<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="FBusers"; // Database  name 
$tbl_name="test"; // Table name 


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// Insert data into mysql 
$sql="INSERT INTO $tbl_name(name)VALUES('$user_profile')";
$result=mysql_query($sql);


// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='http://topnews.no-ip.org'>Back to main page</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>
 </body>
</html>
