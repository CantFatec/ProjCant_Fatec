<?php

error_reporting(0);

function conectar(){
	$server = "mysql.hostinger.com.br";
	$username = "u168415392_root";
	$password = "cantfatec2015";
	$banco = "u168415392_cant";
	
	$con = mysql_connect($server,$username,$password);
	if($con){
		mysql_select_db($banco);
	}else{
		die('Não foi possível conectar: ' . mysql_error());
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
	}else{
		if($_SESSION['is_administrador' == 1]) echo "<script>location.href='adm.php';</script>";
		else if($_SESSION['is_funcionario' == 1]) echo "<script>location.href='statuspedido.php';</script>";
		else echo "<script>location.href='index.php';</script>";
	}
	mysqli_close();
}

function logout(){
	include('sair.php');
}

function cadastrarUsuario(){
	$verifica = 0;
	conectar();
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
		if(strlen($cpf)==11) $verifica += 1;

	$email = $_POST['email'];
	$tel = $_POST['tel'];
		$tel = str_replace("-", "", $tel);
		$tel = str_replace(" ", "", $tel);
		$tel = str_replace("(", "", $tel);
		$tel = str_replace(")", "", $tel);
		if((strlen($tel)==10) || (strlen($tel)==11)) $verifica += 1;
		
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];
	if($senha1==$senha2){
		$verifica += 1;
		$senha1 = md5($senha1);
	}

	$tipo_usuario = $_POST['tipo_usuario'];
	$is_funcionario = 0;
	$is_cliente = 0;
	$is_administrador = 0;

	if($tipo_usuario == "cliente") $is_cliente = 1;
	else if($tipo_usuario == "funcionario") $is_funcionario = 1;
	else if($tipo_usuario == "administrador") $is_administrador = 1;
	if($verifica == 3){
		$sql = "INSERT INTO usuario VALUES (null,'".$nome."','".$cpf."','".$tel."','".$email."','".$senha1."','".$is_funcionario."','".$is_cliente."','".$is_administrador."')";
		$insert = mysql_query($sql);
	}
	else{
		session_destroy();
		echo "<script>alert('Cadastro não Realizado!');location.href='cadastro.php';</script>";
		break;
	}
	
	if($insert)	echo ('<script> alert("Cadastro Realizado com Sucesso!");</script>');
	
	mysql_close();

	if($_SESSION['logado']!=1){
		logar($cpf,$senha1);
		echo "<script>
			  location.href='index.php';
			  </script>";
	}
	
}

function alterarUsuario(){
	$id_user = $_POST['id_user'];
	$tb = $_POST['tb'];
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	if(($_POST['senha1']!="") && ($_POST['senha2']!="")){
		$senha1 = $_POST['senha1'];
			$senha1 = md5($senha1);
		$senha2 = $_POST['senha2'];
			$senha2 = md5($senha2);
			
		if($senha1 == $senha2){
			$update = 1;
		}else{
			echo "<script>alert('Senhas Divergentes!'); window.history.go(-1);</script>";
		}
	
	}
	
	$tipo_usuario = $_POST['tipo_usuario'];

	if($tipo_usuario == "cliente") $is_cliente = 1;
	else if($tipo_usuario == "funcionario") $is_funcionario = 1;
	else if($tipo_usuario == "administrador") $is_administrador = 1;

	conectar();
	
	if($update==1){
		$sql = "UPDATE $tb SET nome='$nome',telefone='$tel',email='$email',senha='$senha1' WHERE id_usuario=$id_user";
		$consulta = mysql_query($sql);
		if($consulta){
			echo ('<script> alert("Dados alterado com sucesso!"); location.href="index.php";</script>');
				 }
		else{
			print mysql_error();
				 }
	}else{
		$sql = "UPDATE $tb SET nome='$nome',telefone='$tel',email='$email' WHERE id_usuario=$id_user";
		$consulta = $mysqli->query($sql);
		if($consulta){
			echo ('<script> alert("Dados alterado com sucesso!"); location.href="adm.php";</script>');
				 }
		else{
			print mysql_error();
				 }
	}
	mysql_close();

}

function contato($remetente,$email,$assunto,$mensagem){

	$destinatario = "gabrielarolis@gmail.com";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: $remetente <$email>';

	$enviou = mail($destinatario,$assunto,$mensagem,$headers);
	if($enviou){
		echo "<script>alert('Obrigado Pelo Contato :)');location.href='index.php';</script>";
	}else{
		echo "<script> alert('Falha ao enviar!');</script>";
	}
}

function alterarProduto(){
	$id = $_POST['id'];
	$dest_atual = $_POST['img_prod'];
	$nome_atual = $_POST['nome_atual'];

	$nome = $_POST['nome'];
		$nome_img = str_replace(" ", "_", $nome);
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo_produto'];
	$desc = $_POST['desc'];
	$arquivo = $_FILES['imagem']['name'];
		$arquivo = str_replace(" ", "_", $arquivo);
		$destino = "images/$nome_img/$arquivo";
		if($destino)	if(move_uploaded_file($_FILES['imagem']['tmp_name'],$destino)){}
			if($destino == "images/$nome_img/"){
				$destino = $dest_atual;		
				if(move_uploaded_file($_FILES['imagem']['tmp_name'],$destino)){}
			}
	if(($nome_img == $nome_atual)&&($destino != $dest_atual)){
		$unlink = unlink($dest_atual);
		if(!$unlink)	echo "<script>alert('Erro ao excluir a imagem: $dest_atual');</script>";
		else{ if(move_uploaded_file($_FILES['imagem']['tmp_name'],$destino)){} }
	}else if(($nome_img != $nome_atual)&&($destino == $dest_atual)){
		$o_name = "images/$nome_atual/";
		$n_name = "images/$nome_img/";
		$rename = rename($o_name,$n_name);
		if(!$rename)	echo "<script>alert('Erro ao renomear a pasta: $o_name para $n_name');</script>";
	}else if(($nome_img != $nome_atual)&&($destino != $dest_atual)){
		$unlink = unlink($dest_atual);
		if(!$unlink)	echo "<script>alert('Erro ao excluir a imagem: $dest_atual');</script>";
		else if(move_uploaded_file($_FILES['imagem']['tmp_name'],$destino)){}
		$o_name = "images/".$nome_atual."/";
		$n_name = "images/".$nome_img."/";
		$rename = rename($o_name,$n_name);
		if(!$rename)	echo "<script>alert('Erro ao renomear a pasta: $o_name para $n_name');</script>";
	}

	conectar();

	$sql = "UPDATE produto SET nome='".$nome_img."',valor='".$valor."',tipo='".$tipo."',descricao='".$desc."',destino_img='".$destino."' WHERE id_produto='".$id."'";
	$update = mysql_query($sql);
	

	if($update){
		if($update){
			echo ('<script> alert("Produto Atualizado com Sucesso!"); location.href="adm_produtos.php?botaoadm=Produtos";</script>');
		}else{
			echo "Impossível atualizar a imagem do produto! Erro:".mysql_error();
		}
		
	}else{
		echo "erro ao fazer insert: ".mysql_error();
	}
	mysql_close();
}