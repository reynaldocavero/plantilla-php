<?php
include('../App/Bootstrap.php');
include('../App/View.php');
include('../App/Controller.php');
include('../App/Model.php');

class documentoController extends Controller
{
	
	public function __construct()
	{
		parent::__construct('documento');
	}

	public function index()
	{

		$this->view->render('index');
		
	}

	public function listaDoc()
	{	$array=json_decode($_REQUEST['ruc']);
	$lista=$this->cargaModelo('documento');
	$data=$lista->listaDoc($array->ruc);
	echo json_encode($data);
}
public function listavendedor()
{	$array=json_decode($_REQUEST['nombre']);
$lista=$this->cargaModelo('documento');
$data=$lista->listavendedor($array->nombre);
echo json_encode($data);
}
public function listaProducto()
{	$array=json_decode($_REQUEST['codigo']);
$lista=$this->cargaModelo('documento');
$data=$lista->listaProducto($array->codigo);
echo json_encode($data);
}

public function validarStock()
{	
	$array=json_decode($_REQUEST['lista']);

	$lista=$this->cargaModelo('documento');
	$data=$lista->validarStock($array->codigo);
	echo json_encode($data);

}


public function grabar()
{	
	$lista=$this->cargaModelo('documento');
	$array = json_decode($_REQUEST['arreglo']);
	foreach( $array  as $r){
		
		$data=$lista->grabar($r->codigo,$r->producto,$r->precio,$r->cantidad,$r->importe);

	}

	print_r($data);
	exit;


	
	
	//echo json_encode($data);

}




public function objectToArray($d) 
{
	if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
    	return $d;
    }
}


}
if(isset($_REQUEST['metodo'])){
	Bootstrap::run('documento',$_REQUEST['metodo']);
}else{
	Bootstrap::run('documento','index');
}
