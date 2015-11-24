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
<title>Cantina Fatec Praia Grande | Compra</title>
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
	<div class="titulo">
	<h1>Finalizar Pedido</h1>
	</div>
	<br>
			<table width="715" cellspacing="0" cellpadding="4" style="background-color: #fff;border:2px solid #000;">
				<tr>
					<td width="90" bgcolor="#CCCCCC"><strong>ID Pedido</strong></td>
					<td width="160" bgcolor="#CCCCCC"><strong>Nome do Produto</strong></td>
					<td width="90" bgcolor="#CCCCCC"><strong>Quantidade</strong></td>
					<td width="90" bgcolor="#CCCCCC"><strong>Valor R$</strong></td>
					<td width="75" bgcolor="#CCCCCC"><strong>Remover</strong></td>
				</tr>
				<tr>
					<td>id</td>
					<td>nome</td>
					<td>qtdade</td>
					<td>vltotal</td>
					<td><form><input type="submit" value="Remover"></input></form></td>
				</tr>
				
			</table>
	
	<div class="clear"> </div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>
</html>