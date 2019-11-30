<?php 
require_once (dirname(__FILE__)."\..\config.php");
require_once (CONTROL.'\VerificaLogin.php');
require_once (CONTROL.'\GlobalFunctions.php');


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		Pagina inicial
	</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estiloTeste.css">
</head>
<body>




<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <a class="navbar-brand" href="#">Dev.Community</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href=<?php echo HOME_URL; ?>>Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>














	<div class="container-fluid">
		<div class="row conteudo">
			<div class="col-2 border-right menu">
			
			<?php require_once(VIEW.'\MenuPerfil.php'); ?>

			</div>
			<div class="col-9 ">
				<?php require_once("postagens.php"); ?>
				<div class="card bg-light p-2 m-2">
					<?php gerarInfo('postagem'); ?>
					<h5>Enviar Comentario</h5>
					<form id="form-comentario" action="/controller/Comentar.php" method="POST" class="form-group text-right needs-validation">
						<textarea name="comentario" id="" rows="2" class="form-control" required></textarea><br>
						<div class="row" style="margin-top:-15px; margin-bottom: -40px;">
						<div class="col">
							<div class="invisible">
								<input type="text" name='id_postagem' value=<?php echo $_GET['id_postagem'];?>>
							</div>
							<button type="submit" onclick="validarComentario()" class="btn btn-primary btn-block">Enviar</button>
						</div>
						</div>
						<br>
					</form>
				</div>
				<div class="card bg-light p-2 m-2">
					<h4 class="text-center m-2">Comentarios</h4>
					<?php require_once('comentarios.php');?>
					
				</div>
			</div>
			<div class="col-1 border-left tags">
				<div class="row"><div class="col"><a href=""><span class="badge badge-secondary">PHP</span></a></div></div>
				<div class="row"><div class="col"><a href=""><span class="badge badge-secondary">HTML</span></a></div></div>
				<div class="row"><div class="col"><a href=""><span class="badge badge-secondary">JAVA</span></a></div></div>
				<div class="row"><div class="col"><a href=""><span class="badge badge-secondary">JAVASCRIPT</span></a></div></div>
				<div class="row"><div class="col"><a href=""><span class="badge badge-secondary">CSS</span></a></div></div> 
				

			</div>
		</div>
	</div>





	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/action.js"></script>
<script src="../js/jquery.mask.min.js"></script>
</body>
</html>