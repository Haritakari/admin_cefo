<div class="content">
		<div>
			<h2>Formulari de registre</h2>
			<form method="post" autocomplete="off">

				<label>Nom:</label>
				<input type="text" name="nom" required="required"/><br/>
				<label>Primer cognom:</label>
				<input type="text" name="cognom1" required="required"/><br/>
				<label>Segon cognom:</label>
				<input type="text" name="cognom2" required="required"/><br/>
				<label>Telefon fixe:</label>
				<input type="text" name="tfixe" required="required" pattern="[0-9]{9}" title="Telefon fixe"/><br/>
				<label>Telefon mobil:</label>
				<input type="text" name="tmobil" required="required" pattern="[0-9]{9}" title="Telefon mobil"/><br/>
				<label>Data de naixement:</label>
				<input type="text" name="naix" required="required"/><br/>
				<label>DNI:</label>
				<input type="text" name="dni" required="required"/><br/>
				<label>Email:</label>
				<input type="email" name="email" required="required"/><br/>
				<label>Estudis</label>
				<input type="text" name="estudis" required="required"/><br/>
				<label>Situació laboral</label>
				<input type="text" name="sl" required="required"/><br/>
				<label>Prestació</label>
				<input type="text" name="prestacio" required="required"/><br/>
			
				<input class="botoncin" type="submit" name="guardar" value="Guardar"/><br/>
			</form>
			</div>
		</div>