<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Página inicial</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/segundoEstilo.css">
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#btn-abrirNav" aria-controls="btn-abrirNav" aria-expanded="false" aria-label="Abrir Menu">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" id="logo" href="#"><span class="corPrimaria">Proto</span><span class="corSecundaria">Type</span></a>

  <div class="collapse navbar-collapse" id="btn-abrirNav">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Postagens</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Portal</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>




<div class="container-fluid" id="main">
	<div class="row" id="tudo">
		<div class="col-3 border-right" id="menu">

			<form  method="GET" action="http://localhost"  class="p-2">
				<div class="form-group"align="left" >
					<label for="emailLogin">Email:</label>
					<input type="email" name="emailLogin" class="form-control" id="emailLogin" placeholder="exemplo@prototype.com">
					<small id="ajudaEmail" class="form-text text-muted">Não passe seus dados para ninguem</small>
				</div>
				<div class="form-group "align="left">
					<label for="senhaLogin">Senha:</label>
					<input type="password" name="senhaLogin" class="form-control" id="senhaLogin" placeholder="Senha">
				</div>
				<button type="submit" class="btn btn-secondary">Entrar</button>
			</form>
			
		</div>
		<div class="col-9" id="conteudo">
					<div class="card postagem text-center">
					  <div class="card-body" >
					  	<div class="text-left"><a class="card-title text-decoration-none" id="titulo-postagem" href="#">Mas namoral como que se faz pra fazer isso?</a>
					  	<p class="card-text">Não consigo entender como faz pra poder ter o q eu queria ter naquela epoca e tal</p></div>
					    
					    
						<p class="card-text">
					    <small class="text-muted">05/11/2019 19:49| Lucas Mendes em<Br><b>Python</b></small></p>
					  </div>
				</div>
		</div>
	</div>


</div>
</body>
</html>