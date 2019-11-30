<?php
include_once(dirname(__FILE__)."\Conexao.php");
require_once(MODEL."\UsuarioModel.php");

/**
* Classe criada para definir os atributos do usuário.
* A função pega as irformações e as atribui para o usuário.
* @return bool retorna falso caso haja algum erro no registro.
*/
class  UsuarioControl{
        
	public function inserirDados(Usuario $iUser){
            $nome = $iUser->getNome();
            $login = $iUser->getLogin();
            $senha = $iUser->getSenha();
            $perSeg = $iUser->getPerSeg();
            $resp = $iUser->getResp();
            $telefone = $iUser->getTelefone();
            $email = $iUser->getEmail();
            $matricula = $iUser->getMatricula();  
            $mysqli = abrirConexao();
            $stmt = $mysqli->prepare("INSERT INTO usuarios (nome,login,senha,perSeg,resp,telefone,email,matricula) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param('sssisssi',$nome,$login,$senha,$perSeg,$resp,$telefone,$email,$matricula);

            if($stmt->execute()){
                return true;
            }else{
                echo "Falha no Registro".PHP_EOL.$stmt->error;
                return false;
            }
            fecharConexao($mysqli);
          
        }
        /**
        * Função que busca por um usuário a partir de algum de seus atributos.
        * @return Usuario | bool que retorna falso caso não encontre nenhum usuário
        */
        public function buscarDados(Usuario $bUser){
            
            if($bUser->getLogin() != NULL){
                $mysqli = abrirConexao();
                $sql = "SELECT * FROM usuarios WHERE login ='". $bUser->getLogin() ."'";
                $result =  $mysqli->query($sql);
                if($result->num_rows > 0){
                    $dados = $result->fetch_assoc();
                    $bUser->setId($dados["id"]);
                    $bUser->setNome($dados["nome"]);
                    $bUser->setLogin($dados["login"]);
                    $bUser->setSenha($dados["senha"]);
                    $bUser->setPerSeg($dados["perSeg"]);
                    $bUser->setResp($dados["resp"]);
                    $bUser->setTelefone($dados["telefone"]);
                    $bUser->setEmail($dados["email"]);
                    $bUser->setMatricula($dados["matricula"]);
                    $bUser->setDataCad($dados["dataCad"]);
                    return $bUser;
                }else{
                    return false;
                }
            }else{
                $mysqli = abrirConexao();
                $sql = "SELECT * FROM usuarios WHERE id ='". $bUser->getId() ."'";
                $result =  $mysqli->query($sql);
                if($result->num_rows > 0){
                    $dados = $result->fetch_assoc();
                    $bUser->setId($dados["id"]);
                    $bUser->setNome($dados["nome"]);
                    $bUser->setLogin($dados["login"]);
                    $bUser->setSenha($dados["senha"]);
                    $bUser->setPerSeg($dados["perSeg"]);
                    $bUser->setResp($dados["resp"]);
                    $bUser->setTelefone($dados["telefone"]);
                    $bUser->setEmail($dados["email"]);
                    $bUser->setMatricula($dados["matricula"]);
                    $bUser->setDataCad($dados["dataCad"]);
                    return $bUser;
                }else{
                    return false;
                }
            }
            fecharConexao($mysqli);
        }
        /*
        * Função que altera as informações do usuário de acordo com sua preferência.
        */
        public function alterarDados(Usuario $aUser, Usuario $nUser){
            
        }
        /**
        * Função de login do usuário no qual ele consulta as informações de login no banco de dados.
        * @return bool que retorna falso caso alguma das informações não esteja certa.
        */
        public function loginUsuario(Usuario $lUser){
            $mysqli = abrirConexao();
            $sql = "SELECT * FROM usuarios WHERE login ='". $lUser->getLogin() ."'";
            $result =  $mysqli->query($sql);
            if($result->num_rows > 0){
                $dados = $result->fetch_assoc();
                if($lUser->getSenha() == $dados["senha"]){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
            fecharConexao($mysqli);
        }
}