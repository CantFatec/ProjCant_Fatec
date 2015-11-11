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


<p><b>Nome:</b><br>

<input type=text name="nome" size="45"></p><br>
<p><b>Email:</b><br>

<input type=text name="email" size="45"></p><br>
<p><b>Assunto:</b><br>

<input type=text name="assunto" size="45"></p><br>
<p><b>Mensagem:</b><br>

<textarea name="Mensagem" rows="10" cols="60" wrap="virtual"></textarea></p><br>
<p><input type="submit" value="Enviar Email"> <input type="reset" value=" Limpar "></p>

</form>
<?php
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From:administrador@cantinafatecpg.esy.es\r\n"; 
$headers .= "Return-Path: administrador@cantinafatecpg.esy.es\r\n"; 
$envio = mail("nome","email", "assunto", "Mensagem", $headers);
 
if($envio)
 echo "Mensagem enviada com sucesso!!";
else
 echo "A mensagem não pode ser enviada!!";
?>


    </div>
    <div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7359037335136!2d-46.414400185013825!3d-24.00510128446442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1db2e586da8d%3A0x271ae3e10bdc671e!2sFatec!5e0!3m2!1spt-BR!2sbr!4v1445904273520" width="350" height="290" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" style="border:0" allowfullscreen></iframe>
</small></div>
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