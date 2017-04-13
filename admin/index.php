<?php 
include '../connect.php';
if (!isset($_SESSION['loginAdm'])) {
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Painel Administrativo</title>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/74ca2ac1e8.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/estilo.css">
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
		<h2 class="text-center">Estatísticas</h2>
		<hr>
		<br><br>
		<div class="row">
			<?php 
			$total = mysqli_query($con,"SELECT COUNT(*) AS total FROM pedido");
			$ln = mysqli_fetch_assoc($total);
			$total = $ln['total'];
			?>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="tile">
					<div class="tile-heading">Total de Pedidos <span class="pull-right">
					</span>
				</div>
				<div class="tile-body">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<h2 class="pull-right"><?php echo $total ?></h2>
				</div>
				<div class="tile-footer">
					<a href="pedido.php">Mais Detalhes...</a>
				</div>
			</div>
		</div>
		<?php 
		$total = mysqli_query($con,"SELECT SUM(total) AS total FROM pedido");
		$ln = mysqli_fetch_assoc($total);
		$total = number_format($ln['total'],2,',','.');
		?>
		<div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
			<div class="tile-heading">Total de Vendas <span class="pull-right">
			</span></div>
			<div class="tile-body"><i class="fa fa-credit-card"></i>
				<h2 class="pull-right"><?php echo $total; ?></h2>
			</div>
			<div class="tile-footer"><a href="pedido.php">Mais Detalhes...</a></div>
		</div>
	</div>
	<?php 
	$total = mysqli_query($con,"SELECT COUNT(*) AS total FROM clientes");
	$ln = mysqli_fetch_assoc($total);
	$total = $ln['total'];
	?>
	<div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
		<div class="tile-heading">Total de Clientes <span class="pull-right">
		</span></div>
		<div class="tile-body"><i class="fa fa-user"></i>
			<h2 class="pull-right"><?php echo $total; ?></h2>
		</div>
		<div class="tile-footer"><a href="clientes.php">Mais Detalhes...</a></div>
	</div>
</div>
<?php 
$total = mysqli_query($con,"SELECT COUNT(*) AS total FROM produto");
$ln = mysqli_fetch_assoc($total);
$total = $ln['total'];
?>
<div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
	<div class="tile-heading">Total de Produtos</div>
	<div class="tile-body"><i class="fa fa-users"></i>
		<h2 class="pull-right"><?php echo $total; ?></h2>
	</div>
	<div class="tile-footer"><a href="product.php">Mais Detalhes...</a></div>
</div>
</div>
</div>
<div class="row">	
	<div class="col-lg-12 col-md-12 col-sm-12"><div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Últimos Pedidos</h3>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<td class="text-right">ID do Pedido</td>
						<td>Cliente</td>
						<td>Status</td>
						<td>Adicionado em</td>
						<td class="text-right">Total</td>
						<td class="text-right">Ação</td>
					</tr>
				</thead>
				<tbody>
				<?php 
	$query = mysqli_query($con,"SELECT * 
FROM  `pedido` 
ORDER BY  `pedido`.`idPedido` DESC 
LIMIT 0 , 10");
	while ($row = mysqli_fetch_array($query)) {
		$idPedido = $row['idPedido'];
		$total = $row['total'];
		$data = $row['Data'];
		$data = date_create($data);
		$buscarCliente = mysqli_query($con, "SELECT Nome, Sobrenome, Email FROM clientes WHERE id = ".$row['idClientes']);
		$ln = mysqli_fetch_assoc($buscarCliente);
		$nome = $ln['Nome'];	
		$email = $ln['Email'];
		$sobrenome = $ln['Sobrenome'];
		$buscarSituacao = mysqli_query($con, "SELECT Pagamento FROM cobranca WHERE idPedido = ".$idPedido);
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
	
	?>
					<tr>
						<td class="text-right"><?php echo $idPedido ?></td>
						<td><?php echo $nome." ".$sobrenome ?></td>
						<td><?php echo $situacao ?></td>
						<td><?php echo date_format($data, 'd/m/Y');; ?></td>
						<td class="text-right">R$ <?php echo number_format($total,2,".",",") ?></td>
						<td class="text-right"><a href="alterpedido.php?id=<?php echo $idPedido ?>" data-toggle="tooltip" title="Visualizar" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
					</tr>
					<?php } ?>
				
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
<!--conteudo -->
</body>
</html>