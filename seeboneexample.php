<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Homology Website</title>
<link href="../Capstone /simpleheaderstyle.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

<body bgcolor="gray">

<?php

//echo $_SESSION['order']. "->" . $_SESSION['family'] . "->" . $_SESSION['genus'] . "->" . $_SESSION['species'] . "->" . $_SESSION['bone']; 

?>

<p><?php session_start();

$con=mysqli_connect("localhost","root","root","Homology");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT DISTINCT location FROM fishbones WHERE bone LIKE '%". $_SESSION["bone"] ."%'");


$row = mysqli_fetch_array($result);

  
echo "<img class='img' src='images/". $row["location"] ."' width='320' height='240'>"; ?>
<video width='320' height='240' controls> <source src='<?php "videos/".$_SESSION["vidname"]?>'> </video></p>

<p>
<?php $result = mysqli_query($con,"SELECT DISTINCT name FROM pic WHERE bone LIKE ".$_SESSION["bone"]);
while($row = mysqli_fetch_array($result))
  {
  echo  "<img class='img' src='images/".$row /*this needs to be passed */."'>";
  }
 
?> </p>

    
<form action="../Capstone /user_upload_image.php" method="post"
enctype="multipart/form-data">
  <label for="file">Filename:</label>
<input type="file" name="image" id="image"><br>
<input type="submit" name="submit" value="Submit">
</form>

^^ this should work though.  sends you to user_upload_image.php, which does the log in check.





</body>
</html>
