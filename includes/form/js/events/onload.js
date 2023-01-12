window.onload = function () {

    viaCep('CEP_E13', 'xBairro_E09', 'xMun_E11', 'UF_E12', 'xLgr_E06');
    viaCep('CEP_C13', 'xBairro_C09', 'xMun_C11', 'UF_C12', 'xLgr_C06');

    camposMoeda = Array.prototype.slice.call(document.getElementsByClassName('formatar-moeda'), 0);
    camposMoeda.forEach(element => {
        formatarMoeda(element);
    });
}

// Moedas
function formatarMoeda(el) {
    if (validandoMoeda(el.value)) {
        el.value = parseInt((el.value).replace(/[^0-9]/g, ''));
        el.value = contandoCasasDecimais('R$ ' + (parseInt(el.value) / 100).toString().replace(".", ","));
    } else {
        el.value = '';
    }
}
function validandoMoeda(el) {
    if (parseInt((el).replace(/[^0-9]/g, '')) || el.substr(-1, 1) == '0') {
        return true;
    }
}

function contandoCasasDecimais(el) {
    if (!el.includes(',')) {
        return el + ',00';
    }

    if (el.toString().split(',')[1].length == 1) {
        return el + '0';
    }
    return el;
}

// ViaCep
const viaCep = async (cep, bairro, municipio, estado, logradouro) => {
    if (document.getElementById(cep).value.length == 8) {
        const response = await fetch(`https://viacep.com.br/ws/${document.getElementById(cep).value}/json/`)
        const data = await response.json();

        if (data != null) {
            document.getElementById(bairro).value = data.bairro;
            document.getElementById(municipio).value = data.localidade;
            document.getElementById(estado).value = data.uf;
            document.getElementById(logradouro).value = data.logradouro;
        }
    }
}