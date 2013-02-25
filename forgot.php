<?php
	include('inc/dbsetup.php'); 
	require('inc/config.inc.php');
	//Connect to database
	$link = mysql_connect($host , $dbuser ,$dbpasswd); 
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	//select database
	mysql_select_db($dbname);
	
	//Configuration of POST and GET Variables
	//$taxon_id = htmlspecialchars($_GET['taxon_id'],ENT_QUOTES);
	//echo "\$taxon_id is :: ".$taxon_id."<br>\n";
	//$page_ref = htmlspecialchars($_GET['page_ref'],ENT_QUOTES);
	//echo "\$page_id is :: ".$page_id."<br>\n";  //Configuration of POST and GET Variables
	
	$title = "Fish Anatomy dot ORG:: Forgot your password?";
	$caption = "Fish Anatomy dot ORG:: Forgot your password?";
	//template
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title><?php echo $title; ?></title>
	<!--
	<title>Fish Anatomy View Page</title>
	-->
	<link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/reset.css">
	<link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/text.css">
	<link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/960.css">
 	<link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/ui.css">
	<style type="text/css">
	html { padding:0 0 60px;}
	.return { background:#ebebeb;border-bottom:1px solid #ccc;font-size:93%;margin-bottom:20px;padding:5px 10px; }
    #banner,
    #content,
    #footer { border:1px solid #666; }
    #banner { padding:10px 0; }
    	#banner h1 { margin-bottom:0; }
    #content { border-top:0;border-bottom:0;padding:20px 0; }
    #footer { padding:10px 0; }
    .intro { font-size:108%; }
    .module { background:#ebebeb;margin-bottom:20px;padding:10px 15px; }
    #content-two { padding-top:18px; }
    form { padding:10px 30px; }
    label { display:block;margin-bottom:5px; }
    input,textarea,button { display:block;margin-bottom:10px; }
	</style>
	<script src="js/jquery/jsapi" type="text/javascript" charset="utf-8"></script>  
	<script type="text/javascript" charset="utf-8">google.load("jquery","1.3.2");</script>
	<script type="text/javascript" charset="utf-8">google.load("jqueryui", "1.7.1");</script>
	<script type="text/javascript" charset="utf-8" src="js/jquery/jquery.scrollTo.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/jquery/jquery.localscroll.js"></script>
	
	<!--<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
	<script src="js/jquery/bxSlider/jquery.bxSlider.min.js" type="text/javascript"></script>
	
	<style>
		span { color:red; }
  	</style>

	<script type="text/javascript">
    function IsEmail(email) {
    	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    	return regex.test(email);
    }
	
    
    $(document).ready(function(){
		//alert('Hello Elvis, jQuery is working right now!');
		$('#forgot_form').submit(function() {
      		if ($('#login_name').val() == "" && $('#eml_addr').val() == "") {
      			$("span").text("Please type your login name or email address!").show().fadeOut(5000);
      			return false;
        	}else if($('#eml_addr').val() != "" && !IsEmail($('#eml_addr').val())){
      			$("span").text("Your email address should be an validated one!").show().fadeOut(5000);
      			return false;
        	}else{
      			return true;
			}
		});
    });
    </script>
</head>

<body>
		
		<?php
			echo "<h1 class=\"grid_12\">".$caption."</h1>";
		?>
		<!--
		<h1 class="grid_12">View Fish Anatomy Page</h1>
		-->
	</div><!--/banner-->
	
	<div id="content" class="container_12 clearfix">
		<div id="content-one" class="grid_8">
			<h2>Forgot your password?</h2>
			<p class="intro">Here, you can type your user name/account name or your email to request your password.</p>
			<br>
			<p class="intro">Type your user name OR email below:</p>
			<form id="forgot_form" name="forgot_form" action="forgot_to.php" method="post">
				<label for="login_name">User Name</label>
				<input name="post_from_form" id="post_from_form" type="hidden"  value="1" />
				<input name="login_name" id="login_name" type="text" size="30" maxlength="20" value="Type your user name here" />
				<label for="eml_addr">OR, your email address</label>
				<input name="eml_addr" id="eml_addr" type="text" size="30" maxlength="20" value="Type your email address here">
				<span></span>
				<button name="reset_b" type="reset">Reset</button>
				<button name="submit_b" type="submit">Submit</button>
			</form>
    	</div><!--/content-one-->
	    <!--
		<div id="content-two" class="grid_4">
			<div class="module">
        		<h3>Side Bar 1</h3>
    			<p>111</p>
    		</div>
    		<div class="module">
        		<h3>Side Bar 2</h3>
    			<p>222</p>
    		</div>
    	</div>
    	-->
 	</div><!--/content-->
 	
	<div id="footer" class="container_12 clearfix">
    	
    	<div class="grid_12">
    		<p>Footer is here!</p>
    	</div>
    	
    	<!--
    	<div class="grid_12">
    		<a href="#">Link 1</a> | <a href="#">Link 2</a> | <a href="#">Link 3</a> | <a href="#">Link 4</a> | <a href="#">Link 5</a> | <a href="#">Link 6</a>
    	</div>
    	-->
    	
    	<!--
    	<div class="grid_12">
    		<p>Footer is here!</p>
    	</div>
    	-->
    </div><!--/footer-->
<?php
	mysql_close($link);
?>
</body>
</html>