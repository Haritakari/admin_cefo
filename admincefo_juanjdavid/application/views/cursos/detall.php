



<div class="cont">
			<h2 class="det"><?php echo $curso[0]->nom;?></h2><br/><br/><br/>
		<table >
			<tr>
				<td><label class="det">Codi del curs:</label></td><td><?php echo $curso[0]->codi;?></span><br/>
			</tr><tr>
				<td><label class="det">Hores totals</label></td><td><?php echo $curso[0]->hores;?></span></td>
			</tr><tr>
				<td><label class="det">Data de inici del curs:</label></td><td>	<?php echo $curso[0]->data_inici;?></span></td>
			</tr><tr>
				<td><label class="det">Data fi del curs:</label></td><td><?php echo $curso[0]->data_fi;?></span></td>
			</tr><tr>
				<td><label class="det">Quin horari tindra:</label></td><td>	<?php echo $curso[0]->horari;?></span></td>
			</tr><tr>
				<td><label class="det">Mati o tarda?:</label></td><td><?php echo $curso[0]->torn;?></span></td>
			</tr><tr>
				<td><label class="det">Quina graduació te:</label></td><td>	<?php echo $curso[0]->tipus;?></span></td>
			</tr><tr>
				<td><label class="det">Requisits per poder accedir:</label></td><td><?php echo $curso[0]->requisits;?></span></td>
			</tr><tr>
				<td><label class="det">Descripció del curs:</label></td><td><?php echo $curso[0]->descripcio;?></td>
			</tr>
		</table>
		<a class="botoncin bo1 bot2" onclick='window.history.back()'>Tornar enrere</a>
		<a class="botoncin bo5 " href="">Exportar Cursos a Fitxers XML</a>
		
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
					
					
					<th>Estudis</th>
					<th>Situacio laboral</th>
					<th>Telefon fixe</th>
					<th>Telefon mobil</th>
					<th>email</th>
					<th></th>
					
					
			
				</tr>
				<?php 
		foreach ($usepreins as $p=>$item){
			echo "
						<tr class='point' onclick='myUrl1($item->id);'>
							<td>$item->nom</td>
							<td>$item->dni</td>
							<td>$item->cognom1</td>
							
							
							<td>";
							if ($item->estudis==1) echo "Sense estudis";
							if ($item->estudis==2) echo "EGB o ESO";
							if ($item->estudis==3) echo "CFGSuperior o Batxillerat";
							if ($item->estudis==4) echo "Titol Universitari";
								echo"</td>
							<td>";
						    if($item->situacio_laboral==1)echo "Aturat";
						    if($item->situacio_laboral==2)echo "Actiu";
						    if($item->situacio_laboral==3)echo "Altres";
							echo
							"</td>
							<td>$item->telefon_fix</td>
							<td>$item->telefon_mobil</td>
							<td>$item->email</td>
							
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/preinscripcions/eliminar/$item->id/".$curso[0]->id."'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
			}
		}
			?>
		</table>
		
	</div>
</div>