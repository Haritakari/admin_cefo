	<div class="cont2">
		<h2>Modificar Area formativa</h2>
		<form method="post" autocomplete="off">
			<label>Nom del Area:</label>
			<input type="text" name="nom" required="required" value="<?php echo $area->nom?>"/><br/><br/>
			<a class="botoncin bo1" href="<?php echo base_url()?>/index.php/arees/llistar">Tornar enrere</a>
			<input class="botoncin bo3" type="submit" name="modificar" value="Modificar"/>
			
		</form>
	</div>
