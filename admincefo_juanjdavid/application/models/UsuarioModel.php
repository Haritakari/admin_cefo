<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class UsuarioModel extends CI_Model{
		//PROPIEDADES
		public $id, $nom, $cognom1, $cognom2, $dni, $data_naixement, $estudis, $situacio_laboral, $prestacio, $telefon_mobil, 
		$telefon_fix, $email, $admin=0;
			
		public function __construct(){
			
		}
		//METODOS
		//guarda el usuario en la BDD
		public function guardar(){
			$user_table = 'usuaris';
			$consulta = "INSERT INTO $user_table(dni, nom, cognom1, cognom2, data_naixement, estudis, situacio_laboral, prestacio, telefon_mobil,
			telefon_fix, email, admin)
			VALUES ('$this->dni','$this->nom','$this->cognom1','$this->cognom2','$this->data_naixement',
			'$this->estudis','$this->situacio_laboral','$this->prestacio','$this->telefon_mobil','$this->telefon_fix','$this->email',0);";
				
			return $this->db->query($consulta);
		}
		
		
		//actualiza los datos del usuario en la BDD
		public function actualizar(){
			$user_table = 'usuaris';
			$consulta = "UPDATE $user_table
							  SET nom='$this->nom', 
							  		cognom1='$this->cognom1', 
							  		cognom2='$this->cognom2',
							  		data_naixement='$this->data_naixement', 
							  		estudis='$this->estudis', 
							  		dni='$this->dni',
							  		situacio_laboral='$this->situacio_laboral', 
							  		prestacio='$this->prestacio', 
							  		telefon_mobil='$this->telefon_mobil',
							  		telefon_fix='$this->telefon_fix', 
							  		email='$this->email'
							  WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		
		
		//elimina el usuario de la BDD
		public function borrar(){
			$user_table = 'usuaris';
			$consulta = "DELETE FROM $user_table WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		
		
		
		//este método sirve para comprobar user y password (en la BDD)
		public function validar(){
			$user_table = 'usuaris';
			$consulta = "SELECT * FROM $user_table WHERE dni='$this->dni' AND data_naixement='$this->data_naixement';";

			$resultado = $this->db->query($consulta)->num_rows();
			//si hay algun usuario retornar true sino false
			return $resultado;
		}
		
		//este método debería retornar un usuario creado con los datos 
		//de la BDD (o NULL si no existe), a partir de un nombre de usuario
		public function getUsuario(){
			$user_table = 'usuaris';
			$consulta = "SELECT * FROM $user_table WHERE dni='$this->dni';";
			$resultado = $this->db->query($consulta);
			$use = $resultado->custom_result_object('UsuarioModel');
			return $use;
		}	
	}
?>