function apenasNumeros(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /^[0-9.]+$/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

function definirValorOutrasDespesas() {
    let frete = document.getElementById('vFrete_W08').value;
    let seguro = document.getElementById('vSeg_W09').value;

    frete = frete.replace('R$ ', '');
    seguro = seguro.replace('R$ ', '');

    if (!frete) {
        frete = 0;
    }

    if (!seguro) {
        seguro = 0;
    }

    let outrasDespesas = document.getElementById('vOutro_W15').value = parseFloat(seguro) + parseFloat(frete);
}

function somarOutrasDespesasNoValorTotalNfe() {
    let valorTotalDosProdutos = document.getElementById('vProd_W07').value;
    let valorTotalOutrasDespesas = document.getElementById('vOutro_W15').value;
    let valorASerPago = document.getElementById('valorASerPago').value;

    valorASerPago = valorASerPago.replace('R$ ', '');
    valorTotalDosProdutos = valorTotalDosProdutos.replace('R$ ', '');

    let valorTotalNfe = parseFloat(valorTotalDosProdutos) + parseFloat(valorTotalOutrasDespesas);
    let valorTotalASerPago = parseFloat(valorASerPago) + parseFloat(valorTotalOutrasDespesas);

    document.getElementById('vPag_YA03').value = 'R$ ' + valorTotalASerPago;
    document.getElementById('vNF_W16').value = 'R$ ' + valorTotalNfe;

}