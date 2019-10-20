<?php 
include('../App/Bootstrap.php');
include('../App/View.php');
include('../App/Controller.php');
include('../App/Model.php');
class loginController extends Controller
{
	
	public function __construct()
	{
		parent::__construct('login');
	}

	public function index(){
		$this->view->render('index');
	}

	public function login(){
		$array=json_decode($_REQUEST['usuario']);

		$lista=$this->cargaModelo('prueba');
		$data=$lista->listaPersonal($array->correo,$array->password);

		if(count($data) > 0){
			echo 'http://localhost/REYNALDO/Controller/documentoController.php';
		}else{

			echo '0';
		}
		
	}
}

if(isset($_REQUEST['metodo'])){
	Bootstrap::run('login',$_REQUEST['metodo']);
}else{
	Bootstrap::run('login','index');
}
