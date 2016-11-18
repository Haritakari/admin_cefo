<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Usuario extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
		}
		//PROCEDIMIENTO PARA REGISTRAR UN USUARIO
		public function registro(){
			$usua=Login::getUsuario();
			if($usua)
				redirect(base_url().'index.php');
			//si no llegan los datos a guardar
			if(empty($_POST['guardar'])){
				
				//mostramos la vista del formulario
				
				
				$this->load->library('templ');
				$data['usuario']=$usua;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/registro.php', $data);
				$this->load->view('templates/footer', $data);
			
			//si llegan los datos por POST
			}else{
				//crear una instancia de Usuario
				$u = new UsuarioModel();

				//tomar los datos que vienen por POST
				
				$u->nom = $this->input->post("nom");
				$u->cognom1 =$this->input->post("cognom1");
				$u->cognom2 = $this->input->post("cognom2");
				$u->data_naixement =$this->input->post("naix");
				$u->dni = $this->input->post("dni");
				$u->estudis = $this->input->post("estudis");
				$u->situacio_laboral = $this->input->post("sl");
				$u->prestacio = $this->input->post("prestacio");
				$u->telefon_mobil = $this->input->post("tmobil");
				$u->telefon_fix = $this->input->post("tfixe");
				$u->email = $this->input->post("email");

				//guardar el usuario en BDD
				if(!$u->guardar())
					show_error('No ha pogut enregistrar les dades',289,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] = $usua;
				$data['mensaje'] = 'Operació de registre satisfactoria';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		

		//PROCEDIMIENTO PARA MODIFICAR UN USUARIO
		public function modificar(){
			//si no hay usuario identificado... error
			if(!Login::getUsuario())
				show_error('Tens que estar identificat per modificar les teves dades',299,'Error , Identificat');
				
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				
				//mostramos la vista del formulario
				$data['usuario'] = Login::getUsuario();
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/modificacio', $data);
				$this->load->view('templates/footer', $data);
					
				//si llegan los datos por POST
			}else{
				//recuperar los datos actuales del usuario
				$u = Login::getUsuario();
				
				
				
				$u->nom = $this->input->post("nom");
				$u->cognom1 =$this->input->post("cognom1");
				$u->cognom2 = $this->input->post("cognom2");
				$u->data_naixement =$this->input->post("naix");
				$u->dni = $this->input->post("dni");
				$u->estudis = $this->input->post("estudis");
				$u->situacio_laboral = $this->input->post("sl");
				$u->prestacio = $this->input->post("prestacio");
				$u->telefon_mobil = $this->input->post("tmobil");
				$u->telefon_fix = $this->input->post("tfixe");
				$u->email = $this->input->post("email");
			
					
			
				//modificar el usuario en BDD
				if(!$u->actualizar())
					show_error('No es pot modificar',154,'Error en la modificacio');
		
				//hace de nuevo "login" para actualizar los datos del usuario
				//desde la BDD a la variable de sesión.
				Login::log_in($u->dni, $u->data_naixement);
					
				//mostrar la vista de éxito
				$m='Modificacio realitzada correctament';
				$data['usuario'] = Login::getUsuario();
				$data['mensaje']=$m;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/modificacio', $data);
				$this->load->view('result/exit2', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		
		
		//PROCEDIMIENTO PARA DAR DE BAJA UN USUARIO
		//solicita confirmación
		public function baja(){		
			//recuperar usuario
			$u = Login::getUsuario();
			
			//asegurarse que el usuario está identificado
			if(!$u) show_error('Tens que estar identificat per poderte donar de baixa',235,'Error Login');
			
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
	
				$data['usuario'] = $u;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/baja1', $data);
				$this->load->view('templates/footer', $data);
		
			//si nos están enviando la confirmación de baja
			}else{
			
				if(!$u->borrar())
					show_error('No es pot procesa la baixa',157,'Error al intentar donar de baixa');

				//cierra la sesion
				Login::log_out();
					
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