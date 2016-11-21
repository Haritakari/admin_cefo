<section class="content">

		<div>
			<h2>Arees Formatives </h2>
			
			<a href="<?php echo base_url()?>/index.php/arees/crear" class="distribute bo3 botoncin"> Crear nou Area formativa</a>
			<table class="most">
				<tr>
					<th>Nom</th>
					
					
					
				</tr>
				
			<?php 
				foreach ($arees as $pro=>$item){
					
					echo "
						<tr onclick='Mrl($item->id)';>
							<td>$item->nom</td>
							
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/arees/modificar/$item->id'><img src='".base_url()."/images/mod.png'/></a></td>
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/arees/borrar/$item->id'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?>
			</table>
		</div>
</section>