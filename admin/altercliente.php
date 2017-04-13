<?php include '../connect.php'; 
header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['loginAdm'])) {
	header("Location: login.php");
}
$query = mysqli_query($con,"SELECT * FROM `clientes` where `id` = ".$_GET['id']);
while ($row = mysqli_fetch_array($query)) {
	$nome = $row['Nome'];
	$id = $row['id'];
	$sobrenome = $row['Sobrenome'];
	$email = $row['Email'];
	$cpf = $row['CPF'];
	$senha = $row['Senha'];
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
			<h4 class="text-center">Alterar Cliente</h4>
		</div>
		<div class="row">
			<a href="clientes.php"><button type="button" class="btn btn-danger pull-right"><i class="fa fa-undo" aria-hidden="true"></i></button></a>
		</div>
		<form accept-charset="utf-8" action="alter.php" enctype="multipart/form-data"  method="POST">
			<div class="form-group">
				<label for="name">Nome</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Nome" value='<?php echo ($nome); ?>' >
			</div>
			<div class="form-group">
				<label for="sobrenome">Sobrenome</label>
				<input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value='<?php echo ($sobrenome); ?>' >
			</div>
			<div class="form-group">
				<label for="cpf">CPF</label>
				<input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo ($cpf);?>" placeholder="CPF" >
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email"   class="form-control" id="email" name="email" placeholder="Email" value="<?php echo ($email);?>">
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" value='<?php echo ($senha); ?>' name="senha" id="senha" >
			</div>			
			<input type="text" id="tipo" name="tipo" value="cliente">
			<input type="text" id="tipo" name="id" value="<?php echo $id ?>">
			<input class="btn btn-primary center-block" type="submit" value="
			Alterar" name="submit">
		</form>
	</div>
	<!--conteudo -->
</body>
</html>