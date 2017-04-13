<?php 
include 'connect.php';

mysqli_query($con, "INSERT INTO `clientes` ( `CPF`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Sexo`, `Data_Nascimento`) VALUES ('".$_POST['cpf']."', '".$_POST['nome']."', '".$_POST['sobrenome']."', '".$_POST['email']."', '".$_POST['senha']."', '".$_POST['sexo']."', '".$_POST['data']."')");

$row = mysqli_query($con,"SELECT MAX(id) as id FROM clientes");
$ln = mysqli_fetch_assoc($row);
$id = $ln['id'];

mysqli_query($con,"INSERT INTO `contato` (`idCliente`,`Tipo`, `Numero`) VALUES ('".$id."','".$_POST['tipoTel']."', '".$_POST['cel']."')");



mysqli_query($con,"INSERT INTO  `endereco` (`idCliente`, `TipoEndereco` ,`CEP` ,`Rua` ,`Numero` ,`Complemento` ,`Bairro` ,`Cidade` ,`Estado`)VALUES ('".$id."','".$_POST['tipoEnd']."',  '".$_POST['cep']."',  '".$_POST['endereco']."',  '".$_POST['numero']."', '".$_POST['complemento']."' ,  '".$_POST['bairro']."',  '".$_POST['cidade']."',  '".$_POST['estado']."');");


header("Location: index.php");

?>