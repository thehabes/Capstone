<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>


<iframe src="https://www.facebook.com/plugins/like.php?href=topnews.no-ip.org"
        scrolling="no" frameborder="0"
        style="border:none; width:450px; height:80px"></iframe>

<div id="fb-root"></div>
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '479870955414382', // App ID
      channelUrl : 'localhost:8888/testmysqldb/testinfo.php/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
	
	FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
  } else if (response.status === 'not_authorized') {
    // not_authorized
	login();
  } else {
    // not_logged_in
	login();
  }
 });

    // Additional init code here

  };
  
  function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
			testAPI();
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
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="insertdb.php">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td colspan="3"><strong>Insert Data Into mySQL Database </strong></td>
</tr>
<tr>
<td width="71">Name</td>
<td width="6">:</td>
<td width="301"><input name="name" type="text" id="name"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td colspan="3" align="center"><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>