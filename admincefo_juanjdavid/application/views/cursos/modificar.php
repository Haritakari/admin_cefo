
<div class="content">
<div>
	<h2>Modificar curs</h2>
	<form method="post" autocomplete="off">
		<div class="flexi">
			<div class="flex">
				<label>Nom del curs:</label>
				<input type="text" name="nom" value="<?php echo $curs->nom?>" required="required"/><br/>
				<label>Codi:</label>
				<input type="text" name="codi" value="<?php echo $curs->codi?>" required="required"/><br/>
				<label>Hores:</label>
				<input type="text" name="hores" value="<?php echo $curs->hores?>" maxlength="6" required="required"  /><br/>
				<label>Data inici:</label>
				<input type="text" name="di" value="<?php echo $curs->data_inici?>" placeholder="aaaa/mm/dd" maxlength="10" required="required"/><br/>
				<label>Data final:</label>
				<input type="text" name="df" value="<?php echo $curs->data_fi?>" placeholder="aaaa/mm/dd" maxlength="10" required="required"/><br/>
				<label>Horari:</label>
				<input type="text" name="horari" value="<?php echo $curs->horari?>" required="required"/><br/>
				<label>Tipus</label>
				<input type="text" name="tipus" value="<?php echo $curs->tipus?>" required="required"/><br/>
				
			</div>
			<div class="flex">
				<label>Descripcio:</label>
				<textarea rows="5" name="desc" required="required" cols="25"  title=" Maximo 240 caracteres" maxlength="240"><?php echo $curs->descripcio?></textarea><br/>
				<br/>
				<label>Requisits:</label>
				<textarea rows="5" name="requisits" required="required" cols="25" title=" Maximo 240 caracteres"  maxlength="240"><?php echo $curs->requisits?></textarea><br/>
			</div>
			<div class="flex">
			<br/><br/><br/><br/>
			<label>Area especialitat</label>
				<select name="ida" required="required">
					<option value="">Selecciona</option>
					<?php foreach ($arees as $p=>$v)
						if ($curs->id_area==$v->id)
							echo "<option selected value='$v->id'>$v->nom</option>";
						else 
							echo "<option value='$v->id'>$v->nom</option>";
					?>

				</select><br/><br/>
				<label>Torn</label>
				<select name="torn" required="required">
					<option value="">Selecciona</option>
					<option <?php if ($curs->torn=='M')echo 'selected'?> value="M">M</option>
					<option <?php if ($curs->torn=='T')echo 'selected'?> value="T">T</option>
				</select><br/>
				
			</div>
		</div><br/><br/>
			<a class="botoncin bo1" href="<?php echo base_url()?>/index.php/cursos/llistar">Enrere</a>
			<input class="botoncin bo3" type="submit" name="modificar" value="Modificar"/><br/>
	</form>
	</div>
</div>
