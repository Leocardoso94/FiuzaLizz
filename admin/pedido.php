<?php include '../connect.php'; 

header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['loginAdm'])) {
	header("Location: login.php");
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
			<h4 class="text-center">Pedidos</h4>
		</div>
		<!--<div class="row">
			<a href="addcliente.php"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
		</div>-->
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Número do Pedido</th>
					<th>Nome Do Comprador</th>
					<th>Email Do Comprador</th>
					<th>Situação</th>
					<th>Total</th>
					<th>Editar</th>
				</tr>
			</thead>
			<?php 
			$query = mysqli_query($con,"SELECT * FROM `pedido` ORDER BY `pedido`.`idPedido` DESC");
			while ($row = mysqli_fetch_array($query)) {
				
				$idPedido = $row['idPedido'];
				$total = $row['total'];

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
				
				echo '
				<tr>
					<td>'.$idPedido.'</td>
					<td>'.$nome.' '.$sobrenome.'</td>	
					<td>'.$email.'</td>
					<td>'.$situacao.'</td>
					<td>R$ '.number_format($total,2,',','.').'</td>			
					<td><a href="alterpedido.php?id='.$idPedido.'"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></button></a></td>			
				</tr>
				';
			}
			?>
		</table>	
	</div>	
	<!--conteudo -->

</body>
</html>