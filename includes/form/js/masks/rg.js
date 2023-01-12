function Rg(valor, id) {
    valor = valor.replace(/\D/g, "");
    valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{1})$/, "$1.$2.$3-$4");
    document.getElementById(id).value = valor;
}