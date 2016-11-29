<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Subscripcions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('SubscripcionsModel');
		}
		
		//PROCEDIMIENTO PARA LEER SUBSCRIPCIONES (SI LAS HAY).
		public function LeerSubscripciones(){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
			//crear una instancia de Subscripciones
			$p = new SubscripcionsModel();
			$p->id_usuari=$u->id;
			//leer las Subscripciones de un usuario en BDD
			if($p->getSubscripcions()){
				//mostrar la vista de Subscripciones de un usuario
				$data['id_usuari'] = $p->id_usuari;
				$data['id_curs'] = $p->id_curs;
				$data['data_hora'] = $p->data_hora;
				
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista Subscripcions alumne
				$this->load->view('templates/footer', $data);
			}else{
				// ESTE USUARIO NO TIENE SUBSCRIPCIONES
				$data['mensaje'] = "Alumne sense Subscripcions a cap curs";
				$data['usuario']=$u;
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista no exito Subscripcions alumne
				$this->load->view('templates/footer', $data);
			}
		}
		
		//PROCEDIMIENTO PARA REGISTRAR UNA SUBSCRIPCION
		public function inscriure($id_area){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
				//crear una instancia de Subscripciones
				$p = new SubscripcionsModel();
				
				$p->id_usuari=$u->id;
				$p->id_area=$id_area;

				//guardar el usuario en BDD
				if(!$p->guardarS())
					show_error('No ha pogut enregistrar la Subscripció',404,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] =$u;
				$data['mensaje'] = "Operació de registre Subscripció de l'Area satisfactoria";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
		}
		public function admi(){
			$idc=$this->input->post('subs');
			$ida=$this->input->post('ids');
				
			$sub=new SubscripcionsModel();
			$sub->id_area=$idc;
			$sub->id_usuari=$ida;
			if($sub->getSubscripcio())
				show_error('No pots preinscriure un alumne a un curs al cual ja esta inscrit',404,'ERROR al intentar Subscriure');
					
			if(!$sub->guardarS())
				show_error('No ha pogut enregistrar la Subscripció',404,'Error en la preinscripcio');
		
			header("Refresh:0; url=http://localhost/admincefo_juanjdavid/index.php/usuario/alumne/$ida");
		
		}
		
		//PROCEDIMIENTO PARA DAR DE BAJA SUBSCRIPCIONES
		//solicita confirmación
		public function baja(){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
			//crear una instancia de Preinscripciones
			$p = new SubscripcionsModel();
			
			$area= new AreesModel();
			$area= $area->getArea($id_area);
			
			//si no nos están enviando la conformación de baja
			if(!empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
		
				if(!$p->borrarSAS())
					show_error('No es pot procesa la baixa',404,'Error al intentar donar de baixa');

				//mostrar la vista de éxito
				$data['usuario'] = $u;
				$Data['id_area'] = $area;
				$data['mensaje'] = 'Eliminat OK';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		public function eliminarSus($ida,$idu){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
				$this->load->model('AreesModel');
				//crear una instancia de Preinscripciones
				$s = new SubscripcionsModel();
					
				$s->id_usuari=$idu;
				$s->id_area=$ida;
				if(!$s->borrarSAS())
					show_error('No es pot eliminar aquesta subscripcio',404,'Error al intentar eliminar');
					//mostrar la vista de éxito
					header("Refresh:0; url=".base_url()."/index.php/arees/veurell/$ida");
		}
		public function eliminar($idu,$ida){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
			//$this->load->model('AreesModel');
			//crear una instancia de Preinscripciones
			$s = new SubscripcionsModel();
			
			$s->id_usuari=$idu;
			$s->id_area=$ida;
			$confirm=$this->input->post('delete');
			if(empty($confirm)){
				$data['id']=$ida;
				$data['preins'] = $s;
				$data['usuario'] = $u;
				$this->load->view('templates/header', $data);
				$this->load->view('subscripcions/borrar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
			if(!$s->borrarSAS())
				show_error('No es pot eliminar aquesta subscripcio',404,'Error al intentar eliminar');
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
			$curso=new CursModel();
			$cursos=$curso->complet();
				
			$are=new AreesModel();
			$are=$are->llistar();
				
			$data['are']=$are;
			$data['cur']=$cursos;
			$data['alusubs']=$alusubs;
			$data['cursos']=$curspreins;
			$data['alumne']=$alumne;
			$data['usuario']=$usuario;
			$this->load->view('templates/header', $data);
			$this->load->view('usuario/detall', $data);
			$this->load->view('templates/footer', $data);
		}
		public function xml($id){
			$this->load->library('xml_library');
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
				$this->load->model('AreesModel');
				$area=new AreesModel();
				$area->id=$id;
				$area=$area->getArea();
				$area=$area[0];
				$subs=new SubscripcionsModel();
				$subs->id_area=$id;
				$subs=$subs->getSarea();
				$alusubs=array();
				if(count($subs)>=1){
					foreach ($subs as $p=>$v){
						$alumne=new UsuarioModel();
						$alumne->id=$v->id_usuari;
						$alumne=$alumne->getUsuario2();
						$alusubs[]=$alumne[0];
					}
				}
				$alusubs[]=$area;
				$data['alusubs']=$alusubs;
				
				$this->load->view('xml/listaxml', $data);
		}
	}
?>