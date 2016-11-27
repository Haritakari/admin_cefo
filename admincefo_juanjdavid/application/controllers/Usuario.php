<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Usuario extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
		}
		//PROCEDIMIENTO PARA REGISTRAR UN USUARIO
		public function registro(){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			//si no llegan los datos a guardar
			if(empty($_POST['guardar'])){
				
				//mostramos la vista del formulario
				
				
				$this->load->library('templ');
				$data['usuario']=$usuario;
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
					show_error('No ha pogut enregistrar les dades',404,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] = $usuario;
				$data['mensaje'] = 'Operació de registre satisfactoria';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		public function adminModificar($dni){      //admin modificando datos del alumno
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
				$u=new UsuarioModel();
				$u->dni=$dni;
				$u=$u->getUsuario();
				$u=$u[0];
				
				//si no llegan los datos a modificar
				if(empty($_POST['modificar'])){
		
					//mostramos la vista del formulario
					$fecha=explode("-", $u->data_naixement);
					$data['fecha']=$fecha;
					$data['usuari']=$u;
					$data['usuario'] =$usuario;
					$this->load->view('templates/header', $data);
					$this->load->view('usuario/adminmodifica', $data);
					$this->load->view('templates/footer', $data);
						
					//si llegan los datos por POST
				}else{
					//recuperar los datos actuales del usuario

					$u->nom = $this->input->post("nom");
					$u->cognom1 =$this->input->post("cognom1");
					$u->cognom2 = $this->input->post("cognom2");
					$u->data_naixement =$this->input->post("naix").'-'.$this->input->post("naix2").'-'.$this->input->post("naix3");
					$u->dni = $this->input->post("dni");
					$u->estudis = $this->input->post("estudis");
					$u->situacio_laboral = $this->input->post("sl");
					$u->prestacio = $this->input->post("prestacio");
					$u->telefon_mobil = $this->input->post("tmobil");
					$u->telefon_fix = $this->input->post("tfixe");
					$u->email = $this->input->post("email");

					//modificar el usuario en BDD
					if(!$u->actualizar())
						show_error('No es pot modificar',404,'Error en la modificacio');
		
						//mostrar la vista de éxito
						$m='Modificacio realitzada correctament';
						$data['usuari']=$u;
						$data['usuario'] = $usuario;
						$data['mensaje']=$m;
						$fecha=explode("-", $u->data_naixement);
						$data['fecha']=$fecha;
						$this->load->view('templates/header', $data);
						$this->load->view('usuario/adminmodifica', $data);
						$this->load->view('result/exit2', $data);
						$this->load->view('templates/footer', $data);
				}
		}
		
		
		public function llistar($p=1,$f=10){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$alumn=new UsuarioModel();
			$alumnes=$alumn->llistar($p,$f);
				
			$numpag=$alumn->calc_query();
			$numpag=ceil($numpag/$f);
				
				
			$data['numpag']=$numpag;
			$data['p']=$p;
			$data['alumnes']=$alumnes;
			$data['usuario']=$usuario;
			$this->load->view('templates/header', $data);
			$this->load->view('usuario/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		public function adminBaja($dni){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$u=new UsuarioModel();
			$u->dni=$dni;
			$u=$u->getUsuario();
			$u=$u[0];
			$data['usuario'] =$usuario;
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){
				//carga el formulario de confirmación
				$data['usuari']=$u;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/baja1', $data);
				$this->load->view('templates/footer', $data);
		
				//si nos están enviando la confirmación de baja
			}else{
					
				if(!$u->borrar())
					show_error('No es pot procesa la baixa',404,'Error al intentar donar de baixa');

					//mostrar la vista de éxito

					$data['mensaje'] = 'Eliminat OK';
					$this->load->view('templates/header', $data);
					$this->load->view('result/exit', $data);
					$this->load->view('templates/footer', $data);
			}
		}
	public function alumne($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$this->load->model('PreinscripcionsModel');
			$this->load->model('subscripcionsModel');
			$this->load->model('AreesModel');
			$this->load->model('cursModel');
			
			$alumne=new UsuarioModel();
			$alumne->id=$id;
			$alumne=$alumne->getUsuario2();
			
			$pre=new PreinscripcionsModel();
			$pre->id_usuari=$id;
			$preinsc=$pre->getPreinscripcions();
			$curspreins=array();
			if(count($preinsc)>=1){
				foreach ($preinsc as $p=>$v){
					$curs= new CursModel();
					$curs=$curs->getCurs($v->id_curs);
					$curspreins[]=$curs[0];
				}
			}
			$sub=new SubscripcionsModel();
			$sub->id_usuari=$id;
			$subscri=$sub->getSubscripcions();
				
			$alusubs=array();
			if(count($subscri)>=1){
				foreach ($subscri as $p=>$v){
					$area= new AreesModel();
					$area->id=$v->id_area;
					$area=$area->getArea();
					$alusubs[]=$area[0];
				}
			}
			$data['alusubs']=$alusubs;
			$data['cursos']=$curspreins;
			$data['alumne']=$alumne;
			$data['usuario']=$usuario;
			$this->load->view('templates/header', $data);
			$this->load->view('usuario/detall', $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>