<div class="content">
		<div>
			<h2>Nou curs</h2>
			<form method="post" autocomplete="off">

				<label>Nom del curs:</label>
				<input type="text" name="nom" required="required"/><br/>
				<label>Codi:</label>
				<input type="text" name="codi" required="required"/><br/>
				<select name="ida">Area:
					<option value="1">Area especialitat</option>
					<option value="2">electro</option>
					<option value="3"> pedrerp</option>
					<option value="4"> picador</option>
					<option value="5"></option>
					<option value="6"></option>
					<option value="7"></option>
					<option value="8"></option>
				</select><br/>

				
				<label>Descripcio:</label>
				<input type="text" name="desc" required="required"/><br/>
				<label>Hores:</label>
				<input type="text" name="hores" required="required"  /><br/>
				<label>Data inici:</label>
				<input type="text" name="di" required="required"/><br/>
				<label>Data final:</label>
				<input type="text" name="df" required="required"/><br/>
				<label>Horari:</label>
				<input type="text" name="horari" required="required"/><br/>
				<label>Torn</label>
				<input type="text" name="torn" required="required"/><br/>
				<label>Tipus</label>
				<input type="text" name="tipus" required="required"/><br/>
				<label>Requisits</label>
				<input type="text" name="requisits" required="required"/><br/>
				<a class="botoncin" href="<?php echo base_url()?>/index.php/cursos/llistar">Enrere</a>
				<input class="botoncin" type="submit" name="nou" value="Guardar"/><br/>
				
			</form>
			</div>
		</div>