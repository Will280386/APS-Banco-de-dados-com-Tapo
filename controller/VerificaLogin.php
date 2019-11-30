<?php
require_once (MODEL.'\UsuarioModel.php');
session_start();
if(!isset($_SESSION["autenticado"])){
        header("Location: ../login?erroa");    
}else{
	$Usuario = unserialize($_SESSION['autenticado']);
}