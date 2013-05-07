<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Homology Website</title>
<link href="simpleheaderstyle.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

<body bgcolor="gray">


<?php
$con=mysqli_connect("localhost","root","root","Homology");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT DISTINCT bone FROM fishbones WHERE bone LIKE 'c%'");



while($row = mysqli_fetch_array($result))
  {
      $options.="<OPTION VALUE=\"$id\">". $row['bone'] .'</option>';
  }
  
mysqli_close($con);  
?> 
<p>
<form action="" target="main" method="post">
	<select name="bonename" id="bonename">
    	<option value="" selected="selected" disabled="disabled">Bone Name</option>
    	<?=$options?> 
    </select>
</form>
    
<form action="bonefgsopage.php" method="post" target="main">
	<input type="submit" value="Continue">
</form>
</p>


</body>
</html>