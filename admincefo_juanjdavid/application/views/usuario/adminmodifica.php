<div class="content">
		<div>
			<h2>Formulari per a modificar les dades del alumne <?php echo $usuari->nom ?></h2>
			<form method="post" autocomplete="off">

				<label>Nom:</label>
				<input type="text" name="nom" value="<?php echo $usuari->nom ?>" required="required"/><br/>
				<label>Primer cognom:</label>
				<input type="text" name="cognom1" value="<?php echo $usuari->cognom1 ?>" required="required"/><br/>
				<label>Segon cognom:</label>
				<input type="text" name="cognom2" value="<?php echo $usuari->cognom2 ?>" required="required"/><br/>
				<label>Telefon fixe:</label>
				<input type="text" name="tfixe" value="<?php echo $usuari->telefon_fix ?>" required="required" pattern="[0-9]{9}" title="Telefon fixe"/><br/>
				<label>Telefon mobil:</label>
				<input type="text" name="tmobil" value="<?php echo $usuari->telefon_mobil ?>" required="required" pattern="[0-9]{9}" title="Telefon mobil"/><br/>
				<label>Data de naixement:</label>
				<input type="text" name="naix" value="<?php echo $usuari->data_naixement ?>" required="required"/><br/>
				<label>DNI:</label>
				<input type="text" name="dni" value="<?php echo $usuari->dni ?>" required="required"/><br/>
				<label>Email:</label>
				<input type="email" name="email" value="<?php echo $usuari->email ?>" required="required"/><br/>
				<label>Estudis</label>
				<input type="text" name="estudis" value="<?php echo $usuari->estudis ?>" required="required"/><br/>
				<label>Situació laboral</label>
				<input type="text" name="sl" value="<?php echo $usuari->situacio_laboral ?>" required="required"/><br/>
				<label>Prestació</label>
				<input type="text" name="prestacio" value="<?php echo $usuari->prestacio ?>" required="required"/><br/>
			
				<input class="botoncin" type="submit" name="modificar" value="Guardar"/><br/>
				<br/>
				<a class="botoncin bo2" href='<?php echo base_url()?>index.php/usuario/llistar'>Tornar enrere</a><br/>
			</form>
			</div>
		</div>