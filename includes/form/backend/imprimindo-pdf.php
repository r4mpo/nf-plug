<?php

$grupo = 'aaa';
$cnpj = 'aaa';
$chaveNota = 'aaa';

# cURL - imprimindo .pdf
curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => "https://managersaas.tecnospeed.com.br:8081/ManagerAPIWeb/nfe/imprime?grupo=$grupo&cnpj=$cnpj&ChaveNota=$chaveNota&Url=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $autorizacao,
        ),
    )
);
$url = curl_exec($curl);
$nomeArquivo = __DIR__ . '/../pdf/' . $_POST['numero_do_pedido_woocommerce'] . '_' . date("Y-m-d h_i_s", time()) . '.pdf';
$nf = copy($url, $nomeArquivo);
curl_close($curl); // fechando o cURL
# Redirecionando o usuário para o pdf salvo da NF-e
header('Location: ' . $_SERVER['REQUEST_URI'] . '/../../pdf/' . basename($nomeArquivo));
?>