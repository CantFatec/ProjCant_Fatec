<?php

include 'session.php';
if(isset($_GET['produto']) && isset($_GET['nome_produto']) && isset($_GET['preco_produto'])){
	$_SESSION['idProdutoCarrinho'] = $_GET['produto'];
	$_SESSION['nomeProduto']=$_GET['nome_produto'];
	$_SESSION['precoProduto']=$_GET['preco_produto'];
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
<?php
function chamarprodutopf(){
	conectar();
	$sql = "select * from produto where tipo = 'Prato'";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($usuario = mysql_fetch_row($consulta)){
			$id = $usuario[0];
			$nome = $usuario[1];
			$valor = $usuario[2];
			$tipo = $usuario[3];
			$desc = $usuario[4];
			$img = $usuario[5];
			
			
			echo "<li name='licardapio' style='border:ridge; margin-right: 10px;'>";
			echo "<h3 style='margin: 0px 5px'>$nome</h3>";
			echo "<img style='width:205px; height:125px' src=$img>";
			echo "<p style='margin: 0px 5px'>$desc</p>";
			echo "<h3 style='margin: 0px 5px'>R$ $valor</h3>";
			echo "<form>";
			echo "<input type='radio' name='guarni' value='ovo' checked>Ovo Frito";
			echo "<br>";
			echo "<input type='radio' name='guarni' value='batata'>Batata Frita";
			echo "<br>";
			echo "<input type='radio' name='guarni' value='omelete'>Omelete";
			echo "<br>";
			echo "<input type='hidden' name='produto' value='$id'></input>";
			echo "<input type='hidden' name='nome_produto' value='$nome'></input>";
			echo "<input type='hidden' name='preco_produto' value='$valor'></input>";
			echo "<input style='margin: 0px 5px' type='submit' name='#' value='Comprar'>";
			echo "</form>";
			echo "</li>";
			
		}
	}
	mysql_close();
}
?>

<?php
function chamarprodutolanche(){
	conectar();
	$sql = "select * from produto where tipo = 'Lanche'";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($usuario = mysql_fetch_row($consulta)){
			$id = $usuario[0];
			$nome = $usuario[1];
			$valor = $usuario[2];
			$tipo = $usuario[3];
			$desc = $usuario[4];
			$img = $usuario[5];
			
			echo "<li>";
			echo "<h3>$nome</h3>";
			echo "<img src=$img>";
			echo "<p>$desc</p>";
			echo "<h3>R$ $valor</h3>";
			echo "<form>";
			echo "<input type='radio' name='guarni' value='ovo' checked>Ovo Frito";
			echo "<br>";
			echo "<input type='radio' name='guarni' value='batata'>Batata Frita";
			echo "<br>";
			echo "<input type='radio' name='guarni' value='omelete'>Omelete";
			echo "<br>";
			echo "<input type='submit' name='#' value='Comprar'>";
			echo "</form>";
			echo "</li>";
		}
	}
	mysql_close();
}
?>

<?php
function chamarprodutobebidas(){
	conectar();
	$sql = "select * from produto where tipo = 'Bebida'";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($usuario = mysql_fetch_row($consulta)){
			$id = $usuario[0];
			$nome = $usuario[1];
			$valor = $usuario[2];
			$tipo = $usuario[3];
			$desc = $usuario[4];
			$img = $usuario[5];
			
			echo "<li>";
			echo "<h3>$nome</h3>";
			echo "<img src=$img>";
			echo "<p>$desc</p>";
			echo "<h3>R$ $valor</h3>";
			echo "<form>";
			echo "<input type='radio' name='guarni' value='ovo' checked>Ovo Frito";
			echo "<br>";
			echo "<input type='radio' name='guarni' value='batata'>Batata Frita";
			echo "<br>";
			echo "<input type='radio' name='guarni' value='omelete'>Omelete";
			echo "<br>";
			echo "<input type='submit' name='#' value='Comprar'>";
			echo "</form>";
			echo "</li>";
		}
	}
	mysql_close();
}
?>

<?php
function chamarprodutocreditos(){
	conectar();
	$sql = "select * from produto where tipo = 'Crédito'";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($usuario = mysql_fetch_row($consulta)){
			$id = $usuario[0];
			$nome = $usuario[1];
			$valor = $usuario[2];
			$tipo = $usuario[3];
			$desc = $usuario[4];
			$img = $usuario[5];
			
			echo "<li>";
			echo "<h3>$nome</h3>";
			echo "<img src=$img>";
			echo "<p>$desc</p>";
			echo "<h3>R$ $valor</h3>";
			echo "</li>";
		}
	}
	mysql_close();
}
?>

<title>Cantina Fatec Praia Grande | Cardápio</title>
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
	<script>
			$(document).ready(function(){
			$("#botao1").click(function(){
			$(".prato1").toggle();
    });
});
</script>
<script>
			$(document).ready(function(){
			$("#botao2").click(function(){
			$(".prato2").toggle();
    });
});
</script>
<script>
			$(document).ready(function(){
			$("#botao3").click(function(){
			$(".prato3").toggle();
    });
});
</script>
<script>
			$(document).ready(function(){
			$("#botao4").click(function(){
			$(".prato4").toggle();
    });
});
</script>
</head>
<body>
<div class="wrap">
		<?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>
    
	<div class="main-body1">
	<?php include 'menulateral.php'; ?>
	
	
	<div class="grids2"><button id="botao1">Pratos Feitos</button></div>
	<div class="prato1" style="display:none">
	<div class="grids">
	<ul>
	<?php chamarprodutopf(); ?>			
	</ul>		
	</div>		
	</div>
	
	<div class="grids2"><button id="botao2">Lanches</button></div>
	<div class="prato2" style="display:none">
	<div class="grids">
	
	<?php chamarprodutolanche(); ?>			
			
	</div>	
	</div>
	
	<div class="grids2"><button id="botao3">Bebidas</button></div>
	<div class="prato3" style="display:none">
	<div class="grids">
	<ul>
	<?php chamarprodutobebidas(); ?>			
	</ul>		
	</div>	
	</div>
	
	<div class="grids2"><button id="botao4" 
	style="margin-top: 0px;
    width: 700px;
    margin-bottom: 0px;
    padding-bottom: 0px;
    padding-top: 0px;
    padding-right: 0px;
    padding-left: 0px;
    height: 0px;">=D</button></div>
	<div class="prato4" style="display:none">
	<div class="grids">
	
	<?php chamarprodutocreditos(); ?>			
			
	</div>	
	</div>	
		
	
	</div>
	<div class="clear"> </div>
    

<?php include 'footer.php'; ?>
</div>
</body>
</html>