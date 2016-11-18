<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Preinscripcions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
		}
		//PROCEDIMIENTO PARA REGISTRAR UNA PREINSCRIPCION
		public function registroP(){
				
			//si no llegan los datos a guardar
			if(empty($_POST['guardar'])){
				
				//mostramos la vista del formulario
				
				$usua=Login::getUsuario();
				$curs= new CursModel;
				$curs= $curs->getCurs($id_curs);
				$this->load->library('templ');
				$data['usuario']=$psua;
				$data['curs']=$curs;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/registro.php', $data);
				$this->load->view('templates/footer', $data);
			
			//si llegan los datos por POST
			}else{
				//crear una instancia de Preinscripciones
				$p = new PreinscripcionsModel();

				//tomar los datos que vienen por POST
				
				$p->id_usuari = $this->input->post("id_usuari");
				$p->id_curs = $this->input->post("id_curs");

				//guardar el usuario en BDD
				if(!$p->guardarP())
					show_error('No ha pogut enregistrar la Preinscripció',289,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] = Login::getUsuario();
				$data['mensaje'] = "Operació de registre Preinscripció Curs satisfactoria";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		
		
		//PROCEDIMIENTO PARA DAR DE BAJA PREINSCRIPCIONES
		//solicita confirmación
		public function baja(){
			
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			
			$usua=Login::getUsuario();
			$curs= new CursModel;
			$curs= $curs->getCurs($id_curs);
			
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
	
				$data['usuario'] = $usua;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/baja', $data);
				$this->load->view('templates/footer', $data);
		
			//si nos están enviando la confirmación de baja
			}else{
	

				if(!$p->borrar())
					show_error('No es pot procesa la baixa',257,'Error al intentar donar de baixa');

				//mostrar la vista de éxito
				$data['usuario'] = null;
				$data['mensaje'] = 'Eliminat OK';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		
	}
?>