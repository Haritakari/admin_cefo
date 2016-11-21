<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class AreesModel extends CI_Model{
		//PROPIEDADES
		public $nom, $id;
			
		//METODOS
		
		public function guardar(){
			
			$consulta = "INSERT INTO arees_formatives(nom)
			VALUES ('$this->nom');";
		
			return $this->db->query($consulta);
		}
		
		
		
		public function actualitzar(){
			
			$consulta = "UPDATE arees_formatives
							  SET nom='$this->nom', 
							  id='$this->id'
							  WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		public function getArea(){
			$query= $this->db->get_where('arees_formatives',array('id'=>$this->id));
			return $query->custom_result_object('AreesModel');
		}
		
		
		public function borrar(){
			$consulta = "DELETE FROM arees_formatives WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		public function llistar(){
			$consulta="SELECT id,nom FROM arees_formatives";
			$lista=$this->db->query($consulta)->custom_result_object('AreesModel');
			return $lista;
		}
	}