<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
include('php/funcoes.php');
if(!empty($_POST["login"]) && !empty($_POST["senha"])){
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	logar($login,$senha);
}
if(isset($_GET['logout'])) {
	logout();
}
if(isset($_POST['cad_user'])){
	if($_POST['senha1'] === $_POST['senha2']){
		cadastrarUsuario();
	}
}
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
<?php include 'validacao.php'; ?>

<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	
	<div class="main-body">
	<div id="slider">
			<a href="#" target="_blank">
				<img src="images/slider-1.jpg" alt="Mini Ninjas" />
			</a>
			<a href="#" target="_blank">
				<img src="images/slider-2.jpg" alt="Price of Persia" />
			</a>
			<a href="#" target="_blank">
				<img src="images/slider-3.jpg" alt="Price of Persia" />
			</a>
	</div>
	<div clas="clear"> </div>
	<div class="grids">
		<ul>
			<h4>CADASTRO CLIENTES</h4>
			<p>
				<form name="form1" method="POST">
					<input id="nome" onkeypress="mascara(this, letras1)" onBlur="ValidaNome(form1.nome);" maxlength="50" name="nome" type="text" name="nome" required placeholder="NOME COMPLETO"/> <br><div id="erros1" style="color:red"></div>
				<br>
					<input id="cpf" onkeypress="mascara(this, cpf1)" maxlength="14" name="cpf" type="text" onBlur="ValidarCPF(form1.cpf);" placeholder="CPF: XXX.XXX.XXX-XX" required /> <br><div id="erros2" style="color:red"></div>
				<br>
					<input id="tel" onkeypress="mascara(this, telefone)" maxlength="15" name="tel" type="text" onBlur="ValidaTelefone(form1.tel);" placeholder="Telefone: (DDD) XXXX-XXXXX" required /> <br><div id="erros3" style="color:red"></div>
				<br>
					<input name="email"type="email" placeholder="E-Mail: EMAIL@DOMINIO.COM.BR" required /> <br><br>
					<input name="senha1" id="senha1" type="password" placeholder="SENHA" required/> <br><br>
					<input id="senha2" name="senha2" type="password" onBlur="ValidaSenha(form1.senha2);" placeholder="CONFIRMAR SENHA" required/> <br><div id="erros4" style="color:red"></div><br>
					<?php if(!empty($_SESSION['logado']) && ($_SESSION['is_administrador'] == 1)){ ?>
						<select name="tipo_usuario">
							<option value="cliente">Cliente</option>
							<option value="funcionario">Funcionário</option>
							<option value="administrador">Administrador</option>
						</select><br><br>
						<?php }else{?>
							<input type="hidden" name="tipo_usuario" value="cliente" />
						<?php } ?>
					<input type="hidden" name="cad_user" />
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
			<h4>No Products</h4>
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
			<h4>Breakfast </h4>
			<p>Monday - Friday &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Saturaday - Sunday &nbsp;&nbsp; 11 am - 04 pm</p>
			<h4>Lunch </h4>
			<p>Monday - Friday &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Saturaday - Sunday &nbsp;&nbsp; 11 am - 04 pm</p>
		</li>
		<li>
			<h3>Notícias e Eventos</h3>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>Read more</button>
			<h3>Lorem Ipsum is simply</h3>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>Read more</button>
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