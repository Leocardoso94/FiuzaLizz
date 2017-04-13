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
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/component.css" rel='stylesheet' type='text/css' />
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

			<?php 
			$sql = "SELECT * FROM clientes WHERE Email = '".$logado."'";
			$qr = mysqli_query($con,$sql) or die(mysqli_error($con));
			$ln = mysqli_fetch_assoc($qr);
			$id =  $ln['id'];
			$nome = $ln['Nome'];
			$sobrenome = $ln['Sobrenome'];
			$sql = "SELECT * FROM endereco WHERE idCliente = '".$id."'";
			$qr = mysqli_query($con,$sql) or die(mysqli_error($con));
			$ln = mysqli_fetch_assoc($qr);
			$cep =  $ln['CEP'];
			$bairro =  $ln['Bairro'];
			$cidade = $ln['Cidade'];
			$estado = $ln['Estado'];
			$numero = $ln['Numero'];
			$rua = $ln['Rua'];

			$qr = mysqli_query($con,'SELECT * FROM pedido WHERE idPedido = '.$_GET['pedido']);
			$ln = mysqli_fetch_assoc($qr);
			$idPedido = $ln['idPedido'];
			$idEntrega = $ln['idEntrega'];
			$idPagamento = $ln['idPagamento'];
			$total = $ln['total'];
			$idTracking = $ln['idTracking'];

			$qr = mysqli_query($con,'SELECT * FROM entrega WHERE idEntrega = '.$idEntrega);
			$ln = mysqli_fetch_assoc($qr);
			$tipoEntrega = $ln['Tipo'];
			$frete = $ln['Custo'];
			$qr = mysqli_query($con,'SELECT * FROM tipo_pagamento WHERE idPagamento = '.$idPagamento);
			$ln = mysqli_fetch_assoc($qr);
			$pagamento = $ln['NomedoTipo'];
			?>

			<div class="info-content">
				<div class="col-1 ">
					<div class="">
						<h3>Endereço de Entrega</h3>
					</div>
					<div class="">
						<p>
							<?php 
							echo $nome.' '.$sobrenome.'<br>
							'.$rua.', '.$numero.' <br>
							'.$bairro.', '.$cidade.' - '.$estado.' <br>
							'.$cep.'
							';
							?>
						</p>
					</div>
				</div>
				<div class="col-2 info-shipping-method">
					<div class="action-title">
						<h3>Opção de Entrega</h3>
					</div>
					<div class="action-content">
						<p class=""><strong><?php echo $tipoEntrega; ?></strong></p>
					</div>
				</div>
				<div class="col-3 info-payment-method">
					<div class="action-title">
						<h3>Método de Pagamento</h3>
					</div>
					<div class="action-content">
						<p class="sub-title"><?php echo $pagamento; ?></p>
					</div>
				</div>
			</div>
			<div class="order-items">
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">Produto</th>
							<th>Preço</th>
							<th>Quantidade</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php  
						$query = mysqli_query($con,"SELECT * FROM `produto_pedido` WHERE idPedido = ".$idPedido);
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
									<img  src="<?php echo $imagem; ?>" alt=""/>
									<h3><a href="single.php?id=<?php echo $row['idProduto']; ?>"><?php echo $nomeProduto; ?></a>
									</h3>
								</td>
								<td><span><?php echo 'R$ '.number_format($preco, 2, ',', '.'); ?></span></td>
								<td><?php echo $quantidade; ?></td>
								<td><?php echo 'R$ '.number_format($totalUni, 2, ',', '.'); ?></td>
							</tr>
							<?php  }?>
						</tbody>
					</table>
					<table class="totals">
						<tr class="subtotal">
							<td colspan="4">
								Subtotal                    
							</td>
							<td>
								<span class="price">R$ <?php echo number_format($totalTudao,2,',','.')?></</span>                    </td>
							</tr>
							<tr class="shipping">
								<td colspan="4" class="a-right">
									Frete                    </td>
									<td class="last a-right">
										<span class="price">R$ <?php echo number_format($frete,2,',','.'); ?></span>
									</td>
								</tr>
								<tr class="grand_total">
									<td colspan="4" class="a-right">
										<strong>Total</strong>
									</td>
									<td class="last a-right">
										<strong><span class="price">R$ <?php echo number_format($totalTudao+$frete,2,',','.')?></span></strong>
									</td>
								</tr>
							</table>
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