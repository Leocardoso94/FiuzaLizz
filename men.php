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
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
	</div>
	<div class="men">
		<div class="container">
			<div class="col-md-4 sidebar_men">
				<h3>Categorias</h3>
				<ul class="product-categories color">
					<?php
					
// Perform queries 
					$query = mysqli_query($con,"SELECT * FROM `categoria`");
					while ($row = mysqli_fetch_array($query)) {
						$nomeCategoria = $row['NomeCategoria'];
						$countquery = mysqli_query($con,"SELECT COUNT(*) AS C FROM produto WHERE Categoria = '".$nomeCategoria."'");
						$col = mysqli_fetch_array($countquery);
						$count = $col['C'];
						echo ('<li class="cat-item cat-item-42"><a href="men.php?filter=cat&val='.$nomeCategoria.'">'.$nomeCategoria.'</a> <span class="count">('.$count.')</span></li>');
					}
					//mysqli_close($con);
					?>	
				</ul>
				<h3>Fabricantes</h3>
				<ul class="product-categories color">
					<?php 
					
// Perform queries 
					$query = mysqli_query($con,"SELECT * FROM `marca`");
					while ($row = mysqli_fetch_array($query)) {
						$fabricante = $row['Nome'];
						$countquery = mysqli_query($con,"SELECT COUNT(*) AS C FROM produto WHERE Marca='".$fabricante."'");
						$col = $colunas = mysqli_fetch_array($countquery);
						$count = $col['C'];
						echo ('<li class="cat-item cat-item-42"><a href="men.php?filter=marca&val='.$fabricante.'">'.$fabricante.'</a> <span class="count">('.$count.')</span></li>');
					}
					?>
				</ul>					
				<h3>Preços</h3>
				<ul class="product-categories">
					<li class="cat-item cat-item-42"><a href="men.php?filter=custo&val=100">R$ 0- R$ 100</a> 
						<span class="count">(
							<?php 
							$query = mysqli_query($con,"SELECT * FROM produto");
							while ($row = mysqli_fetch_array($query)) {
								$cem = 100;
								$countquery = mysqli_query($con,"SELECT count(*) as total from produto WHERE Preco <= ". $cem);
								$col = mysqli_fetch_array($countquery);
								$countPreco = $col['total'];
							}
							echo $countPreco;
							?>)</span>
						</li>
						<li class="cat-item cat-item-60"><a href="men.php?filter=custo&val=200">R$ 100- R$ 200</a> <span class="count">(
							<?php 
							$query = mysqli_query($con,"SELECT * FROM produto");
							while ($row = mysqli_fetch_array($query)) {
								$cem = 200;
								$countquery = mysqli_query($con,"SELECT count(*) as total from produto WHERE Preco <= ". $cem);
								$col = mysqli_fetch_array($countquery);
								$countPreco = $col['total'];
							}
							echo $countPreco;
							?>)</span></li>
							<li class="cat-item cat-item-63"><a href="men.php?filter=custo&val=300">R$ 200- R$ 300</a> <span class="count">(
								<?php 
								$query = mysqli_query($con,"SELECT * FROM produto");
								while ($row = mysqli_fetch_array($query)) {
									$cem = 300;
									$countquery = mysqli_query($con,"SELECT count(*) as total from produto WHERE Preco <= ". $cem);
									$col = mysqli_fetch_array($countquery);
									$countPreco = $col['total'];
								}
								echo $countPreco;
								?>)</span></li>
								<li class="cat-item cat-item-54"><a href="men.php?filter=custo&val=400">R$ 300 - R$ 499</a> <span class="count">(
									<?php 
									$query = mysqli_query($con,"SELECT * FROM produto");
									while ($row = mysqli_fetch_array($query)) {
										$cem = 499;
										$countquery = mysqli_query($con,"SELECT count(*) as total from produto WHERE Preco <= ". $cem);
										$col = mysqli_fetch_array($countquery);
										$countPreco = $col['total'];
									}
									echo $countPreco;
									?>)</span></li>
									<li class="cat-item cat-item-55"><a href="men.php?filter=custo&val=500">R$ 500+</a> <span class="count">(
										<?php 
										$query = mysqli_query($con,"SELECT * FROM produto");
										while ($row = mysqli_fetch_array($query)) {
											$cem = 500;
											$countquery = mysqli_query($con,"SELECT count(*) as total from produto WHERE Preco >= ". $cem);
											$col = mysqli_fetch_array($countquery);
											$countPreco = $col['total'];
										}
										echo $countPreco;
										?>)</span></li>
									</ul>
								</div>
								<div class="col-md-8 mens_right">
									<div class="dreamcrub">
										<ul class="breadcrumbs">
											<li class="home">
												<a href="index.php" title="Go to Home Page">Home</a>&nbsp;
												<span>&gt;</span>
											</li>
											<li class="home">&nbsp;
												Homens / Mulheres&nbsp;
											</li>
										</ul>
										<ul class="previous">
											<li><a href="index.php">Voltar para a página inicial</a></li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="mens-toolbar">
										<div class="sort">
											<div class="sort-by">
											<form action="men.php" action="post">
												<label>Ordenar por:</label>
												<select>
													<option value="" name="order">
														Posição                </option>
														<option value="" name="order">
															Nome                </option>
															<option value="" name="order">
																Preço                </option>
															</select>
														
															<button><img src="images/arrow2.gif" alt="" class="v-middle"></button>
														</form>
														</div>
													</div>
														<!--<ul class="women_pagenation dc_paginationA dc_paginationA06">
															<li><a href="#" class="previous">Page : </a></li>
															<li class="active"><a href="#">1</a></li>
															<li><a href="#">2</a></li>
														</ul>-->
														<div class="clearfix"></div>		
													</div>
													<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
														<div class="cbp-vm-options">
															<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
															<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
														</div>
													<!--	<div class="pages">   
															<div class="limiter visible-desktop">
																<label>Show</label>
																<select>
																	<option value="" selected="selected">
																		9                </option>
																		<option value="">
																			15                </option>
																			<option value="">
																				30                </option>
																			</select> per page        
																		</div>
																	</div>-->
																	<div class="clearfix"></div>
																	<ul>
																		<?php 
																		if(!empty($_GET['filter'])){			
																			$filtro = $_GET['filter'];
																			$val = $_GET['val'];
																			if ($filtro = 'cat') {
																				$queryProdutos = mysqli_query($con,"SELECT * FROM `produto` WHERE Categoria Like '%".$val."%'");
																			}
																			if ($filtro = 'custo') {
																				$queryProdutos = mysqli_query($con,"SELECT * FROM produto WHERE produto.Preco > '500'");
																			}
																			if ($filtro = 'marca') {
																				$queryProdutos = mysqli_query($con,"SELECT * FROM `produto` WHERE Marca = '".$val."'");
																			}if ($filtro = 'nome') {
																				$queryProdutos = mysqli_query($con,"SELECT * FROM produto WHERE Nome LIKE '%".$val."%' OR marca LIKE '%".$val."%' OR categoria LIKE '%".$val."%' OR Descricao LIKE '%".$val."%'");
																			}
																		}else{
																			$queryProdutos = mysqli_query($con,"SELECT * FROM `produto`");
																		}
																		while ($row = mysqli_fetch_array($queryProdutos)) {
																			$nomeProduto = $row['Nome'];
																			$idProduto = $row['idProduto'];
																			$preco = $row['Preco'];
																			$imgproduto = $row['Imagem'];
																			$est = $row['Estoque'];
																			if ($est < 1) {
																				echo ('<li class="simpleCart_shelfItem">
																					<a class="cbp-vm-image" href="single.php?id='.$idProduto.'">
																						<div class="view view-first">
																							<div class="inner_content clearfix">
																								<p class="semEstoque">Esgotado</p>
																								<div class="product_image">
																									<div class="mask1"><img src="'.$imgproduto.'" alt="image" class="img-responsive zoom-img"></div>
																									<div class="mask">
																										<div class="info">Veja</div>
																									</div>
																									<div class="product_container">
																										<h4>'.$nomeProduto.'</h4>
																										<p>Dresses</p>
																										<div class="price mount item_price">R$ '.number_format($preco,2,",",".").'</div>
																									</div>		
																								</div>
																							</div>
																						</div>
																					</a>
																				</li>');
																			}else{
																				echo ('<li class="simpleCart_shelfItem">
																					<a class="cbp-vm-image" href="single.php?id='.$idProduto.'">
																						<div class="view view-first">
																							<div class="inner_content clearfix">
																								<div class="product_image">
																									<div class="mask1"><img src="'.$imgproduto.'" alt="image" class="img-responsive zoom-img"></div>
																									<div class="mask">
																										<div class="info">Veja</div>
																									</div>
																									<div class="product_container">
																										<h4>'.$nomeProduto.'</h4>
																										<p>Dresses</p>
																										<div class="price mount item_price">R$ '.number_format($preco,2,",",".").'</div>
																										<a class="button item_add cbp-vm-icon cbp-vm-add" href="men.php?acao=add&id='.$idProduto.'&qntd=1">Adicionar ao Carrinho</a>
																									</div>		
																								</div>
																							</div>
																						</div>
																					</a>
																				</li>');
																			}
																		}
																		?>
																	</ul>
																</div>
																<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
																<script src="js/classie.js" type="text/javascript"></script>
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
