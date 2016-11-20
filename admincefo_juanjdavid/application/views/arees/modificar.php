	<div class="cont">
		<h2>Modificar Area formativa</h2>
			<form method="post" autocomplete="off">
		<label>Nom del Area:</label>
				<input type="text" name="nom" required="required" value="<?php echo $area->nom?>"/><br/>
				<input class="botoncin" type="submit" name="modificar" value="Modificar"/><br/>
			</form>
		<a class="botoncin bo1 bot2" href="<?php echo base_url()?>/index.php/arees/llistar">Tornar a Arees</a>
	</div>
