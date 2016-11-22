<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class CursModel extends CI_Model{
		//PROPIEDADES
		public $nom, $id, $codi,$id_area,$descripcio, $hores, $data_inici,$data_fi,
		$horari, $torn,$tipus,$requisits;
			
		//METODOS
		
		public function guardar(){
			
			$consulta = "INSERT INTO (nom,codi,id_area,descripcio,hores,data_inici,data_fi,horari,torn,requisits)
			VALUES ('$this->nom','$this->codi','$this->id_area','$this->descripcio','$this->hores',
			'$this->data_inici','$this->data_fi','$this->horari','$this->torn','$this->requisits');";
				
			return $this->db->query($consulta);
		}
		
		
		
		public function actualitzar(){
			
			$consulta = "UPDATE cursos
							  SET nom='$this->nom', 
							  codi='$this->codi',
							  id_area='$this->id_area',
							  descripcio='$this->descripcio',
							  hores='$this->hores',
							  data_inici='$this->data_inici',
							  data_fi='$this->data_fi',
							  horari='$this->horari',
							  torn='$this->torn',
							  requisits='$this->requisits'
							  WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		
		
		
		public function borrar(){
			$consulta = "DELETE FROM cursos WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		public function llista($p,$fin){
			
			$princ=$p;
			$princ2=($princ-1)*$fin;
			$consulta="SELECT *	FROM cursos LIMIT $princ2,$fin";
			$query=$this->db->query($consulta);
			$lista=$query->custom_result_object('CursModel');
			return $lista;
		}
		public function calc_query(){
			$consulta="SELECT *	FROM cursos";
			return $this->db->query($consulta)->num_rows();
		
		}
		
		public function getCurs($id){
			$query = $this->db->get_where('cursos',array('id' => $id));
			return $query->custom_result_object('CursModel');
		}
		
		
		
	}

