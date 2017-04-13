<?php 
include 'connect.php'; 
header('Content-Type: text/html; charset=utf-8'); 
include 'cart.php';
$url = pathinfo( __FILE__ );
$id = $_GET['id'];
$queryProdutos = mysqli_query($con,"SELECT * FROM `produto` WHERE idProduto = ".$id);
while ($row = mysqli_fetch_array($queryProdutos)) {
	$nomeProduto = $row['Nome'];
	$idProduto = $row['idProduto'];
	$preco = $row['Preco'];
	$imgproduto = $row['Imagem'];
	$descricao = $row['Descricao'];
	$img1 = $row['Imagem'];
}
$queryEstoque = mysqli_query($con,"SELECT Estoque FROM `produto` Where idProduto = ".$id);
$rowEstoque = mysqli_fetch_array($queryEstoque);
$estoque = $rowEstoque['Estoque'];
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
					<p class="empty"><a href="men.php?acao=limpar" class="simpleCart_empty">Esvaziar Carinho</a></p>
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
													$preco2 = $row["Preco"];
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
															<span class="price">R$ '.number_format($preco2,2,",",".").'</span>
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
				<div class="col-md-9 single_top">
					<div class="single_left">
						<div class="labout span_1_of_a1">
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="<?php echo $img1;?>">
										<img src="<?php echo $img1;?>"/>
									</li>
								</ul>
							</div>
							<div class="clearfix"></div>	
						</div>
						<div class="cont1 span_2_of_a1 simpleCart_shelfItem">
							<h1><?php echo ($nomeProduto); ?></h1>
							<p class="availability">Disponibilidade: <span class="color">
								<?php 
								if ($estoque > 0) {
									echo("Em estoque");
								}else{
									echo "Esgotado";
								}
								?>
							</span></p>
							<div class="price_single">
								<span class="">R$ <?php echo number_format($preco,2,",","."); ?></span>							
							</div>
							<h2 class="quick">Descrição:</h2>
							<p class="quick_desc"><?php echo $descricao; ?></p>							
							<div class="quantity_box">
								<ul class="product-qty">
									<span>Quantidade:</span>
									<select>
										<?php 							
										for ($i=1; $i <= $estoque; $i++) { 
											echo('<option>'.$i.'</option>');
										}
										?>
									</select>
								</ul>
								<ul class="single_social">
									<li><a href="#"><i class="fb1"> </i> </a></li>
									<li><a href="#"><i class="tw1"> </i> </a></li>
									<li><a href="#"><i class="g1"> </i> </a></li>
									<li><a href="#"><i class="linked"> </i> </a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<?php 
							if ($estoque > 0) {
								echo '<a href="checkout.php?acao=add&id='.$id.'&qntd=" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1 addCart" value="'.$id.'" target="_self">Adicionar ao Carrinho</a>';
							}else{
								echo "<p class='semEstoque'>Esgotado</p>";
							}
							?>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sap_tabs">	
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">									  	 
							<div class="resp-tabs-container">
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
										<ul class="tab_list">
											<li><a href="#"><?php echo ($descricao); ?></a></li>
										</ul>           
									</div>
								</div>	
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
										<ul class="tab_list">
											<li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
											<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
											<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
										</ul>           
									</div>
								</div>	
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									<div class="facts">
										<ul class="tab_list">
											<li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</a></li>
											<li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
											<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores leg</a></li>
											<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
										</ul>  
									</div>    
								</div>	
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-3 tabs">
					<h3 class="m_1">Produtos Relacionados</h3>
					<ul class="product">
						<?php				
						$relacionados=explode(" ",$nomeProduto);
						$queryRelacionados  = mysqli_query($con,"SELECT * FROM produto WHERE produto.Nome LIKE '%".$relacionados[0]."%' and produto.Nome <> '".$nomeProduto."' LIMIT 5");
						while ($rowRelacionados = mysqli_fetch_array($queryRelacionados)) {					
							?>
							<li class="product_img"><img src="<?php echo $rowRelacionados['Imagem'] ?>" class="img-responsive" alt=""/></li>
							<li class="product_desc">
								<h4><a href="single.php?id=<?php echo $rowRelacionados['idProduto'] ?>"><?php echo $rowRelacionados['Nome']?></a></h4>
								<p class="">R$ <?php echo number_format($rowRelacionados['Preco'],2,',','.')?></p>							
								<a href="single.php?id=<?php echo $rowRelacionados['idProduto'] ?>" class="link-cart">Conferir</a>								
							</li>						
							<div class="clearfix"> </div>
							<br>
							<?php } ?>
						</ul>
					</div>
					<div class="clearfix"> </div>
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
			<!-- FlexSlider -->
			<script defer src="js/jquery.flexslider.js"></script>
			<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
			<script>
// Can also be used with $(document).ready()
$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});
</script>
</body>
</html>		