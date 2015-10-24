<?php
function conectar(){
	$server = "mysql.hostinger.com.br";
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

function logar($login,$senha){
	conectar();
	$sql = 'select * from login_site where login = "'.$login.'" and senha = "'.$senha.'"';
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($usuario = mysql_fetch_row($consulta)){			
			$_SESSION['id'] = $usuario[0];
			$_SESSION['login_adm'] = $usuario[1];
			$_SESSION['senha'] = $usuario[2];
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
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$senha1 = $_POST['senha1'];
	$tipo_usuario = $_POST['tipo_usuario'];
	$is_funcionario = 0;
	$is_cliente = 0;
	$is_administrador = 0;
	
	if($tipo_usuario == "cliente") $is_cliente = 1;
	else if($tipo_usuario == "funcionario") $is_funcionario = 1;
	else if($tipo_usuario == "administrador") $is_administrador = 1;

	$sql = "INSERT INTO usuario VALUES (null,'".$nome."',$cpf,$tel,'".$email."','".$senha1."',$is_funcionario,$is_cliente,$is_administrador)";
	$insert = mysql_query($sql);
	if($insert)	echo ('<script> alert("Cadastro Realizado com Sucesso!"); location.href="index.php";</script>');
	

	mysql_close();
}

/*

function cadastrarProduto($nome,$img,$desc,$qtde,$valor){
	conectar();
	$sql = "INSERT INTO produtos(nm_produto,ds_produto,vl_produto,qt_produto)
		VALUES ('".$nome."','".$desc."','".$valor."','".$qtde."')";
		$insert = mysql_query($sql);
		if($insert){
			$sql = "SELECT MAX(id_produto) FROM produtos";
			
			$return = mysql_query($sql);
			$row = mysql_fetch_array($return);
			var_dump($row);
		
			mkdir("../produtos/$row[0]",0777) or die("erro ao criar diretorio");
			$destino = "../produtos/$row[0]/".$img;
			
			if(move_uploaded_file($_FILES['nm_foto_produto']['tmp_name'],$destino)){	
				}
			$sql_update = "UPDATE produtos SET nm_foto_produto='$destino' WHERE id_produto=$row[0]";
			$consulta = mysql_query($sql_update);
			if($consulta){
				echo ('<script> alert("Produto cadastrado com sucesso!"); location.href="produtos.php";</script>');
					 }
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