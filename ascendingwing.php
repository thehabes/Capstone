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
  
$prevbone='Ascending wings';  

$result = mysqli_query($con,"SELECT location FROM fishbones WHERE bone LIKE '%$prevbone%'");
 
?> 

<p>Vertebrata -> Osteichthys -> Actinoptreygii -> <b>Cbbdgddd</b></p>


<p><img src="<?php echo $row['location']; ?>" width="320" height="240"/>
<video width="320" height="240" controls>
  <source src="video/fish.mp4" type="video/mp4">
</video></p>

<p>Species: Vertebrata</p>
<p>information on Ascending wing here</p>

<p>User Uploads:</p>
<p><img src="../fishvert2.jpeg" width="155" height="127" alt="Vertebrata">
<img src="./upload/ascendingwings.jpg" width="155" height="127" alt="Vertebrata"></p>


 
<form action="upload_img.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>




</body>
</html>
