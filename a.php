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

$result = mysqli_query($con,"SELECT * FROM fishbones WHERE bone LIKE 'a%'");


while($row = mysqli_fetch_array($result))
  {
  echo "<li>" . "<a href='bonefgsopage.php' target='main'>" . $row['bone'] . "</a>" . "</li>";
  }



mysqli_close($con);
?>




</body>
</html>
