<section class="content">

		<div class="rel">
			<h2>Alumnes </h2>
			<table class="most auto">
				<tr>
					<th>Nom</th>
					<th>Dni</th>
					<th>1er Cognom</th>
					<th>2on Cognom</th>
					<th>Data Naixement</th>
					<th>Estudis</th>
					<th>Situacio laboral</th>
					<th>Prestació</th>
					<th>email</th>
					
					
				</tr>
				
			<?php 
				foreach ($alumnes as $pro=>$item){
					
					echo "
						<tr class='point' onclick='myUrl1($item->id);'>
							<td>$item->nom</td>
							<td>$item->dni</td>
							<td>$item->cognom1</td>
							<td>$item->cognom2</td>
							<td>$item->data_naixement</td>
							
							
							<td>";
							if ($item->estudis==1) echo "Sense estudis";
							if ($item->estudis==2) echo"EGB o ESO";
							if ($item->estudis==3) echo"CFGSuperior o Batxillerat";
							if ($item->estudis==4) echo"Titol Universitari";
							
							echo"</td><td>";
							
							if ($item->situacio_laboral==1)echo "Aturat";
							if ($item->situacio_laboral==2)echo "Actiu";
							if ($item->situacio_laboral==3)echo "Altres";
							
							echo "</td><td>";
							if ($item->prestacio==1)echo "Si";
							if ($item->prestacio==2)echo "No";
							
							
							echo "</td><td>$item->email</td>
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/usuario/adminModificar/$item->dni'><img src='".base_url()."/images/mod.png'/></a></td>
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/usuario/adminBaja/$item->dni'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?></table>
				 <?php if($p>=2){?>
						<a  href="<?php echo base_url()?>index.php/usuario/llistar/<?php echo $p-1 ?>"><figure class="pagpeque"><img class="i" src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
			<?php }if($p<$numpag){?>
						<a  href="<?php echo base_url()?>index.php/usuario/llistar/<?php echo $p+1 ?>"><figure class="pagpeque"><img class="d" src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
			<?php }	
								
				echo "<span id='pagin'> Pagina $p de $numpag</span>";
			?>
			
					
			</div>
	</section>