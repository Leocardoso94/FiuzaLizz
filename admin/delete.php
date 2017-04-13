<?php 

include '../connect.php';

$tipo = $_POST['tipo'];


switch ($tipo) {
	case "produto":
	$id = $_POST['produto'];
	mysqli_query($con,"DELETE FROM `produto` WHERE `produto`.`idProduto` =".$id);
	header("Location: product.php");
	break;

	case "marca":
	$nome = $_POST['marca'];
	mysqli_query($con,"DELETE FROM `marca` WHERE `Nome` = '".$nome."'");
	header("Location: marca.php");
	break;

	case "categoria":
	$nome = $_POST['categoria'];
	mysqli_query($con,"DELETE FROM `categoria` WHERE `NomeCategoria` = '".$nome."'");
	header("Location: categoria.php");
	break;
	
	default:
		# code...
	break;
}

?>