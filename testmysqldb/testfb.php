<?php

define('YOUR_APP_ID', '479870955414382');

//uses the PHP SDK.  Download from https://github.com/facebook/facebook-php-sdk
require 'facebook.php';

$facebook = new Facebook(array(
  'appId'  => YOUR_APP_ID,
  'secret' => 'ea12ff3c1c70f0d0f054d775d8009de6',
));

$userId = $facebook->getUser();

?>

<html>
  <body>
    <div id="fb-root"></div>
    <?php if ($userId) { 
      $userInfo = $facebook->api('/' . $userId); ?>
      Welcome <?= $userInfo['name'] ?>
    <?php } else { ?>
    <fb:login-button></fb:login-button>
    <?php } ?>


        <div id="fb-root"></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '479870955414382', // App ID
              channelUrl : 'http://topnews.no-ip.org/channel.html', // Channel File
              status     : true, // check login status
              cookie     : true, // enable cookies to allow the server to access the session
              xfbml      : true  // parse XFBML
            });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
          };
          // Load the SDK Asynchronously
          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/all.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>

  </body>
</html>