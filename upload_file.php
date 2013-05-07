<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="Homology"; // Database  name 
$tbl_name="fishbones"; // Table name 
$vidpath="videos/";
$imgpath = "images/";

$family= $_POST["family"];
$order= $_POST["order"];
$genus= $_POST["genus"];
$species= $_POST["species"];
$bone= $_POST["bone"];


$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));

  if ($_FILES["image"]["error"] > 0 || $_FILES["video"]["error"] >0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Image Upload: " . $_FILES["image"]["name"] . "<br>";
	echo "Image Type: " . $_FILES["image"]["type"] . "<br>";
	echo "Image Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
	echo "Image Going to: " . $imgpath."<br>"; 
	echo "Video Upload: " . $_FILES["vid"]["name"] . "<br>";
	echo "Video Type: " . $_FILES["vid"]["type"] . "<br>";
    echo "Video Size: " . ($_FILES["vid"]["size"] / 1024) . " kB<br>";
	echo "Video Going to: " . $vidpath . "<br>"; 
	
$img=$_FILES["image"]["name"];
$vid=$_FILES["vid"]["name"];

    if (file_exists($imgpath . $_FILES["image"]["name"]))
      {
      echo $_FILES["image"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $imgpath . $_FILES["image"]["name"]);
      echo "Stored in: " . $imgpath . $_FILES["image"]["name"];
      }
	  
	  if (file_exists($vidpath . $_FILES["vid"]["name"]))
      {
      echo $_FILES["vid"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["vid"]["tmp_name"],
      $vidpath . $_FILES["vid"]["name"]);
      echo "Stored in: " . $vidpath . $_FILES["vid"]["name"];
      }
    }

$imgfullpath=$imgpath.$img."/";
$vidfullpath=$vidpath.$vid."/";


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// Insert data into mysql 
$sql="INSERT INTO $tbl_name(bone,forder,family,genus,species,location,video) VALUES('$bone','$order','$family','$genus','$species','$img','$vid')";
$result=mysql_query($sql); ?>

<?php
// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='admin.php'>Back to admin page</a>";
}

else {
echo "ERROR";
}

// close connection 
mysql_close();
?>
