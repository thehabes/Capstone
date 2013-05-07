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

$result = mysqli_query($con,"SELECT DISTINCT bone FROM fishbones WHERE bone LIKE 'a%'");
$options="";


while($row = mysqli_fetch_array($result))
  {
	  $bone = $row["bone"];
	  $options.="<OPTION VALUE=\"$bone\">".$bone;
  }
  
?> 
<form action="bonefgsopage.php" method="post" target="main">
<SELECT NAME=bone>
<OPTION VALUE=0>Bone Name
<?=$options?>
</OPTION>
</SELECT>
<input type="submit" value="Continue">
</form>


</body>
</html>y>
</html>