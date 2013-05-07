<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT DISTINCT category FROM dd_vals") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['category'].'">'.$tier['category'].'</option>';
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
	$result = mysql_query("SELECT * FROM dd_vals WHERE category='$drop_var'") 
	or die(mysql_error());
	
	echo '<select name="dd_vals" id="dd_vals">
	      <option value=" " disabled="disabled" selected="selected">Choose one</option>';

		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['dd_val'].'">'.$drop_2['dd_val'].'</option>';
			}
	
	echo '</select> ';
    echo '<input type="submit" name="submit" value="Submit" />';
}
?>