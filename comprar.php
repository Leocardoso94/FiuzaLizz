<?php 
include 'connect.php';

$sql = "SELECT idEntrega FROM entrega WHERE Custo = '".$_GET['frete']."'";

$sum = floatval($_GET['frete']) + floatval($_GET['total']);

$qr = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($qr);
$idEntrega = $row['idEntrega'];

$qr = "SELECT id from clientes WHERE Email = '".$_SESSION['login']."'";
$sql = mysqli_query($con,$qr);
$ln    = mysqli_fetch_assoc($sql);
$idCliente = $ln['id'];


$insert = "INSERT INTO pedido (`idEntrega`, `idPagamento`, `idClientes`, `total`, Data) VALUES ('".$idEntrega."','1','".$idCliente."','".$sum."',  '".date("Y-m-d")."') ";

mysqli_query($con,$insert);

$max = mysqli_query($con,"SELECT MAX(idPedido) FROM pedido");
$maxid = mysqli_fetch_assoc($max);
$idPedido = $maxid['MAX(idPedido)'];

mysqli_query($con,"INSERT INTO `cobranca` (`idPedido`, `Pagamento`) VALUES ('".$idPedido."', '0')");

foreach($_SESSION['carrinho'] as $id => $qtd){								
	$sql   = "SELECT *  FROM produto WHERE idProduto = '".$id."'";
	$qr    = mysqli_query($con,$sql) or die(mysqli_error($con));
	$ln    = mysqli_fetch_assoc($qr);

	$estoque = $ln['Estoque'];
	$estoque = intval($estoque) - $qtd;

	mysqli_query($con,"UPDATE `produto` SET `Estoque` = '".$estoque."' WHERE `produto`.`idProduto` = ".$id."");

	mysqli_query($con,"INSERT INTO `produto_pedido` (`idProduto`, `idPedido`, Quantidade) VALUES ('".$id."', '".$idPedido."', '".$qtd."');");
}
$data['token'] ='64BE8EE1FD904AB988225E28B15B07E8';
$data['email'] = 'leocardosoti@gmail.com';
$data['currency'] = 'BRL';
$data['itemId1'] = '1';
$data['itemQuantity1'] = '1';
$data['itemDescription1'] = 'Compra Fiuza Lizz';
$data['itemAmount1'] = number_format($sum,2,'.','.');



$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
$xml= curl_exec($curl);

curl_close($curl);

$xml= simplexml_load_string($xml);
echo $xml -> code;
$_SESSION['carrinho'] = array();
header("Location: https://pagseguro.uol.com.br/checkout/v2/payment.html?code=".$xml -> code);
?>

