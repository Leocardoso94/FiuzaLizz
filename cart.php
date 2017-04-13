<?php
include 'connect.php';
# esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
}
else{
	$logado = $_SESSION['login'];
}

if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();
}


      //adiciona produto

if(isset($_GET['acao'])){

         //ADICIONAR CARRINHO
	if($_GET['acao'] == 'add'){
		$id = intval($_GET['id']);
		if(!isset($_SESSION['carrinho'][$id])){
			$_SESSION['carrinho'][$id] = $_GET['qntd'];
		}else{
			$_SESSION['carrinho'][$id] += $_GET['qntd'];
		}
	}
         //REMOVER CARRINHO
	if($_GET['acao'] == 'del'){
		$id = intval($_GET['id']);
		if(isset($_SESSION['carrinho'][$id])){
			unset($_SESSION['carrinho'][$id]);
		}
	}
		//LIMPAR CARRINHO
	if($_GET['acao'] == 'limpar'){
		$_SESSION['carrinho'] = array();
	}

         //ALTERAR QUANTIDADE
	if($_GET['acao'] == 'up'){		
		$_SESSION['carrinho'][$_GET['id']] = $_GET['qntd'];
	}

}



$total = 0;
$itens=0;

foreach($_SESSION['carrinho'] as $id => $qtd){
	$sql   = "SELECT *  FROM produto WHERE idProduto = '".$id."'";
	$qr    = mysqli_query($con,$sql) or die(mysqli_error($con));
	$ln    = mysqli_fetch_assoc($qr);

	$nome  = $ln['Nome'];
	$img = $ln['Imagem'];
	$preco = number_format($ln['Preco'], 2, ',', '.');
	$sub   = number_format($ln['Preco'] * $qtd, 2, ',', '.');

	$total += $ln['Preco'] * $qtd;
	$itens += $qtd;
}
$total = number_format($total, 2, ',', '.');



?>
