<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Homology Website</title>
<link href="simpleheaderstyle.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<?php virtual('/htdocs/Connections/imagesetconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_imagesetconnection, $imagesetconnection);
$query_imagerecordset = "SELECT * FROM image";
$imagerecordset = mysql_query($query_imagerecordset, $imagesetconnection) or die(mysql_error());
$row_imagerecordset = mysql_fetch_assoc($imagerecordset);
$totalRows_imagerecordset = mysql_num_rows($imagerecordset);
?>

<body bgcolor="gray">

<p>Vertebrata -> Osteichthys -> Actinoptreygii -> <b>Cbbdgddd</b></p>


<p><img src="../fishvert.jpg" width="218" height="192">
  <img src="../fishvert.jpg" width="218" height="192"></p>

<p>&nbsp;</p>
<p>Species: Vertebrata
Comment: my picture</p>
<p><img src="../fishvert2.jpeg" width="155" height="127" alt="Vertebrata"></p>

 
<form 
action="/" method="post"
enctype="multipart/form-data" id="imageUpload">
<label for="file">Image Upload:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>



<?php
//This is the directory where images will be saved
$target = "/"; //put images folder location here
$target = $target . basename( $_FILES['file']['name']); //not sure if this is exactly what we need. the . basename thing weirds me out a bit.  


/*// Connects to your Database.  I dont know if we need this here or not.
mysql_connect("localhost", "root", "root") or die(mysql_error()) ;
mysql_select_db("imagestest") or die(mysql_error()) ;

//Writes the information to the database.  This may be necessary for our set up.  
mysql_query("INSERT INTO image (pic1, pic2, pic3, pic4)
VALUES ('$pic1', '$pic2', '$pic3', '$pic4')") ; */


if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"];
  }
else
  {
  echo "Uploaded: " . $_FILES["file"]["name"];
  }
  
move_uploaded_file($_FILES["file"]["tmp_name"], $target);
      echo "Stored in: "  . $_FILES["file"]["name"];

?>

</body>
</html>
