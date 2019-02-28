<?php 

class Users{

	//atributos
	private $iduser;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//Metodos

	//Prop

	public function getIduser(){

		return $this->iduser;
	}

	public function setIduser($value){

		$this->iduser=$value;
	}

	public function getDeslogin(){

		return $this->deslogin;
	}

	public function setDeslogin($value){

		$this->deslogin=$value;
	}

	public function getDessenha(){

		return $this->dessenha;
	}

	public function setDessenha($value){

		$this->dessenha=$value;
	}

	public function getDtcadastro(){

		return $this->dtcadastro;
	}

	public function setDtcadastro($value){

		$this->dtcadastro=$value;
	}

	//Fim Prop


	//outros metodos

	public function loadById($id){

		$sql= new Sql();
		$result=$sql->select("SELECT * FROM tb_users WHERE iduser= :id;", array(
			":id"=>$id));

		if(count($result)>0){

			//so tem uma linha
			//$row = $result[0];
			$this->setData($results[0]);			

			
		}

	}
	

//como nao usamos o this metodo pode ser estatico
	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users ORDER BY deslogin;");
	}

	public static function search($login)
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users WHERE deslogin LIKE :SEARCH ORDER BY deslogin" , array(

			":SEARCH"=>"%".$login."%"
		));
	}

	public function login($login, $password){

		$sql= new Sql();
		$result=$sql->select("SELECT * FROM tb_users WHERE deslogin= :LOGIN and dessenha= :PASSWORD;", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password

		));

		if(count($result)>0){

			//so tem uma linha
			//$row = $result[0];

			$this->setData($results[0]);
		} else {

			throw new Exception("Login e/ou senha invalidos.");
			
		}
	}


	public function setData($data){

			$this->setIduser($data['iduser']);
			$this->setDeslogin($data['deslogin']);
			$this->setDessenha($data['dessenha']);
			//Por o formato de hora direito
			$this->setDtcadastro(new DateTime($data['dtcadastro']));

	}

	public function insert(){

		$sql = new Sql();

		$results=$sql->select("CALL sp_users_insert(:LOGIN, :PASSWORD)", array(

			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()
		));

		if(count ($results)>0){
			$this->setData($results[0]);
		}
	}

	public function update($login, $password){

		$this->setDeslogin($login);
		$this->setDessenha($password);

		
		$sql = new Sql();

		$sql->query("UPDATE tb_users SET deslogin = :LOGIN, dessenha = :PASSWORD  WHERE iduser= :ID", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIduser()
		));
	}

	public function __construct($login="" , $password=""){

		$this->setDeslogin($login);
		$this->setDessenha($password);
	}

	public function __toString(){

		$data = $this->getDtcadastro();

		if ($data){

			$this->getDtcadastro()->format("d/m/Y H:i:s");
		}
		return json_encode(array(

			"iduser"=>$this->getIduser(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$data


		));
	}




}



 ?>