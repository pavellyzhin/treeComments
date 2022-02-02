<?php


class db{

	private $db,$config=[],$con;
	
	function __construct($config){
		$this->config = $config;
	}
	
	public function connect(){
		if($this->con = new mysqli($this->config->host,$this->config->userName,$this->config->password,$this->config->dbName)){
		
		}
	}
	
	
	public function query($query){
		return $this->con->query($query);
	}
}

?>