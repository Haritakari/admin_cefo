<div class="content">
		<div>
			<h2>Formulari per a modificar les dades </h2>
			
			<form method="post" autocomplete="off">
				<div class="flexi">
				<div class="flex">
				<label>Nom:</label>
				<input type="text" name="nom" value="<?php echo $usuari->nom ?>" maxlength="15" required="required"  title="de 2 a 15 lletres" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,15}"/><br/>
				<label>Primer cognom:</label>
				<input type="text" name="cognom1" value="<?php echo $usuari->cognom1 ?>" maxlength="15" required="required" title="de 2 a 15 lletres" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,15}"/><br/>
				<label>Segon cognom:</label>
				<input type="text" name="cognom2" value="<?php echo $usuari->cognom2 ?>" maxlength="15" required="required" title="de 2 a 15 lletres" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,15}"/><br/>
				<label>Telefon fixe:</label>
				<input type="text" name="tfixe" value="<?php echo $usuari->telefon_fix ?>" required="required" pattern="[0-9]{5,11}" title="Telefon fixe" /><br/>
				<label>Telefon mobil:</label>
				<input type="text" name="tmobil" value="<?php echo $usuari->telefon_mobil ?>" required="required" pattern="[0-9]{5,11}" title="Telefon mobil"/><br/>
				<label>Data de naixement:</label>
				<input class="col" type="text" value="<?php echo $fecha[2] ?>" name="naix3" pattern="[0-3][0-9]{1}" required="required" maxlength="2" placeholder="dia" title="Dia"/><br/>
				<label></label>
				<input class="col" type="text" value="<?php echo $fecha[1] ?>" name="naix2" pattern="[0-1][0-9]{1}" required="required" maxlength="2"  placeholder="mes" title="Mes"/><br/>
				<label></label>
				<input class="col" type="text" value="<?php echo $fecha[0] ?>" name="naix" pattern="[1-2][0-9][0-9][0-9]{1}" required="required" maxlength="4" placeholder="any" title="any"/><br/>
				
				<label>DNI o NIE:</label>
				<input type="text" name="dni" maxlength="9" value="<?php echo $usuari->dni ?>" pattern="[XYZ0-9][0-9]{7}[A-Z]" required="required" title="DNI o NIE"/><br/>
				<label>Email:</label>
				<input type="email" name="email" value="<?php echo $usuari->email ?>" required="required" title="Correu Electronic"/><br/>
				
				
			
			
			
					</div>
				<div class="flex alilef">
				<label>Estudis:</label>
				<select name="estudis">
					<option <?php if ($usuari->estudis==1)echo 'selected'?> value="1">Sense estudis</option>
					<option <?php if ($usuari->estudis==2)echo 'selected'?> value="2">EGB o ESO</option>
					<option <?php if ($usuari->estudis==3)echo 'selected'?> value="3">CFGSuperior o Batxillerat</option>
					<option <?php if ($usuari->estudis==4)echo 'selected'?> value="4">Titol Universitari</option>
				</select><br/><br/><br/>
				<label>Situació laboral</label>
				<select name="sl">
					<option <?php if ($usuari->situacio_laboral==1)echo 'selected'?> value="1">Aturat</option>
					<option <?php if ($usuari->situacio_laboral==2)echo 'selected'?> value="2">Actiu</option>
					<option <?php if ($usuari->situacio_laboral==3)echo 'selected'?> value="3">Altres</option>
				</select><br/><br/><br/>
				<label>Prestació</label>
				<select name="prestacio">
					<option <?php if ($usuari->prestacio==1)echo 'selected'?> value="1">Si</option>
					<option <?php if ($usuari->prestacio==2)echo 'selected'?> value="2">No</option>
				</select><br/><br/><br/>
			</div>
				
			</div>
				
				
				<a class="botoncin bo1" href="<?php echo base_url()?>/index.php/usuario/llistar">Tornar enrere</a>
				<input class="botoncin bo3" type="submit" name="modificar" value="Guardar"/>
				<br/>
			</form>
			</div>
		</div>