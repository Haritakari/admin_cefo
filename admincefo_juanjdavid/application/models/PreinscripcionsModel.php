<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class PreinscripcionsModel extends CI_Model{
		//PROPIEDADES.
		public $id_usuari, $id_curs, $data_hora;
			
		//METODOS
		//lee preinscripciones de un Alumno
		public function getPreinscripcions(){
		
			$consulta = "SELECT * FROM preinscripcions WHERE id_usuari = '$this->id_usuari';";
					
			return $this->db->query($consulta)->custom_result_object('PreinscripcionsModel');
		}
		
		
		//guarda la preinscripcions en la BDD
		public function guardarP(){
			
			$consulta = "INSERT INTO preinscripcions(id_usuari, id_curs)
			VALUES ('$this->id_usuari','$this->id_curs');";
				
			return $this->db->query($consulta);
		}
		
		//este método sirve para recuperar una preinscipcion
		public function getPreinscripcio(){
				
			$consulta="SELECT * FROM preinscripcions WHERE id_usuari='$this->id_usuari' AND id_curs='$this->id_curs';";
					
			return $this->db->query($consulta)->custom_result_object('PreinscripcionsModel');
		}
		
		//elimina una preinscripción de un Alumno y Curso de la BDD
		public function borrarPAC(){
			
			$consulta = "DELETE FROM preinscripcions WHERE id_usuari='$this->id_usuari' AND id_curs='$this->id_curs';";
			return $this->db->query($consulta);
		}
		
		//elimina todas las  preinscripciones de un Alumno BDD
		public function borrarPA(){
				
			$consulta = "DELETE FROM preinscripcions WHERE id_usuari='$this->id_usuari';";
			return $this->db->query($consulta);
		}
		
		//elimina todas las  preinscripciones de un Curso BDD
		public function borrarPC(){
		
			$consulta = "DELETE FROM preinscripcions WHERE id_curs='$this->id_curs';";
			return $this->db->query($consulta);
		}
		
	}

			