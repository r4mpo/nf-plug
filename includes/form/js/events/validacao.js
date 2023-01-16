function validarFormulario() {
    // contabilizando os erros
    let erros = 0;

    // pegando todos os campos a serem validados
    campos = Array.prototype.slice.call(document.getElementsByClassName('validate-form'), 0);

    // verificando se os campos foram preenchidos
    campos.forEach(element => {
        if ((element.value).length == 0) {
            erros++;
            return element.focus();
        }
    });

    // pegando todos as configurações a serem validados
    configs = Array.prototype.slice.call(document.getElementsByClassName('validate-config'), 0);

    // verificando se os campos foram preenchidos
    configs.forEach(element => {
        if ((element.value).length == 0) {
            erros++;
            return alert('Erro. Você deve preencher as informações iniciais.');
        }
    });

    // definindo o valor de outras despesas
        let frete = document.getElementById('vFrete_W08').value;
        let seguro = document.getElementById('vSeg_W09').value;

        frete = frete.replace('R$ ', '');
        seguro = seguro.replace('R$ ', '');
        frete = frete.replace(',', '');
        seguro = seguro.replace(',', '');

        if (!frete) {
            frete = 0;
        }

        if (!seguro) {
            seguro = 0;
        }

        let outrasDespesas = document.getElementById('vOutro_W15').value = (parseFloat(seguro) + parseFloat(frete)) / 100;
    // 

    if(erros == 0) 
    {
        let confirmacao = confirm('Tem certeza que deseja emitir esta nota fiscal?')

        if(confirmacao == true)
        {
            document.getElementById('nfe_form').submit();
        }
    }
}

function retornar()
{
    let confirmacao = confirm('Tem certeza que deseja descartar todas as alterações e retornar?')

    if(confirmacao == true)
    {
        window.location.href = '../table/index.php';
    }
}