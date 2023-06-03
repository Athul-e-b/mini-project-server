<?php
$connect = mysqli_connect("localhost","root","","mini_project");
$error = '';
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>