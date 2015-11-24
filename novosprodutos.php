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
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			$("button").click(function(){
			$(".p2").toggle();
    });
});
</script>-->
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	
	<div class="main-body">
	<div class="grids">
		<ul>
			<h4>Novos Pratos</h4>
		<li>
			<h3>Prato feito Bife sem cebola</h3>
			<a href="gallery.php"><img style="width:205px; height:125px" src="images/thumb-4.jpg"></a>
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
			<form name="radiobotao" class="p2" style="display:none">
			<input type="radio" name="guarni" value="ovo" checked>Ovo Frito
			<br>
			<input type="radio" name="guarni" value="batata">Batata Frita
			<br>
			<input type="radio" name="guarni" value="omelete">Omelete
			<br>
			<input type="submit" name="#" value="compra">
			</form>
		</li>
		<li>
			<h3>Prato feito Filé de Frango Grelhado</h3>
			<a href="gallery.php"><img style="width:205px; height:125px" src="images/thumb-2.jpg"></a>
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
		</li>
		<li>
			<h3>Paqueca (Frango, Carne, Presunto e queijo)</h3>
			<a href="gallery.php"><img style="width:205px; height:125px" src="images/thumb-3.jpg"></a>
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
		</li>
		<div class="clear"> </div>

		<li>
			<h3>Ipsum simplydsadsadsads d</h3>
			<a href="gallery.php"><img style="width:205px; height:125px" src="images/thumb-5.jpg"></a>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>R$10</button>
		</li>
		<li>
			<h3> Lorem Ipsum dsadsasdadsahdhujsa</h3>
			<a href="gallery.php"><img style="width:205px; height:125px" src="images/thumb-6.jpg"></a>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>R$10</button>
		</li>
		<li>
			<h3>Paqueca (Frango, Carne, Presunto e queijo)</h3>
			<a href="gallery.php"><img style="width:205px; height:125px" src="images/thumb-3.jpg"></a>
			<p>Acompanha arroz, feijão, salada e uma garnição (Fritas, Omelete ou Ovo Frito)</p>
			<button>R$10</button>
		</li>
		
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