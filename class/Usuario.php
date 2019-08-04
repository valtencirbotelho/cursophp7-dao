<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){

		return $this->idusuario;
	}

	public function setIdusuario($value){

		$this->idusuario = $value;
	}

	public function getDeslogin(){

		return $this->deslogin;
	}

	public function setDeslogin($value){

		$this->deslogin = $value;
	}

	public function getDessenha(){

		return $this->dessenha;
	}

	public function setDessenha($value){

		$this->dessenha = $value;
	}

	public function getDtcadastro(){

		return $this->dtcadastro;
	}

	public function setDtcadastro($value){

		$this->dtcadastro = $value;
	}

	public function loadbyId($id){

		$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID" => $id
		));

		if(count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}
	}


	public static function getList(){

		$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");		

	}
//Busca uma lista de usuarios que contem parte do Login digitado, no meio ou final do nome
	public static function search($Login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin Like :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$Login."%"
		));
	}

//Busca através do Login e senha do Usuário
	public function login($login, $password){

			$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD ", array(
			":LOGIN" => $login,
			":PASSWORD"=>$password
		));

		if(count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}else{
			throw new Exception("Login e/ou senha inválido!");
			
		}

	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i")

		));
	}
}

 ?>