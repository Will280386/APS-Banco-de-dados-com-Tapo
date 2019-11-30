<?php
/*


*/

require_once(dirname(__FILE__)."\Conexao.php");
require_once(CONTROL."\UsuarioControl.php");
require_once(CONTROL."\ComentarioControl.php");
/**
* @return bool retorna false se não for possível executar query
* A função gera as perguntas retiradas a partir do banco de dados, o id da pergunta será armazenada em "value"
*/
function gerarPerguntas(){
	$mysqli = abrirConexao();
        $query = $mysqli->query("SELECT * FROM perguntas");
        if($query->num_rows > 0){
            while ($dados = $query->fetch_array()) {
               echo "<option value=".$dados['idPergunta'].">".$dados['pergunta']."</option>";
            }
        }else{
            echo "Nenhuma";
        }
        fecharConexao($mysqli);
        return false;
	
}

/*
* A função informa os erros de acordo com o que manipulado pelo usuário
*/
function gerarInfo($pag){
    $print = FALSE;
    if($pag == 'login'){
        
        if(isset($_GET['erro'])){
            $info =  "Informações Incorretas";
            $alert = "warning";
            $print = TRUE;
        }else if(isset($_GET['cad'])){
            $info = "Cadastrado com sucesso, faça login";
            $alert = "success";
            $print = TRUE;
        }else if(isset($_GET['erroc'])){
            $info = "Problema de conexão tente novamente";
            $alert = "danger";
            $print = TRUE;
        }else if(isset($_GET['erroa'])){
            $info = "Para acessar UNIFG.dev.Community é necessário uma conta, Faça login ou cadastre-se";
            $alert = "info";
            $print = TRUE;
        }

    }else if($pag == 'index'){
        if(isset($_GET['erro'])){
            $info = "Não foi possivel postar sua pergunta, tente novamente mais tarde.";
            $alert = "danger";
            $print = TRUE;
        }else if(isset($_GET['erroa'])){
            $info = "Não foi possivel apagar a pergunta, você não postou ela.";
            $alert = "danger";
            $print = TRUE;
        }
    }else if($pag == 'cadastro'){
        if(isset($_GET['erro'])){
            $info = "Este usuário já está sendo utilizado";
            $alert = "danger";
            $print = TRUE;
        }
    }else if($pag == 'postagem'){
        if(isset($_GET['erro'])){
            $info = "Não foi possivel postar sua Pergunta";
            $alert = "danger";
            $print = TRUE;
        }else if(isset($_GET['erroa'])){
            $info = "Não foi possivel apagar a Pergunta";
            $alert = "danger";
            $print = TRUE;
        }
    }
    if($print){
        echo "<div class='form-group row' id='info'>
                    <div class='col'>
                        <div class='alert alert-".$alert." alert-dismissible fade show' role='alert'>
                            ".$info."
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                    </div>
                </div>";
    }
}

 function ordernarInsertion($vetor)
{
    //INSERTION SORT, ele organiza todos os dados do vetor através do algoritimo de ordenação insertion sort
    for($i=0;$i<count($vetor);$i++){
        $val = $vetor[$i];
        $j = $i-1;
        //ORGANIZA DA FORMA DECRESCENTE, deixando a ultima postagem em primeiro lugar.
        //O < que faz a diferença na forma que for ser organizado.
        //O algoritmo passa de item em item e verifica de um por um
        while($j>=0 && $vetor[$j] < $val){
            $vetor[$j+1] = $vetor[$j];
            $j--;
        }
        $vetor[$j+1] = $val;
    }
return $vetor;
}
/*
* Esta função mostra com quais marcadores a postagem está atrelada
*/
function getMarcadores(){
    $mysqli = abrirConexao();
     $sql = "SELECT * FROM marcadores";
     $result = $mysqli->query($sql);
     if($result->num_rows > 0){
         while($dados = $result->fetch_array()){
             echo "<option value='".$dados['id_marcador']."'>".$dados['marcador']."</option>";
         }
     }
}