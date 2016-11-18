<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Cursos extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('cursModel');
		}
		
		public function llistar($p=1,$f=10){
			$curso=new CursModel();
			$cursos=$curso->llistar($p,$f);
			
			$numpag=$curso->calc_query();
			$numpag=ceil($numpag/$f);
			
			
			$data['numpag']=$numpag;
			$data['p']=$p;
			$data['cursos']=$cursos;
			$data['usuario']=Login::getUsuario();
			$this->load->view('templates/header', $data);
			$this->load->view('cursos/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		public function curs($id){
			$curso=new CursModel();
			$curso=$curso->getCurs($id);
			
			$data['curso']=$curso;
			$data['usuario']=Login::getUsuario();
			$this->load->view('templates/header', $data);
			$this->load->view('cursos/detall', $data);
			$this->load->view('templates/footer', $data);
		}
		public function eliminar($id){
			$curso=new CursModel();
		}
		public function crear(){
			//si no han pitjat el boto enviar mostrem el formulari
			if (empty($this->input->post('nou'))){
				
				$data['usuario']=Login::getUsuario();
				$this->load->view('templates/header', $data);
				$this->load->view('cursos/nou', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
			$curs= new CursModel();
			$curs->codi=$this->input->post('codi');
			$curs->id_area=$this->input->post('ida');
			$curs->nom=$this->input->post('nom');
			$curs->descripcio=$this->input->post('desc');
			$curs->hores=$this->input->post('hores');
			$curs->data_inici=$this->input->post('di');
			$curs->data_fi=$this->input->post('df');
			$curs->horari=$this->input->post('horari');
			$curs->torn=$this->input->post('torn');
			$curs->tipus=$this->input->post('tipus');
			$curs->requisits=$this->input->post('requisits');
			if(!$curs->guardar())
				show_error('error al guardar el curs',206,'Error al guardar');		

			self::llistar($p=1,$f=10);
			}
		}
	}
				