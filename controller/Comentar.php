<?php
include_once(dirname(__FILE__)."\Conexao.php");
require_once(MODEL."\UsuarioModel.php");

require_once(CONTROL.'\ComentarioControl.php');
session_start();
$autor = unserialize($_SESSION['autenticado']);
$metodo = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Metodo POST OU GET;
//filtro contra MYSQL INJECTION / PHP INJECTION
$metodo = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verifica se as informações foram enviadas, se sim retornam o valor nas variaveis
$conteudo = isset($metodo['comentario'])?$metodo['comentario']:NULL;
$id_postagem = isset($metodo['id_postagem'])?$metodo['id_postagem']:NULL;

$comentario = new Comentario();
$comentario->setIdAutor($autor->getId());
$comentario->setIdPostagem($id_postagem);
$comentario->setComentario($conteudo);

$control = new ComentarioControl();

//Verifica se foi inserido o comentario, se sim envia pra pagina da postagem se não retorna erro

if($control->inserirDados($comentario)){
	header("Location: ../postagem/".$id_postagem);
}else{
	header("Location: ../postagem/".$id_postagem."?erro");
}
