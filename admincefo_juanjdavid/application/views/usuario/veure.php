<section class="content">

		<div>
			<h2>Alumnes </h2>
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
				foreach ($alumnes as $pro=>$item){
					
					echo "
						<tr onclick='myUrl1($item->id);'>
							<td>$item->nom</td>
							<td>$item->dni</td>
							<td>$item->cognom1</td>
							<td>$item->cognom2</td>
							<td>$item->data_naixement</td>
							<td>$item->estudis</td>
							<td>$item->situacio_laboral</td>
							<td>$item->email</td>
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/usuario/adminModificar/$item->dni'><img src='".base_url()."/images/mod.png'/></a></td>
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/usuario/adminBaja/$item->dni'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?></table>
				 <?php if($p>=2){?>
						<a  href="<?php echo base_url()?>index.php/usuario/llistar/<?php echo $p-1 ?>"><figure class="pagpeque"><img src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
			<?php }if($p<$numpag){?>
						<a  href="<?php echo base_url()?>index.php/usuario/llistar/<?php echo $p+1 ?>"><figure class="pagpeque"><img src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
			<?php }	
								
				echo "<br/><br/><span id='pagin'> Pagina $p de $numpag</span>";
			?>
			
					
			</div>
	</section>