<?php
session_start();
function conectar(){
	$server = "mysql.hostinger.com.br";
	$username = "u168415392_root";
	$password = "cantfatec2015";
	$con = @mysql_connect($server,$username,$password);
	if($con){
		$db = "u168415392_cant";
		mysql_select_db($db);
		    }
	else{
		print "Erro ao conectar: ".mysql_error();
				 }
}

function logar($login,$senha){
	conectar();
	$sql = "select * from login_site";
	$consulta = mysql_query($sql);
	if(count($consulta)>0){
		while($resultado = mysql_fetch_row($consulta)){
			$_SESSION['login'] = $resultado[1];
			$_SESSION['senha'] = $resultado[2];
			
			if(($login===$_SESSION['login'])&&($senha===$_SESSION['senha'])){
				echo "OLA";
				break;
			}
			echo "<script>
					alert('Erro ao Logar!');
					location.href='index.html';
				 </script>";
			
		}
	}
	else{
		print "Erro: ".mysql_error();
	}
	
	mysql_close();
}



function logout(){
	if(!empty($_POST['LogOut'])){
		session_destroy();
		echo "<script>
				location.href='../index.html';
			</script>";
	}
}
?>