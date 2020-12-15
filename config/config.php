
<?php
$mysqli = new mysqli();//Pass Db name,and MySQL Crednitials 

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
