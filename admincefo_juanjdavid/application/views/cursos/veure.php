<section class="content">



		<div>
			<h2>Cursos ofertats </h2>
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
			if(!empty($missatge)){
				echo $curs->nom;
				echo $missatge[0]; 
			}
			echo "<a href='".base_url()."index.php/cursos/crear'>Insertar nou Curs</a>";
				foreach ($cursos as $pro=>$item){
					
					echo "
						<tr onclick='myUrl($item->id);'>
							<td>$item->codi</td>
							<td>$item->nom</td>
							<td>$item->id_area</td>
							<td>$item->descripcio</td>
							<td>$item->hores</td>
							<td>$item->data_inici</td>
							<td>$item->data_fi</td>
							<td onclick='event.stopPropagation(),myUrl2($item->id);'><img src='".base_url()."/images/mod.png'/></td>
							<td onclick='event.stopPropagation(),myUrl3($item->id);'><img src='".base_url()."/images/borr.png'/></td>
						</tr></a>";
				}?></table>
				 <?php if($p>=2){?>
						<a  href="<?php echo base_url()?>index.php/cursos/llistar/<?php echo $p-1 ?>"><figure class="pagpeque"><img src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
			<?php }if($p<$numpag){?>
						<a  href="<?php echo base_url()?>index.php/cursos/llistar/<?php echo $p+1 ?>"><figure class="pagpeque"><img src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
			<?php }	
								
				echo "<br/><br/><span id='pagin'> Pagina $p de $numpag</span>";
			?>
			
					
			</div>
	</section>