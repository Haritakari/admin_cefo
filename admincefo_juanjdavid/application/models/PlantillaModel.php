<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class PlantillaModel extends CI_Model{
		//PROPIEDADES
		public $nombre, $id, $caracteristicas,$id_tipo,$id_proveedor, $color, $precio,$precio_proveedor, 
		$stock, $imagen;
			
		//METODOS
		//guarda el producto en la BDD
		public function guardar(){
			
			$consulta = "INSERT INTO producto(nombre,caracteristicas,id_tipo,id_proveedor,color,precio,precio_proveedor,stock,imagen)
			VALUES ('$this->nombre','$this->caracteristicas','$this->id_tipo','$this->id_proveedor','$this->color',
			'$this->precio','$this->precio_proveedor','$this->stock','$this->imagen');";
				
			return $this->db->query($consulta);
		}
		
		
		//actualiza los datos del producto en la BDD
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
		
		
		//elimina el producto de la BDD
		public function borrar(){
			
			$consulta = "DELETE FROM producto WHERE id='$this->id';";
			return $this->db->query($consulta);
		}
		public function calc_query(){
			$consulta="SELECT * FROM producto";
			return $this->db->query($consulta)->num_rows();
			
		}
		//este método sirve para recuperar los productos 
		public function mostrar($p=1,$fin=9){
			
			$princ=$p;
			$princ2=($princ-1)*$fin;
			$consulta="SELECT nombre,caracteristicas,precio,imagen,id FROM producto LIMIT $princ2,$fin";
			$lista=$this->db->query($consulta)->custom_result_object('ProductModel');

			return $lista;
		}
		public function showAll($p=1,$fin=20){
			$query = $this->db->get('vist_prod');
			return $query->custom_result_object('stdClass');
		}
		
		
		
	}

			