<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Arees extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AreesModel');
		}
		
		public function llistar(){
			$arees=new AreesModel();
			$arees=$arees->llistar();
	
			$data['arees']=$arees;
			$data['usuario']=Login::getUsuario();
			$this->load->view('templates/header', $data);
			$this->load->view('arees/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		public function modificar($id){
			$area=new AreesModel();
			$area->id=$id;
			$area=$area->getArea();
			$area=$area[0];

			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
			
				//mostramos la vista del formulario
				$data['area']=$area;
				$data['usuario'] =Login::getUsuario();
				$this->load->view('templates/header', $data);
				$this->load->view('arees/modificar', $data);
				$this->load->view('templates/footer', $data);
			
				
			}
			else{
			
				$area->nom = $this->input->post("nom");
				//modificar el area en BDD
				if(!$area->actualitzar())
					show_error('No es pot modificar',159,'Error en la modificacio');
	
			$data['area']=$area;
			$data['usuario']=Login::getUsuario();
			$data['mensaje']='Area modificada correctament';
			$this->load->view('templates/header', $data);
			$this->load->view('arees/modificar', $data);
			$this->load->view('result/exit2', $data);
			$this->load->view('templates/footer', $data);
			}
		}
		
		
	}