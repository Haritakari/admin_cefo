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
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$data['arees']=$arees;
			$data['usuario']=$usuario;
			$this->load->view('templates/header', $data);
			$this->load->view('arees/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		public function modificar($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$area=new AreesModel();
			$area->id=$id;
			$area=$area->getArea();
			$area=$area[0];
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				//mostramos la vista del formulario
				$data['area']=$area;
				$data['usuario'] =$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('arees/modificar', $data);
				$this->load->view('templates/footer', $data);	
			}
			else{
				$area->nom = $this->input->post("nom");
				//modificar el area en BDD
				if(!$area->actualitzar())
					show_error('No es pot modificar',404,'Error en la modificacio');
			$data['area']=$area;
			$data['usuario']=Login::getUsuario();
			$data['mensaje']='Area modificada correctament';
			$this->load->view('templates/header', $data);
			$this->load->view('arees/modificar', $data);
			$this->load->view('result/exit2', $data);
			$this->load->view('templates/footer', $data);
			}
		}
		public function crear(){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			//si no llegan los datos a modificar
			if(empty($_POST['crear'])){	
				//mostramos la vista del formulario
				
				$data['usuario'] =$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('arees/novarea', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
				$area=new AreesModel();
				$area->nom = $this->input->post("nom");
				//modificar el area en BDD
				if(!$area->guardar())
					show_error('No es pot crear aquesta area formativa',404,'Error al crear');
		
					
					$data['usuario']=$usuario;
					$data['mensaje']='Area creada correctament';
					$this->load->view('templates/header', $data);
					$this->load->view('arees/novarea', $data);
					$this->load->view('result/exit2', $data);
					$this->load->view('templates/footer', $data);
			}
		}
		public function borrar($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$area=new AreesModel();
			$area->id=$id;
			$area=$area->getArea();
			$area=$area[0];
			$this->load->model('CursModel');
			
			//si no llegan los datos a modificar
			if(empty($_POST['delete'])){
				//mostramos la vista del formulario
				$vericurs=new CursModel();
				//verificamos que ningun curso tiene este area asignada
				$vericurs=$vericurs->veriArea($id);
				if($vericurs>=1){
					$mess='No pots borrar un area que estigui vinculada a un cus';
					$stat=404;
					$head='Error al borrar';
					show_error($mess,$stat,$head);
				}

				$data['area']=$area;
				$data['usuario'] =$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('arees/borrar', $data);
				$this->load->view('templates/footer', $data);
			}
			else{
				//borrar el area en BDD
				if(!$area->borrar())
					show_error('No es pot borrar aquesta area formativa',404,'Error al borrar');
					
					$arees=new AreesModel();
					$arees=$arees->llistar();
					
					$data['arees']=$arees;
					$data['usuario']=$usuario;
					$data['mensaje']='Area borrada correctament';
					$this->load->view('templates/header', $data);
					$this->load->view('result/exit3', $data);
					$this->load->view('arees/veure', $data);
					$this->load->view('templates/footer', $data);
			}
		}
		public function veurell($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin)
				redirect(base_url().'index.php');
			$this->load->model('subscripcionsModel');
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
			
				$data['alusubs']=$alusubs;
				$data['area']=$area;
				$data['usuario']=$usuario;
				$this->load->view('templates/header', $data);
				$this->load->view('arees/detall', $data);
				$this->load->view('templates/footer', $data);
		}
	}