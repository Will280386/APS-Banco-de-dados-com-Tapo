<?php
session_start();
require_once(dirname(__FILE__).'\..\config.php');
require_once(CONTROL.'\PostagemControl.php');

require_once(MODEL.'\UsuarioModel.php');
$autor = unserialize($_SESSION['autenticado']);
//Metodo POST OU GET;
//filtro contra MYSQL INJECTION / PHP INJECTION
$metodo = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verifica se as informações foram enviadas, se sim retornam o valor nas variaveis
$titulo = isset($metodo['titulo'])?$metodo['titulo']:NULL;
$descricao = isset($metodo['descricao'])?$metodo['descricao']:NULL;
$id_marcador = isset($metodo['id_marcador'])?$metodo['id_marcador']:NULL;
$control = new PostagemControl();
$post =  new Postagem();
$post->setTitulo($titulo);
$post->setDescricao($descricao);
$post->setIdAutor($autor->getId());
$post->setMarcacaoId($id_marcador);
if($control->inserirDados($post)){
    header("Location: ../");
}else{
    header("Location: ../?erro");
}

