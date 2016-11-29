<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Cursos extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('cursModel');
		}
		
		public function llistar($p=1,$f=10){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$this->load->model('cursModel');
			$curso=new CursModel();
			$cursos=$curso->llista($p,$f);
			
			$numpag=$curso->calc_query();
			$numpag=ceil($numpag/$f);
			
			
			$data['numpag']=$numpag;
			$data['p']=$p;
			$data['cursos']=$cursos;
			$data['usuario']=$usuario;
			$this->load->view('templates/header', $data);
			$this->load->view('cursos/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function borrar($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$curso=new CursModel();
			$curso=$curso->getCurs($id);
			$curso=$curso[0];
			//si no arriba l aconfirmacio per post obrim la confirmacio
			$pedo=$this->input->post('delete');
			if (empty($pedo)){
				$data['curso']=$curso;
				$data['usuario']=$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('cursos/borrar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
				if (!$curso->borrar())
					show_error('No es pot esborrar',404,'Error al esborrar');
				
				$data['usuario']=$usuario;
				$data['mensaje']='Curs esborrat correctament';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		public function crear(){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			//si no han pitjat el boto enviar mostrem el formulari
			$this->load->model('AreesModel');
			$crea=$this->input->post('nou');
			if (empty($crea)){
				$arees=new AreesModel();
				$data['arees']=$arees->llistar();
				$data['usuario']=$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('cursos/nou', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
			$curs= new CursModel();
			$curs->codi=$this->db->escape($this->input->post('codi'));
			$curs->id_area=intval($this->input->post('ida'));
			$curs->nom=$this->db->escape($this->input->post('nom'));
			$curs->descripcio=$this->db->escape($this->input->post('desc'));
			$curs->hores=intval($this->input->post('hores'));
			$curs->data_inici=$this->input->post('di');
			$curs->data_fi=$this->input->post('df');
			$curs->horari=$this->db->escape($this->input->post('horari'));
			$curs->torn=$this->db->escape($this->input->post('torn'));
			$curs->tipus=$this->db->escape($this->input->post('tipus'));
			$curs->requisits=$this->db->escape($this->input->post('requisits'));
			if(!$curs->guardar())
				show_error('error al guardar el curs',404,'Error al guardar');		

			self::llistar($p=1,$f=10);
			}
		}
		public function modificar($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			//si no han pitjat el boto modificar mostrem el formulari
			$curs=new CursModel();
			$curs=$curs->getCurs($id);
			$curs=$curs[0];
			$this->load->model('AreesModel');
			$modi=$this->input->post('modificar');
			if (empty($modi)){
				$arees=new AreesModel();
				$data['arees']=$arees->llistar();
				$data['curs']=$curs;
				$data['usuario']=$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('cursos/modificar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
				$curs->codi=$this->db->escape($this->input->post('codi'));
				$curs->id_area=intval($this->input->post('ida'));
				$curs->nom=$this->db->escape($this->input->post('nom'));
				$curs->descripcio=$this->db->escape($this->input->post('desc'));
				$curs->hores=intval($this->input->post('hores'));
				$curs->data_inici=$this->input->post('di');
				$curs->data_fi=$this->input->post('df');
				$curs->horari=$this->db->escape($this->input->post('horari'));
				$curs->torn=$this->db->escape($this->input->post('torn'));
				$curs->tipus=$this->db->escape($this->input->post('tipus'));
				$curs->requisits=$this->db->escape($this->input->post('requisits'));
				if(!$curs->actualitzar())
					show_error('error al modificar el curs',404,'Error al modificar');
		
					self::llistar($p=1,$f=10);
			}
		}
		public function curs($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$this->load->model('preinscripcionsModel');
			$curso=new CursModel();
			$curso=$curso->getCurs($id);
			$prei=new PreinscripcionsModel();
			$prei->id_curs=$id;
			$preins=$prei->getPreinscripcionsC();
			$usepreins=array();
			
			if(count($preins)>=1){
				foreach ($preins as $p=>$v){
					$user= new UsuarioModel();
					$user->id=$v->id_usuari;
					$user=$user->getUsuario2();
					$user[0]->data_hora=$v->data_hora;
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
				