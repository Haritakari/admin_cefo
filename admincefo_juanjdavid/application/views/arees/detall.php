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
			<table class="most reo">
				<tr>
					<th>Dni</th>
					<th>Nom</th>
					<th>1er Cognom</th>
					<th>Estudis</th>
					<th>Telefon fixe</th>
					<th>Telefon mobil</th>
					<th>email</th>
					<th>Data hora Subscripció</th>
					<th></th>
				</tr>
				
				<?php foreach ($alusubs as $pro=>$item){
					echo "<tr class='point' onclick='myUrl1($item->id);'>
							<td>$item->dni</td>
							<td>$item->nom</td>
							<td>$item->cognom1</td>
							
							
							<td>";
							if ($item->estudis==1) echo "Sense estudis";
							if ($item->estudis==2) echo "EGB o ESO";
							if ($item->estudis==3) echo "CFGSuperior o Batxillerat";
							if ($item->estudis==4) echo "Titol Universitari";
								echo"</td>";
						   
							echo
							"
							<td>$item->telefon_fix</td>
							<td>$item->telefon_mobil</td>
							<td>$item->email</td>
							<td>$item->data_hora</td>
							
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/Subscripcions/eliminarSus/$area->id/$item->id'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
			}
		}
			?>
		</table><br><br><br>
		<a class="botoncin bo1" onclick='window.history.back()'>Tornar enrere</a>
		<a class="botoncin bo3"  onclick='print();'>Impressió</a>
		<?php if(!empty($alusubs))
			if (count($alusubs)>=1){?>
			<a href='<?php echo base_url()?>index.php/subscripcions/xml/<?php echo $area->id?>' class="botoncin bo6"> Descargar en XML</a>
		<?php }?>
		<br><br><br><br>
	</div>
</div>
</section>