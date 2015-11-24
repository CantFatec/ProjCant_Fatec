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
	$identifica = $_GET['id_produto'];
	conectar();

	$deleta = mysql_query("DELETE FROM produto WHERE id_produto = '$identifica'");

	if($deleta)	echo "<script>alert('Produto: $identifica, Excluído com Sucesso!');</script>";
	else echo "<script>alert('Falha ao Excluir Produto: $identifica');</script>";

	mysql_close();
	
}
if(isset($_POST['alt_prod'])){
	$acao = 1;
	cadastrarEAlterarProduto($acao);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Food-Point for Website Template | About :: w3layouts</title>
<?php include 'head.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/script.js"></script>
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
			<h4>Cadastros de Produtos</h4><br>
				<p>
				<form method="GET">	
					<select name="tipo_busca" onChange = "location=this.value">					
						<option selected disabled hidden>Escolha uma Opção:</option>
						<option value="?tipo_busca=Prato">Pratos</option>
						<option value="?tipo_busca=Bebida">Bebidas</option>
						<option value="?tipo_busca=Lanche">Lanches</option>
					</select><br><br>
				</form>
				<?php 
					if (isset($_GET['tipo_busca'])){?>
						<table id="tabela">
							<thead>
								<tr style="text-align:center">
									<th>ID</th>
									<th>Nome</th>
									<th>Valor</th>
									<th>Tipo</th>
									<th>Descrição</th>
									<th></th>
									<th></th>									
								</tr>
								<tr>
									<th><input type="text" id="ID"/></th>
									<th><input type="text" id="Nome"/></th>
									<th><input type="text" id="Valor"/></th>
									<th><input type="text" id="Tipo" /></th>
									<th><input type="text" id="Descricao"/></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
						<?php
							$filtro = $_GET['tipo_busca'];
							conectar();
							$sql = "select * from produto where tipo='$filtro'";
							$mysql_query = mysql_query($sql);
							if(count($mysql_query)>0){
								while($resultado = mysql_fetch_row($mysql_query)){			
									$id_produto = $resultado[0];
									$nome_produto = $resultado[1];
									$valor = $resultado[2];
									$tipo = $resultado[3];
									$desc = $resultado[4];
						?>
							<tbody>
							<tr>
								<td><?php echo $id_produto; ?></td>
								<td><?php echo $nome_produto; ?></td>
								<td><?php echo $valor; ?></td>
								<td><?php echo $tipo; ?></td>
								<td><?php echo $desc; ?></td>
								<form name="<?php echo $id_produto; ?>" method="GET">
									<div class="acoes">
										<?php $href_excluir="?acao=excluir&id_produto=$id_produto&reg=$filtro"; ?>
										<?php $href_alterar="?acao=editar&id_produto=$id_produto&reg=$filtro"; ?>
										<td><a href="<?php echo $href_alterar ?>">Alterar</a></td>
										<td><a href="<?php echo $href_excluir ?>">Excluir</a></td>
									</div>
								</form>
							</tbody>
							</tr>
						<?php
							}
						}
						?>
						</table>
						
						
								
				<?php mysql_close();
					}else if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){ 

					$filtro = $_GET['reg'];
					$id_produto = $_GET['id_produto'];

					if(($filtro == "Bebida") || ($filtro == "Lanche") || ($filtro == "Prato")) $tb = "produto";

					conectar();

					$qr = "SELECT * FROM $tb WHERE id_produto = '$id_produto'";
					$mysql_query = mysql_query($qr);

					if(count($mysql_query)>0){
						while($resultado = mysql_fetch_row($mysql_query)){			
							$id_produto = $resultado[0];
							$nome_produto = $resultado[1];
							$valor_produto = $resultado[2];
							$tipo_produto = $resultado[3];
							$descricao = $resultado[4];
							$imagem_prod = $resultado[5];
						}
					}

					?>
					<form name="form1" method="POST" enctype="multipart/form-data">
						<input id="nome" maxlength="50" name="nome" type="text" name="nome" value="<?php echo $nome_produto ?>" placeholder="NOME DO PRODUTO" required/>
					<br><br>
						<input id="valor" maxlength="14" name="valor" type="number" min="0.00" step="0.01" placeholder="VALOR"  value="<?php echo $valor_produto ?>"  required />
					<br><br>				
						<select name="tipo_produto">
							<option value="Prato" <?php if($tipo_produto == "Prato") echo "selected" ?> >Pratos</option>
							<option value="Bebida" <?php if($tipo_produto == "Bebida") echo "selected" ?> >Bebidas</option>
							<option value="Lanche" <?php if($tipo_produto == "Lanche") echo "selected" ?> >Lanches</option>
						</select><br><br>
						<textarea name="desc" rows="4" cols="50" placeholder="DESCRIÇÃO" style="width:450px;padding:8px;font-size:16px;color:#333;background:#eee;box-shadow: 0 0 6px #aaa;border:none;outline: none;resize:none;font-family: 'Istok Web', sans-serif;"><?php echo $descricao ?></textarea>
						<br><br>
						<input type="file" name="imagem" /><br><br>
						<?php echo '<img height="100px" width="100px" src="data:image;base64,'.$imagem_prod.'">' ?>
						<br><br>
						<input type="hidden" name="alt_prod" />
						<input type="hidden" name="id_prod" value="<?php echo $id_produto; ?>" />
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