<?php
Class Comentario {
	private $id_comentario;
	private $id_autor;
	private $id_postagem;
	private $conteudo;

	public function getId(){
		return $this->id_comentario;
	}
	public function setId($id_comentario){
		$this->id_comentario = $id_comentario;
	}
	public function getIdAutor(){
		return $this->id_autor;
	}
	public function setIdAutor($id_autor){
		$this->id_autor = $id_autor;
	}
	public function getIdPostagem(){
		return $this->id_postagem;
	}
	public function setIdPostagem($id_postagem){
		$this->id_postagem = $id_postagem;
	}
	public function getConteudo(){
		return $this->conteudo;
	}
	public function setComentario($com){
		$this->conteudo = $com;
	}
}