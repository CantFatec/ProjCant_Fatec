<?php
function conectar(){
	$server = "localhost";
	$username = "u168415392_root";
	$password = "cantfatec2015";

	$con = @mysql_connect($server,$username,$password);
	if($con){
		$banco = "u168415392_cant";
		mysql_select_db($banco);
		    }
	else{
		print "Erro ao conectar: ".mysql_error();
				 }
}

function logar($login,$senha_hash){
	conectar();
	$sql = 'select * from usuario where cpf = "'.$login.'" and senha = "'.$senha_hash.'"';
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($usuario = mysql_fetch_row($consulta)){			
			$_SESSION['login'] = $usuario[0];
			$_SESSION['login_adm'] = $usuario[1];
			$_SESSION['cpf'] = $login;
			$_SESSION['senha'] = $senha_hash;
			$_SESSION['is_funcionario'] = $usuario[6];
			$_SESSION['is_cliente'] = $usuario[7];
			$_SESSION['is_administrador'] = $usuario[8];			
			$_SESSION['logado']=1;
		}
	}
	if(!isset($_SESSION['logado'])){
		echo "<script>alert('Cadastro não Encontrado!');</script>";
	}
	mysql_close();
}

function logout(){
	include('sair.php');
}

function cadastrarUsuario(){
	conectar();
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
	$email = $_POST['email'];
	$tel = $_POST['tel'];
		$tel = str_replace("-", "", $tel);
		$tel = str_replace(" ", "", $tel);
		$tel = str_replace("(", "", $tel);
		$tel = str_replace(")", "", $tel);
	$senha1 = $_POST['senha1'];
		$senha1 = md5($senha1);
	$tipo_usuario = $_POST['tipo_usuario'];
	$is_funcionario = 0;
	$is_cliente = 0;
	$is_administrador = 0;

	if($tipo_usuario == "cliente") $is_cliente = 1;
	else if($tipo_usuario == "funcionario") $is_funcionario = 1;
	else if($tipo_usuario == "administrador") $is_administrador = 1;

	$sql = "INSERT INTO usuario VALUES (null,'".$nome."','".$cpf."','".$tel."','".$email."','".$senha1."','".$is_funcionario."','".$is_cliente."','".$is_administrador."')";
	$insert = mysql_query($sql);
	if($insert)	echo ('<script> alert("Cadastro Realizado com Sucesso!"); location.href="index.php";</script>');
	

	mysql_close();
}

function alterarUsuario(){
	$id_user = $_POST['id_user'];
	$tb = $_POST['tb'];
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$senha1 = $_POST['senha1'];
		$senha1 = md5($senha1);
	$senha2 = $_POST['senha2'];
		$senha2 = md5($senha2);
	$tipo_usuario = $_POST['tipo_usuario'];

	if($senha1 === $senha2){

	}else{
		echo "<script>alert('Senhas Divergentes!'); window.history.go(-1);</script>";
	}
	
	if($tipo_usuario == "cliente") $is_cliente = 1;
	else if($tipo_usuario == "funcionario") $is_funcionario = 1;
	else if($tipo_usuario == "administrador") $is_administrador = 1;

	conectar();
	
	$sql = "UPDATE $tb SET nome='$nome',telefone='$tel',email='$email',senha='$senha1' WHERE id_usuario=$id_user";
	$consulta = mysql_query($sql);
	if($consulta){
		echo ('<script> alert("Dados alterado com sucesso!"); location.href="index.php";</script>');
			 }
	else{
		print mysql_error();
			 }
	mysql_close();

}


