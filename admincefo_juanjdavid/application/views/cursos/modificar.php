<div class="content">
		<div>
			<h2>Modificar curs</h2>
			<form method="post" autocomplete="off">

				<label>Nom del curs:</label>
				<input type="text" name="nom" required="required" value="<?php echo $curs->nom?>"/><br/>
				<label>Codi:</label>
				<input type="text" name="codi" required="required" value="<?php echo $curs->codi?>"/><br/>
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
<script>
document.getElementById("elselectencuestion").selectedIndex=<?php echo $curs->ida?>;
</script>
				
				<label>Descripcio:</label>
				<input type="text" name="desc" required="required" value="<?php echo $curs->descripcio?>"/><br/>
				<label>Hores:</label>
				<input type="text" name="hores" required="required"  value="<?php echo $curs->hores?>"/><br/>
				<label>Data inici:</label>
				<input type="text" name="di" required="required"value="<?php echo $curs->data_inici?>"/><br/>
				<label>Data final:</label>
				<input type="text" name="df" required="required" value="<?php echo $curs->data_fi?>"/><br/>
				<label>Horari:</label>
				<input type="text" name="horari" required="required" value="<?php echo $curs->horari?>"/><br/>
				<label>Torn</label>
				<input type="text" name="torn" required="required" value="<?php echo $curs->torn?>"/><br/>
				<label>Tipus</label>
				<input type="text" name="tipus" required="required" value="<?php echo $curs->tipus?>"/><br/>
				<label>Requisits</label>
				<input type="text" name="requisits" required="required" value="<?php echo $curs->requisits?>"/><br/>
			
				<a class="botoncin" href="<?php echo base_url()?>/index.php/cursos/llistar">Enrere</a>
				<input class="botoncin" type="submit" name="modificar" value="Modificar"/><br/>
			</form>
			</div>
		</div>