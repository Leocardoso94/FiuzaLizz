<?php 
include 'connect.php'; 
header('Content-Type: text/html; charset=utf-8'); 
include 'cart.php';
$url = pathinfo( __FILE__ );
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
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/component.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<!--webfont-->
	<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
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
		<div class="men">
			<div class="container">
				<div class="grid_1">
					<h1>Contato</h1>
					<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum</p>
				</div>
				<div class="grid_4">
					<div class="grid_2 preffix_1">
						<ul class="iphone">
							<i class="phone"> </i>
							<li class="phone_desc">Telefone : (11) 8765-4321 </li>
							<div class="clearfix"> </div>
						</ul>
						<ul class="iphone">
							<i class="flag"> </i>
							<li class="phone_desc">Website : <a href="mailto:sac@fiuzalizz.com">www.impacta.edu.br</a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="grid_3">
						<ul class="iphone">
							<i class="msg"> </i>
							<li class="phone_desc">Email : <a href="mailto:sac@fiuzalizz.com">sac@fiuzalizz.com</a> </li>
							<div class="clearfix"> </div>
						</ul>
						<ul class="iphone">
							<i class="home"> </i>
							<li class="phone_desc">Endereço : Avenida Rudge, 315 - Barra Funda
								São Paulo / SP </li>
								<div class="clearfix"> </div>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="contact_form">
						<h2>Mensagem</h2>
						<form>
							<div class="col-md-6 to">
								<input type="text" class="" name="nome" placeholder="Nome">
								<input type="text" class="" name="email" placeholder="Email">
								<input type="text" class="" name="assunto" placeholder="Assunto">
							</div>
							<div class="col-md-6 text">
								<textarea placeholder="Mensagem" name="mensagem"></textarea>
							</div>
							<div class="clearfix"></div>
							<div class="but__center"><input type="submit" value="Send message &gt;&gt;"></div>
						</form>
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
		</div>
	</body>
	</html>		