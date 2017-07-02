<?php
if(!isset($_SESSION)){
  session_start();
}
ini_set('default_charset','UTF-8');
ini_set( 'default_charset', 'UTF-8' );
ini_set( 'mbstring.http_output', 'UTF-8' );
ini_set( 'mbstring.internal_encoding', 'UTF-8' );
$servername = " sql101.rf.gd";
$username = " rfgd_20322866";
$password = "";
$database = 'rfgd_20322866_fiuzalizz';
try {
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	header('Content-Type: text/html; charset=utf-8');
	
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully"; 
}
catch(PDOException $e)
{
   // echo "Connection failed: " . $e->getMessage();
}

$mysqli = new mysqli($servername, $username, "", $database);

/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

/* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) {
  printf("Error loading character set utf8: %s\n", $mysqli->error);
} else {
     // printf("Current character set: %s\n", $mysqli->character_set_name());
}

$mysqli->close();
$con=mysqli_connect(" sql101.rf.gd"," rfgd_20322866","","rfgd_20322866_fiuzalizz
");



?>