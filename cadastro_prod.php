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
<?php include 'head.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; 
	if(isset($_POST['cad_prod'])){
		$acao = 0;
		cadastrarEAlterarProduto($acao);
	}
	?>
	
	<div class="main-body">
	
	<div class="clear"> </div>
	<div class="grids">
		<ul>
			<h4>CADASTRO DE PRODUTOS</h4><br>
			<p>
					<?php if(!empty($_SESSION['logado']) && ($_SESSION['is_administrador'] == 1)){ ?>
					<form name="form1" method="POST" enctype="multipart/form-data">
						<input id="nome" maxlength="50" name="nome" type="text" name="nome" placeholder="NOME DO PRODUTO" required/>
					<br><br>
						<input id="valor" maxlength="14" name="valor" type="number" min="0.00" step="0.01" placeholder="VALOR" required />
					<br><br>				
						<select name="tipo_produto">
							<option value="" disabled selected hidden>Selecione o tipo</option>
							<option value="Prato">Pratos</option>
							<option value="Bebida">Bebidas</option>
							<option value="Lanche">Lanches</option>
							<option value="Crédito">Créditos</option>
						</select><br><br>
						<textarea name="desc" rows="4" cols="50" placeholder="DESCRIÇÃO" style="width:450px;padding:8px;font-size:16px;color:#333;background:#eee;box-shadow: 0 0 6px #aaa;border:none;outline: none;resize:none;font-family: 'Istok Web', sans-serif;"></textarea>
						<br><br>
						<input type="file" name="imagem" />
						<br><br>
						<?php } ?>
						<input type="hidden" name="cad_prod" />
						<input type="submit" value="CONFIRMAR" />
						<input type="reset" value="LIMPAR" /><br><br>
					</form>
			</p>
		<div class="clear"> </div>
		<br>
	<div class="clear"> </div>
</div>
	<div class="boxes">
		<div class="order">		
		</div>
		<div class="clear"> </div>		
	</div>
	<div class="clear"> </div>
   </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>