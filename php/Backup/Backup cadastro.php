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
if(isset($_POST['cad_user'])){
	if($_POST['senha1'] === $_POST['senha2']){
		cadastrarUsuario();
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cantina Fatec Praia Grande | Cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/slider-styles.css" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function cpf1(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d{2})$/,"$1-$2")
    return v
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
		document.getElementById("erros3").innerHTML = "Corrija seu telefone!"
else
		document.getElementById("erros3").innerHTML = "";
}

function ValidaSenha(senha2){
        senha1= document.getElementById('senha1').value;
	senha2= document.getElementById('senha2').value;
	if (senha2 != senha1)
                document.getElementById("erros4").innerHTML = "Suas senhas não são iguais!"
else
		document.getElementById("erros4").innerHTML = "";
}


function ValidaNome(nome){
	exp = /([A-Z]{1}[a-z]+){1}([ ]{1}[A-Z]{1}[a-z]+)+/
	 if(!exp.test(nome.value))
         	document.getElementById("erros1").innerHTML = "Seu nome parece inválido, tente novamente!"
else
		document.getElementById("erros1").innerHTML = "";
}

function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)        
        	document.getElementById("erros2").innerHTML = "C.P.F. Inválido";
	else
		document.getElementById("erros2").innerHTML = "";
	
}

function telefone(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2")
	v=v.replace(/(\d{4})(\d)/,"$1-$2")
    return v
}

