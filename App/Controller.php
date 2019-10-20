<?php 
abstract class Controller{

	protected $view;
	abstract public function index();

	public function __construct($_controller){
		$this->view=new View($_controller);
		
	}

	protected function cargaModelo($model){
		$model=$model.'Model';
		$pathModel='C:\\xampp\\htdocs\\REYNALDO\\Model\\'.$model.'.php';

		if (is_readable($pathModel)) {
			require_once $pathModel;
			$model=new $model;
			return $model;
		}else{
			echo 'Error de modelo';
		}
	}
}