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
<title>Cantina Fatec Praia Grande | Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/slider-styles.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	<div class="main-body">
	
	<div class="grids">
		<ul>
			<h4>Itens mais pedidos</h4>
		<li>
			<h3>Prato feito Bife sem cebola</h3>
			<img src="images/thumb-1.jpg">
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
		</li>
		<li>
			<h3>Prato feito Filé de Frango Grelhado</h3>
			<img src="images/thumb-2.jpg">
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
		</li>
		<li>
			<h3>Paqueca (Frango, Carne, Presunto e queijo)</h3>
			<img src="images/thumb-3.jpg">
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
		</li>
		<a href="maisvendidos.php">Veja todos</a>
		<div class="clear"> </div>
		
		<h4>Novos Pratos</h4>
		<li>
			<h3>Ipsum simply</h3>
			<img src="images/thumb-5.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>R$12.58</button>
		</li>
		<li>
			<h3> Lorem Ipsum</h3>
			<img src="images/thumb-6.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>R$12.58</button>
		</li>
		<li class="last">
			<h3>Lorem simply</h3>
			<img src="images/thumb-4.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>R$12.58</button>
		</li>
		<a href="novosprodutos.php">Veja todos</a>
		</ul>
		<div class="clear"> </div>
	</div>
	<?php include 'menulateral.php'; ?>
	<div class="clear"> </div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>
</html>