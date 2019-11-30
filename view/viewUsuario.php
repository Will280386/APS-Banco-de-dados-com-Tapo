<?php
require_once (dirname(__FILE__)."\..\config.php");
require_once (CONTROL."\GlobalFunctions.php");
require_once(CONTROL."\VerificaLogin.php");

$control = new UsuarioControl();
$metodo = filter_input_array(INPUT_GET, FILTER_DEFAULT);

if($metodo['login'] != NULL){
    $pUser = new Usuario();
    $pUser->setLogin($metodo['login']);
    $User = $control->buscarDados($pUser);

}else{
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UNIFG Dev Commuity</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container-fluid">
    <form class="form-area">
        <div class="row">
            <div class="col-3">
                <h2>Perfil </h2>
            </div>
            <div class="col-9">
                <img src="../img/FGlogo.png" class="float-right logo" style="width: 100%" alt="">
            </div>
        </div>
        <div class="row">
            <button type="button" class="btn btn-light btn-block" >
              Notificações <span class="badge badge-secondary"><?php getNotificacao($User->getId()) ?></span>
            </button>
        </div>

        <div class="form-group row" >
                                
            <label for="login" class="col-2">
                <p>Usuario:</p>
                
            </label>
                <div class="col-10">
                    <?php
                    echo "<input type='text' name='login' class='form-control' value=' ".$User->getLogin()."' disabled>";
                     ?>
                </div>

        </div> 
        
        <div class="form-group row" >
                                
            <label for="nome" class="col-2">
                <p>Nome:</p>
            </label>
                <div class="col-10">
                    <?php 
                    echo "<input type='text' name='nome' class='form-control' placeholder='Insira seu nome' value= '".$User->getNome()."' disabled>";
                     ?>
                </div>

        </div> 
        
        <div class="form-group row" >
                                
            <label for="telefone" class="col-2">
                <p>Telefone:</p>
            </label>
            <div class="col-4">
                <?php 
                    echo "<input type='text' name='telefone' class='form-control' value= '".$User->getTelefone()."' disabled>";
                     ?>
            </div>
            <label for="matricula" class="col-2">
                <p>Matricula:</p>
            </label>    
            <div class="col-4">
                <?php 
                    echo "<input type='text' name='matricula' class='form-control' value= '".$User->getMatricula()."' disabled>";
                     ?>
            </div>
        </div> 

        <div class="form-group row" >
                                
            <label for="email" class="col-2">
                <p>Email:</p>
            </label>
                <div class="col-10">
                    <?php 
                    echo "<input type='text' name='email' class='form-control' value= '".$User->getEmail()."' disabled>";
                     ?>
                </div>
            
        </div>
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/action.js"></script>
<script src="../js/jquery.mask.min.js"></script>
</body>
</html>