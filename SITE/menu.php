<div class="nav">
        <ul>
<?php // COMENTÁRIO: Aqui ficam as páginas para TODOS os usuários ?>
            <li class="active"><a href="index.php">Home</a></li>
	    <li><a href="#">Menu</a></li>
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
						<li><a href="cadastro.php">Cadastro de Usuários</a></li>
						<li><a href="adm.php">Administração</a></li>	
<?php // FIM_paginaAdministradores	?>	
            	
            <?php 	}

					else if ($_SESSION['is_cliente'] == 1){ ?>
<?php // COMENTÁRIO: Aqui ficam as páginas exibidas para os CLIENTES LOGADOS ?>
     	  					<li><a href="contact.php">Contato</a></li>
						<li><a href="gallery.php">Galeria</a></li>
						<li><a href="cliente.php">Meu Cadastro</a></li>
<?php // FIM_paginaClientesLogados ?>			
            	
            <?php 	}

					else if ($_SESSION['is_funcionario'] == 1){ ?>

<?php // COMENTÁRIO: Aqui ficam as páginas exibidas para os FUNCIONARIOS ?>
						<li><a href="pedidos.php">Administrar Pedidos</a></li>		
<?php // FIM_paginaFuncionarios	?>	
							
            	
            <?php 	}

					mysql_close();
				} 
}
else { ?>

<?php // COMENTÁRIO: Aqui ficam as páginas exibidas SOMENTE para quem não estiver logado ?>
						<li><a href="cadastro.php">Cadastro</a></li>
       	  					<li><a href="contact.php">Contato</a></li>
						<li><a href="gallery.php">Galeria</a></li>
<?php // FIM_paginaSomenteNaoLogados ?>
<?php } ?>

            <div class="clear"> </div>
        </ul>
    </div>