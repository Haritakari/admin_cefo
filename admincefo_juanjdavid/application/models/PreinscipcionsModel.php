<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class PreinscripcionsModel extends CI_Model{
		//PROPIEDADES
		public $id_usuari, $id_curs, $data_hora;
			
		//METODOS
		//guarda la preinscripcions en la BDD
		public function guardarP(){
			
			$consulta = "INSERT INTO $user_table(id_usuari, id_curs)
			VALUES ('$this->id_usuari','$this->id_curs');";
				
			return $this->db->query($consulta);
		}
		
		//este método sirve para recuperar una preinscipcion
		public function getPreinscipcio($id_usuari, $id_curs){
				
			$consulta="SELECT * FROM $user_table WHERE id_usuari='$this->id_usuari' AND id_curs='$this->id_curs';";
			$lista=$this->db->query($consulta)->custom_result_object('PreinscripcionsModel');
		
			return $lista;
		}
		
		//elimina una preinscripción de un Alumno y Curso de la BDD
		public function borrarPAC(){
			
			$consulta = "DELETE FROM $user_table WHERE id_usuari='$this->id_usuari' AND id_curs='$this->id_curs';";
			return $this->db->query($consulta);
		}
		
		//elimina todas las  preinscripciones de un Alumno BDD
		public function borrarPA(){
				
			$consulta = "DELETE FROM $user_table WHERE id_usuari='$this->id_usuari';";
			return $this->db->query($consulta);
		}
		
		//elimina todas las  preinscripciones de un Curso BDD
		public function borrarPC(){
		
			$consulta = "DELETE FROM $user_table WHERE id_curs='$this->id_curs';";
			return $this->db->query($consulta);
		}
		
	}

			