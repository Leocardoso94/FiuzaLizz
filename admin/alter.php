<?php 
	include '../connect.php';
	header('Content-Type: text/html; charset=utf-8');
	$tipo = $_POST['tipo'];
	ini_set('default_charset', 'UTF-8');
	switch ($tipo) {
		case "produto":
		$id = $_POST['id'];
		$cat = $_POST['cat'];
		$descr = $_POST['descr'];
		$estoque = $_POST['estoque'];
		$marca = $_POST['marca'];
		$nome = $_POST['name'];
		$vendas = $_POST['vendas'];
		$peso = $_POST['peso'];
		$preco = $_POST['preco'];
		$location = '../images/produto/';
		if(!empty($_FILES['fileUpload']['name'])) {
			$name = $_FILES['fileUpload']['name'];
			$tmp_name = $_FILES['fileUpload']['tmp_name'];
			$error = $_FILES['fileUpload']['error'];
			move_uploaded_file($tmp_name, $location . $name);
			mysqli_query($con,"UPDATE `produto` SET `Nome` = '".$nome."', `Marca` = '".$marca."', `Categoria` = '".$cat."', `Peso` = '".$peso."', `Descricao` = '".$descr."', `Preco` = '".$preco."', `numeroVendas` = '".$vendas."', `Imagem` = 'images/produto/". $name."' WHERE idProduto ='".$id."'");
		}else{
			mysqli_query($con,"UPDATE `produto` SET `Nome` = '".$nome."', `Marca` = '".$marca."', `Categoria` = '".$cat."', `Peso` = '".$peso."', `Descricao` = '".$descr."', `Preco` = '".$preco."', `numeroVendas` = '".$vendas."' WHERE idProduto ='".$id."'");
		}
		header("Location: product.php");	
		break;
		case "marca":
		$id = $_POST['id'];
		$descr = $_POST['descr'];	
		$nome = $_POST['name'];		
		$location = '../images/marca/';
		if(!empty($_FILES['fileUpload']['name'])) {
			$name = $_FILES['fileUpload']['name'];
			$tmp_name = $_FILES['fileUpload']['tmp_name'];
			$error = $_FILES['fileUpload']['error'];
			move_uploaded_file($tmp_name, $location . $name);
			mysqli_query($con,"UPDATE `marca` SET `Nome` = '".$nome."', `Descricao` = '".$descr." ', `imagem` = 'images/marca/".$name." ' WHERE `Nome` = '".$id."'");
			echo "1";
		}else{
			mysqli_query($con,"UPDATE `marca` SET `Nome` = '".$nome."', `Descricao` = '".$descr."'  WHERE `Nome` = '".$id."'");
		}
		header("Location: marca.php");	
		break;
		case "categoria":
		$id = $_POST['id'];
		$nome = $_POST['name'];		
		$location = '../images/marca/';
		mysqli_query($con,"UPDATE `categoria` SET `NomeCategoria` = '".$nome."' WHERE `NomeCategoria` = '".$id."'");
		header("Location: categoria.php");	
		break;
		case "cliente":
		$id = $_POST['id'];
		$nome = $_POST['name'];
		$sobrenome = $_POST['sobrenome'];
		$email = $_POST['email'];	
		$cpf = $_POST['cpf'];
		$senha = $_POST['senha'];	
		mysqli_query($con,"UPDATE `clientes` SET
		 `Nome` = '".$nome."',
		 `Sobrenome` = '".$sobrenome."',
		 `Email` = '".$email."',
		 `CPF` = '".$cpf."',
		 `Senha` = '".$senha."'
		 WHERE `clientes`.`id` = ".$id);
		header("Location: clientes.php");	
		break;
		case 'pedido':
			mysqli_query($con, "UPDATE `cobranca` SET `Pagamento` = '".$_POST['situacao']."' WHERE `cobranca`.`idPedido` = ".$_POST['id']);
			header("Location: pedido.php");	

		break;
		default:		
		break;
	}
?>