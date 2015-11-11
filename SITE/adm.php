<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
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
if(isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
	$identifica = $_GET['id_user'];
	conectar();
	$deleta = mysql_query("DELETE FROM usuario WHERE id_usuario = '$identifica'");
	mysql_close();
	echo '<script>alert("Cadastro deletado com sucesso!"); location.href="adm.php" </script>';
}
if(isset($_POST['alter_user'])){
	alterarUsuario();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Food-Point for Website Template | About :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/slider-styles.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
<style type="text/css">
	.dados{
		display: inline-block;
	}
</style>
</head>
<body>
<div class="wrap">
	<?php include 'header.php'; ?>
	<?php include 'menu.php'; ?>
	
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
	<div clas="clear"> </div>
	<div class="grids">
		<ul>
			<h4>Página do Administrador</h4>
						<p>
				<form method="GET">
					<select name="tipo_busca">
						<option value="is_cliente">Cliente</option>
						<option value="is_funcionario">Funcionário</option>
						<option value="is_administrador">Administrador</option>
						<option value="is_administrador">Cadastrar Produtos</option>
						<option value="is_administrador">Alterar Produtos</option>
					</select><br><br>
					<input type="submit" value="Buscar" /><br><br>
				</form>
				<?php 
					if (isset($_GET['tipo_busca'])){
						$filtro = $_GET['tipo_busca'];
						$tb = "teste";
						conectar();
						if(($filtro == "is_administrador") || ($filtro == "is_funcionario") || ($filtro == "is_cliente")) $tb = "usuario";
						else if($filtro == "produtos") $tb = "produtos";
						$sql = "select * from $tb where $filtro = '1'";
						$mysql_query = mysql_query($sql);
						if(count($mysql_query)>0){
							while($resultado = mysql_fetch_row($mysql_query)){			
								$id_user = $resultado[0];
								$nome_user = $resultado[1];
								$cpf = $resultado[2];
								$telefone = $resultado[3];
								$email = $resultado[4];
						?>
				<form name="<?php echo $id_user; ?>" method="GET">
				      	<div class="acoes">
				      		<?php $href_excluir="?acao=excluir&id_user=$id_user&reg=$filtro"; ?>
		      				<?php $href_alterar="?acao=editar&id_user=$id_user&reg=$filtro"; ?>
				        	
								<h3>
				        		<?php echo $id_user." || ".$nome_user." || ".$cpf." || ".$telefone." || ".$email; ?>
									<a href="<?php echo $href_excluir ?>">Excluir</a>
									<a href="<?php echo $href_alterar ?>">Alterar</a>
								</h3>
				        </div>
				</form>
				<?php }}mysql_close(); }

				else if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){ 

					$filtro = $_GET['reg'];
					$id_user = $_GET['id_user'];

					if(($filtro == "is_administrador") || ($filtro == "is_funcionario") || ($filtro == "is_cliente")) $tb = "usuario";
					else if($filtro == "produtos") $tb = "produtos";

					conectar();

					$qr = "SELECT * FROM $tb WHERE id_usuario = '$id_user'";
					$mysql_query = mysql_query($qr);

					if(count($mysql_query)>0){
						while($resultado = mysql_fetch_row($mysql_query)){			
							$id_user = $resultado[0];
							$nome_user = $resultado[1];
							$cpf = $resultado[2];
							$telefone = $resultado[3];
							$email = $resultado[4];
							$is_funcionario = $resultado[6];
							$is_cliente = $resultado[7];
							$is_administrador = $resultado[8];
						}
					}

					?>
					<form name="form1" method="POST">
						<input id="nome" maxlength="50" name="nome" type="text" name="nome" required value="<?php echo $nome_user ?>" /> <br><br>
						<input id="cpf" maxlength="14" name="cpf" type="text" value="<?php echo $cpf ?>" required /> <br><br>
						<input id="tel" maxlength="15" name="tel" type="text" value="<?php echo $telefone ?>" required /> <br><br>
						<input name="email" type="email" value="<?php echo $email ?>" required /> <br><br>
						<input name="senha1" id="senha1" type="password" placeholder="SENHA" required/> <br><br>
						<input id="senha2" name="senha2" type="password" placeholder="CONFIRMAR SENHA" required/> <br><br>
						<select name="tipo_usuario">
							<option value="cliente" <?php if($is_cliente == 1) echo 'selected="selected"'; ?> >Cliente</option>
							<option value="funcionario" <?php if($is_funcionario == 1) echo 'selected="selected"'; ?> >Funcionário</option>
							<option value="administrador" <?php if($is_administrador == 1) echo "selected='selected'"; ?> >Administrador</option>
						</select><br><br>
						<input type="hidden" name="tb" value="<?php echo $tb; ?>">
						<input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
						<input type="hidden" name="alter_user"/>
						<input type="submit" value="CONFIRMAR" />
						<input type="reset" value="LIMPAR" /><br><br>
					</form>
				<?php mysql_close();} ?>
			</p>
		<div class="clear"> </div>
		<br>
		<h4>Latest-Items</h4>
		<li>
			<h3>Ipsum simply</h3>
			<img src="images/thumb-3.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
		<li>
			<h3> Lorem Ipsum</h3>
			<img src="images/thumb-1.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
		<li class="last">
			<h3>Lorem simply</h3>
			<img src="images/thumb-7.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
			<a href="#">View all</a>
		</ul>
	<div class="clear"> </div>
