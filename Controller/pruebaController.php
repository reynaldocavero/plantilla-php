<?php

include('../App/Bootstrap.php');
include('../App/View.php');
include('../App/Controller.php');
include('../App/Model.php');

class pruebaController extends Controller
{
	
	public function __construct()
	{
		parent::__construct('prueba');
	}

	public function index()
	{
		$this->view->render('index');
		
	}

	public function listaPersonal()
	{
		$lista=$this->cargaModelo('prueba');
		$data=$lista->listaPersonal();
		echo json_encode($data);
	}

	
}

Bootstrap::run('prueba','index');