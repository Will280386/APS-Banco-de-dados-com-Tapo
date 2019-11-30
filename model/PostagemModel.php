<?php

class Postagem {

    private $id;
    private $id_autor;
    private $titulo;
    private $descricao;
    private $data;
    private $marcacaoId;
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getIdAutor(){
        return $this->id_autor;
    }
    public function setIdAutor($id_autor){
        $this->id_autor = $id_autor;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getMarcacaoId(){
        return $this->marcacaoId;
    }
    public function setMarcacaoId($marcacaoId){
        $this->marcacaoId = $marcacaoId;
    }
}
