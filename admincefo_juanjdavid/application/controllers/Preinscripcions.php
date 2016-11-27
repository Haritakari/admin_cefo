<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Preinscripcions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('PreinscripcionsModel');
		}
		public function llistar(){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$pre=New PreinscripcionsModel();
			$pre=$pre->getAllPreinscripcions();
			$data['preinscripcions']=$pre;
			$data['usuario'] = $usuario;
			$data['mensaje'] = 'Eliminat OK';
			$this->load->view('templates/header', $data);
			$this->load->view('preinscripcions/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		
		
		//PROCEDIMIENTO PARA LEER PREINSCRIPCIONES (SI LAS HAY).
		public function LeerPreinscripciones($id_usuari){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			$p->id_usuari=$id_usuari;
		
			//leer las preinscripciones de un usuario en BDD
			if($p->getPreinscripcions()){
				//mostrar la vista de preinscripciones de un usuario
				$data['id_usuari'] = $p->id_usuari;
				$data['id_curs'] = $p->id_curs;
				$data['data_hora'] = $p->data_hora;
				$data['usuario']=$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista preinscripcions alumne
				$this->load->view('templates/footer', $data);
			}else{
				// ESTE USUARIO NO TIENE PREINSCRIPCIONES
				
				$data['mensaje'] = "Alumne sense preinscripcions a cap curs";
				$data['usuario']=$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista preinscripcions alumne
				$this->load->view('templates/footer', $data);
			}
		}
		
		//PROCEDIMIENTO PARA REGISTRAR UNA PREINSCRIPCION
		public function registroP($id_usuari,$id_curs){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
				//crear una instancia de Preinscripciones
				$p = new PreinscripcionsModel();
				$p->id_usuari=$id_usuari;
				$p->id_curs=$id_curs;

				//guardar el usuario en BDD
				if(!$p->guardarP())
					show_error('No ha pogut enregistrar la Preinscripció',404,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] = $usuario;
				$data['mensaje'] = "Operació de registre Preinscripció Curs satisfactoria";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
		}
		
		
		public function eliminar($idu,$idc){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$this->load->model('CursModel');
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			$p->id_usuari=$idu;
			$p->id_curs=$idc;
			//mostrar vista en cas de no rebre per post
			$confirm=$this->input->post('delete');
			if(empty($confirm)){
				$data['id']=$idc;
				$data['preins'] = $p;
				$data['usuario'] = $usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('preinscripcions/borrar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
				if(!$p->borrarPAC())
					show_error('No es pot eliminar aquesta preinscripcio',404,'Error al intentar eliminar');
					//mostrar la vista de éxito

					$this->alumne($idu);
			}
		}
	private function alumne($id){
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