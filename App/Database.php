<?php 

class Database extends PDO
{
	private $host='localhost';
	private $user='root';
	private $pass='';
	private $base='logistica';
	public function __construct(){
		parent::__construct('mysql:host='.$this->host.';dbname='.$this->base,$this->user,$this->pass);
	
	}

}