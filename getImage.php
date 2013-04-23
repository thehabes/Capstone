<?php

  
  $link = mysql_connect("localhost", "root", "root");
  mysql_select_db("Homology");
  $sql = "SELECT name FROM pic";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpg");
  echo $row['name'];
?>