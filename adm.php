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
	<div class="clear"> </div>
	<div class="grids">
		<ul>
			<h4>Página do Administrador</h4>
				<p>
				<form method="GET">
					<select name="tipo_busca" onChange = "location=this.value">					
						<option value="">Escolha uma Opção:</option>
						<option value="?tipo_busca=is_cliente">Cliente</option>
						<option value="?tipo_busca=is_funcionario">Funcionário</option>
						<option value="?tipo_busca=is_administrador">Administrador</option>
						<option value="?tipo_busca=is_administrador">Cadastrar Produtos</option>
						<option value="?tipo_busca=is_administrador">Alterar Produtos</option>
					</select><br><br>
				</form>
				<?php 
					if (isset($_GET['tipo_busca'])){?>
						<form id="form1" name="form1" method="GET" action="adm.php">
								<input name="nome_filtro" type="text" placeholder="Nome" id="nome" size="12"/>
								<input name="cpf_filtro" type="text" placeholder="CPF" id="cpf" size="12"/>
								<input name="telefone_filtro" type="text" placeholder="Telefone" id="tel" size="12"/>
								<input name="email_filtro" type="text" placeholder="Email" id="email" size="12"/>
								<input type="hidden" name="ativaFiltro" />
								<input type="submit" name="botao_filtro" id="bt_filtro" value="Filtrar" />
								<input type="reset" name="botao_filtro" id="bt_filtro_reset" value="Limpar" />
							</form>
				
						<table width="700" cellspacing="0" cellpadding="4" style="background-color: #fff;border:2px dotted #000;">
							<tr>
								<td width="90" bgcolor="#CCCCCC"><strong>ID</strong></td>
								<td width="95" bgcolor="#CCCCCC"><strong>Nome</strong></td>
								<td width="159" bgcolor="#CCCCCC"><strong>CPF</strong></td>
								<td width="191" bgcolor="#CCCCCC"><strong>Telefone</strong></td>
								<td width="113" bgcolor="#CCCCCC"><strong>Email</strong></td>
								<td width="113" bgcolor="#CCCCCC"><strong>Alterar</strong></td>
								<td width="113" bgcolor="#CCCCCC"><strong>Excluir</strong></td>
							</tr>
							
						<?php
						$filtro = $_GET['tipo_busca'];
						$tb = "teste";
						conectar();
						if(($filtro == "is_administrador") || ($filtro == "is_funcionario") || ($filtro == "is_cliente")){
							$tb = "usuario";							
							$sql = "select * from $tb where $filtro = '1'";
						}
						$mysql_query = mysql_query($sql);
						if((count($mysql_query)>0) && !isset($_SESSION['ativaFiltro'])){?>
									
							<?php while($resultado = mysql_fetch_row($mysql_query)){			
								$id_user = $resultado[0];
								$nome_user = $resultado[1];
								$cpf = $resultado[2];
								$telefone = $resultado[3];
								$email = $resultado[4];
							?>
							<tr>
								<td><?php echo $id_user; ?></td>
								<td><?php echo $nome_user; ?></td>
								<td><?php echo $cpf; ?></td>
								<td><?php echo $telefone; ?></td>
								<td><?php echo $email; ?></td>
								<form name="<?php echo $id_user; ?>" method="GET">
									<div class="acoes">
										<?php $href_excluir="?acao=excluir&id_user=$id_user&reg=$filtro"; ?>
										<?php $href_alterar="?acao=editar&id_user=$id_user&reg=$filtro"; ?>
										<td><a href="<?php echo $href_alterar ?>">Alterar</a></td>
										<td><a href="<?php echo $href_excluir ?>">Excluir</a></td>
									</div>
								</form>
							</tr>
							<?php
							}
						}else if(isset($_GET['ativaFiltro'])){
								$tb = "usuario";							
								$sql = "select * from $tb where $filtro = '1'";
							?>
							<?php while($resultado = mysql_fetch_row($mysql_query)){			
									$id_user = $resultado[0];
									$nome_user = $resultado[1];
									$cpf = $resultado[2];
									$telefone = $resultado[3];
									$email = $resultado[4];
								?>
								<tr>
								<td><?php echo $id_user; ?></td>
								<td><?php echo $nome_user; ?></td>
								<td><?php echo $cpf; ?></td>
								<td><?php echo $telefone; ?></td>
								<td><?php echo $email; ?></td>
								<form name="<?php echo $id_user; ?>" method="GET">
									<div class="acoes">
										<?php $href_excluir="?acao=excluir&id_user=$id_user&reg=$filtro"; ?>
										<?php $href_alterar="?acao=editar&id_user=$id_user&reg=$filtro"; ?>
										<td><a href="<?php echo $href_alterar ?>">Alterar</a></td>
										<td><a href="<?php echo $href_excluir ?>">Excluir</a></td>
									</div>
								</form>
								</tr>
						<?php
								}
							}
						?>
							</table>
						
						
								
				<?php mysql_close();
					}else if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){ 

					$filtro = $_GET['reg'];
					$id_user = $_GET['id_user'];

					if(($filtro == "is_administrador") || ($filtro == "is_funcionario") || ($filtro == "is_cliente")) $tb = "usuario";

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
						<input name="senha1" id="senha1" type="password" placeholder="SENHA"/> <br><br>
						<input id="senha2" name="senha2" type="password" placeholder="CONFIRMAR SENHA"/> <br><br>
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
	<div class="clear"> </div>
</div>
	<?php include 'menulateral.php'; ?>
	<div class="clear"> </div>
   </div>
</div>
<?php include 'footer.php'; ?>
<script>
			$('#slider').coinslider();
		</script>

</body>
</html>