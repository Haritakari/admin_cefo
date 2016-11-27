<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class CursModel extends CI_Model{
		//PROPIEDADES
		public $nom, $id, $codi,$id_area,$descripcio, $hores, $data_inici,$data_fi,
		$horari, $torn,$tipus,$requisits;
			
		//METODOS
		
		public function guardar(){
			
			$consulta = "INSERT INTO cursos(nom,codi,id_area,descripcio,hores,data_inici,data_fi,horari,torn,tipus,requisits)
			VALUES ('$this->nom','$this->codi','$this->id_area','$this->descripcio','$this->hores',
			'$this->data_inici','$this->data_fi','$this->horari','$this->torn','$this->tipus','$this->requisits');";
				
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
							  requisits='$this->requisits',
							  tipus='$this->tipus'
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
			$consulta="Select u.id,u.codi,u.id_area,u.nom,u.descripcio,u.hores,u.data_inici,u.data_fi,u.horari,u.torn,u.tipus,u.requisits,a.nom as area
			From cursos u right join  arees_formatives a on u.id_area = a.id LIMIT $princ2,$fin";
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
		public function veriArea($idarea){
			$consulta="Select id from cursos where id_area=$idarea";
			return $this->db->query($consulta)->num_rows();
		}
		
		
	}

