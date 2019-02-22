<?php 

//herda da classe nativa PDO
class Sql extends PDO{

	private $conn;

	//faz com que se connecte automaticamente à bd
	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");


	}

	//Passar varios parametros
	private function setParams($statment, $parameters=array()){

		foreach ($parameters as $key => $value) {
			
			$statment->setParam($key, $value);


		}

	}

	//passar somente um parametro
	private function setParam($statment,$key, $valor){

		$statment->bindParam($key, $value);
	}

	//permite fazer querys
	public function query($rawQuery, $params= array()){

		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt ;
		

		}

		public function select($rawQuery,$params=array()):array
		{

			$stmt=$this->query($rawQuery,$params);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}


}


 ?>