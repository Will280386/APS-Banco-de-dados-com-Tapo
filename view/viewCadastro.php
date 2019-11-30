<?php
require_once (dirname(__FILE__).'\..\config.php');
require_once (CONTROL."\GlobalFunctions.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UNIFG Dev Commuity</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">
    <form method="POST" action="controller/Cadastro.php" id="form-login" class="form-area needs-validation ">
        <div class="row">
            <div class="col-3">
                <h2>Cadastro</h2>
            </div>
            <div class="col-9">
                <img src="img/FGlogo.png" class="float-right logo" style="width: 100%" alt="">
            </div>
        </div>
        <?php 
        gerarInfo('cadastro');
        ?>
        <div class="form-group row" >
                                
            <label for="login" class="col-2">
                <p>Usuario:</p>
            </label>
                <div class="col-10">
                    <input type="text" name="login" class="form-control " placeholder="Insira seu usuario" required autofocus>
                </div>

        </div> 
        
        <div class="form-group row" >
                                
            <label for="nome" class="col-2">
                <p>Nome:</p>
            </label>
                <div class="col-10">
                    <input type="text" name="nome" class="form-control " placeholder="Insira seu nome" required>
                </div>

        </div> 
        
        <div class="form-group row" >
                                
            <label for="telefone" class="col-2">
                <p>Telefone:</p>
            </label>
            <div class="col-4">
                <input type="text" name="telefone" id="telefone" class="form-control " placeholder="(99) 9 9999-9999" required>
            </div>
            <label for="matricula" class="col-2">
                <p>Matricula:</p>
            </label>    
            <div class="col-4">
                <input type="text" name="matricula" id="matricula" class="form-control" maxlength="9" placeholder="999999999" pattern="[0-9]+$" required>
            </div>
        </div> 

        <div class="form-group row" >
                                
            <label for="email" class="col-2">
                <p>Email:</p>
            </label>
                <div class="col-10">
                    <input type="email" name="email" class="form-control " placeholder="seuemail@exemplo.com" required>
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


        <div class="form-group row">
           <div class="col">
                <label for="perSeg" class="perSeg">
                <p>Pergunta de segurança</p>
            </label>
            <select name="perSeg" class="custom-select perSeg" required>
                <option value="">Selecione a Pergunta</option>
                <?php
                gerarPerguntas();
                ?>
            </select>
           </div>
        </div>

        <div class="invalid-feedback">Selecione uma Pergunta de Segurança</div>
        <input type="text" name="resp"  placeholder="Resposta" required>

        <input type="submit" value="Cadastrar" onclick="validate()">

        <a href="/">Ja possui conta?</a> 
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/action.js"></script>
<script src="js/jquery.mask.min.js"></script>
</body>
</html>