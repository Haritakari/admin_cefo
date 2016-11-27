



	<div class="cont">
			<h2 class="det"><?php echo $curso[0]->nom;?></h2><br/><br/><br/>
		<label class="det">Codi del curs:</label><span>	<?php echo $curso[0]->codi;?></span><br/>
		<label class="det">Hores totals</label>	<span><?php echo $curso[0]->hores;?></span><br/>
		<label class="det">Data de inici del curs:</label><span>	<?php echo $curso[0]->data_inici;?></span><br/>
		<label class="det">Data fi del curs:</label>	<span><?php echo $curso[0]->data_fi;?></span><br/>
		<label class="det">Quin horari tindra:</label><span>	<?php echo $curso[0]->horari;?></span><br/>
		<label class="det">Mati o tarda :</label><span>	<?php echo $curso[0]->torn;?></span><br/>
		<label class="det">Quina graduació te:</label><span>	<?php echo $curso[0]->tipus;?></span><br/>
		<label class="det">requisits per poder accedir:</label>	<span><?php echo $curso[0]->requisits;?></span><br/>
		<label class="det">Descripció del curs:</label><span>	<?php echo $curso[0]->descripcio;?></span><br/>
		<a class="botoncin bo1 bot2" href="<?php echo base_url()?>/index.php/cursos/llistar">Tornar a cursos</a>
		
		<?php 
		if(!empty($usepreins)){
		?>
		</div>
		<div class="content2">
		<h2>Alumnes preinscrits</h2> 
		<table class="most">
				<tr>
					<th>Nom</th>
					<th>Dni</th>
					<th>1er Cognom</th>
					<th>2on Cognom</th>
					<th>Data Naixement</th>
					<th>Estudis</th>
					<th>Situacio laboral</th>
					<th>email</th>
			
				</tr>
				<?php 
		foreach ($usepreins as $p=>$item)
			echo "
						<tr>
							<td>$item->nom</td>
							<td>$item->dni</td>
							<td>$item->cognom1</td>
							<td>$item->cognom2</td>
							<td>$item->data_naixement</td>
							<td>$item->estudis</td>
							<td>$item->situacio_laboral</td>
							<td>$item->email</td>
							
							<td><a class='bo3 botoncin' href='".base_url()."index.php/preinscripcions/eliminar/$item->id/".$curso[0]->id."'>Eliminar subscripcio</a></td>
						</tr></a>";
			
		}
			?>
		</table>
		
	</div>
</div>