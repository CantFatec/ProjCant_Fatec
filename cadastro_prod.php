<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

include 'session.php';

function cadastrarProduto(){
	conectar();
	$nome = $_POST['nome'];
		$nome_img = str_replace(" ", "_", $nome);
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo_produto'];
	$desc = $_POST['desc'];
	$arquivo = $_FILES['imagem']['name'];
		$arquivo = str_replace(" ", "_", $arquivo);

	$sql = "INSERT INTO produto VALUES (null,'".$nome."','".$valor."','".$tipo."','".$desc."','sem_foto')";
	$insert = mysql_query($sql);
	
	if($insert){
		if(mkdir("images/$nome_img",0777)){
			$destino = "images/$nome_img/".$arquivo;
			if($destino == "images/$nome_img/"){
				$destino = "images/padrao.png";
			}
		}else{
			echo "erro ao criar diretório";
		}
		if(move_uploaded_file($_FILES['imagem']['tmp_name'],$destino)){}
		
		$sql = ("UPDATE produto SET destino_img='$destino' WHERE nome='$nome'");
		$update = mysql_query($sql);

		if($update){
			echo ('<script> alert("Cadastro Realizado com Sucesso!"); location.href="cadastro_prod.php";</script>');
		}else{
			echo "Impossível atualizar a imagem do produto! Erro:".mysql_error();
		}
		
	}else{
		echo "erro ao fazer insert: ".mysql_error();
	}
	mysql_close();
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

<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; 
	if(isset($_POST['cad_prod'])) cadastrarProduto();
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