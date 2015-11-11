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
<title>The Free Food-Point for Website Template | Contact :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
<div class="wrap">
<div class="logo"><a href="index.php"><img src="images/logo.png"  alt="Flowerilla"/></a></div>
    <div class="nav">
       <?php include 'menu.php'; ?>
    </div>
    <div class="clear"></div>
    </div>
</div>
<div class="wrap">
	<div class="hr"></div>
<div class="feed">
	<div class="feedback">
        <h1>Feedback</h1>

 
<form name="formulario" action="http://scripts.redehost.com.br/formmail.aspx" method="post">
<input type=hidden name="destino" value="EmailQueVaiReceberAsMensagens">
<input type=hidden name="enviado" value="http://www.seudominio.xxx.yy/enviado.htm">
<p><b>Nome:</b><br>
<input type=text name="nome" size="45"></p><br>
<p><b>Email:</b><br>
<input type=text name="email" size="45"></p><br>
<p><b>Assunto:</b><br>
<input type=text name="assunto" size="45"></p><br>
<p><b>Mensagem:</b><br>
<textarea name="Mensagem" rows="10" cols="60" wrap="virtual"></textarea></p><br>
<p><input type="submit" value="Enviar Email"> <input type="reset" value="Limpar Formulário"></p>
</form>

    </div>
    <div class="map"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Eiffel+Tower&amp;aq=&amp;sll=14.419385,79.988022&amp;sspn=0.112221,0.209255&amp;ie=UTF8&amp;hq=Eiffel+Tower&amp;t=m&amp;ll=48.858278,2.294254&amp;spn=0.014682,0.032015&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Eiffel+Tower&amp;aq=&amp;sll=14.419385,79.988022&amp;sspn=0.112221,0.209255&amp;ie=UTF8&amp;hq=Eiffel+Tower&amp;t=m&amp;ll=48.858278,2.294254&amp;spn=0.014682,0.032015" style="color:#333;text-align:left">View Larger Map</a></small></div>
    <div class="clear"></div>
</div>
</div>
<div class="footer">
    <div class="wrap">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="single.php">About</a></li>
            <li><a href="single.php">Services</a></li>
            <li><a href="single.php">Login</a></li>
            <li><a href="feedback.php">Contact</a></li>
        </ul>
    <div class="copy">
    	<p>&copy; 2012 rights Reseverd | Design by <a href="http://w3layouts.com">W3Layouts.com</a></p>
    </div>
    <div class="clear"></div>
    </div>
</div>
</body>
</html>