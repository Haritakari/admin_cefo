<section class="content">
			<div>
			<h2>Eliminar Area formativa</h2>
			<p>Estas segur que vols eliminar el area formativa?</p><br/><br/>
		
			<form method="post" autocomplete="off">
				<label>Area formativa a eliminar:</label>
				<span><?php echo $area->nom;?></span><br/><br/><br/>
			
				<label> Asegurat que ningun curs tingui aquesta area formativa 
				avanç de eliminarla</label><br/><br/>
				<a class="botoncin" href="<?php echo base_url()?>/index.php/arees/llistar">Enrere</a>
				<input type="submit" name="delete" value="Confirmar"/><br/>
			</form>
			</div>
		</section>