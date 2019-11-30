<?php 
/*
	Arquivo Cadastro.php
	Recebe os dados pelo metodo POST
	Instancia um Usuario e o seu controle
	Coloca informações dentro do objeto e verifica se já está sendo utilizado o login
	Verifica o retorno do cadastro, se for verdadeiro, finaliza, se falso retorna uma pagina de erro
*/


if(!defined('CONTROL')){
    define('CONTROL', dirname(__FILE__));
}
require_once(CONTROL.'\UsuarioControl.php');

/*	
	*Metodo POST OU GET;
	*filtro contra MYSQL INJECTION / PHP INJECTION
*/
$metodo = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verifica se as informações foram enviadas, se sim retornam o valor nas variaveis


/*
	Utilizado operador TERNARIO
*/


//Variaveis
$login = isset($metodo['login'])?$metodo['login']:NULL;
$senha = isset($metodo['senha'])?$metodo['senha']:NULL;
$perSeg = isset($metodo['perSeg'])?$metodo['perSeg']:NULL;
$resp = isset($metodo['resp'])?$metodo['resp']:NULL;
$nome = isset($metodo['nome'])?$metodo['nome']:NULL;
$telefone = isset($metodo['telefone'])?$metodo['telefone']:NULL;
$email = isset($metodo['email'])?$metodo['email']:NULL;
$matricula = isset($metodo['matricula'])?$metodo['matricula']:NULL;


//Objetos
$control = new UsuarioControl();
$iUser = new Usuario();


//Funções
$iUser->setLogin($login);
$iUser->setSenha($senha);
$iUser->setPerSeg($perSeg);
$iUser->setResp($resp);
$iUser->setNome($nome);
$iUser->setTelefone($telefone);
$iUser->setEmail($email);
$iUser->setMatricula($matricula);


//Verificação do Usuario
if($control->buscarDados($iUser)){
	//Redirecionamento pagina de ERRO - Usuário Existente
    header("Location: ".HOME_URL."/cadastro?erro");
}else{
	//Inserção de Dados no banco
    if($control->inserirDados($iUser)){
    	//Sucesso
        header("Location: ".HOME_URL."/?cad");
    }else{
    	//Redirecionamento pagina de ERRO - CONEXÃO
    	header("Location: ".HOME_URL."/login?erroc");
    }
}