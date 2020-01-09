<?php
class USUARIOS{
	private $con;
  private $usu_id;
  private $usu_login;
  private $usu_senha;
  private $usu_tipo;


	function __construct(){
		$conexao = new Conexao();
		$this->con = $conexao->abrirConexao();
	}


  public function getUsu_id(){
		return $this->usu_id;
	}

	public function setUsu_id($usu_id){
		$this->usu_id = $usu_id;
	}

	public function getUsu_login(){
		return $this->usu_login;
	}

	public function setUsu_login($usu_login){
		$this->usu_login = $usu_login;
	}

	public function getUsu_senha(){
		return $this->usu_senha;
	}

	public function setUsu_senha($usu_senha){
		$this->usu_senha = $usu_senha;
	}

	public function getUsu_tipo(){
		return $this->usu_tipo;
	}

	public function setUsu_tipo($usu_tipo){
		$this->usu_tipo = $usu_tipo;
	}

	public function Login(){
		try {
			$sql = "SELECT * FROM `usuarios` WHERE `usu_login` = :usu_login AND `usu_senha` = :usu_senha";
			$rs = $this->con->prepare($sql);
			$rs->bindValue(':usu_login', $this->usu_login, PDO::PARAM_STR);
			$rs->bindValue(':usu_senha', $this->usu_senha, PDO::PARAM_STR);
			$rs->execute();
			if ($rs->rowCount() > 0) {
				$row = $rs->fetch(PDO::FETCH_OBJ);
				$_SESSION["usu_login"] = $row->usu_login;
				return array("status" => 0, "mensagem" => "Carregando...");
			}else{
				session_unset();
				session_destroy();
				return array("status" => 0, "mensagem" => "Usuário não encontrado");
			}
		} catch (PDOException $th) {
			echo "Error login".$th->getMessage();
		}
	}
}