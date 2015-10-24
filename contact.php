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
<title>Cantina Fatec Praia Grande | Contato</title>
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
	<div class="top-head">
		<div class="welcome">Welcome To <span>Food Point</span></div>
		<div class="top-nav">
	        <ul>
	            <li><a href="index.php">Home</a></li>	            
	            <li><a href="cadastro.php">Cadastro</a></li>
		    <li><a href="gallery.php">Galeria</a></li>	            
	            <li class="active"><a href="contact.php">Contato</a></li>
	        </ul>
	    </div>
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
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="gallery.php">Galeria</a></li>
            <li><a href="contact.php">Contato</a></li>
            <?php if (isset($_SESSION['login_adm'])){ ?>
            	<li><a href="adm.php">Administração</a></li>
            <?php } ?>
            <div class="clear"> </div>
        </ul>
    </div>
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
	<div class="feed">
	<div class="feedback">
        <h1>Feedback</h1>
        <form>
        	<div>
            	<span><label>Name</label></span>
            	<span><input type="text" value="" /></span>
            </div>
            <div>
            	<span><label>Email</label></span>
            	<span><input type="text" value="" /></span>
            </div>
        	<div>
            	<span><label>Mensagem</label></span>
            	<span><textarea></textarea></span>
            </div>
        	<div>
            	<span><input type="submit" value="Submit" /></span>
            </div>
        </form>
    </div>
    <div class="map"><iframe width="350" height="290" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Eiffel+Tower&amp;aq=&amp;sll=14.419385,79.988022&amp;sspn=0.112221,0.209255&amp;ie=UTF8&amp;hq=Eiffel+Tower&amp;t=m&amp;ll=48.858278,2.294254&amp;spn=0.014682,0.032015&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Eiffel+Tower&amp;aq=&amp;sll=14.419385,79.988022&amp;sspn=0.112221,0.209255&amp;ie=UTF8&amp;hq=Eiffel+Tower&amp;t=m&amp;ll=48.858278,2.294254&amp;spn=0.014682,0.032015" style="color:#333;text-align:left">View Larger Map</a></small></div>
    <div class="clear"></div>
</div>
</div>
	<div class="clear"> </div>
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