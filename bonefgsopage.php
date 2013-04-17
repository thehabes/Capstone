<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" media="screen">
<title>Homology Website</title>
</head>
<body>
<body bgcolor="gray">

<a href="seeboneexample.php" target="main">continue</a>

<?php
$con=mysqli_connect("localhost","root","root","Homology");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$prevbone='Ascending wings';  

$result = mysqli_query($con,"SELECT * FROM fishbones WHERE bone LIKE '%$prevbone%'");


while($row = mysqli_fetch_array($result))
  {
	  $id=$row["id"];
	  $thing="<a href='bonefgsopage.php' target='main'>" . $row['family'] . "</a>"; 
      $options.="<OPTION VALUE=\"$id\">".$thing.'</option>';
  }
?> 


<SELECT NAME=id> 
<OPTION VALUE=0>Family 
<?=$options?> 
</SELECT> 

<?php
$result = mysqli_query($con,"SELECT * FROM fishbones WHERE bone LIKE '%$prevbone%'");


while($row = mysqli_fetch_array($result))
  {
	  $id=$row["genus"];
	  $thing="<a href='bonefgsopage.php' target='main'>" . $row['genus'] . "</a>"; 
      $options.="<OPTION VALUE=\"$id\">".$thing.'</option>';
  }
?> 


<SELECT NAME=genus> 
<OPTION VALUE=0>Genus
<?=$options?> 
</SELECT> 



</body>
</html>
