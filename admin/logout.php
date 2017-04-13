<?php 
include '../connect.php';
unset ($_SESSION['loginAdm']);
unset ($_SESSION['senhaAdm']);

header("Location: login.php");

?>