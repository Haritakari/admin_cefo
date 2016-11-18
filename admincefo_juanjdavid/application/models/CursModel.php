<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class CursModel extends CI_Model{
		//PROPIEDADES
		public $nom, $id, $codi,$id_area,$descripcio, $hores, $data_inici,$data_fi,
		$horari, $torn,$tipus,$requisits;
			
		//METODOS
		
		public function guardar(){
			
			$consulta = "INSERT INTO producto(nombre,caracteristicas,id_tipo,id_proveedor,color,precio,precio_proveedor,stock,imagen)
			VALUES ('$this->nombre','$this->caracteristicas','$this->id_tipo','$this->id_proveedor','$this->color',
			'$this->precio','$this->precio_proveedor','$this->stock','$this->imagen');";
				
			return $this->db->query($consulta);
		}
		
		
		
		public function actualizar(){
			
			$consulta = "UPDATE producto
							  SET nombre='$this->nombre', 
							  nombre='$this->caracteristicas',
							  nombre='$this->id_tipo',
							  nombre='$this->id_proveedor',
							  nombre='$this->color',
							  nombre='$this->precio',
							  nombre='$this->precio_proveedor',
							  nombre='$this->stock',
							  nombre='$this->imagen'
							  WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		
		
		
		public function borrar(){
			$consulta = "DELETE FROM producto WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		public function llistar($p=1,$fin=10){
			
			$princ=$p;
			$princ2=($princ-1)*$fin;
			$consulta="SELECT id,nom,codi,id_area,descripcio,hores,data_inici,data_fi,
			horari,torn,tipus,requisits	FROM cursos LIMIT $princ2,$fin";
			$lista=$this->db->query($consulta)->custom_result_object('CursModel');

			return $lista;
		}
		public function calc_query(){
			$consulta="SELECT id,nom,codi,id_area,descripcio,hores,data_inici,data_fi,
			horari,torn,tipus,requisits	FROM cursos";
			return $this->db->query($consulta)->num_rows();
		
		}
		
		public function getCurs($id){
			$query = $this->db->get_where('cursos',array('id' => $id));
			return $query->custom_result_object('CursModel');
		}
		
		
		
	}