function alterarProduto($id){
	$nome = $_POST['nm_produto'];
	$valor = $_POST['vl_produto'];
	$qtde = $_POST['qt_produto'];
	$desc = $_POST['ds_produto'];
	$img = $_FILES['nm_foto_produto']['name'];
	conectar();
	$seleciona_img = mysql_query("SELECT nm_foto_produto FROM produtos");
	$arr_img = mysql_fetch_array($seleciona_img);
	$last_img = $arr_img[0];
	if($img == ""){
		$destino = $last_img;
		}else{
			$destino = "../produtos/$id/".$img;
		}
	if(move_uploaded_file($_FILES['nm_foto_produto']['tmp_name'],$destino)){}	
	$sql = "UPDATE produtos SET nm_produto='$nome',ds_produto='$desc',vl_produto='$valor',qt_produto='$qtde',nm_foto_produto='$destino' WHERE id_produto=$id";
	$consulta = mysql_query($sql);
	if($consulta){
		echo ('<script> alert("Produto alterado com sucesso!"); location.href="produtos.php";</script>');
			 }
	else{
		print mysql_error();
			 }
	mysql_close();

}
/*
function alterarCliente($id){
	$nome = $_POST['nm_cliente'];
	$email = $_POST['nm_email'];
	$tel = $_POST['cd_telefone'];
	$cpf = $_POST['cd_cpf'];
	$dtnasc = $_POST['dt_nascimento'];
	conectar();
	
	$sql = "UPDATE clientes SET nm_cliente='$nome',nm_email='$email',cd_telefone='$tel',cd_cpf='$cpf',dt_nascimento='$dtnasc' WHERE id_cliente=$id";
	$consulta = mysql_query($sql);
	if($consulta){
		echo ('<script> alert("Cliente alterado com sucesso!"); location.href="clientes.php";</script>');
			 }
	else{
		print mysql_error();
			 }
	mysql_close();

}

function consultaProdutos(){
	conectar();
	$sql = "select * from produtos";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		echo "<table style='width:100%;text-align:center;'>
				<tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Valor</th><th>Quantidade</th><th>Imagem</th><th>Alterar</th><th>Excluir</th></tr>";
		while($resultado = mysql_fetch_row($consulta)){
			echo "<tr><td>".$id = $resultado[0]."</td>";
			echo "<td>".$nome = $resultado[1]."</td>";
			echo "<td>".$desc = $resultado[2]."</td>";
			echo "<td>".$valor = $resultado[3]."</td>";
			echo "<td>".$quant = $resultado[4]."</td>";
			$foto = $resultado[5];
			echo "<td><img src='$foto' width='100px' height='100px' /></td>";
			echo "<td><form><input name='produto' type='hidden' value=".$resultado[0]." />
			<input name='nome' type='hidden' value=".$resultado[1]." />
			<input name='alterarProduto' type='submit' value='Alterar' /></form></td>";
			echo "<td><form><input name='produto' type='hidden' value=".$resultado[0]." />
			<input name='nome' type='hidden' value=".$resultado[1]." />
			<input name='excluiProduto' type='submit' value='Excluir' /></td></tr></form>";
		}
		echo "</table>";
	}
	else{
		print "Erro: ".mysql_error();
	}
	mysql_close();
}

function consultaClientes(){
	conectar();
	$sql = "select * from clientes";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		echo "<table style='width:100%;text-align:center;'>
				<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>CPF</th><th>Data de Nascimento</th><th>Alterar</th><th>Excluir</th></tr>";
		while($resultado = mysql_fetch_row($consulta)){
			echo "<tr><td>".$id = $resultado[0]."</td>";
			echo "<td>".$nome = $resultado[1]."</td>";
			echo "<td>".$email = $resultado[2]."</td>";
			echo "<td>".$tel = $resultado[3]."</td>";
			echo "<td>".$cpf = $resultado[4]."</td>";
			echo "<td>".$dtnasc = $resultado[5]."</td>";
			echo "<td><form><input name='cliente' type='hidden' value=".$resultado[0]." />
			<input name='nomeCli' type='hidden' value=".$resultado[1]." />
			<input name='alterarCliente' type='submit' value='Alterar' /></form></td>";
			echo "<td><form><input name='cliente' type='hidden' value=".$resultado[0]." />
			<input name='nomeCli' type='hidden' value=".$resultado[1]." />
			<input name='excluiCliente' type='submit' value='Excluir' /></td></tr></form>";
		}
		echo "</table>";
	}
	else{
		print "Erro: ".mysql_error();
	}
	mysql_close();
}

*/
?>