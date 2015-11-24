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
if(isset($_GET['ativaFiltro'])){
	if($_GET['nome_filtro']!="")		$_SESSION['nome_filtro'] = $_GET['nome_filtro'];
	if($_GET['cpf_filtro']!="")			$_SESSION['cpf_filtro'] = $_GET['cpf_filtro'];
	if($_GET['telefone_filtro']!="")	$_SESSION['telefone_filtro'] = $_GET['telefone_filtro'];
	if($_GET['email_filtro']!="")		$_SESSION['email_filtro'] = $_GET['email_filtro'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cantina Fatec Praia Grande | ADM</title>
<?php include 'head.php'; ?>
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
			<div class="welcome">Bem vindo à <span>Cantina Fatec Praia Grande</span></div>

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
				
			<div class="grids">	
			<div class="grids2">
			<form action="adm_usuarios.php">
			<input type="submit" name="botaoadm" value="Usuários" ></input>
			</form>
			</div>
			<div class="grids2">
			<form action="adm_produtos.php">
			<input type="submit" name="botaoadm" value="Produtos" ></input>
			</form>
			</div>
			<div class="grids2">
			<form action="admpedidos.php">
			<input type="submit" name="botaoadm" value="Pedidos" ></input>
			</form>
			</div>
			
			<div class="clear"> </div>
			</div>
				
				<div class="clear"> </div>
		</div>
		</div>
		
		<script>
		$('#slider').coinslider();
		</script>
	<?php include 'footer.php'; ?>
	</body>
	</html>