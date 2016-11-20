	<div class="cont">
	<h2>Detalls alumnes</h2>
		<label class="det">Codi del curs:</label><span>	<?php echo $alumne[0]->nom; echo $alumne[0]->cognom1; echo $alumne[0]->cognom2 ;?></span><br/>
		<label class="det">Codi del curs:</label><span>	<?php echo $alumne[0]->dni;?></span><br/>
		<label class="det">Hores totals</label>	<span><?php echo $alumne[0]->estudis;?></span><br/>
		<label class="det">Data de inici del curs:</label><span>	<?php echo $alumne[0]->data_naixement;?></span><br/>
		<label class="det">Data fi del curs:</label>	<span><?php echo $alumne[0]->situacio_laboral;?></span><br/>
		<label class="det">Quin horari tindra:</label><span>	<?php echo $alumne[0]->prestacio;?></span><br/>
		<label class="det">Mati o tarda?:</label><span>	<?php echo $alumne[0]->telefon_mobil;?></span><br/>
		<label class="det">Quina graduació te:</label><span>	<?php echo $alumne[0]->telefon_fix;?></span><br/>
		<label class="det">requisits per poder accedir:</label>	<span><?php echo $alumne[0]->email;?></span><br/>
		
		<a class="botoncin bo1 bot2" href="<?php echo base_url()?>/index.php/usuario/llistar">Tornar a llistat alumnes</a>
		
	</div>
	<div class="cont">
		<h2>Cursos als que s'ha preinscrit</h2>
		
		
		<table class="most">
				<tr>
					<th>Codi</th>
					<th>Nom</th>
					<th>Area</th>
					<th>Descripcio</th>
					<th>Hores</th>
					<th>Data Inici</th>
					<th>Data Fi</th>
					
				</tr>
				
			<?php 
				foreach ($cursos as $pro=>$item){
					echo "
						<tr>
							<td>$item->codi</td>
							<td>$item->nom</td>
							<td>$item->id_area</td>
							<td>$item->descripcio</td>
							<td>$item->hores</td>
							<td>$item->data_inici</td>
							<td>$item->data_fi</td>
			
							<td'> <a href='base_url()/index.php/preinscripcions/borrar/$item->id'<img src='".base_url()."/images/borr.png'/></td>
						</tr></a>";
				}?></table>
		?>
		
		
	</div>