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
<script src="js/validacao.js"></script>

<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php
		include 'menu.php';
		if(isset($_POST['cad_user'])) cadastrarUsuario();
	?>
	
	<div class="main-body">
	
	<div clas="clear"> </div>
	<div class="grids">
		<ul>
			<h4>CADASTRO DE USUÁRIOS</h4><br>
			<p>
				<form name="form1" method="POST">
					<input id="nome" onkeypress="mascara(this, letras1)" onBlur="ValidaNome(form1.nome);" maxlength="50" name="nome" type="text" name="nome" required placeholder="NOME COMPLETO"/> <br><div id="erros1" style="color:red"></div>
				<br>
					<input id="cpf" onkeypress="mascara(this, cpf1)" maxlength="14" name="cpf" type="text" onBlur="ValidarCPF(form1.cpf);" placeholder="CPF: XXX.XXX.XXX-XX" required /> <br><div id="erros2" style="color:red"></div>
				<br>
					<input id="tel" onkeypress="mascara(this, telefone)" maxlength="15" name="tel" type="text" onBlur="ValidaTelefone(form1.tel);" placeholder="Telefone: (DDD) XXXX-XXXXX" required /> <br><div id="erros3" style="color:red"></div>
				<br>
					<input name="email" type="email" placeholder="E-Mail: EMAIL@DOMINIO.COM.BR" required /> <br><br>
					<input name="senha1" id="senha1" type="password" placeholder="SENHA" required/> <br><br>
					<input id="senha2" name="senha2" type="password" onBlur="ValidaSenha(form1.senha2);" placeholder="CONFIRMAR SENHA" required/> <br><div id="erros4" style="color:red"></div><br>
					<?php if(!empty($_SESSION['logado']) && ($_SESSION['is_administrador'] == 1)){ ?>
						<select name="tipo_usuario">
							<option value="" disabled selected hidden>Selecione um tipo</option>
							<option value="cliente">Cliente</option>
							<option value="funcionario">Funcionário</option>
							<option value="administrador">Administrador</option>
						</select><br><br>
						<?php }else{?>
							<input type="hidden" name="tipo_usuario" value="cliente" />
						<?php } ?>
					<input type="hidden" name="cad_user" />
					<input type="submit" id="confirma_cadastro" value="CONFIRMAR" />
					<input type="reset" value="LIMPAR" /><br><br>
				</form>
			</p>
		<div class="clear"> </div>
		<br>		
		</ul>
	<div class="clear"> </div>
</div>
	
	<div class="clear"> </div>
   </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>