<?php
function conectar(){
	$server = "localhost";
	$username = "root";
	$password = "usbw";
	$banco = "";
	$mysqli = new mysqli($server,$username,$password;$banco);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
}
?>