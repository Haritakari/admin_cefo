<section class="content">



		<div class="rel">
			<h2>Cursos ofertats </h2>
			<table class="most">
				<tr>
					<th>Codi</th>
					<th>Nom</th>
					<th>Area</th>
					
					<th>Hores</th>
					<th>Data Inici</th>
					<th>Data Fi</th>
					<th></th>
					<th></th>
					
				</tr>
				
			<?php 
			if(!empty($missatge)){
				echo $curs->nom;
				echo $missatge[0]; 
			}
			echo "<br/><a class='bo3 botoncin' href='".base_url()."index.php/cursos/crear'>Insertar nou Curs</a><br/><br/><br/>";
				foreach ($cursos as $pro=>$item){
					if($item->nom)
					echo "
						<tr class='point' onclick='myUrl($item->id);'>
							<td>$item->codi</td>
							<td>$item->nom</td>
							<td>$item->area</td>
							
							<td>$item->hores</td>
							<td>$item->data_inici</td>
							<td>$item->data_fi</td>
							<td onclick='event.stopPropagation(),myUrl2($item->id);'><img src='".base_url()."/images/mod.png'/></td>
							<td onclick='event.stopPropagation(),myUrl3($item->id);'><img src='".base_url()."/images/borr.png'/></td>
						</tr></a>";
				}?></table>
				 <?php if($p>=2){?>
						<a  href="<?php echo base_url()?>index.php/cursos/llistar/<?php echo $p-1 ?>"><figure class="pagpeque"><img class="i" src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
			<?php }if($p<$numpag){?>
						<a  href="<?php echo base_url()?>index.php/cursos/llistar/<?php echo $p+1 ?>"><figure class="pagpeque"><img class="d" src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
			<?php }	
			
				echo "<span id='pagin'> Pagina $p de $numpag</span>";
			?>
			
					
			</div>
	</section>