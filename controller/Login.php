<?php 
require_once(dirname(__FILE__).'\UsuarioControl.php');
//Metodo POST OU GET;
//filtro contra MYSQL INJECTION / PHP INJECTION
$metodo = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verifica se as informações foram enviadas, se sim retornam o valor nas variaveis
$login = isset($metodo['login'])?$metodo['login']:NULL;
$senha = isset($metodo['senha'])?$metodo['senha']:NULL;
$perSeg = isset($metodo['perSeg'])?$metodo['perSeg']:NULL;
$resp = isset($metodo['resp'])?$metodo['resp']:NULL;

$control = new UsuarioControl();
$lUser = new Usuario();
$lUser->setLogin($login);
$lUser->setSenha($senha);
if($control->loginUsuario($lUser)){
    session_start();
    $usuario = $control->buscarDados($lUser);
    $_SESSION["autenticado"] = serialize($usuario);
    header("Location: ../");
}else{
    header("Location: ../login?erro");
}

 