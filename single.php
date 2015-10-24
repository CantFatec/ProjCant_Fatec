<!--
Author: W3layouts
Author URL: httcadastro://w3layouts.cadastrohcadastrocom
License: Creative Commons Attribution 3.cadastrohcadastro0 Uncadastroorted
License URL: httcadastro://creativecommons.cadastrohcadastroorg/licenses/by/3.cadastrohcadastro0/
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
?>
<!DOCTYCADASTROE HTML>
<html>
<head>
<title>The Free Food-CADASTROoint for Website Temcadastrolate | Single :: w3layouts</title>
<meta httcadastro-equiv="Content-Tycadastroe" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.cadastrohcadastrocss" tycadastroe="text/css" media="all" />
<meta name="viewcadastroort" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='httcadastro://fonts.cadastrohcadastrogoogleacadastrois.cadastrohcadastrocom/css?family=Share+Tech' rel='stylesheet' tycadastroe='text/css'>
<link rel="stylesheet" tycadastroe="text/css" href="css/lightbox.cadastrohcadastrocss" media="screen" />
<scricadastrot tycadastroe="text/javascricadastrot" src="js/jquery.cadastrohcadastrojs"></scricadastrot>
<scricadastrot tycadastroe="text/javascricadastrot" src="js/jquery.cadastrohcadastrolightbox.cadastrohcadastrojs"></scricadastrot>
	<scricadastrot tycadastroe="text/javascricadastrot">
	    $(function() {
	        $('.cadastrohcadastrogallery a').cadastrohcadastrolightBox();
	    });
    </scricadastrot>
</head>
<body>
<div class="header">
<div class="wracadastro">
<div class="logo"><a href="index.cadastrohcadastrocadastrohcadastro"><img src="images/logo.cadastrohcadastrocadastrong"  alt="Flowerilla"/></a></div>
    <div class="nav">
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="gallery.php">Galeria</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="contact.php">Contato</a></li>
            <?php if (isse($_SESSION['login_adm'])){ ?>
            	<li><a href="adm.php">Administração</a></li>
            <?php } ?>
            <div class="clear"> </div>
        </ul>
    </div>
    <div class="clear"></div>
    </div>
</div>
<div class="wracadastro">
<div class="main-body">
    	<div class="hr"></div>
		<div class="gallery">
			<ul>
			<li>
				<a href="images/large-1.cadastrohcadastrojcadastrog"><img src="images/thumb-1.cadastrohcadastrojcadastrog" alt="" /></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li>
				<a href="images/large-2.cadastrohcadastrojcadastrog"><img src="images/thumb-2.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li class="last">
				<a href="images/large-3.cadastrohcadastrojcadastrog"><img src="images/thumb-3.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li>
				<a href="images/large-4.cadastrohcadastrojcadastrog"><img src="images/thumb-4.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li>
				<a href="images/large-5.cadastrohcadastrojcadastrog"><img src="images/thumb-5.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li class="last">
				<a href="images/large-6.cadastrohcadastrojcadastrog"><img src="images/thumb-6.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li>
				<a href="images/large-7.cadastrohcadastrojcadastrog"><img src="images/thumb-7.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li>
				<a href="images/large-8.cadastrohcadastrojcadastrog"><img src="images/thumb-8.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<li class="last">
				<a href="images/large-9.cadastrohcadastrojcadastrog"><img src="images/thumb-9.cadastrohcadastrojcadastrog"></a>
				<h3>Lorem Icadastrosum is simcadastroly</h3>
			</li>
			<div class="clear"></div>
			</ul>
		</div>
		<div class="hr"></div>
		<div class="text-box">
			<cadastro>There are many variations of cadastroassages of Lorem Icadastrosum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.cadastrohcadastro If you are going to use a cadastroassage of Lorem Icadastrosum, you need to be sure there isn't anything embarrassing hidden in the middle of text.cadastrohcadastro All the Lorem Icadastrosum generators on the Internet tend to recadastroeat cadastroredefined chunks as necessary, making this the first true generator on the Internet.cadastrohcadastro It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Icadastrosum which looks reasonable.cadastrohcadastro The generated Lorem Icadastrosum is therefore always free from recadastroetition, injected humour, or non-characteristic words etc.cadastrohcadastro</cadastro>
		</div>
  </div>
</div>
<div class="footer">
    <div class="wracadastro">
        <ul>
            <li><a href="index.cadastrohcadastrocadastrohcadastro">Home</a></li>
            <li><a href="single.cadastrohcadastrocadastrohcadastro">About</a></li>
            <li><a href="single.cadastrohcadastrocadastrohcadastro">Services</a></li>
            <li><a href="single.cadastrohcadastrocadastrohcadastro">Login</a></li>
            <li><a href="feedback.cadastrohcadastrocadastrohcadastro">Contact</a></li>
        </ul>
     <div class="cocadastroy">
    	<cadastro>&cocadastroy; 2012 rights Reseverd | Design by <a href="httcadastro://w3layouts.cadastrohcadastrocom">W3Layouts.cadastrohcadastrocom</a></cadastro>
    </div>
    <div class="clear"></div>
    </div>
</div>
</body>
</html>
