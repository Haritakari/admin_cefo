<section class="content">

		<div>
			<h2>Arees Formatives </h2>
			<br/>
			<a href="<?php echo base_url()?>/index.php/arees/crear" class="distribute bo3 botoncin"> Crear nou Area formativa</a>
			<table class="most auto">
				<tr>
					<th>Nom</th>
					<th></th>
					<th></th>
					
					
				</tr>
				
			<?php 
				foreach ($arees as $pro=>$item){
					echo "
						<tr class='point'>
							<td onclick='Mrl2($item->id);' >$item->nom</td>
							
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/arees/modificar/$item->id'><img src='".base_url()."/images/mod.png'/></a></td>
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/arees/borrar/$item->id'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?>
			</table>
		</div>
</section>