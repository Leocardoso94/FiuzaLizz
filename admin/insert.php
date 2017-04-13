<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Document</title>
</head>
<body>
	

	<?php 
	include '../connect.php';
	header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['loginAdm'])) {
	header("Location: login.php");
}

	$tipo = $_POST['tipo'];

	switch ($tipo) {
		case "produto":
		$cat = ($_POST['cat']);
		$descr = $_POST['descr'];
		$estoque = $_POST['estoque'];
		$marca = $_POST['marca'];
		$nome = $_POST['name'];
		$vendas = $_POST['vendas'];
		$peso = $_POST['peso'];
		$preco = $_POST['preco'];

		$location = '../images/produto/';

		if (isset($_FILES['fileUpload'])) {
			$name = $_FILES['fileUpload']['name'];
			$tmp_name = $_FILES['fileUpload']['tmp_name'];
			$error = $_FILES['fileUpload']['error'];
			if ($error !== UPLOAD_ERR_OK ) {
				echo 'Erro ao fazer o upload:', $error;
			} elseif (move_uploaded_file($tmp_name, $location . $name)) {
				echo 'Uploaded <br>';
				if(mysqli_query($con,"INSERT INTO `produto` (`Nome`, `Marca`, `Categoria`, `Peso`, `Estoque`, `Descricao`, `Preco`, `numeroVendas`, `Imagem`) VALUES ('".$nome."', '".$marca."', '".$cat."', '".$peso."', '".$estoque."', '".$descr."', '".$preco."', '".$vendas."', 'images/produto/". $name."')")){
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}    
			}
		} else {
			echo 'Selecione um arquivo para fazer upload';
		}
		header("Location: product.php");	
		break;

		case "marca":
		$descr = $_POST['descr'];
		$nome = $_POST['name'];
		$location = '../images/marca/';
		if (isset($_FILES['fileUpload'])) {
			$name = $_FILES['fileUpload']['name'];
			$tmp_name = $_FILES['fileUpload']['tmp_name'];
			$error = $_FILES['fileUpload']['error'];
			if ($error !== UPLOAD_ERR_OK ) {
				echo 'Erro ao fazer o upload:', $error;
			} elseif (move_uploaded_file($tmp_name, $location . $name)) {
				echo 'Uploaded <br>';
				if(mysqli_query($con,"INSERT INTO `marca` (`Nome`, `Descricao`, `imagem`) VALUES ('".$nome."', '".$descr."', 'images/marca/". $name."')")){
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}    
			}
		} else {
			echo 'Selecione um arquivo para fazer upload';
		}
		header("Location: marca.php");
		break;

		case "categoria":
		$nome = $_POST['name'];
		if(mysqli_query($con,"INSERT INTO categoria (`NomeCategoria`) VALUES ('".$nome."')")){
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}    
		
		header("Location: categoria.php");
		break;

		default:
		# code...
		break;
	}
	?>
	
</body>
</html>