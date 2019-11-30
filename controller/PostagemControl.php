<?php   
require_once(dirname(__FILE__)."\Conexao.php");
require_once(MODEL."\PostagemModel.php");
require_once(MODEL."\UsuarioModel.php");

require_once(CONTROL.'\ComentarioControl.php');
require_once(CONTROL.'\GlobalFunctions.php');
/**
* Classe criada para controlar a postagem e seus atributos.
* A função inserirDados serve para consultar os dados inseridos pelo usuário tanto quanto para pegar os proprios dados "presetados" dele como id_autor.
* @return bool retorna false caso haja algum erro no registro da postagem
*/
class PostagemControl{
    public function removerDados($idPost){
        $mysqli = abrirConexao();
        //FOREIGN KEY
        $sql = "DELETE FROM marcacoes WHERE id_postagem = $idPost ";
        if(!$mysqli->query($sql)){
            echo "Falha ao Apagar".PHP_EOL.$mysqli->error;
            return false;
        }else{
            $controlC = new ComentarioControl();
            if(!$controlC->deleteAllComentarios($idPost)){
                return false;
            }else{
                $sql = "DELETE FROM comentarios WHERE id_postagem = $idPost";
                if(!$mysqli->query($sql)){
                    echo "Falha ao Apagar".PHP_EOL.$mysqli->error;
                    return false;
                }else{
                        //POSTAGEM
                    $sql = "DELETE FROM postagens WHERE id_postagem = $idPost";
                    if(!$mysqli->query($sql)){
                        echo "Falha ao Apagar".PHP_EOL.$mysqli->error;
                        return false;
                    }else{

                        return true;
                    }
                }
            }
        }
        
        fecharConexao($mysqli);
    }
    public function buscarDados(Postagem $post){
        
            $mysqli = abrirConexao();
            $sql = "SELECT * FROM postagens WHERE id_postagem ='". $post->getId() ."'";
            $result =  $mysqli->query($sql);
            if($result->num_rows > 0){
                $dados = $result->fetch_assoc();
                $post->setId($dados["id_postagem"]);
                $post->setIdAutor($dados["id_autor"]);
                $post->setTitulo($dados["titulo"]);
                $post->setDescricao($dados["descricao"]);
                $post->setData($dados["data"]);
                
                return $post;
            }else{
                echo "Erro ao buscar Postagem ".PHP_EOL.$mysqli->error;
                return false;
            }
            fecharConexao($mysqli);
        }
    public function inserirDados(Postagem $post){
            $mysqli = abrirConexao();
            $id_autor = $post->getIdAutor();
            $titulo = $post->getTitulo();
            $descricao = $post->getDescricao();
            $marcacaoId = $post->getMarcacaoId();
            $stmt = $mysqli->prepare("INSERT INTO postagens (id_autor,titulo,descricao) VALUES (?,?,?)");
            $stmt->bind_param('iss',$id_autor,$titulo,$descricao);
            if($stmt->execute()){
                $sql = "SELECT id_postagem FROM postagens WHERE id_postagem = '".$mysqli->insert_id."'";
                $result = $mysqli->query($sql);
                $dados = $result->fetch_array();
                $id_postagem = $dados['id_postagem'];
                $sql = "INSERT INTO marcacoes (id_marcador,id_postagem) VALUES (".$marcacaoId.",".$id_postagem.")";
                $mysqli->query($sql);
                return true;
            }else{
                echo "Falha no Registro".PHP_EOL.$stmt->error;
                return false;
            }
            
            
            
            
            fecharConexao($mysqli);
          
        }
        /*
        * Função que consulta e atribui o marcador de acordo com seu id linkado ao banco de dados 
        */
        public function getMarcador($postId){
        $mysqli = abrirConexao();
        $sql = "SELECT * FROM marcacoes WHERE id_postagem = '".$postId."'";
        $result =  $mysqli->query($sql);
        if($result->num_rows>0){
            $dados = $result->fetch_array();
            $sql = "SELECT * FROM marcadores WHERE id_marcador = '".$dados['id_marcador']."'";
            $result = $mysqli->query($sql);
            $dados = $result->fetch_array();
            return $dados['marcador'];
            }else{
                return FALSE;
            }
        }
        /*
        * Função que organiza as postagens de acordo com seu id.
        */
        public function gerarPostagens(){
        $mysqli = abrirConexao();
        $sql = "SELECT * FROM postagens ORDER BY id_postagem DESC";
        $result =  $mysqli->query($sql);
        $quantidade = 0;
        $vetor = array();
        if($result->num_rows > 0){
            while($dados = $result->fetch_array()){
                $quantidade++;
                $vetor[$quantidade-1] = $dados['id_postagem'];
            }
        }
        for($n=0;$n<count($vetor);$n++){

        }
        $vetor = ordernarInsertion($vetor);

        for($n=0;$n<count($vetor);$n++){
            $sql = "SELECT * FROM postagens WHERE id_postagem = ".$vetor[$n];
            if($result = $mysqli->query($sql)){
                while($dados= $result->fetch_array()){
                    $sql = "SELECT * FROM usuarios WHERE id = '".$dados['id_autor']."'";
                $results = $mysqli->query($sql);
                $dado = $results->fetch_array();
                echo "
                <div class = 'row'>
                    <div class='col p-2'>
                        <div class = 'card bg-light'>
                            <div class = 'card-body'>
                                <a class ='card-title text-decoration-none' href='postagem/".$dados['id_postagem']."'>#". $dados ['id_postagem'] ." ".$dados['titulo']."</a>


                                <p class = 'card-text'>
                                ".$dados['descricao']."
                                </p>

                                <div class = 'card-text text-right'>
                                    <small class='text-muted'>".$dados['data']."|".$dado['nome']." em <br>"
                                .       "<h5><a class = 'badge badge-dark m-1' href=''> 
                                         ". $this->getMarcador($dados['id_postagem']) ."
                                        </a></h5>
                                    </small>";
                if($dados['id_autor'] == unserialize($_SESSION['autenticado'])->getId())
                    echo"<div class='card-text text-left btn-apagar'>
                                        <a class='btn btn-danger' role='button' href='/postagem/".$dados['id_postagem']."/del'>
                                            Apagar
                                        </a>
                                    </div>";
                echo "
                                </div>"
                            ."</div> 
                        </div> 
                    </div> 
                </div>";

                }
            }
        }


























        
        fecharConexao($mysqli);
        }
        /*
* Nesta função o usuário pode consultar as próprias postagens para analisar se foram vistas e receberam resposta
*/
public function getPostagens($userId){
     $mysqli = abrirConexao();
     $sql = "SELECT * FROM postagens WHERE id_autor = '".$userId."'";
     $result = $mysqli->query($sql);
     if($result->num_rows > 0){
        $rows = $result->num_rows;
        $i = 0;
        echo "<a data-toggle='popover' title='Suas Postagens' data-content=\"";
        
        while($dados = $result->fetch_array()){
           $i+=1;
           echo "<a href='/postagem/".$dados['id_postagem']."'> ".$dados['titulo']. "</a><br>";
            if($i < $rows){
                echo "<hr class=my-2>";
            }
        }
        echo "\">".$result->num_rows."</a>";
     }else{
        echo 0;
     }



}
}

