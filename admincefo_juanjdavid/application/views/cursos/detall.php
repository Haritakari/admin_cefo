



	<div class="cont">
			<h2 class="det"><?php echo $curso[0]->nom;?></h2><br/><br/><br/>
		<label class="det">Codi del curs:</label><span>	<?php echo $curso[0]->codi;?></span><br/>
		<label class="det">Hores totals</label>	<span><?php echo $curso[0]->hores;?></span><br/>
		<label class="det">Data de inici del curs:</label><span>	<?php echo $curso[0]->data_inici;?></span><br/>
		<label class="det">Data fi del curs:</label>	<span><?php echo $curso[0]->data_fi;?></span><br/>
		<label class="det">Quin horari tindra:</label><span>	<?php echo $curso[0]->horari;?></span><br/>
		<label class="det">Mati o tarda?:</label><span>	<?php echo $curso[0]->torn;?></span><br/>
		<label class="det">Quina graduació te:</label><span>	<?php echo $curso[0]->tipus;?></span><br/>
		<label class="det">requisits per poder accedir:</label>	<span><?php echo $curso[0]->requisits;?></span><br/>
		<label class="det">Descripció del curs:</label><span>	<?php echo $curso[0]->descripcio;?></span><br/>
		<a class="botoncin bo1 bot2" href="http://localhost/cefo_juandavid/index.php/cursos/llistar">Tornar a cursos</a>
		<a class="botoncin bo3" href="http://localhost/cefo_juandavid/index.php/preinscripcio">Preinscriures</a>
	</div>
</div>