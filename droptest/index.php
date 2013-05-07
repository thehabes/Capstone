<?php 
  include('db.php');
  include('func.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chained Select Boxes using PHP, MySQL and jQuery</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("func.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
</head>

<body>
<p>
<form action="" method="post">
  
    <select name="drop_1" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Select a Category</option>
      
      <?php getTierOne(); ?>
    
    </select> 
    
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span> 
  
</form>
</p>
<p>
<?php if(isset($_POST['submit'])){
	$drop = $_POST['drop_1'];
	$tier_two = $_POST['tier_two'];
	echo "You selected ";
	echo $drop." & ".$tier_two;
}
?>
<p><a href="three-tier/">View 3 Tier Select Box Example</a></p>
</body>
</html>
