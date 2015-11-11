<?php
session_start();
include('php/funcoes.php');
if(!empty($_POST["login"]) && !empty($_POST["senha"])){
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$senha = md5($senha);
	logar($login,$senha);
}
if(isset($_GET['logout'])) {
	logout();
}
?>