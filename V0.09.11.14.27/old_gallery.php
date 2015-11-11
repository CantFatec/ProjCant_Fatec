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
<title>Cantina Fatec Praia Grande | Galeria</title>
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
	<div class="top-head">
		<div class="welcome">Welcome To <span>Food Point</span></div>
		<div class="clear"> </div>
    </div>
	<div class="header">
	<div class="logo"><a href="index.php"><img src="images/logo.png"  alt="Flowerilla"/></a></div>
    <div class="search">
    	<?php if(empty($_SESSION['login_adm'])){ ?>
			    <form method="POST">
			    	<input type="text" name="login" placeholder="LOGIN"/>
			    	<br>
			    	<input type="password" name="senha" placeholder="SENHA"/>
			    	<br>
			    	<input type="submit" value="Logar" />
			    </form>    
		    <?php }else{ ?>
		    	<form method="GET">
				    Bem Vindo, <?php echo $_SESSION['login_adm']; ?> !
				    <input type="submit" value="Sair" name="logout" />
				</form>
		    <?php } ?>
    </div>
    <div class="clear"> </div>
	</div>
	<div class="nav">
        <?php include 'menu.php'; ?>
    </div>
	<div class="main-body">
	<div class="grids">
		<div class="gallery">
			<ul>
					<li><a href="images/g1.jpg"><img src="images/g1.jpg" alt="" /></a></li>
					<li><a href="images/g2.jpg"><img src="images/g2.jpg" alt="" /></a></li>
					<li><a href="images/g3.jpg"><img src="images/g3.jpg" alt="" /></a></li>
					<li><a href="images/g4.jpg"><img src="images/g4.jpg" alt="" /></a></li>
					<li><a href="images/g5.jpg"><img src="images/g5.jpg" alt="" /></a></li>
					<li><a href="images/g6.jpg"><img src="images/g6.jpg" alt="" /></a></li>
					<li><a href="images/g7.jpg"><img src="images/g7.jpg" alt="" /></a></li>
					<li><a href="images/g8.jpg"><img src="images/g8.jpg" alt="" /></a></li>
					<li><a href="images/g9.jpg"><img src="images/g9.jpg" alt="" /></a></li>
					<li><a href="images/g10.jpg"><img src="images/g10.jpg" alt="" /></a></li>
					<li><a href="images/g11.jpg"><img src="images/g11.jpg" alt="" /></a></li>
					<li><a href="images/g12.jpg"><img src="images/g12.jpg" alt="" /></a></li>
					<li><a href="images/g13.jpg"><img src="images/g13.jpg" alt="" /></a></li>
					<li><a href="images/g14.jpg"><img src="images/g14.jpg" alt="" /></a></li>
					<li><a href="images/g1.jpg"><img src="images/g1.jpg" alt="" /></a></li>
				<div class="clear"></div></ul>
		</div>
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
<div class="footer1">
	<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid1">
					<h3>INFORMAÇÕES</h3>
					<ul>
						<li><a href="">Nossa Loja</a></li>
						<li><a href="">Contate-nos</a></li>
						<li><a href="">Legal Notice</a></li>
						<li><a href="">Sobre</a></li>
					</ul>
				</div>
				<div class="footer-grid1">
					<h3>NOSSAS OFERTAS</h3>
					<ul>
						<li><a href="">Especiais</a></li>
						<li><a href="">Novos Produtos</a></li>
						<li><a href="">Mais vendidos</a></li>
						<li><a href="">Fábricas</a></li>
						<li><a href="">Fornecedores</a></li>
					</ul>
				</div>
				<div class="footer-grid1">
					<h3>SUA CONTA</h3>
					<ul>
						<li><a href="">Seus Pedidos</a></li>
						<li><a href="">Seus Créditos</a></li>
						<li><a href="">Seu Endereço</a></li>
						<li><a href="">Your personalinfo</a></li>
						<li><a href="">Seus vochers</a></li>
					</ul>
				</div>
				<div class="footer-grid2">
					<h3>SIGA-NOS</h3>
					<ul>
						<li><a href=""><img src="images/facebook.png" title="facebook"/></a></li>
						<li><a href=""><img src="images/twitter.png" title="twitter"></a></li>
						<li><a href=""><img src="images/rss.png" title="rss"></a></li>
					</ul>
			</div>
			</div>
			<div class="clear"> </div>
			<div class="copy">
    	<p>&copy; 2013 rights Reseverd | Design by <a href="http://w3layouts.com">W3Layouts.com</a></p>
    </div>
    </div>
			<div class="clear">
			</div>
		</div>
<script>
			$('#slider').coinslider();
		</script>

</body>
</html>