﻿<?php

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
	<div class="order1">
	<form>
	<h3>Alterar Senha</h3>
	<br>
	<a href="alterarsenha.php">Alterar</a>
	</form>
	<br>
	<form>
	<h3>Pedidos</h3>
	<br>
	<a href="historicocompras.php">Histórico</a>
	<a href="statuspedido.php">Acompanhar Status</a>
	</form>
	<br>
	<form>
	<h3>Alterar Senha</h3>
	<br>
	<a href="#">Alterar</a>
	</form>
	<br>
	<form>
	<h3>Alterar Senha</h3>
	<br>
	<a href="#">Alterar</a>
	</form>
	<br>
	
	
	</div>
	<div class="clear"> </div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>
</html>