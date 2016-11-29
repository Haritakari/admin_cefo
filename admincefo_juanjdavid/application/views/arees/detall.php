<section class="content">

		<div>
			<h2>Arees Formatives </h2>
			
			
			<table class="most auto">
				<tr>
					<th>Nom del area</th>
				</tr>
				<tr>
			<?php 
				echo "<td>$area->nom</td>";
			?>
			</tr>
			</table>
		</div>
		
			
		<?php 
		if(!empty($alusubs))
			if (count($alusubs)>=1){?>
			<h2>Alumnes Subscrits</h2> 
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
				
				<?php foreach ($alusubs as $pro=>$item){
					echo "<tr class='point' onclick='myUrl1($item->id);'>
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
							
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/Subscripcions/eliminarSus/$area->id/$item->id'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
			}
		}
			?>
		</table>
		<a class="botoncin bo1" onclick='window.history.back()'>Tornar enrere</a>
	</div>
</div>
</section>