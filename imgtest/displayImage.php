<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
mysql_connect("localhost","root","root");
mysql_select_db("Homology");
$image = stripslashes($_REQUEST[imname]); // imname comes from displayImages.html.  Actually have to put the name of the image that we plan to use here.  I had a file named img.jpg.  So if your file is img2.jpg, imname should equal img2.jpg
$rs = mysql_query("select * from pic where name=\"".addslashes($image).".jpg\""); // in the table pic grab name, which is the image name or location I take it.  This is formatted correctly to be a proper SQL command.  If .jpg is part of the file name you can strip out that last bit of the string.  
$row = mysql_fetch_assoc($rs); // Grabs the row with the image name
$imagebytes = $row[imgdata]; // This takes the location and gets the actual image bytes from that location.
header("Content-type: image/jpeg"); // This can be removed if your images are not jpg. 
print $imagebytes;
?>
</body>
</html>

http://www.wellho.net/mouth/937_Display-an-image-from-a-MySQL-database-in-a-web-page-via-PHP.html

http://www.wellho.net/solutions/php-example-php-form-image-upload-store-in-mysql-database-retreive.html
^^ This one is a little more intense and has a walk through of the entire process.  Upload, store, retrive and display. 