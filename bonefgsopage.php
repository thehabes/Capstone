<?php 
  include('db.php');
  include('func.php');
?>
<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" media="screen">
<title>Homology Website</title>
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
function finishAjax_tier_three(id, response) {
  $('#wait_2').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_four(id, response) {
  $('#wait_3').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
</head>
<body>
<body bgcolor="gray">

<p>
<form action="seeboneexample.php" method="post">
  
    <select name="drop_1" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Order</option>
      
      <?php getTierOne($_POST['bone']); ?>
    
    </select> 
    
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    <span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
    <span id="wait_3" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_3" style="display: none;"></span> 
  	
</form>

</p>
<?php session_start();
  $_SESSION['bone'] = $_POST['bone'];
  $_SESSION['order'] = $_POST['drop_1'];
  $_SESSION['family'] = $_POST['drop_2'];
  $_SESSION['genus']= $_POST['drop_3'];
  $_SESSION['species'] = $_POST['drop_4'];

?>
</body>
</html>
rop_2." ".$drop_4;
}
?>
</body>
</html>
