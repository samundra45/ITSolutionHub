<?php 

$conn=new mysqli("localhost","root","","it_sol");

if (mysqli_connect_errno()) {
  echo "MK Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 ?>