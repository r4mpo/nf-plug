window.onload = function () {

    viaCep('CEP_E13', 'xBairro_E09', 'xMun_E11', 'UF_E12', 'xLgr_E06', 'cMun_E10');
    viaCep('CEP_C13', 'xBairro_C09', 'xMun_C11', 'UF_C12', 'xLgr_C06', 'cMun_C10');

    camposMoeda = Array.prototype.slice.call(document.getElementsByClassName('formatar-moeda'), 0);
    camposMoeda.forEach(element => {
        formatarMoedaOnLoad(element);
    });
}

// Moedas
function formatarMoedaOnLoad(el) {
    if (validandoMoeda(el.value)) {
        el.value = parseInt((el.value).replace(/[^0-9]/g, ''));
        el.value = contandoCasasDecimais('R$ ' + (divididoPorCem(el.value)).toString().replace(".", ","));
    } else {
        el.value = '';
    }
}

function formatarMoeda(el) {
    if (validandoMoeda(el.value)) {
        el.value = parseInt((el.value).replace(/[^0-9]/g, ''));
        el.value = contandoCasasDecimais('R$ ' + (parseInt(el.value) / 100).toString().replace(".", ","));
    } else {
        el.value = '';
    }
}

function validandoMoeda(el) {
    if (parseInt((el).replace(/[^0-9]/g, '')) != 'NaN' || el.substr(-1, 1) == '0') {
        return true;
    }
}

function divididoPorCem(el) {
    
    if(el.length > 2)
    {
        el = parseInt(el) / 100
    }

    return el;
}

function contandoCasasDecimais(el) {
    if (!el.includes(',')) {
        el = el + ',00';
    }

    if (el.toString().split(',')[1].length == 1) {
        el = el + '0';
    }
    
    return el;
}

// ViaCep
const viaCep = async (cep, bairro, municipio, estado, logradouro, cod_municipio) => {
    if (document.getElementById(cep).value.length == 8) {
        const response = await fetch(`https://viacep.com.br/ws/${document.getElementById(cep).value}/json/`)
        const data = await response.json();

        if (data != null) {
            document.getElementById(bairro).value = data.bairro;
            document.getElementById(municipio).value = data.localidade;
            document.getElementById(estado).value = data.uf;
            document.getElementById(logradouro).value = data.logradouro;
            document.getElementById(cod_municipio).value = data.ibge;
        }
    }
}