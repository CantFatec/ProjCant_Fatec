<div class="footer1">
	<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid1">
					<h3>INFORMACÕES</h3>
					<ul>
						<li><a href="loja.php">Nossa Loja</a></li>
					</ul>
				</div>
				<div class="footer-grid1">
					<h3>NOSSAS OFERTAS</h3>
					<ul>

						<li><a href="novosprodutos.php">Novos Pratos</a></li>
						<li><a href="maisvendidos.php">Mais vendidos</a></li>

					</ul>
				</div>
				<?php
					if($_SESSION['logado']==1){
				?>
					<div class="footer-grid1">
						<h3>SUA CONTA</h3>
						<ul>
							
							<li><a href="contageral.php">Geral</a></li>

						</ul>
					</div>
				<?php } ?>
				<div class="footer-grid2">
					<h3>SIGA-NOS</h3>
					<ul>
						<li><a href="https://www.facebook.com/CantinaFatecPG/"><img src="images/facebook.png" title="facebook"/></a></li>
						

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