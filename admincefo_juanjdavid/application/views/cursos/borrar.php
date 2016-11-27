<section class="content">
			<div>
			<h2>Eliminar curs</h2>
			<p>Estas segur que vols eliminar el curs?</p><br/><br/>
		
			<form method="post" autocomplete="off">
				<label>Curs a eliminar:</label>
				<span><?php echo $curso->nom;?></span><br/><br/><br/>
			
				<label> Al eliminar el curs s'eliminaran totes les subscripcions d'aquest curs</label><br/><br/>
				<a class="botoncin bo1" href="<?php echo base_url()?>/index.php/cursos/llistar">Enrere</a>
				<input class="botoncin bo3" type="submit" name="delete" value="Confirmar"/><br/>
			</form>
			</div>
		</section>