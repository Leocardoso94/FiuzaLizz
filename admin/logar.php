<?php 
include '../connect.php';
session_start();
$row = mysqli_query($con,"SELECT * from admin WHERE login = '".$_POST['login']."'");
$ln = mysqli_fetch_assoc($row);
$senha = $ln['senha'];
if ($senha === $_POST['senha']) {
	

$_SESSION['loginAdm'] = $_POST['login'];
$_SESSION['senhaAdm'] = $_POST['senha'];
header("Location: index.php");
}else{
	header("Location: login.php?login=falhou");
}

 ?>