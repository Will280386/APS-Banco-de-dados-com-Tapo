<?php 
require_once (dirname(__FILE__)."\..\config.php");
require_once (CONTROL."\GlobalFunctions.php");
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
<script src="js/action.js"></script>
<div class="container-fluid">
    <form method="POST" action="controller/Login.php" id="form-login" class="form-area needs-validation ">
        <div class="row">
            <div class="col-3">
                <h2>Inicio</h2>
            </div>
            <div class="col-9">
                <img src="../img/FGlogo.png" class="float-right logo" style="width: 100%" alt="">
            </div>
        </div>
       <?php gerarInfo('login');?>
        <div class="form-group row" >
                                
            <label for="login" class="col-2">
                <p>Usuario:</p>
            </label>
                <div class="col-10">
                    <input type="text" name="login" class="form-control " placeholder="Insira seu usuario" required autofocus>
                </div>

        </div> 


        <div class="form-group row">
            <label for="senha" class="col-2">
                <p>Senha:</p>
            </label>
               <div class="col-10">
                    <input type="password" name="senha" class="form-control" placeholder="Insira sua senha" required>
               </div>
            
        </div>

        <input type="submit" value="Logar" onclick="validate()">

        <a id="senha" href="/recuperarsenha">Esqueceu sua senha?</a>  <a id="cad" href="/cadastro">Ainda não é cadastrado?</a>
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/action.js"></script>

</body>
</html>