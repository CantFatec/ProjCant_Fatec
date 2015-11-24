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
<title>Cantina Fatec Praia Grande | Contato</title>
<?php include 'head.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	
	<div class="main-body">
	
	<div class="feed">
	<div class="feedback">
        <h1>Contato:</h1>
       

  		<form method="POST"> 


			<input type="text" name="nome" size="45" placeholder="NOME" /><br><br>

			<input type="text" name="email" size="45" placeholder="EMAIL" /><br><br>

			<input type="text" name="assunto" size="45" placeholder="ASSUNTO" /><br><br>

			<textarea name="mensagem" rows="10" cols="60" wrap="virtual" placeholder="MENSAGEM"></textarea><br><br>
			<input type="hidden" name="envia_msg" value="envia_msg" />
			<input type="submit" value="Enviar Email" /> <input type="reset" value=" Limpar " />

		</form>
		<?php
			if(isset($_POST['envia_msg'])){
				contato($_SESSION['nome'],$_SESSION['email'],$_SESSION['assunto'],$_SESSION['mensagem']);
			}
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
<?php include 'footer.php'; ?>

</body>
</html>