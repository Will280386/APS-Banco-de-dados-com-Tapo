<?php
include_once(dirname(__FILE__).'\Conexao.php');
require_once(MODEL.'\NotificacaoModel.php');

Class NotificacaoControl {
	/*
	* Nesta função o banco de dados é consultado para acionar as notificações caso o usuário tenha alguma
	*/
	public function getNotificacao($userId){
	     $controlC = new ComentarioControl();
	     $comentario = new Comentario();
	     $mysqli = abrirConexao();
	     $sql = "SELECT * FROM notificacoes WHERE id_usuario = '".$userId."'";
	     $result = $mysqli->query($sql);
	     if($result->num_rows > 0){
	        $rows = $result->num_rows;
	        $i = 0;
	        echo "<a data-toggle='popover' title='Suas Notificações' data-content=\"";
	        
	        while($dados = $result->fetch_array()){
	           $i+=1;
	           $comentario->setId($dados['id_comentario']);
	           $comentario = $controlC->buscarDados($comentario);
	           echo "<a href='/postagem/". $comentario->getIdPostagem() ." '>" ;
	           echo $dados['notificacao']. "</a><br>";
	            if($i < $rows){
	                echo "<hr class=my-2>";
	            }
	        }
	        echo "\">".$result->num_rows."</a>";
	     }else{
	        echo 0;
	     }
	}
	public function addNotificacao(Notificacao $notificacao){
		$id_usuario = $notificacao->getIdUsuario();
		$id_comentario = $notificacao->getIdComentario();
		$notificacao = $notificacao->getNotificacao();

		$mysqli = abrirConexao();
		$sql = "INSERT INTO notificacoes (id_usuario,id_comentario,notificacao) VALUES (?,?,?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param('iis',$id_usuario,$id_comentario,$notificacao);
		if($stmt->execute()){
			return true;
		}else{
			echo "Erro ao inserir Notificacao ".PHP_EOL.$stmt->error;
			return false;
		}
	}
}