<?php

// Configuração GERAL


header("Content-Type: text/html; charset=UTF-8",true);
//Caminho da RAIZ
define('ABSPATH', dirname(__FILE__));

//URL da HOME
define('HOME_URL', 'http://localhost');

//Endereço do servidor da Base de Dados
define('HOSTNAME', 'localhost');

//Nome do DB
define('DB_NAME', 'baseproj');

//Usuario do DB
define('DB_USER', 'root');

//Senha do DB
define('DB_PASS', '');


//Destinos
define('CONTROL', dirname(__FILE__).'\controller');
define('ERRO', dirname(__FILE__).'\erro');
define('MODEL', dirname(__FILE__).'\model');
define('VIEW', dirname(__FILE__).'\view');