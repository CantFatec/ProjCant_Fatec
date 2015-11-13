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
<title>Cantina Fatec Praia Grande | Cadastro</title>
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
	
	<div class="clear"> </div>
	<div class="grids">
		<ul>
			<h4>CADASTRO DE PRODUTOS (EM PRODUÇÃO)</h4>
			<p>
				<?php if(!empty($_SESSION['logado']) && ($_SESSION['is_administrador'] == 1)){ ?>
				<form name="form1" method="POST">
					<input id="nome" maxlength="50" name="nome" type="text" name="nome" placeholder="NOME DO PRODUTO" required/>
				<br><br>
					<input id="valor" maxlength="14" name="valor" type="text" placeholder="VALOR" required />
				<br><br>				
					<select name="tipo_produto">
						<option value="" disabled selected hidden>Selecione o tipo</option>
						<option value="Prato">Prato</option>
						<option value="Bebida">Bebida</option>
						<option value="Lanche">Lanche</option>
						<option value="Crédito">Crédito</option>
					</select><br><br>
					<div class="descricao">
						<textarea id="desc" name"desc" rows="4" cols="50" placeholder="DESCRIÇÃO"></textarea>
					</div>
					<br><br>
					<?php }else{?>
					<input type="hidden" name="tipo_produto" value="produto" />
					<?php } ?>
					<input type="hidden" name="cad_prod" />
					<input type="submit" value="CONFIRMAR" />
					<input type="reset" value="LIMPAR" /><br><br>
				</form>
			</p>
		<div class="clear"> </div>
		<br>
		<h4>Latest-Items</h4>
		<li>
			<h3>Ipsum simply</h3>
			<img src="images/thumb-3.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
		<li>
			<h3> Lorem Ipsum</h3>
			<img src="images/thumb-1.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
		<li class="last">
			<h3>Lorem simply</h3>
			<img src="images/thumb-7.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
			<a href="#">View all</a>
		</ul>
	<div class="clear"> </div>
</div>
	<div class="boxes">
		<div class="order">
		<ul>
			<li>
			<h3>PEDIDO</h3>
			<h4>Sem Produtos</h4>
			<p>shoping &nbsp;&nbsp;<span>$0:00</span></p>
			<p>Total &nbsp;&nbsp;<span>$0:00</span></p>
			<h5>Pricee and tax-include</h5>
			<h6><a href="#">Check-out</a></h6>
			<h6><a href="#">cart</a></h6>
		</li>
		</ul>
		</div>
		<div class="clear"> </div>
		<ul>
			<li>
			<h3>Horário de Funcionamento</h3>			
			<p>Segunda - Sexta &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Sábado &nbsp;&nbsp; 11 am - 04 pm</p>			
		</li>		
			<div class="clear"> </div>
		</ul>
	</div>
	<div class="clear"> </div>
   </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>