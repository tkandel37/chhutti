<?php
$con=mysqli_connect("localhost","root","","assignment");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(E_ALL ^ E_NOTICE);
?>