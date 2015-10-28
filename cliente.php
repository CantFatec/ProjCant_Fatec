<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include('session.php');
if(isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
	$identifica = $_GET['id_user'];
	conectar();
	$deleta = mysql_query("DELETE FROM usuario WHERE id_usuario = '$identifica'");
	mysql_close();
	echo '<script>alert("Cadastro deletado com sucesso!"); location.href="cliente.php" </script>';
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
	<div class="top-head">
		<div class="welcome">Welcome To <span>Food Point</span></div>
		<div class="top-nav">
	        <ul>
	            <li><a href="index.php">Home</a></li>
	            <li><a href="gallery.php">Gallery</a></li>
	            <li><a href="#">Blog</a></li>
	            <li><a href="#">Login</a></li>
	            <li><a href="contact.php">Contact</a></li>
	        </ul>
	    </div>
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
	
	<div clas="clear"> </div>
	<div class="grids">
		<ul>
			<h4>Meu Cadastro</h4>
						<p>
				<form method="GET">
					<select name="tipo_busca">
						<option value="dados">Meus dados</option>
						
					</select><br><br>
					<input type="submit" value="Buscar" /><br><br>
				</form>
				<?php 
					$chave = $_SESSION['senha'];
					if (isset($_GET['tipo_busca'])){
						$filtro = $_GET['tipo_busca'];
						$tb = "teste";
						conectar();
						if(($filtro == "dados")) $tb = "usuario";{
							$sql = "select * from $tb where cpf = $chave";
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
				        		<?php echo "Nome Completo: ".$nome_user."<br>CPF: ".$cpf."<br>Telefone: ".$telefone."<br>Email: ".$email; ?>
									<br><a href="<?php echo $href_excluir ?>">Excluir permanentemente minha conta</a>
									<a href="<?php echo $href_alterar ?>">Alterar meus dados cadastrais</a>
								</h3>
				        </div>
				</form>
				<?php }}
						}
						/*else if($filtro == "pedidos") $tb = "pedido";{
						}
						else if($filtro == "pagamentos") $tb = "pagamento";{
						}*/
						

						mysql_close(); }

				else if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){ 

					$filtro = $_GET['reg'];
					$id_user = $_GET['id_user'];

					if(($filtro == "dados")) $tb = "usuario";
					else if($filtro == "produtos") $tb = "produtos";

					conectar();
					$chave = $_SESSION['senha'];
					$qr = "SELECT * FROM $tb WHERE cpf = $chave";
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
						<input disabled="disabled" id="cpf" maxlength="14" name="cpf" type="text" value="<?php echo $cpf ?>" /> <br><br>
						<input id="tel" maxlength="15" name="tel" type="text" value="<?php echo $telefone ?>" required /> <br><br>
						<input name="email" type="email" value="<?php echo $email ?>" required /> <br><br>
						<input name="senha1" id="senha1" type="password" placeholder="SENHA" required/> <br><br>
						<input id="senha2" name="senha2" type="password" placeholder="CONFIRMAR SENHA" required/> <br><br>
						<input type="hidden" name="tipo_usuario" value="cliente" />
						<br><br>
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
		<div class="clear"> </div>
</div>
		<div class="clear"> </div>
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