<section class="content">
			<div>
			<h2>Formulari per donar de baixa</h2>
			<p>Per favor, confirma la teva solicitud de baixa</p><br/><br/>
		
			<form method="post" autocomplete="off">
				<label>Nom:</label>
				<span><?php echo $usuari->nom;?></span><br/><br/><br/>
			
				<label> Estas segur que vols donar de baixa?</label><br/><br/>
					<a class="botoncin bo1" onclick='window.history.back()'>Tornar enrere</a>
				<input type="submit" class="botoncin bo3" name="confirmar" value="Confirmar"/><br/>
			</form>
			</div>
		</section>