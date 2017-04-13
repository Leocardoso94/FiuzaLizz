<?php 
include 'connect.php';

if (isset($_POST['cadastrais'])) {
	$sql = "UPDATE  `clientes` SET  
`CPF` =  '".$_POST['cpf']."',
`Nome` =  '".$_POST['nome']."',
`Sobrenome` =  '".$_POST['sobrenome']."',
`Sexo` =  '".$_POST['sexo']."',
`Nome` =  '".$_POST['nome']."',
`Data_Nascimento` =  '".$_POST['data']."',
`Email` = '".$_POST['email']."' 
WHERE  `clientes`.`id` ='".$_POST['cadastrais']."'";
mysqli_query($con,$sql);
$logado = $_POST['email'];
$_SESSION['login'] = $_POST['email'];
header('Location: account.php');
}

if (isset($_POST['enderecos'])) {
	$sql = "UPDATE `endereco` SET  
`TipoEndereco` =  '".$_POST['tipoEnd']."',
`CEP` =  '".$_POST['cep']."',
`Rua` =  '".$_POST['endereco']."',
`Numero` =  '".$_POST['numero']."',
`Complemento` =  '".$_POST['complemento']."',
`Bairro` =  '".$_POST['bairro']."',
`Cidade` =  '".$_POST['cidade']."',
`Estado` =  '".$_POST['estado']."' WHERE  idCliente ='".$_POST['enderecos']."'";
mysqli_query($con,$sql);
header('Location: account.php');
}

if (isset($_POST['acesso'])) {
	$sql = "UPDATE  `fiuzalizz`.`clientes` SET  `Email` = '".$_POST['email']."',
`Senha` =  '".$_POST['senha']."' WHERE  `clientes`.`id` ='".$_POST['acesso']."'";

mysqli_query($con,$sql);
$logado = $_POST['email'];
$_SESSION['senha'] = $_POST['senha'];
$_SESSION['login'] = $_POST['email'];
header('Location: account.php');
}

if (isset($_POST['contato'])) {
	$sql = "UPDATE  `fiuzalizz`.`contato` SET  `Numero` =  '".$_POST['cel']."',
`Tipo` =  '".$_POST['tipoTel']."' WHERE  `contato`.`idCliente` = ".$_POST['contato'];

mysqli_query($con,$sql);
header('Location: account.php');
}
 ?>