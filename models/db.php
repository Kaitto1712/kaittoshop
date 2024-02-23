<?php
	 class db{
		private $host ='localhost';
		private $user ='root';
		private $pass = '';
		private $database = "kaittoshop";
		private $result =NULL;
		private $conn = NULL;
		private $data;
		public function __construct(){
		$this->connect();
		}
		public function connect(){
			$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->database);
			if(!$this->conn){
				die;
			}else{
				mysqli_set_charset($this->conn,'utf8');
				return $this->conn;
			}
		}
	}
?>

