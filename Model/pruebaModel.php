<?php 

class pruebaModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function listaProducto($cod){
		$query=$this->db->prepare('select * from producto where codigo="'.$cod.'"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}

	public function listaPersonal($correo,$password){
		$query=$this->db->prepare('select * from personal where nombre="'.$correo.'" and cargo="'.$password.'"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}
}