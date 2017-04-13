<?php 
include 'connect.php'; 
header('Content-Type: text/html; charset=utf-8'); 
include 'cart.php';
$url = pathinfo( __FILE__ );

if (!isset($logado)) {
	header("Location: login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FiuzaLizz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/component.css" rel='stylesheet' type='text/css' />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- Custom Theme files -->
	<!--webfont-->
	<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script src="js/jquery.easydropdown.js"></script>
	<script src="js/cart.js"></script>
	<script src="js/MarcaraValidacao.js"></script>
	<style>
		.clickable
		{
			cursor: pointer;
		}

		.clickable .glyphicon
		{
			background: rgba(0, 0, 0, 0.15);
			display: inline-block;
			padding: 6px 12px;
			border-radius: 4px;
		}
		.panel-heading{
			background-color: #f9d9be;
			border: 1px solid;
		}
		.panel-body {
			border: 0.5px solid #ded6d6;
			border-radius: 2px;
		}
		.panel-heading span{
			margin-top: -23px;
			font-size: 15px;
			margin-right: -9px;
		}
		a.clickable { color: inherit; }
		a.clickable:hover { text-decoration:none; }
	</style>
	<script>
		$(document).on('click', '.panel-heading span.clickable', function (e) {
			var $this = $(this);
			if (!$this.hasClass('panel-collapsed')) {
				$this.parents('.panel').find('.panel-body').slideUp();
				$this.addClass('panel-collapsed');
				$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
			} else {
				$this.parents('.panel').find('.panel-body').slideDown();
				$this.removeClass('panel-collapsed');
				$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
			}
		});
		$(document).on('click', '.panel div.clickable', function (e) {
			var $this = $(this);
			if (!$this.hasClass('panel-collapsed')) {
				$this.parents('.panel').find('.panel-body').slideUp();
				$this.addClass('panel-collapsed');
				$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
			} else {
				$this.parents('.panel').find('.panel-body').slideDown();
				$this.removeClass('panel-collapsed');
				$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
			}
		});
		$(document).ready(function () {
			$('.panel-heading span.clickable').click();
			$('.panel div.clickable').click();
		});

	</script>
</head>
<body>
	<div class="men_banner">
		<div class="container">
			<div class="header_top">
				<div class="header_top_left">
					<div class="box_11"><a href="checkout.php">
						<h4><p>Carrinho: R$ <span class="simpleCart_total"><?php echo($total); ?></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"><?php echo($itens); ?></span> itens)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
					</a></div>
					<p class="empty"><a href="<?php $url ?>?acao=limpar" class="simpleCart_empty">Esvaziar Carinho</a></p>
					<div class="clearfix"> </div>
				</div>
				<div class="header_top_right">

					<ul class="header_user_info">
						<a class="login" href="account.php">
							<i class="user"> </i> 
							<li class="user_desc">
								<?php 
								if (!isset($_SESSION['login'])) {
									echo "Minha Conta";
								}else{
									$sql = "SELECT * FROM clientes WHERE Email = '".$logado."'";
									$qr    = mysqli_query($con,$sql) or die(mysqli_error($con));						
									$ln    = mysqli_fetch_assoc($qr);
									echo $ln['Nome']." | <a href=\"logout.php\"> Sair</a>";
								}
								?>
							</li>
						</a>
						<div class="clearfix"> </div>
					</ul>
					<!-- start search-->
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form method="GET" action="men.php">
								<input class="sb-search-input" placeholder="Busca..." type="search" name="val" id="search">
								<input style="display: none" type="" name="filter" value="nome">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
					<!----search-scripts---->
					<script src="js/classie1.js"></script>
					<script src="js/uisearch.js"></script>
					<script>
						new UISearch( document.getElementById( 'sb-search' ) );
					</script>
					<!----//search-scripts---->
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="header_bottom">
				<div class="logo">
					<h1><a href="index.php"><span class="m_1">F</span>iuza<span class="m_1">L</span>izz</a></h1>
				</div>
				<div class="menu">
					<ul class="megamenu skyblue">
						<li class="active grid"><a class="color2" href="men.php">Loja</a>
							<div class="megapanel">
								<div class="row">
									<div class="col1">
										<div class="h_nav">
											<h4>Homens</h4>
											<ul>
												<li><a href="men.php?filter=cat&val=Perfumes">Perfumes</a></li>
												<li><a href="men.php?filter=cat&val=Desodorante">Desodorantes</a></li>	
												<li><a href="men.php?filter=cat&val=Kit">Kits</a></li>						
												<li><a href="men.php?filter=cat&val=Outro">Outros</a></li>	
											</ul>	
										</div>							
									</div>
									<div class="col1">
										<div class="h_nav">
											<h4>Mulheres</h4>
											<ul>
												<li><a href="men.php?filter=cat&val=Perfumes">Perfumes</a></li>
												<li><a href="men.php?filter=cat&val=">Corpo e Banho</a></li>	
												<li><a href="men.php?filter=cat&val=Kit">Kits</a></li>						
												<li><a href="men.php?filter=cat&val=Outro">Outros</a></li>	
											</ul>	
										</div>	
									</div>	
									<div class="col2">
										<div class="h_nav">
											<h4>Populares</h4>
											<ul class="">
												<?php 
												$query = mysqli_query($con,"SELECT * FROM produto ORDER BY produto.numeroVendas LIMIT 3");

												while ($row = mysqli_fetch_array($query)) {
													$idProduto = $row['idProduto'];
													$nome = $row['Nome'];
													$preco = $row["Preco"];
													$img = $row["Imagem"];
													$categoria = $row["Categoria"];
													echo '
													<li class>
														<div class="p_left">
															<img src="'.$img.'" class="img-responsive trend" alt=""/>
														</div>
														<div class="p_right">
															<h4><a href="single.php?id='.$idProduto.'">'.$nome.'</a></h4>
															<span class="item-cat"><small><a href="men.php?filter=cat&val='.$categoria.'">'.$categoria.'</a></small></span>
															<span class="price">R$ '.number_format($preco,2,",",".").'</span>
														</div>
														<div class="clearfix"> </div>
													</li>
													<li>
														<hr>
														';
													}
													?>
												</ul>	
											</div>												
										</div>
									</div>
								</div>
							</li>
							<li><a class="color10" href="brands.php">Marcas</a></li>
							<li class="active grid"><a class="color3" href="index.php">Ofertas</a></li>
							<li><a class="color7" href="404.php">Notícias</a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="container">
			<hr>
			
			<h4>Minha Conta</h4>
			<?php 
			$sql = "SELECT * FROM clientes WHERE Email = '".$logado."'";
			$qr = mysqli_query($con,$sql) or die(mysqli_error($con));
			$ln = mysqli_fetch_assoc($qr);
			$id =  $ln['id'];
			$cpf =  $ln['CPF'];
			$data =  $ln['Data_Nascimento'];
			$email = $logado;
			$nome = $ln['Nome'];
			$senha = $ln['Senha'];
			$sexo = $ln['Sexo'];
			$sobrenome = $ln['Sobrenome'];
			$sql = "SELECT * FROM endereco WHERE idCliente = '".$id."'";
			$qr = mysqli_query($con,$sql) or die(mysqli_error($con));
			$ln = mysqli_fetch_assoc($qr);
			$cep =  $ln['CEP'];
			$bairro =  $ln['Bairro'];
			$cidade = $ln['Cidade'];
			$complemento = $ln['Complemento'];
			$estado = $ln['Estado'];
			$numero = $ln['Numero'];
			$rua = $ln['Rua'];
			$tipoEndereco = $ln['TipoEndereco'];
			$sql = "SELECT * FROM contato WHERE idCliente = '".$id."'";
			$qr = mysqli_query($con,$sql) or die(mysqli_error($con));
			$ln = mysqli_fetch_assoc($qr);
			$tipoTelefone = $ln['Tipo'];
			$telefone = $ln['Numero'];
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="panel ">
						<div class="panel-heading clickable">
							<h3 class="panel-title">Meus Pedidos</h3>
							<span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
						</div>
						<div class="panel-body">
							<table class="table">
								<tr>
									<th>Pedido</th>
									<th>Valor</th>
									<th>Status</th>
									<th></th>
								</tr>
								<?php 
								$qr = mysqli_query($con,"SELECT * FROM pedido WHERE idClientes = ".$id);
								while ($row = mysqli_fetch_array($qr)) {										
									$sql = mysqli_query($con,"SELECT Pagamento FROM cobranca WHERE idPedido =".$row['idPedido']);
									$ln2 = mysqli_fetch_assoc($sql);
									$cobranca = $ln2['Pagamento'];
									if ($ln2['Pagamento'] == 0) {
										$situacao = 'Aguardando Pagamento';
									} 
									elseif ($ln2['Pagamento'] == 1) {
										$situacao = 'Separando para entrega';
									} 
									elseif ($ln2['Pagamento'] == 2) {
										$situacao = 'Enviado';
									} 				
									elseif ($ln2['Pagamento'] == 3) {
										$situacao = 'Concluído';
									}else{
										$situacao = 'Cancelado';
									}
									echo '<tr>
									<th>'.$row['idPedido'].'</th>
									<th>R$ '.number_format($row['total'],2,',','.').'</th>
									<th>'.$situacao.'</th>
									<th><button class="btn"><a href="order.php?pedido='.$row['idPedido'].'">Ver Mais</a></button></th>
								</tr>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel ">
					<div class="panel-heading clickable">
						<h3 class="panel-title">Meus Dados Cadastrais</h3>
						<span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
					</div>
					<div class="panel-body">
						<form name="form1" method="post" action="alter.php"> 
							<div class="register-top-grid">
								<input type="text" value='<?php echo $id;?>' name="cadastrais" id="formCliente">
								<div>
									<span>Primeiro Nome<label>*</label></span>
									<input required type="text" value="<?php echo $nome?>" name="nome"> 
								</div>
								<div>
									<span>Sobrenome<label>*</label></span>
									<input required type="text" value="<?php echo $sobrenome?>" name="sobrenome"> 
								</div>
								<div>
									<span>E-mail<label>*</label></span>
									<input required type="text" value="<?php echo $email?>"  name="email"> 
								</div>
								<div>
									<span>CPF<label>*</label></span>
									<input required type="text" name="cpf" onBlur="ValidarCPF(form1.cpf);" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" value="<?php echo $cpf?>" >
								</div>
								<div>
									<span>Data de Nascimeto<label>*</label></span>
									<input required value="<?php echo $data?>"  type="date" name="data">
								</div>
								<div>
									<span>Sexo<label>*</label></span>
									<input required type="radio" name="sexo" value="m" <?php if ($sexo == 'm') {
										echo('checked');
									} ?>> Masculino<br>
									<input required type="radio" name="sexo" value="f" <?php if ($sexo == 'f') {
										echo('checked');
									} ?>> Feminino<br>
								</div>
								<div class="register-but center-block">
									<input class="center-block" id="registrar" type="submit" value="Salvar Alterações">
								</div>
							</div>										
						</form>
					</div>
				</div>
			</div>						
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel ">
					<div class="panel-heading clickable">
						<h3 class="panel-title">Meus Endereços</h3>
						<span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
					</div>
					<div class="panel-body">
						<form name="formEndereco" method="post" action="alter.php"> 
							<input type="text" value='<?php echo $id;?>' name="enderecos" value="<?php echo $id ?>" id="formCliente">
							<div class="register-top-grid"><div>
								<span>Tipo de Endereço<label>*</label></span>
								<select name="tipoEnd" id="">
									<option value="<?php echo($tipoEndereco); ?>"><?php echo($tipoEndereco); ?></option>
									<option value="Residencial">Residencial</option>
									<option value="Comercial">Comercial</option>
									<option value="Outro">Outro</option>
								</select>
							</div>
							<div>
								<span>CEP<label>*</label></span>
								<input value="<?php echo $cep;?>" type="text" name="cep" onKeyPress="MascaraCep(formEndereco.cep);" maxlength="10" onBlur="ValidaCep(form1.cep)">
							</div>
							<div>
								<span>Endereço<label>*</label></span>
								<input value="<?php echo $rua;?>" required type="text" name="endereco"> 
							</div>
							<div>
								<span>Número<label>*</label></span>
								<input value="<?php echo $numero;?>" required type="text" name="numero"> 						
							</div>
							<div>
								<span>Complemento<label></label></span>
								<input value="<?php echo $complemento;?>"  type="text" name="complemento"> 
							</div>
							<div>
								<span>Bairro<label>*</label></span>
								<input value="<?php echo $bairro;?>" required type="text" name="bairro"> 
							</div>	
							<div>
								<span>Cidade<label>*</label></span>
								<input value="<?php echo $cidade;?>" required type="text" name="cidade"> 
							</div>
							<div>
								<span>Estado<label>*</label></span>
								<input maxlength="2" value="<?php echo $estado;?>" required type="text" name="estado"> 
							</div>					
						</div>
						<div class="clearfix"> </div>
						<div class="register-but">
							<input id="registrar" type="submit" value="Salvar Alterações">
						</div>
						<div class="clearfix"> </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel ">
				<div class="panel-heading clickable">
					<h3 class="panel-title">Meus Contatos</h3>
					<span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
				</div>
				<div class="panel-body">
					<div class="account-in">
						<div class="container">
							<form name="formContato" method="post" action="alter.php"> 
								<input type="text" value='<?php echo $id;?>' name="contato" id="formCliente">
								<div class="register-top-grid">								
									<div>
										<span>Telefone<label>*</label></span>
										<input required type="text" name="cel" onKeyPress="MascaraTelefone(formContato.cel);" maxlength="15" value="<?php echo $telefone ?>">
									</div>
									<div>
										<span>Tipo de Telefone<label>*</label></span>
										<select name="tipoTel" id="">
											<option value="<?php echo $tipoTelefone ?>"><?php echo $tipoTelefone ?></option>
											<option value="Celular">Celular</option>
											<option value="Fixo">Fixo</option>
											<option value="Comercial">Comercial</option>
											<option value="outro">Outro</option>
										</select>
									</div>				

									<div class="register-but">
										<input id="registrar" type="submit" value="Salvar Alterações">
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel ">
				<div class="panel-heading clickable">
					<h3 class="panel-title">Meus Dados de Acesso</h3>
					<span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
				</div>
				<div class="panel-body">
					<div class="account-in">
						<div class="container">
							<form name="formContato" method="post" action="alter.php"> 
								<div class="register-top-grid">								
									<div>
										<span>E-mail<label>*</label></span>
										<input required type="text" value="<?php echo $email?>"  name="email"> 
									</div>
									<input type="text" value='<?php echo $id;?>' name="acesso" id="formCliente">
									<div>
										<span>Senha<label>*</label></span>
										<input id="senha" type="password" name="senha" onKeyPress="validarSenha();" onBlur="validarSenha();" required>
									</div>
									<div>
										<span>Confirme a senha<label>*</label></span>
										<input id="confirmarSenha" type="password" name="confirmarSenha" onKeyPress="validarSenha();" onBlur="validarSenha();" required>
									</div>

									<div class="register-but">
										<input id="registrar" type="submit" value="Salvar Alterações">
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="newsletter">
				<h3>Newsletter</h3>
				<p>Assine nossa Newsletter e receba em primeira mão, todas nossas principais novidades e ofertas!</p>
				<form>
					<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
					<input type="submit" value="SUBSCRIBE">
				</form>
			</div>
			<div class="cssmenu">
				<ul>
					<li class="active"><a href="politica.php">Politíca de Privacidade</a></li>
					<li><a href="seguranca.php">Segurança</a></li>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="contact.php">Contato</a></li>
				</ul>
			</div>
			<ul class="social">
				<li><a href=""> <i class="instagram"> </i> </a></li>
				<li><a href=""><i class="fb"> </i> </a></li>
				<li><a href=""><i class="tw"> </i> </a></li>
			</ul>
			<div class="clearfix"></div>
			<div class="copy">
				<p> &copy; 2016 FiuzaLizz. Todos os direitos reservados</p>
			</div>
		</div>
	</div>
</body>
</html>		