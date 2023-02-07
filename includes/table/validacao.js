function validarFormulario() {
    document.getElementById('progress_bar').innerHTML += `<div class="bloc-section"><div class="container text-center" style="width: 50%;"><div class="text-center"><div class="spinner-border" role="status"><span class="sr-only"></span></div></div></div></div>`
    document.getElementById('bloco-de-botoes').style.display = 'none';
    document.getElementById('campos_modal_form').style.filter = 'blur(4px)';
    document.getElementById('modal_email').submit();
}