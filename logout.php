<?php
include 'cart.php';
unset ($_SESSION['login']);
unset ($_SESSION['senha']);
header("Location: index.php");
unset($logado);
?>