<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

include 'session.php';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cantina Fatec Praia Grande | Sobre</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/slider-styles.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
<script>
function goBack();
	window.history.back();
}
</script>
</head>
<body>
<div class="wrap">
	
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	
	<div class="main-body">
		<?php include 'menulateral.php'; ?>
		<div class="titulo">
			<h1>Alterar Senha</h1>
		</div>
		<br>
		
		<div class="order1">
			<form method="POST">
				<input type="text" name="senhaAntiga" size="40" placeholder="Digite a senha atual"/>
				<br><br>
				<input type="text" name="novaSenha" size="40" placeholder="Digite a nova senha"/>
				<br><br>
				<input type="text" name="confirmaNovaSenha" size="40" placeholder="Digite novamente a nova senha"/>
				<br><br><br>
				<input type="submit" name"alterarSenha" value="Alterar">
				<input onclick="goBack()" type="submit" disabled name="cancelarAlterarSenha" value="Cancelar">
			</form>

		</div>
		<div class="clear"> </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>