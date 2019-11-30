<?php
/*
* Classe de controle de Usuario
* Onde toda relação DAO acontece
*/

//Importando todos os arquivos necessários
require_once(dirname(__FILE__).'\Conexao.php');
//Modelos
require_once(MODEL.'\ComentarioModel.php');
require_once(MODEL.'\PostagemModel.php');
require_once(MODEL.'\NotificacaoModel.php');
require_once(MODEL.'\UsuarioModel.php');
//Controles e DAO
require_once(CONTROL.'\NotificacaoControl.php');
require_once(CONTROL.'\PostagemControl.php');
require_once(CONTROL.'\UsuarioControl.php');
Class ComentarioControl{
	//Função para deletar todos os comentarios
	/**
	**@return bool retorno de true se conseguir apagar todos os comentarios e seus respectivos dados
	*/
	public function deleteAllComentarios($postId){
		$mysqli = abrirConexao();
		/*
		* Primeiro Obtem as informações de todos os comentarios daquela respectiva postagem
		*/
		$sql = "SELECT * FROM comentarios WHERE id_postagem = $postId";
		$result = $mysqli->query($sql);

		//Depois apaga as notificações que cada comentario daquele gerou
		while($dados = $result->fetch_assoc()){
			$sql = "DELETE FROM notificacoes WHERE id_comentario = '".$dados['id_comentario']."'";
			$mysqli->query($sql);
		}
		//Agora apaga todos os comentarios daquela postagem
		$sql = "DELETE FROM comentarios WHERE id_postagem = $postId";
		$mysqli->query($sql);
		//Verifica se sobrou algo
		$sql = "SELECT * FROM comentarios WHERE id_postagem = $postId";
		if($mysqli->query($sql)->num_rows > 0){
			return false;
		}else{
			return true;
		}

		fecharConexao($mysqli);
	}

	/*
	* Esta função tem como objetivo mostrar a quantidade de comentários que a postagem possui
	*/
	public function getComentarios($userId){
	     $mysqli = abrirConexao();
	     $sql = "SELECT * FROM comentarios WHERE id_autor = '".$userId."'";
	     $result = $mysqli->query($sql);
	     echo $result->num_rows;
		fecharConexao($mysqli);
	}

	//Função buscar dados Objetivo auto-explicativo, obter dados através do ID do comentario
	public function buscarDados(Comentario $comentario){
		//Objeto de conexão
		$mysqli = abrirConexao();
		//Variaveis
		$id_comentario = $comentario->getId();
		//String SQL
		$sql = "SELECT * FROM comentarios WHERE id_comentario = $id_comentario";
		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			$dados = $result->fetch_assoc();
			$comentario->setId($dados['id_comentario']);
			$comentario->setIdAutor($dados['id_autor']);
			$comentario->setIdPostagem($dados['id_postagem']);
			$comentario->setComentario($dados['comentario']);
			return $comentario;
		}else{
			return false;
		}
		fecharConexao($mysqli);
	}

	//Função Inserir dados
	public function inserirDados(Comentario $comentario){
		//Objeto de Conexão
		$mysqli = abrirConexao();
		//Variaveis
		$id_autor = $comentario->getIdAutor();
		$id_postagem = $comentario->getIdPostagem();
		$conteudo = $comentario->getConteudo();
		//Objetos de Controle
		$controlN = new NotificacaoControl();
		$controlP = new PostagemControl();
		$controlU = new UsuarioControl();
		//Adiciona o comentario no banco
		$sql = "INSERT INTO comentarios (id_autor,id_postagem,comentario) VALUES (?,?,?)";
		$stmt = $mysqli->prepare($sql);

		$stmt->bind_param('iis',$id_autor,$id_postagem,$conteudo);
		

		//se conseguir executar o Prepared statement
		if($stmt->execute()){

			$id_comentario = $stmt->insert_id;

			$postagem = new Postagem();
			$postagem->setId($id_postagem);
			$postagem = $controlP->buscarDados($postagem);
			var_dump($postagem); 
			$usuario = new Usuario();
			$usuario->setId($id_autor);
			$usuario = $controlU->buscarDados($usuario);
			//Formula a notificação com as informações obtidas
			$notificacaoTXT = "O Usuario ". $usuario->getNome() . " comentou na sua pergunta '" . $postagem->getTitulo()."'";

			//cria um objeto para ser passado na função
			$notificacao = new Notificacao();

			$notificacao->setIdUsuario($postagem->getIdAutor());
			$notificacao->setIdComentario($id_comentario);
			$notificacao->setNotificacao(utf8_encode($notificacaoTXT));

			$controlN->addNotificacao($notificacao);

			return true;
		}else{
			echo "Falha no Registro".PHP_EOL.$stmt->error;
			return false;
		}
		fecharConexao($mysqli);
	}
	public function removerDados($idComentario){
		$mysqli = abrirConexao();
        //FOREIGN KEY
        $sql = "DELETE FROM notificacoes WHERE id_comentario = $idComentario ";
        if(!$mysqli->query($sql)){
            echo "Falha ao Apagar".PHP_EOL.$mysqli->error;
            return false;
        }else{
            $sql = "DELETE FROM comentarios WHERE id_comentario = $idComentario ";
	        if(!$mysqli->query($sql)){
	            echo "Falha ao Apagar".PHP_EOL.$mysqli->error;
	            return false;
	        }else{
	            return true;
	        }
        }
        
        fecharConexao($mysqli);
	}
	public function gerarComentarios(){
		$mysqli = abrirConexao();
        $sql = "SELECT * FROM comentarios ORDER BY id_comentario DESC";
        $result =  $mysqli->query($sql);
        if($result->num_rows > 0){
            while($dados = $result->fetch_array()){
                $sql = "SELECT * FROM usuarios WHERE id = '".$dados['id_autor']."'";
                $results = $mysqli->query($sql);
                $dado = $results->fetch_array();
                echo "<div class='row border m-1'>
						<div class='col-3 text-center border-right my-auto'>
							".$dados['data']." | ".$dado['nome']."
							<br>
							";
				if($dados['id_autor'] == unserialize($_SESSION['autenticado'])->getId() ){
					echo"<a class='btn btn-danger btn-block m-1' role='button'  href='/del/comentario/".$dados['id_comentario']."'	>Apagar</a>";
				}

				echo"</div>
						<div class='col-9 my-4'>
							".$dados['comentario']."
						</div>
					</div>";
                
            }
        }else{
        	echo "<div class='row border m-1'>
        			<div class='col text-center my-4'>
						Sem comentarios nesta publicação
        		    </div>
        		  </div>
        			";
        }

        fecharConexao($mysqli);
	}

}


