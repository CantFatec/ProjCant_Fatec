<?php

include 'session.php';

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Cantina Fatec Praia Grande | Conta Geral</title>
<?php include 'head.php'; ?>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.js"></script>
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
  <script type="text/javascript">
    $(function() {
        $('.gallery a').lightBox();
    });
    </script>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	
	<div class="main-body">	
	<?php include 'menulateral.php'; ?>
	
	<div class="titulo">	
	<h1>Conta Geral</h1>
	<br>
	</div>
	<div class="grids2">
		<form action="alterarsenha.php">
			<input style="width:75%; margin:6px 1%;" name="botaoconta" type="submit" value="Alterar Senha"></input>
		</form>
		
		<form action="pagina">
			<input  style="width:75%; margin:6px 1%;" name="botaoconta" type="submit" value="Histórico de Pedidos"></input>
		</form>
		
		<form action="statuspedido.php">
			<input  style="width:75%; margin:6px 1%;" name="botaoconta" type="submit" value="Status de Pedidos"></input>
		</form>
	<br>
	
	
	</div>
	<div class="clear"> </div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>
</html>