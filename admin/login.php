<?php 
include '../connect.php';
if (isset($_SESSION['loginAdm'])) {
	header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Painel Administrativo</title>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" href="css/estilo.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="js/script.js"></script>
</head>
<body>		
	<!--conteudo -->

	<div class="container">
		<div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                <form action="logar.php" method="post">
                    <legend>Login</legend>
                    <div class="form-group">
                        <label for="username-email">Login</label>
                        <input value='' id="username-email" name="login" placeholder="Login" type="text" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input id="password" name="senha" placeholder="Senha" type="password" class="form-control" required/>
                    </div>
                    <div class="form-group text-center">
                    <?php 
                    if(!empty($_GET['login'])){	
				echo "<h4 class=\"failLogin\">Falha no Login</h4>";
			}	
			 ?>
                        <input type="submit" class="btn btn-primary btn-login-submit" value="Login" />
                    </div>
                </form>
            </div>          
    </div>
		
	</div>
	<!--conteudo -->

</body>
</html>