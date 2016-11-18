<section class="content">
			<div>
			<h2>Formulari per donar de baixa</h2>
			<p>Per favor, confirma la teva solicitud de baixa</p><br/><br/>
		
			<form method="post" autocomplete="off">
				<label>Nom:</label>
				<span><?php echo $usuario->nom;?></span><br/><br/><br/>
			
				<label> Estas segur que vols donar de baixa?</label><br/><br/>
				<input type="submit" name="confirmar" value="Confirmar"/><br/>
			</form>
			</div>
		</section>