</div>
	<div class="boxes">
		<div class="order">
		<ul>
			<li>
			<h3>ORDER</h3>
			<h4>No Products</h4>
			<p>shoping &nbsp;&nbsp;<span>$0:00</span></p>
			<p>Total &nbsp;&nbsp;<span>$0:00</span></p>
			<h5>Pricee and tax-include</h5>
			<h6><a href="#">Check-out</a></h6>
			<h6><a href="#">cart</a></h6>
		</li>
		</ul>
		</div>
		<div class="clear"> </div>
		<ul>
			<li>
			<h3>Restaurants Hours</h3>
			<h4>Breakfast </h4>
			<p>Monday - Friday &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Saturaday - Sunday &nbsp;&nbsp; 11 am - 04 pm</p>
			<h4>Lunch </h4>
			<p>Monday - Friday &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Saturaday - Sunday &nbsp;&nbsp; 11 am - 04 pm</p>
		</li>
		<li>
			<h3>News And Events</h3>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>Read more</button>
			<h3>Lorem Ipsum is simply</h3>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>Read more</button>
		</li>
			<div class="clear"> </div>
		</ul>
	</div>
	<div class="clear"> </div>
   </div>
</div>
<div class="footer1">
	<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid1">
					<h3>INFORMATION</h3>
						<ul>
							<li><a href="">Our Store</a></li>
							<li><a href="">Contact Us</a></li>
							<li><a href="">Delivery</a></li>
							<li><a href="">Legal Notice</a></li>
							<li><a href="">About Us</a></li>
						</ul>
				</div>
				<div class="footer-grid1">
					<h3>OUR OFFERS</h3>
						<ul>
							<li><a href="">specials</a></li>
							<li><a href="">New Products</a></li>
							<li><a href="">Top Sellers</a></li>
							<li><a href="">Manufacures</a></li>
							<li><a href="">Suplliers</a></li>
						</ul>
				</div>
				<div class="footer-grid1">
					<h3>YOURACCOUNT</h3>
						<ul>
							<li><a href="">Your Orders</a></li>
							<li><a href="">Your cradit slips</a></li>
							<li><a href="">Your Address</a></li>
							<li><a href="">Your personalinfo</a></li>
							<li><a href="">Your vochers</a></li>
						</ul>
			</div>
				<div class="footer-grid2">
					<h3>FALLOWS US</h3>
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