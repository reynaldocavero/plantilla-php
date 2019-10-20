<?php 
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__).DS);
class Bootstrap{

	public static function run($controller,$method){
		$controller=$controller.'Controller';
		$method=$method;
		//$arguments=$r->getArguments();
		$pathController='C:\\xampp\\htdocs\\REYNALDO\\Controller\\'.$controller.'.php';
		//echo $pathController;exit;
		if (is_readable($pathController)) {
			require_once $pathController;
			$controller=new $controller;

			//if (is_callable(array($controller, $method))){
				//$method=$r->getMethod();
			//}else{
				//$method='index';
			//}

			//if (isset($arguments)) {
				//call_user_func_array(array($controller, $method), $arguments);
			//}else{
				call_user_func(array($controller, $method));
			//}
		}else{
			header('location:'.base_url);
		}
	}
}