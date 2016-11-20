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
		
		public function borrar($id){
			$curso=new CursModel();
			$curso=$curso->getCurs($id);
			$curso=$curso[0];
			//si no arriba l aconfirmacio per post obrim la confirmacio
			if (empty($this->input->post('delete'))){
				$data['curso']=$curso;
				$data['usuario']=Login::getUsuario();
				$this->load->view('templates/header', $data);
				$this->load->view('cursos/borrar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
				if (!$curso->borrar())
					show_error('No es pot esborrar',165,'Error al esborrar');
				
				$data['usuario']=Login::getUsuario();
				$data['mensaje']='Curs esborrat correctament';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
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
		public function modificar($id){
			//si no han pitjat el boto modificar mostrem el formulari
			$curs=new CursModel();
			$curs=$curs->getCurs($id);
			$curs=$curs[0];
			if (empty($this->input->post('modificar'))){
				$data['curs']=$curs;
				$data['usuario']=Login::getUsuario();
				$this->load->view('templates/header', $data);
				$this->load->view('cursos/modificar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
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
				if(!$curs->actualitzar())
					show_error('error al modificar el curs',207,'Error al modificar');
		
					self::llistar($p=1,$f=10);
			}
		}
		
	}
				