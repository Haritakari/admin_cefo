<div class="content">
		<div>
			<h2>Nou curs</h2>
			<form method="post" autocomplete="off">
				<div class="flexi">
					<div class="flex">
						<label>Nom del curs:</label>
						<input type="text" name="nom" required="required"/><br/>
						<label>Codi:</label>
						<input type="text" name="codi" required="required"/><br/>
						
						<label>Hores:</label>
						<input type="text" name="hores" maxlength="6" required="required"  /><br/>
						<label>Data inici:</label>
						<input type="text" name="di" placeholder="aaaa/mm/dd" maxlength="10" required="required"/><br/>
						<label>Data final:</label>
						<input type="text" name="df" placeholder="aaaa/mm/dd" maxlength="10" required="required"/><br/>
						<label>Horari:</label>
						<input type="text" name="horari" required="required"/><br/>
						<label>Tipus</label>
						<input type="text" name="tipus" required="required"/><br/>
						
					</div>
					<div class="flex">
						<label>Descripcio:</label>
						<textarea rows="5" name="desc" required="required" cols="25" placeholder="Escriu la descripció" title=" Maximo 240 caracteres" maxlength="240"></textarea><br/>
						<br/>
						<label>Requisits:</label>
						<textarea rows="5" name="requisits" required="required" cols="25" title=" Maximo 240 caracteres" placeholder="Escriu els requisits" maxlength="240"></textarea><br/>
					</div>
					<div class="flex">
					<br/><br/><br/><br/>
					<label>Area especialitat</label>
						<select name="ida" required="required">
							<option value="">Selecciona</option>
							<?php foreach ($arees as $p=>$v)
									echo "
									<option value='$v->id'>$v->nom</option>
							";?>
		
						</select><br/><br/>
						<label>Torn</label>
						<select name="torn" required="required">
							<option value="">Selecciona</option>
							<option value="M">M</option>
							<option value="T">T</option>
						</select><br/>
						
					</div>
				</div><br/><br/>
					<a class="botoncin bo1" href="<?php echo base_url()?>/index.php/cursos/llistar">Enrere</a>
					<input class="botoncin bo3" type="submit" name="nou" value="Guardar"/><br/>
			</form>
			</div>
		</div>