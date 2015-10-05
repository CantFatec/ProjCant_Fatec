<?php
if($_POST){
	require_once('funcoes.php');
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	logar($login,$senha);
	}
?>