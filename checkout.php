<?php 
include 'connect.php'; 
header('Content-Type: text/html; charset=utf-8'); 
include 'cart.php';
$url = pathinfo( __FILE__ );
if (isset($_POST['frete'])) {
	$frete = $_POST['frete'];
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
	<script src="https://use.fontawesome.com/74ca2ac1e8.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script src="js/jquery.easydropdown.js"></script>
	<script src="js/cart.js"></script>
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
									$qr = mysqli_query($con,$sql) or die(mysqli_error($con));						
									$ln = mysqli_fetch_assoc($qr);
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
		<div class="account-in">
			<div class="container">
				<div class="check_box">	 
					<div class="col-md-9 cart-items">
						<h1>Meu Carrinho (<?php echo sizeof($_SESSION['carrinho']); ?>)</h1>
						<?php 
						$total = 0;
						if(count($_SESSION['carrinho']) == 0){
							echo '<tr><td colspan="5">Não há produtos no carrinho</td></tr>';
						}else{
							foreach($_SESSION['carrinho'] as $id => $qtd){
								$sql = "SELECT * FROM produto WHERE idProduto = '".$id."'";
								$qr = mysqli_query($con,$sql) or die(mysqli_error($con));
								$ln = mysqli_fetch_assoc($qr);
								$nome = $ln['Nome'];
								$img = $ln['Imagem'];
								$max = $ln['Estoque'];
								$preco = number_format($ln['Preco'], 2, ',', '.');
								$sub = number_format($ln['Preco'] * $qtd, 2, ',', '.');
								$total += $ln['Preco'] * $qtd;
					//	echo '<tr> <td>'.$nome.'</td> <br><td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td><br><td>R$ '.$preco.'</td><br><td>R$ '.$sub.'</td><br>	<td><a href="?acao=del&id='.$id.'">Remove</a></td><br></tr>
								echo '
								<div class="cart-header">
									<a class="close1" href="checkout.php?acao=del&id='.$id.'"></a>
									<div class="cart-sec simpleCart_shelfItem">
										<div class="cart-item cyc">
											<img src="'.$img.'" class="img-responsive" alt=""/>
										</div>
										<div class="cart-item-info">
											<h3><a href="#">'.$nome.'</a></h3>
											<ul class="qty">
												<li><p>Size : 5</p></li>
												<li>
													<input type="number" min="1" max="'.$max.'" size="3" name="prod['.$id.']" value="'.$qtd.'" />
													<a href="checkout.php?acao=up&id='.$id.'&qntd=" class="btn up" name="acao" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i></a>
												</li>
											</ul>
											<div class="delivery">
												<p>Preço : R$ '.$preco.'</p>
												<p>Total : R$ '.$sub.'</p>
												<span>Prazdo de entrega 3-5 dias</span>
												<div class="clearfix"></div>
											</div>	
										</div>
										<div class="clearfix"></div>
									</div>
								</div>';
							}
						}
						?>
						<?php 
						if(count($_SESSION['carrinho']) > 0){
							?>
							<form action="checkout.php" method="Post" class="account-top">
								<?php 
								$sql = "SELECT * FROM `entrega`";
								$qr = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_array($qr)) {
									$tipo = $row['Tipo'];
									$custo = $row['Custo'];
									$prazo = $row['PrazoEntrega'];
									echo('<input checked type="radio" name="frete" value="'.$custo.'"> '.$tipo." | ".$prazo." dias úteis | R$ ".number_format($custo, 2, ',', '.').'<br>');
									echo "<hr>";
								}
								?>
								<input type="submit" value="Escolher" class="btn">
							</form>
							<?php } ?>
							<div class="clearfix"></div>					
						</div>
						<div class="col-md-3 cart-total">
							<a class="continue" href="men.php">Continuar Comprando</a>
							<div class="price-details">
								<h3>Detalhes da Compra</h3>
								<span>Total</span>
								<span class="total1">R$ <?php echo number_format($total, 2, ',', '.'); ?></span>
								<span>Frete</span>
								<span class="total1"><?php 
									if (!isset($frete)) {
										$frete = 0;
									}echo number_format($frete, 2, ',', '.');;
									?></span>
									<div class="clearfix"></div>				 
								</div>	
								<ul class="total_price">
									<li class="last_price"> <h4>TOTAL</h4></li>	
									<li class="last_price"><span>R$ <?php echo number_format($total+$frete, 2, ',', '.'); ?></span></li>
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"></div>
								<a class="order" href="confirm.php?frete=<?php echo $frete ?>">Confirmar Compra</a>								
							</div>
						</div>
					</div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJqx-jb21YzpQRG8vEBepWEwM&key=AIzaSyCMrLW74rmTSHQgJuWbhT0dXetEHmpHtEo"></iframe>
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