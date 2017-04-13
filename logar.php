<?php 

include 'connect.php';
$row = mysqli_query($con,"SELECT * from clientes WHERE Email = '".$_POST['email']."'");
$ln = mysqli_fetch_assoc($row);
$senha = $ln['Senha'];
if ($senha === $_POST['senha']) {
	$_SESSION['login'] = $_POST['email'];
	$_SESSION['senha'] = $senha;
	echo($_SESSION['login']);
	header("Location: index.php");
}else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header("Location: login.php?login=falhou");
}

?>