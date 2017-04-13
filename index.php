<?php 
include 'connect.php'; 
header('Content-Type: text/html; charset=utf-8'); 
include 'cart.php';
$url = pathinfo( __FILE__ );
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
	<!-- Custom Theme files -->
	<!--webfont-->
	<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script src="js/jquery.easydropdown.js">
	</script>
</head>
<body>
	<div class="banner">
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
						<li><a class="color2" href="men.php">Loja</a>
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
							<li>				
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
			<div class="main">
				<div class="container">
					<ul class="content-home">
						<li class="col-sm-4">
							<a href="men.php?filter=cat&val=Masculino" class="item-link" title="">
								<div class="bannerBox">
									<img src="images/w1.jpg"class="item-img" title="" alt="" width="100%" height="100%">
									<div class="item-html">
										<h3>Perfumes<span>Masculinos</span></h3>
										<br>
										<br>
										<br>										<button>Comprar!</button>
									</div>
								</div>
							</a>
						</li>
						<li class="col-sm-4">
							<a href="men.php?filter=cat&val=Kit" class="item-link" title="">
								<div class="bannerBox">
									<img src="images/w3.jpg" class="item-img" title="" alt="" width="100%" height="100%">
									<div class="item-html">
										<h3>Kits<span>Presentes</span></h3>
										<br>
										<br>
										<br>										<button>Comprar!</button>
									</div>
								</div>
							</a>
						</li>
						<li class="col-sm-4">
							<a href="men.php?filter=cat&val=Feminino" class="item-link" title="">
								<div class="bannerBox">
									<img src="images/w2.jpg" class="item-img" title="" alt="" width="100%" height="100%">
									<div class="item-html">
										<h3>Perfumes<span>Femininos</span></h3>
										<br>
										<br>
										<br>										<button>Comprar!</button>
									</div>
								</div>
							</a>
						</li> 
						<div class="clearfix"> </div>         
					</ul>
				</div>
				<div class="middle_content">
					<div class="container">
						<h2>Bem-vindo!</h2>
						<p>A FiuzaLizz oferece uma infinita variedade de produtos de beleza das melhores e mais desejadas marcas do mundo. Para todos os clientes, são oferecidos os melhores lançamentos, coleções e produtos exclusivos, que só podem ser encontrados na Sephora. O sortimento inclui maquiagem, tratamento, perfumaria, cuidados com os cabelos, acessórios, produtos de corpo e banho e a sua marca própria, FIUZA COLLECTION. Cada categoria contém desde as mais recentes inovações da indústria de cosméticos até os verdadeiros clássicos da história da perfumaria e da indústria cosmética.
						</p>
					</div>
				</div>
				<div class="content_middle_bottom">
					<div class="header-left" id="home">
						<section>
							<ul class="lb-album" >
								<li id="teste">
									<a href="#teste">
										<img src="images/g1.jpg"  class="img-responsive" alt="image01"/>
										<span>Pointe</span>
									</a>
									<div class="lb-overlay" id="image-1">
										<a href="#page" class="lb-close">x Close</a>
										<img src="images/g1.jpg"  class="img-responsive" alt="image01"/>
										<div>
											<h3>pointe <span>/point/</span></h3>
											<p>Dance performed on the tips of the toes</p>
										</div>
									</div>
								</li>
								<li id="teste">
									<a href="#teste">
										<img src="images/g2.jpg"  class="img-responsive" alt="image02"/>
										<span>Port de bras</span>
									</a>
									<div class="lb-overlay" id="image-2">
										<img src="images/g2.jpg"  class="img-responsive" alt="image02"/>
										<div>							
											<h3>port de bras <span>/ˌpôr də ˈbrä/</span></h3>
											<p>An exercise designed to develop graceful movement and disposition of the arms</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<li id="teste">					
									<a href="#teste">
										<img src="images/g3.jpg"  class="img-responsive" alt="image03"/>
										<span>Plié</span>
									</a>
									<div class="lb-overlay" id="image-3">
										<img src="images/g3.jpg"  class="img-responsive" alt="image03"/>
										<div>							
											<h3>pli·é <span>/plēˈā/</span></h3>
											<p>A movement in which a dancer bends the knees and straightens them again</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<li id="teste">
									<a href="#teste">
										<img src="images/g4.jpg"  class="img-responsive" alt="image04"/>
										<span>Adagio</span>
									</a>
									<div class="lb-overlay" id="image-4">
										<img src="images/g4.jpg"  class="img-responsive" alt="image04"/>
										<div>							
											<h3>a·da·gio <span>/əˈdäjō/</span></h3>
											<p>A movement or composition marked to be played adagio</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<li id="teste">
									<a href="#teste">
										<img src="images/g5.jpg"  class="img-responsive" alt="image05"/>
										<span>Frappé</span>
									</a>
									<div class="lb-overlay" id="image-5">
										<img src="images/g5.jpg"  class="img-responsive" alt="image05"/>
										<div>							
											<h3>frap·pé<span>/fraˈpā/</span></h3>
											<p>Involving a beating action of the toe of one foot against the ankle of the supporting leg</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<li id="teste">
									<a href="#teste">
										<img src="images/g6.jpg"  class="img-responsive" alt="image06"/>
										<span>Glissade</span>
									</a>
									<div class="lb-overlay" id="image-6">
										<img src="images/g6.jpg"  class="img-responsive" alt="image06"/>
										<div>							
											<h3>glis·sade <span>/gliˈsäd/</span></h3>
											<p>One leg is brushed outward from the body, which then takes the weight while the second leg is brushed in to meet it</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<li id="teste">
									<a href="#teste">
										<img src="images/g7.jpg"  class="img-responsive" alt="image07"/>
										<span>Jeté</span>
									</a>
									<div class="lb-overlay" id="image-7">
										<img src="images/g7.jpg"  class="img-responsive" alt="image07"/>
										<div>							
											<h3>je·té <span>/zhə-ˈtā/</span></h3>
											<p>A springing jump made from one foot to the other in any direction</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<li id="teste">
									<a href="#teste">
										<img src="images/g8.jpg"  class="img-responsive" alt="image08"/>
										<span>Piqué</span>
									</a>
									<div class="lb-overlay" id="image-8">
										<img src="images/g8.jpg"  class="img-responsive" alt="image08"/>
										<div>							
											<h3>pi·qué <span>/pēˈkā/</span></h3>
											<p>Strongly pointed toe of the lifted and extended leg sharply lowers to hit the floor then immediately rebounds upward</p>
										</div>
										<a href="#page" class="lb-close">x Close</a>
									</div>
								</li>
								<div class="clearfix"></div>
							</ul>
						</section>
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