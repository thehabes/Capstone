<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT DISTINCT forder FROM fishbones") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['forder'].'">'.$tier['forder'].'</option>';
		}

}

//**************************************
//     First selection results     //
//**************************************
if($_GET['func'] == "drop_1" && isset($_GET['func'])) { 
   drop_1($_GET['drop_var']); 
}

function drop_1($drop_var)
{  
    include_once('db.php');
	$result = mysql_query("SELECT DISTINCT family FROM fishbones WHERE forder='$drop_var'") 
	or die(mysql_error());
	
	echo '<select name="drop_2" id="drop_2">
	      <option value=" " disabled="disabled" selected="selected">Family</option>';

		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['family'].'">'.$drop_2['family'].'</option>';
			}
	
	echo '</select>';
	echo "<script type=\"text/javascript\">
$('#wait_2').hide();
	$('#drop_2').change(function(){
	  $('#wait_2').show();
	  $('#result_2').hide();
      $.get(\"func.php\", {
		func: \"drop_2\",
		drop_var: $('#drop_2').val()
      }, function(response){
        $('#result_2').fadeOut();
        setTimeout(\"finishAjax_tier_three('result_2', '\"+escape(response)+\"')\", 400);
      });
    	return false;
	});
</script>";
}


//**************************************
//     Second selection results     //
//**************************************
if($_GET['func'] == "drop_2" && isset($_GET['func'])) { 
   drop_2($_GET['drop_var']); 
}

function drop_2($drop_var)
{  
    include_once('db.php');
	$result = mysql_query("SELECT DISTINCT genus FROM fishbones WHERE family='$drop_var'") 
	or die(mysql_error());
	
	echo '<select name="drop_3" id="drop_3">
	      <option value=" " disabled="disabled" selected="selected">Genus</option>';

		   while($drop_3 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_3['genus'].'">'.$drop_3['genus'].'</option>';
			}
	
	echo '</select>';
	echo "<script type=\"text/javascript\">
$('#wait_3').hide();
	$('#drop_3').change(function(){
	  $('#wait_3').show();
	  $('#result_3').hide();
      $.get(\"func.php\", {
		func: \"drop_3\",
		drop_var: $('#drop_3').val()
      }, function(response){
        $('#result_3').fadeOut();
        setTimeout(\"finishAjax_tier_four('result_3', '\"+escape(response)+\"')\", 400);
      });
    	return false;
	});
</script>";
}

//**************************************
//     Third selection results     //
//**************************************
if($_GET['func'] == "drop_3" && isset($_GET['func'])) { 
   drop_3($_GET['drop_var']); 
}

function drop_3($drop_var)
{  
    include_once('db.php');
	$result = mysql_query("SELECT DISTINCT species FROM fishbones WHERE genus='$drop_var'") 
	or die(mysql_error());
	
	echo '<select name="drop_4" id="drop_4">
	      <option value=" " disabled="disabled" selected="selected">Species</option>';

		   while($drop_4 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_4['species'].'">'.$drop_4['species'].'</option>';
			}
	
	echo '</select> ';
    echo '<input type="submit" name="submit" value="Submit" />';
}
?>