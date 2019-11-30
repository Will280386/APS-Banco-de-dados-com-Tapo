<?php 
Class Notificacao {
	private $id_notificacao;
	private $id_usuario;
	private $id_comentario;
	private $notificacao;

	public function getId(){
		return $this->id_notificacao;
	}
	public function setId($id_notificacao){
		$this->id_notificacao = $id_notificacao;
	}
	public function getIdUsuario(){
		return $this->id_usuario;
	}
	public function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}
	public function getIdComentario(){
		return $this->id_comentario;
	}
	public function setIdComentario($id_comentario){
		$this->id_comentario = $id_comentario;
	}
	public function getNotificacao(){
		return $this->notificacao;
	}
	public function setNotificacao($notificacao){
		$this->notificacao = $notificacao;
	}

}