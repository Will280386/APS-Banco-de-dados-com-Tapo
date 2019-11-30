<?php 
require_once(dirname(__FILE__).'\..\config.php');
require_once(CONTROL.'\PostagemControl.php');

?>
<div class="container-fluid">
	<?php 
		$control = new PostagemControl();
		$controlU = new UsuarioControl();
		if(isset($_GET['id_postagem'])){
			$postagem = new Postagem();
			$postagem->setId($_GET['id_postagem']);
			$postagem = $control->buscarDados($postagem);
			$autor = new Usuario();
			$autor->setId($postagem->getIdAutor());
			$autor = $controlU->BuscarDados($autor);
			echo "
                <div class = 'row'>
                    <div class='col p-2'>
                        <div class = 'card bg-light'>
                            <div class = 'card-body'>
                                <a class ='card-title text-decoration-none' href=''>#". $postagem->getId() ." ". $postagem->getTitulo() ."</a>


                                <p class = 'card-text'>
                                ".$postagem->getDescricao()."
                                </p>

                                <div class = 'card-text text-right'>
                                    <small class='text-muted'>".$postagem->getData()."|".$autor->getNome()." em <br>"
                                .       "<h5><a class = 'badge badge-dark m-1' href=''> 
                                         ". $control->getMarcador($postagem->getId()) ."
                                        </a></h5>
                                    </small>";
                if($postagem->getIdAutor() == unserialize($_SESSION['autenticado'])->getId())
                    echo"<div class='card-text text-left btn-apagar'>
                                        <a class='btn btn-danger' role='button' href='/postagem/".$postagem->getId()."/del'>
                                            Apagar
                                        </a>
                                    </div>";
                echo "
                                </div>"
                            ."</div> 
                        </div> 
                    </div> 
                </div>";
		}else{
			$control->gerarPostagens();
		}
	?>
    
</div>
