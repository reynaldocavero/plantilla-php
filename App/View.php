<?php 
class View {
	private $controller;

	public function __construct($_view){
		$this->controller=$_view;
	}

	public function render($view){
		$pathView='C:\\xampp\\htdocs\\REYNALDO\\View\\'.$this->controller.'\\'.$view.'.php';
		if (is_readable($pathView)) {
			if ($this->controller=='prueba') {
				//require_once ROOT.'views'.DS.'layout'.DS.'header.php';
				require_once $pathView;
			
				//require_once ROOT.'views'.DS.'layout'.DS.'footer.php';
			}else if($this->controller=='documento'){
				//require_once ROOT.'views'.DS.'layout'.DS.'header.php';
				require_once $pathView;
		
				//require_once ROOT.'views'.DS.'layout'.DS.'footer.php';

			}else if($this->controller=='login'){
				//require_once ROOT.'views'.DS.'layout'.DS.'header.php';
				require_once $pathView;
			
				//require_once ROOT.'views'.DS.'layout'.DS.'footer.php';

			}else{
				echo 'Error en la vista';
			}
		}else{
			echo 'Error en la vista';
		}
	}
}