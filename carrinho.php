<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

include 'session.php';

function valorTotal(){
	$qtd = $_GET['qtd'];
	$vl = $_SESSION['valor'];
}

if(isset($_GET['qtd'])){
	echo "R$ ".valorTotal();
}

if(isset($_GET['limparCarrinho'])){
	unset($_SESSION['idProdutoCarrinho']);
	unset($_SESSION['nomeProduto']);
	unset($_SESSION['precoProduto']);
	echo"<script>location.href='gallery.php';</script>";
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cantina Fatec Praia Grande | Sobre</title>
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
		
		<div class="titulo"> <h1>Meu Carrinho</h1></div>
			

		<?php if(!empty($_SESSION['idProdutoCarrinho']) && $_SESSION['nomeProduto']){
					conectar();
					$idproduto = $_SESSION['idProdutoCarrinho'];
					$sql = "select * from produto where id_produto=$idproduto";
					$consulta = mysql_query($sql);
					if(count($consulta)>0){
						while($usuario = mysql_fetch_row($consulta)){
							$id = $usuario[0];
							$nome = $usuario[1];
							$valor = $usuario[2];
							$tipo = $usuario[3];
							$desc = $usuario[4];
							$img = $usuario[5];
							$_SESSION['valor'] = $valor;
						}

					mysql_close();
				}
		?>
		
				
		<TABLE width="930" align=center style="background-color: #fff;border:2px solid #000;">
			<tbody>
				<tr style="text-align:center;border:1px; border-style:solid; " >
				<td bgcolor="#CCCCCC">Produto</td>
				<td bgcolor="#CCCCCC">Acompanhamento</td>
				<td bgcolor="#CCCCCC">Valor</td>
				<td bgcolor="#CCCCCC">Quantidade</td>
				<td bgcolor="#CCCCCC">Remover Produto</td>
				<td bgcolor="#CCCCCC">Valor Total:</td>					
				</tr>
				
				<tr style="text-align:center;vertical-align:middle">
				<td>
					<img style="width:80px;height:50px" src="<?php echo $img; ?>">
				</td>
				<td></td>
				<td>
					R$ <?php echo $valor;?>
				</td>
				<td>
					<form>
						<input type="number" min="1" max="10" name="qtd" value="1" size="3px"/>
					</form>
				</td>
				<td>
					<form>
						<input type="submit" value="Apagar" name="limparCarrinho"/>
					</form>
				</td>
				<td>
					R$ <?php echo $valor;?>
				</td>
				</tr>			
			</tbody>
			</table>	
		
		
			
			
			<tr>
			<td><?php valorTotal();  ?></td>				
			</tr>
			
			<input style="float:right" type="submit" value="Confirmar Compra"></input>
		
		<?php 
					}else{
			echo "NENHUM PRODUTO NO CARRINHO";
		} ?>
			
	<div class="clear"> </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>