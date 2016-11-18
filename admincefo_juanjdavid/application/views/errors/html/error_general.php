<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->library('Templ');
$usuario = empty($_SESSION['user'])? null : unserialize($_SESSION['user']);
?><!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    
    <title>Cefo Valles</title>
    <link href="<?php echo base_url() ?>/css/style.css" rel="stylesheet">
	 <script src="<?php echo base_url()?>js/script.js"></script>
  </head>
  <body>
 <nav class="menu">
	<div>
      	<div class="izquierda">
					<span>CEFO</span><br/>
					<span>VALLES</span>
		</div>
	</div>
        <?php 
		if(!$usuario) Templ::login();
		else Templ::logout($usuario);
		Templ::menu($usuario);
		?>
        </div>
      </div>
    </nav>
	<section class="content">
	
	      <div class="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
			</div>
		
	</section>

<?php Templ::footer(); ?>    
