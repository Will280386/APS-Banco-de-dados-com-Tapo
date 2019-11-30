<?php
class Usuario{

	//Variaveis
	private $id;
	private $nome;
	private $login;
	private $senha;
	private $perSeg;
	private $resp;
	private $telefone;
	private $email;
	private $matricula;
	private $dataCad;
	private $cargo;

	//Funções  

	/**
	* @return int Retorna o Id do Usuário
	*/
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}


	/**
	* @return string Retorna o Nome do Usuário
	*/
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}


	/**
	* @return string Retorna o Login do Usuário
	*/
	public function getLogin(){
		return $this->login;
	}
	public function setLogin($login){
		$this->login = $login;
	}


	/**
	* @return string Retorna a Senha do Usuário
	*/
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}


	/**
	* @return int Retorna a ID da Pergunta de Segurança do Usuário
	*/
	public function getPerSeg(){
		return $this->perSeg;
	}
	public function setPerSeg($perSeg){
		$this->perSeg = $perSeg;
	}


	/**
	* @return string Retorna a Resposta da Pergunta de Segurança do Usuário
	*/
	public function getResp(){
		return $this->resp;
	}
	public function setResp($resp){
		$this->resp = $resp;
	}


	/**
	* @return string Retorna o Telefone do Usuário
	*/
	public function getTelefone(){
		return $this->telefone;
	}
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}


	/**
	* @return string Retorna o Email do Usuário
	*/
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}


	/**
	* @return int Retorna a Matricula do Usuário
	*/
	public function getMatricula(){
		return $this->matricula;
	}
	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}


	/**
	* @return string Retorna o timestamp do Cadastro do Usuário
	*/
	public function getDataCad(){
		return $this->dataCad;
	}
	public function setDataCad($dataCad){
		$this->dataCad = $dataCad;
	}


	/**
	* @return int Retorna o ID do cargo do Usuário
	*/
	public function getCargo(){
		return $this->cargo;
	}
	public function setCargo($cargo){
		$this->cargo = $cargo;
	}
}