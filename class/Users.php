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
		$result=$sql->select("SELECT * FROM tb_users WHERE iduser= :id", array(
			":id"=>$id
		));

		if(count($result)>0){

			//so tem uma linha
			$row = $result[0];

			$this->setIduser($row['iduser']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			//Por o formato de hora direito
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}

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