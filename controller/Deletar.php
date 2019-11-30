<?php
require_once (dirname(__FILE__).'\..\config.php');

require_once (CONTROL.'\VerificaLogin.php');
require_once (CONTROL.'\PostagemControl.php');
require_once (CONTROL.'\ComentarioControl.php');

require_once (MODEL.'\PostagemModel.php');
require_once (MODEL.'\UsuarioModel.php');
require_once (MODEL.'\ComentarioModel.php');


$control = new PostagemControl;
$controlC = new ComentarioControl;
if(!isset($_GET['id_postagem'])){
	if(!isset($_GET['comentario'])){
		header("Location: ".HOME_URL);
	} else{
		$id_comentario = $_GET['comentario'];
		$comentario = new Comentario();
		$comentario->setId($id_comentario);
		$comentrario = $controlC->buscarDados($comentario);

		if($comentario->getIdAutor() == $Usuario->getId()){
			$controlC->removerDados($comentario->getId());
			header("Location: ".HOME_URL);
		}else{
		header("Location: ".HOME_URL."/postagem/".$comentario->getIdPostagem()."?erroa");
		}
	}
}else{
	$postPesquisa = new Postagem;
	$postPesquisa->setId($_GET['id_postagem']);
	$postagem = $control->buscarDados($postPesquisa);
	if( $postagem->getIdAutor() == $Usuario->getId() ){
		$control->removerDados($postagem->getId());
		header("Location: ".HOME_URL);
	}else{
		header("Location: ".HOME_URL."/?erroa");
	}
}