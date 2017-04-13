<?php include '../connect.php'; 

header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['loginAdm'])) {
	header("Location: login.php");
}
$query = mysqli_query($con,"SELECT * FROM pedido WHERE idPedido = '".$_GET['id']."'");
while ($row = mysqli_fetch_array($query)) {
	$numeroPedido = $row['idPedido'];	
	$total = $row['total'];
	$idEntrega = $row['idEntrega'];

	$buscaFrete = mysqli_query($con,'SELECT * FROM entrega WHERE idEntrega = '.$idEntrega);
	$lnFrete = mysqli_fetch_assoc($buscaFrete);
	$tipoEntrega = $lnFrete['Tipo'];
	$frete = $lnFrete['Custo'];
	$buscarCliente = mysqli_query($con, "SELECT Nome, Sobrenome, Email FROM clientes WHERE id = ".$row['idClientes']);
	$ln = mysqli_fetch_assoc($buscarCliente);
	$nome = $ln['Nome'];	
	$email = $ln['Email'];
	$sobrenome = $ln['Sobrenome'];
	$buscarTel = mysqli_query($con, "SELECT Numero FROM contato WHERE idCliente = ".$row['idClientes']);
	$lnTel = mysqli_fetch_assoc($buscarTel);
	$telefone = $lnTel['Numero']; 
	$buscarSituacao = mysqli_query($con, "SELECT Pagamento FROM cobranca WHERE idPedido = ".$numeroPedido);
	$ln = mysqli_fetch_assoc($buscarSituacao);
	if ($ln['Pagamento'] == 0) {
		$situacao = 'Aguardando Pagamento';
	} 
	elseif ($ln['Pagamento'] == 1) {
		$situacao = 'Separando para entrega';
	} 
	elseif ($ln['Pagamento'] == 2) {
		$situacao = 'Enviado';
	} 				
	elseif ($ln['Pagamento'] == 3) {
		$situacao = 'Concluído';
	}else{
		$situacao = 'Cancelado';
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Painel Administrativo</title>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/74ca2ac1e8.js"></script>
	<script src="js/script.js"></script>
</head>
<body>	
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">FiuzaLizz</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="clientes.php">Clientes</a></li>
					<li><a href="product.php">Produtos</a></li>
					<li><a href="marca.php">Marcas</a></li>
					<li><a href="categoria.php">Categorias</a></li>
					<li><a href="pedido.php">Pedidos</a></li>
					<!--<li class="dropdown" >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catálogo <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="product.php">Produtos</a></li>
							<li><a href="marca.php">Marcas</a></li>
							<li><a href="categoria.php">Categorias</a></li>
						</ul>
					</li>-->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout</a></li>	
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!--conteudo -->
	<div class="container">
		<div class="row">
			<h4 class="text-center">Informações do Pedido</h4>
		</div>
		<div class="row">
			<a href="pedido.php"><button type="button" class="btn btn-danger pull-right"><i class="fa fa-undo" aria-hidden="true"></i></button></a>
		</div>
		<form accept-charset="utf-8" action="alter.php" enctype="multipart/form-data"  method="POST">

		<h4>Situação atual: <b style="color: green"><?php echo $situacao ?></b></h4>

		<div class="form-group">
				<label for="numeroPedido">Alterar Situação do Pedido</label>				
				<select name="situacao">
					<option name="situacao" value="0">Aguardando Pagamento</option>
					<option name="situacao" value="1">Separado para a entrega</option>
					<option name="situacao" value="2">Enviado</option>
					<option name="situacao" value="3">Concluído</option>
					<option name="situacao" value="4">Cancelado</option>
				</select>
			</div>

			<input class="btn btn-warning" type="submit" value="Alterar" name="submit">
			<br><br>

			<div class="form-group">
				<label for="numeroPedido">Número do Pedido</label>
				<input type="text" class="form-control" disabled id="numeroPedido"  value='<?php echo ($numeroPedido); ?>' >
			</div>
			<div class="form-group">
				<label for="cliente">Comprador</label>
				<input type="text" class="form-control" disabled  id="cliente"  value='<?php echo ($nome.' '.$sobrenome); ?>' >
			</div>	
			<div class="form-group">
				<label for="numeroPedido">Email do Comprador</label>
				<input type="text" class="form-control" disabled id="numeroPedido"  value='<?php echo ($email); ?>' >
			</div>	
			<div class="form-group">
				<label for="contato">Contato do comprador</label>
				<input type="text" class="form-control" disabled id="contato"  value='<?php echo ($telefone); ?>' >
			</div>	
			<table class="table">
				<thead>
					<p class="text-center"><b>Informações Gerais da Compra</b></p>
					<tr>
						<th colspan="2">Produto</th>
						<th>Preço</th>
						<th>Quantidade</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					$query = mysqli_query($con,"SELECT * FROM `produto_pedido` WHERE idPedido = ".$numeroPedido);
					$totalTudao = 0;
					while ($row = mysqli_fetch_array($query)) {
						$quantidade = $row['Quantidade'];
						$qr = mysqli_query($con,'SELECT * FROM produto WHERE idProduto = '.$row['idProduto']);
						$ln = mysqli_fetch_assoc($qr);
						$imagem = $ln['Imagem'];
						$nomeProduto = $ln['Nome'];
						$preco = $ln['Preco'];
						$totalUni = floatval($quantidade) * floatval($preco);
						$totalTudao+=$totalUni;
						?>
						<tr class="border" >
							<td colspan="2" class="product-cart-image">
								<img  src="../<?php echo $imagem; ?>" alt=""/>
								<a target="_blank" href="../single.php?id=<?php echo $row['idProduto']; ?>"><?php echo $nomeProduto; ?></a>
							</td>
							<td><span><?php echo 'R$ '.number_format($preco, 2, ',', '.'); ?></span></td>
							<td><?php echo $quantidade; ?></td>
							<td><?php echo 'R$ '.number_format($totalUni, 2, ',', '.'); ?></td>
						</tr>
						<?php  }?>
						<td class="text-center" colspan="5"><b>Total da Compra: R$ <?php echo number_format($total,2,'.',',')?></b></td>
					</tbody>
				</table>
				<input type="text" id="tipo" name="tipo" value="pedido">
				<input type="text" id="tipo" name="id" value="<?php echo $numeroPedido ?>">
				<input class="btn btn-primary center-block" type="submit" value="Enviar" name="submit">
			</form>
		</div>
		<!--conteudo -->
	</body>
	</html>