<?php 
require_once(dirname(__FILE__).'\..\config.php');
require_once(CONTROL.'\ComentarioControl.php');

?>
<div class="container-fluid">
	<?php
	$control = new ComentarioControl();
	$control->gerarComentarios();
	?>

</div>