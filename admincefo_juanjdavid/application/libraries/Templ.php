<?php
	class Templ{	

		//PONE EL FORMULARIO DE LOGIN
		public static function login(){
			?>
			<form class="derecha" method="post" id="login" autocomplete="off">
            	<input class="peq" placeholder="User" class="form-control" type="text" name="user" required="required" />
				<input class="peq" placeholder="Password" class="form-control" type="password" name="password" required="required"/>
				<input type="submit" name="login" class="botoncin bo5" value="Login"/>
			</form>
			<?php 
		}
		
		//PONE LA INFO DEL USUARIO IDENTIFICADO Y EL FORMULARIOD E LOGOUT
		public static function logout($usuario){
			?>
		<form class="derecha" method="post">
				
					<span class="logger"> Hola <a href="index.php/usuarioModel/actualizar" title="modificar dades"></a></span>
					<span class="logge"><?php echo $usuario->nom;?></span>
					<span class="logger"> 	<?php echo ' ('.$usuario->email.')';?>
					<?php if($usuario->admin) echo ", ets l'administrador ";?></span>
					<input class="botoncin bo5" type="submit" name="logout" value="Logout" />

		</form>	
			<?php 
		}
		
		
		//PONE EL MENU DE LA PAGINA
		public static function menu($usuario){
			
			?>

				<ul class="nav">
					<li class="unem"><a href="<?php echo base_url()?>index.php">Inici</a></li>
					<?php 
					if (!empty($usuario)){
					if ($usuario->admin){?>
					
					<li class="unem"><a href="<?php echo base_url()?>index.php/cursos/llistar">Cursos</a></li>
					<li class="unem"><a href="<?php echo base_url()?>index.php/usuario/llistar">Alumnes</a></li>
					<li class="unem"><a href="<?php echo base_url()?>index.php/arees/llistar">Arees formatives</a></li>
					
					
					<?php }}
						else
							echo "<li class='sp'>Fes login per accedir a la aplicacio</li>";
					?>
				</ul>
			
		<?php 	
		}
		//PONE EL PIE DE PAGINA
		public static function footer(){
			?>
			<footer>
					<br/>
					</a><span class="pnoms"> Aquesta pagina es un projecte academic de  : </span> <span class="noms"> David Sanchez y Juanjo Guardiola</span>
         								<br/>
			</footer>

  </body>
</html>		
<?php
		}
		
	}
?>