<?php 

class documentoModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
	}
	/*public function listaProducto($cod){
		$query=$this->db->prepare('select * from producto where codigo="'.$cod.'"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}*/

	public function listaPersonal(){
		$query=$this->db->prepare('select * from personal');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}

	public function listaDoc($_ruc){
		$query=$this->db->prepare('select * from cliente where numDoc="'.$_ruc.'"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}

	public function listaVendedor($_nombre){
		$query=$this->db->prepare('select * from vendedor where nombre like "%'.$_nombre.'%"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}

	public function listaProducto($_codigo){
		$query=$this->db->prepare('select * from product where codigo="'.$_codigo.'"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}
	public function validarStock($_codigo){
		$query=$this->db->prepare('select * from product where codigo="'.$_codigo.'"');
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}

	public function grabar($codigo,$producto,$precio,$cantidad,$importe){
		$query=$this->db->prepare('INSERT INTO documentoDetalle(codigo,producto,precio,descuento,cantidad,importe) VALUES("'.$codigo.'","'.$producto.'","'.$precio.'",0,"'.$cantidad.'","'.$importe.'")');
		//$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$data=$query->fetchAll();
		
		return $data;
	}


}
