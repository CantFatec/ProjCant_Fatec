<div class="nav">

        <ul>
<?php // COMENTÁRIO: Aqui ficam as páginas para TODOS os usuários ?>
            <li <?php if($_SERVER['PHP_SELF']=="/index.php"){echo "class='active'";}?> ><a href="index.php">Home</a></li>
<?php // FIM_paginaTodosUsuarios ?>           

            <?php if (isset($_SESSION['login_adm'])){ 
            	conectar();
				$sql = 'select * from usuario where cpf = "'.$login.'" and senha = "'.$senha.'"';
				$consulta = mysql_query($sql);
				if(count($consulta)>0){
					while($usuario = mysql_fetch_row($consulta)){			
						$_SESSION['is_administrador'] = $usuario[8];
						$_SESSION['is_cliente'] = $usuario[7];
						$_SESSION['is_funcionario'] = $usuario[6];
					}

					if ($_SESSION['is_administrador'] == 1){ ?>

<?php // COMENTÁRIO: Aqui ficam as páginas exibidas para os ADMINISTRADORES ?>
						<li <?php if($_SERVER['PHP_SELF']=="/cadastro.php"){echo "class='active'";}?> ><a href="cadastro.php">Cadastro de Usuários</a></li>
						<li <?php if($_SERVER['PHP_SELF']=="/cadastro_prod.php"){echo "class='active'";}?> ><a href="cadastro_prod.php">Cadastro de Produtos</a></li>
						<li <?php if($_SERVER['PHP_SELF']=="/adm.php"){echo "class='active'";}?> ><a href="adm.php">Administração</a></li>	
<?php // FIM_paginaAdministradores	?>	
            	
            <?php 	}

					else if ($_SESSION['is_cliente'] == 1){ ?>
<?php // COMENTÁRIO: Aqui ficam as páginas exibidas para os CLIENTES LOGADOS ?>
     	  				        <li <?php if($_SERVER['PHP_SELF']=="/contact.php"){echo "class='active'";}?> ><a href="contact.php">Fale Conosco</a></li>
						<li <?php if($_SERVER['PHP_SELF']=="/gallery.php"){echo "class='active'";}?> ><a href="gallery.php">Cardápio</a></li>
						<li <?php if($_SERVER['PHP_SELF']=="/contageral.php"){echo "class='active'";}?> ><a href="contageral.php">Meu Cadastro</a></li>
<?php // FIM_paginaClientesLogados ?>			
            	
            <?php 	}

					else if ($_SESSION['is_funcionario'] == 1){ ?>

<?php // COMENTÁRIO: Aqui ficam as páginas exibidas para os FUNCIONARIOS ?>
						<li <?php if($_SERVER['PHP_SELF']=="/admpedidos.php"){echo "class='active'";}?> ><a href="admpedidos.php">Administrar Pedidos</a></li>		
<?php // FIM_paginaFuncionarios	?>	
							
            	
            <?php 	}

					mysql_close();
				} 
}
else { ?>

<?php // COMENT�RIO: Aqui ficam as p�ginas exibidas SOMENTE para quem n�o estiver logado ?>
						<li <?php if($_SERVER['PHP_SELF']=="/cadastro.php"){echo "class='active'";}?> ><a href="cadastro.php">Cadastro</a></li>
       	  					<li <?php if($_SERVER['PHP_SELF']=="/contact.php"){echo "class='active'";}?> ><a href="contact.php">Contato</a></li>
						<li <?php if($_SERVER['PHP_SELF']=="/gallery.php"){echo "class='active'";}?> ><a href="gallery.php">Cardápio</a></li>
<?php // FIM_paginaSomenteNaoLogados ?>
<?php } ?>

            <div class="clear"> </div>
        </ul>
    </div>
	<?php
						if ($_SESSION['is_administrador'] != 1){
							if ($_SERVER ['REQUEST_URI'] == "/adm.php") header("Location: index.php");
							if ($_SERVER ['REQUEST_URI'] == "/cadastro_prod.php") header("Location: index.php");
						}
						if ($_SESSION['is_cliente'] != 1)
							if ($_SERVER ['REQUEST_URI'] == "/contageral.php") header("Location: index.php");
						if ($_SESSION['is_funcionario'] != 1)
							if ($_SERVER ['REQUEST_URI'] == "/admpedidos.php") header("Location: index.php");
						
?>