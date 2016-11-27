<section class="content">
			<div>
			<h2>Formulari per donar de baixa</h2>
			<p>Per favor, confirma la teva solicitud de baixa</p><br/><br/>
		
			<form method="post" autocomplete="off">
				<label>Nom:</label>
				<span><?php echo $usuari->nom;?></span><br/><br/><br/>
			
				<label> Estas segur que vols donar de baixa?</label><br/><br/>
					<a class="botoncin bo3" href="<?php echo base_url()?>/index.php/usuario/llistar">Enrere</a>
				<input type="submit" class="botoncin bo1" name="confirmar" value="Confirmar"/><br/>
			</form>
			</div>
		</section>