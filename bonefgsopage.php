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

$result = mysqli_query($con,"SELECT DISTINCT forder FROM fishbones WHERE bone LIKE '%$prevbone%'");


while($row = mysqli_fetch_array($result))
  {
      $options.="<OPTION VALUE=\"$id\">". $row['forder'] .'</option>';
  }
?> 


<SELECT NAME=id> 
<OPTION VALUE=0>Order
<?=$options?> 
</SELECT> 

<?php
$result = mysqli_query($con,"SELECT DISTINCT family FROM fishbones WHERE bone LIKE '%$prevbone%'");


while($row = mysqli_fetch_array($result))
  {
      $options1.="<OPTION VALUE=\"$id\">". $row['family'] .'</option>';
  }
?> 


<SELECT NAME=genus> 
<OPTION VALUE=0>Family
<?=$options1?> 
</SELECT> 

<?php
$result = mysqli_query($con,"SELECT DISTINCT genus FROM fishbones WHERE bone LIKE '%$prevbone%'");


while($row = mysqli_fetch_array($result))
  { 
      $options2.="<OPTION VALUE=\"$id\">". $row['genus'] .'</option>';
  }
?> 


<SELECT NAME=genus> 
<OPTION VALUE=0>Genus
<?=$options2?> 
</SELECT> 

<?php
$result = mysqli_query($con,"SELECT DISTINCT species FROM fishbones WHERE bone LIKE '%$prevbone%'");


while($row = mysqli_fetch_array($result))
  { 
      $options3.="<OPTION VALUE=\"$id\">". $row['species'] .'</option>';
  }
?> 


<SELECT NAME=genus> 
<OPTION VALUE=0>Species
<?=$options3?> 
</SELECT> 



</body>
</html>
