function validate(){
	document.getElementById('form-login').classList.add('was-validated');
}
function validarPergunta(){
	document.getElementById('form-pergunta').classList.add('was-validated');
}
function validarComentario(){
	document.getElementById('form-comentario').classList.add('was-validated');
}
$(document).ready(function(){
      $('#telefone').mask('(00) 0 0000-0000');
});

$(function () {
  $('[data-toggle="popover"]').popover({html: true})
})