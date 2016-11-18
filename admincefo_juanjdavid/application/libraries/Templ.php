<?php
	class Templ{	
		

		
		//PONE EL FORMULARIO DE LOGIN
		public static function login(){
			?>
			<form class="derecha" method="post" id="login" autocomplete="off">
            	<input placeholder="User" class="form-control" type="text" name="user" required="required" />
				<input placeholder="Password" class="form-control" type="password" name="password" required="required"/>
				<input type="submit" name="login" class="botoncin" value="Login"/>
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
					<input class="botoncin" type="submit" name="logout" value="Logout" />

		</form>	
			<?php 
		}
		
		
		//PONE EL MENU DE LA PAGINA
		public static function menu($usuario){
			
			?>

				<ul class="nav">
				
					<li class="unem"><a href="<?php echo base_url()?>index.php">Inici</a></li>
		<?php
				if(!$usuario){
					echo "<li class='unem'><a href='".base_url()."index.php/usuario/registro'>Registre</a></li>";
				}?>
					
					<li class="unem"><a href="<?php echo base_url()?>index.php/cursos/llistar">Cursos</a></li>
					
		<?php
				if($usuario){ echo "<li class='unem'><a href='".base_url()."index.php/usuario/modificar'>El meu CEFO</a></li>";
				if($usuario->admin) echo "<li class='unem'><a href='".base_url()."index.php/admin/showpanel'>Panell de control</a></li>";}?>
				</ul>
		<?php 	
		}
	
		
		//PONE EL PIE DE PAGINA
		public static function footer(){
			?>
			<footer>
				
					<br/>
					<span><a href="cefo@......com ">cefo@.....com</span><span> Aquesta pagina es un projecte academic de  : </span> <span> David Sanchez y Juanjo guardiola</a></span>
         		
			</footer>

  </body>
</html>		
<?php
		}
		
	}
?>