function letras1(v){
     return v.replace(/\d/g,"")
}
</script>
<script type="text/javascript" src="js/slider.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">
	<div class="top-head">
		<div class="welcome">Welcome To <span>Food Point</span></div>
		<div class="top-nav">
	        <ul>
	            <li><a href="index.php">Home</a></li>	            
	            <li><a href="cadastro.php">Cadastro</a></li>
		    <li><a href="gallery.php">Galeria</a></li>
	            <li><a href="contact.php">Contato</a></li>
	        </ul>
	    </div>
	    <div class="clear"> </div>
    </div>
	<div class="header">
	<div class="logo"><a href="index.php"><img src="images/logo.png"  alt="Flowerilla"/></a></div>
    <div class="search">
     <?php if(empty($_SESSION['login_adm'])){ ?>
			    <form method="POST">
			    	<input type="text" name="login_adm" placeholder="LOGIN"/>
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
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
	    <li><a href="#">Menu</a></li>	
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="gallery.php">Galeria</a></li>            
            <li><a href="contact.php">Contato</a></li>
            <?php if (isset($_SESSION['login_adm'])){ ?>
            	<li><a href="adm.php">Administração</a></li>
            <?php } ?>
            <div class="clear"> </div>
        </ul>
	</div>
	<div class="main-body">
	<div id="slider">
			<a href="#" target="_blank">
				<img src="images/slider-1.jpg" alt="Mini Ninjas" />
			</a>
			<a href="#" target="_blank">
				<img src="images/slider-2.jpg" alt="Price of Persia" />
			</a>
			<a href="#" target="_blank">
				<img src="images/slider-3.jpg" alt="Price of Persia" />
			</a>
	</div>
	<div clas="clear"> </div>
	<div class="grids">
		<ul>
			<h4>CADASTRO CLIENTES</h4>
			<p><div id="erros1" style="color:red"></div>
				<div id="erros2" style="color:red"></div>
				<div id="erros3" style="color:red"></div>
				<div id="erros4" style="color:red"></div>
				<form name="form1" method="POST">
					<input id="nome" onkeypress="mascara(this, letras1)" onBlur="ValidaNome(form1.nome);" maxlength="50" name="nome" type="text" name="nome" required placeholder="NOME COMPLETO"/> <br><br>
					<input id="cpf" onkeypress="mascara(this, cpf1)" maxlength="14" name="cpf" type="text" onBlur="ValidarCPF(form1.cpf);" placeholder="CPF: XXX.XXX.XXX-XX" required /> <br><br>
					<input id="tel" onkeypress="mascara(this, telefone)" maxlength="15" name="tel" type="text" onBlur="ValidaTelefone(form1.tel);" placeholder="Telefone: (DDD) XXXX-XXXXX" required /> <br><br>
					<input name="email"type="email" placeholder="E-Mail: EMAIL@DOMINIO.COM.BR" required /> <br><br>
					<input name="senha1" id="senha1" type="password" placeholder="SENHA" required/> <br><br>
					<input id="senha2" name="senha2" type="password" onBlur="ValidaSenha(form1.senha2);" placeholder="CONFIRMAR SENHA" required/> <br><br>
					<?php if(!empty($_SESSION['logado']) && ($_SESSION['is_administrador'] == 1)){ ?>
						<select name="tipo_usuario">
							<option value="cliente">Cliente</option>
							<option value="funcionario">Funcionário</option>
							<option value="administrador">Administrador</option>
						</select><br><br>
						<?php }else{?>
							<input type="hidden" name="tipo_usuario" value="cliente" />
						<?php } ?>
					<input type="hidden" name="cad_user" />
					<input type="submit" value="CONFIRMAR" />
					<input type="reset" value="LIMPAR" /><br><br>
				</form>
			</p>
		<div class="clear"> </div>
		<br>
		<h4>Latest-Items</h4>
		<li>
			<h3>Ipsum simply</h3>
			<img src="images/thumb-3.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
		<li>
			<h3> Lorem Ipsum</h3>
			<img src="images/thumb-1.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
		<li class="last">
			<h3>Lorem simply</h3>
			<img src="images/thumb-7.jpg">
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>$12.58</button>
		</li>
			<a href="#">View all</a>
		</ul>
	<div class="clear"> </div>
</div>
	<div class="boxes">
		<div class="order">
		<ul>
			<li>
			<h3>PEDIDO</h3>
			<h4>No Products</h4>
			<p>shoping &nbsp;&nbsp;<span>$0:00</span></p>
			<p>Total &nbsp;&nbsp;<span>$0:00</span></p>
			<h5>Pricee and tax-include</h5>
			<h6><a href="#">Check-out</a></h6>
			<h6><a href="#">cart</a></h6>
		</li>
		</ul>
		</div>
		<div class="clear"> </div>
		<ul>
			<li>
			<h3>Horário de Funcionamento</h3>
			<h4>Breakfast </h4>
			<p>Monday - Friday &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Saturaday - Sunday &nbsp;&nbsp; 11 am - 04 pm</p>
			<h4>Lunch </h4>
			<p>Monday - Friday &nbsp;&nbsp; 11 am - 03 pm</p>
			<p>Saturaday - Sunday &nbsp;&nbsp; 11 am - 04 pm</p>
		</li>
		<li>
			<h3>Notícias e Eventos</h3>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>Read more</button>
			<h3>Lorem Ipsum is simply</h3>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
			<button>Read more</button>
		</li>
			<div class="clear"> </div>
		</ul>
	</div>
	<div class="clear"> </div>
   </div>
</div>
<div class="footer1">
	<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid1">
					<h3>INFORMAÇÕES</h3>
					<ul>
						<li><a href="">Nossa Loja</a></li>
						<li><a href="">Contate-nos</a></li>
						<li><a href="">Legal Notice</a></li>
						<li><a href="">Sobre</a></li>
					</ul>
				</div>
				<div class="footer-grid1">
					<h3>NOSSAS OFERTAS</h3>
					<ul>
						<li><a href="">Especiais</a></li>
						<li><a href="">Novos Produtos</a></li>
						<li><a href="">Mais vendidos</a></li>
						<li><a href="">Fábricas</a></li>
						<li><a href="">Fornecedores</a></li>
					</ul>
				</div>
				<div class="footer-grid1">
					<h3>SUA CONTA</h3>
					<ul>
						<li><a href="">Seus Pedidos</a></li>
						<li><a href="">Seus Créditos</a></li>
						<li><a href="">Seu Endereço</a></li>
						<li><a href="">Your personalinfo</a></li>
						<li><a href="">Seus vochers</a></li>
					</ul>
				</div>
				<div class="footer-grid2">
					<h3>SIGA-NOS</h3>
						<ul>
							<li><a href=""><img src="images/facebook.png" title="facebook"/></a></li>
							<li><a href=""><img src="images/twitter.png" title="twitter"></a></li>
							<li><a href=""><img src="images/rss.png" title="rss"></a></li>
						</ul>
				</div>
			</div>
			<div class="clear"> </div>
			<div class="copy">
    	<p>&copy; 2013 rights Reseverd | Design by <a href="http://w3layouts.com">W3Layouts.com</a></p>
    </div>
    </div>
			<div class="clear">
			</div>
		</div>
<script>
			$('#slider').coinslider();
		</script>

</body>
</html>