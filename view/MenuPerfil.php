<?php

require_once(CONTROL.'\NotificacaoControl.php');
require_once(CONTROL.'\PostagemControl.php');
require_once(CONTROL.'\ComentarioControl.php');

$controlC = new ComentarioControl();
$controlP = new PostagemControl();
$controlN = new NotificacaoControl(); 

?>
<div class="text-center p-3">
				<div class="row">
					<div class="col">
						<img src="/img/usuario.png" alt="" height="75" class="rounded-circle">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<span class="badge badge-secondary"><?php 


						$controlN->getNotificacao($Usuario->getId()); 

						?></span> <small class="text-muted"><?php echo $Usuario->getNome(); ?> </small>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<small class="text-muted"><span class="badge badge-secondary"><?php 
						$controlP->getPostagens($Usuario->getId()); ?></span> Postagens</small>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<small class="text-muted"><span class="badge badge-secondary"><?php 
						$controlC->getComentarios($Usuario->getId()); ?></span> Comentarios</small>
					</div>
				</div>
				<div class="row p-1">
					<div class="col">
						<a class="btn btn-info btn-block" href="/controller/logoff.php">Sair</a>
					</div>
				</div>
			</div>