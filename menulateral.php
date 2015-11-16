<?php
session_start(); ?>
<div class="boxes">
		<div class="order">
		<ul>
			<li>
			<h3>PEDIDO</h3>
			<h4><?php if(!empty($_SESSION["nomeProduto"])){echo $_SESSION['nomeProduto'];} else{echo "Sem Produtos";} ?></h4>
			<p>Compras&nbsp;&nbsp;<span><?php if(!empty($_SESSION["precoProduto"])){echo "R$ ".$_SESSION['precoProduto'];} else{echo "$0:00";} ?></span></p>
			<p>Total &nbsp;&nbsp;<span><?php if(!empty($_SESSION["precoProduto"])){
				$total = 0;
				if($total == 0) $total = $_SESSION['precoProduto'];
				else $total += $_SESSION['precoProduto'];

				echo "R$ ".$_SESSION['precoProduto'];
				}else echo "$0:00"; ?></span></p>
			<h6><a href="fincompra.php">Finalizar Pedido</a></h6>
			<h6><a href="carrinho.php">Carrinho</a></h6>
		</li>
		</ul>
		</div>
		<div class="clear"> </div>
	</div>