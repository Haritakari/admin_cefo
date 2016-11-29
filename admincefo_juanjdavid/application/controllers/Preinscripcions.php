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
		public function admi(){
			$idc=$this->input->post('pre');
			$ida=$this->input->post('idp');
			
			$pre=new PreinscripcionsModel();
			$pre->id_curs=$idc;
			$pre->id_usuari=$ida;
			if($pre->getPreinscripcio())
				show_error('No pots preinscriure a un curs al cual ja esta inscrit',404,'error al intentar preinscriure');
			
			if(!$pre->guardarP())
					show_error('No ha pogut enregistrar la Preinscripció',404,'Error en el registre');
		
			header("Refresh:0; url=http://localhost/admincefo_juanjdavid/index.php/usuario/alumne/$ida");
		}
		public function eliminar2($idu,$idc){
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
		
					$curso=new CursModel();
					$curso=$curso->getCurs($idc);
					$prei=new PreinscripcionsModel();
					$prei->id_curs=$idc;
					$preins=$prei->getPreinscripcionsC();
					$usepreins=array();
					if(count($preins)>=1){
						foreach ($preins as $p=>$v){
							$user= new UsuarioModel();
							$user->id=$v->id_usuari;
							$user=$user->getUsuario2();
							$usepreins[]=$user[0];
						}
					}
					$data['usepreins']=$usepreins;
					$data['curso']=$curso;
					$data['usuario']=$usuario;
					$this->load->view('templates/header', $data);
					$this->load->view('cursos/detall', $data);
					$this->load->view('templates/footer', $data);
				}
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
			
				$this->load->model('CursModel');
				$curs=new CursModel();
				$curs->id=$id;
				$curs=$curs->getCurs($id);//
				$curs=$curs[0];
				$pre=new PreinscripcionsModel();
				$pre->id_curs=$id;
				$pre=$pre->getPreinscripcionsC();
				$alusubs=array();
				if(count($pre)>=1){
					foreach ($pre as $p=>$v){
						$alumne=new UsuarioModel();
						$alumne->id=$v->id_usuari;
						$alumne=$alumne->getUsuario2();
						$alusubs[]=$alumne[0];
					}
				}
				$alusubs[]=$curs;
				$data['alusubs']=$alusubs;
		
				$this->load->view('xml/listaxml2', $data);
		}
	}
?>