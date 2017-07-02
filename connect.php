<?php

if(!isset($_SESSION)){
  session_start();
}

$servername = "";
$username = "";
$password = "";
$database = "";

$con=mysqli_connect($servername,$username,$password,$database);

?>