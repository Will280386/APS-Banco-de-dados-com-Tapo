<?php
require_once(dirname(__FILE__).'\..\config.php');
/*Conexão Mysql
 *HOSTNAME - Endereço de Conexão
 *DB_USER - Usuário de Acesso a Base de Dados
 *DB_PASS - Senha de Acesso a Base de Dados
 *DB_NAME - Nome do banco.
*/

//Conexão utilizando MYSQLI - OO

/**
 * @return mysqli | bool mysqli se for possivel conectar ou false se não
*/

function abrirConexao(){
    $mysqli = new mysqli(HOSTNAME, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno){
        echo "Erro ao Abrir Conexão com MYSQL \n";
        echo "ERRNO: " . $mysqli->connect_errno . "\n";
        echo "ERROR: " . $mysqli->connect_error. "\n";
        return false;
    }else{
        return $mysqli;
    }
} 


function fecharConexao(mysqli $mysqli){
    $mysqli->close();
}

