<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class SubscripcionsModel extends CI_Model{
		//PROPIEDADES.
		public $id_usuari, $id_area, $data_hora;
			
		//METODOS
		//lee subscripciones de un Alumno
		public function getSubscripcions(){
		
			$consulta = "SELECT * FROM subscripcions WHERE id_usuari = '$this->id_usuari';";
			
			return $this->db->query($consulta)->custom_result_object('SubscripcionsModel');
		}
		
		//este método sirve para recuperar una subscripcion de un alumno
		public function getSubscripcio(){
		
			$consulta="SELECT * FROM subscripcions WHERE id_usuari='$this->id_usuari' AND id_area='$this->id_area';";
				
			return $this->db->query($consulta)->custom_result_object('SubscripcionsModel');
		}
		
		//guarda la Subscripcions en la BDD
		public function guardarS(){
			
			$consulta = "INSERT INTO subscripcions(id_usuari, id_area)
			VALUES ('$this->id_usuari','$this->id_area');";
				
			return $this->db->query($consulta);
		}
		
		
		
		//elimina una preinscripción de un Alumno y Area de la BDD
		public function borrarSAS(){
			
			$consulta = "DELETE FROM subscripcions WHERE id_usuari='$this->id_usuari' AND id_area='$this->id_area';";
			return $this->db->query($consulta);
		}
		
		//elimina todas las  subscripciones de un Alumno BDD
		public function borrarSA(){
				
			$consulta = "DELETE FROM subscripcions WHERE id_usuari='$this->id_usuari';";
			return $this->db->query($consulta);
		}
		
		//elimina todas las  subscripciones de un Area BDD
		public function borrarPC(){
		
			$consulta = "DELETE FROM subscripcions WHERE id_curs='$this->id_curs';";
			return $this->db->query($consulta);
		}
		
	}

			