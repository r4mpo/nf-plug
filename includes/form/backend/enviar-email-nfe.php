<?php
# cURL - enviando e-mail com NF-e para destinatários
if (isset($_POST['emailCliente'])) {

    $grupo = $_POST['grupo'];
    $cnpj = $_POST['cnpj'];
    $chaveDaNota = $_POST['chave_nf_plug'];
    $emailAdmin = $_POST['email_adm'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $autorizacao = base64_encode($nome . ':' . $senha);

    $destinatarios = explode(',', (str_replace(' ', '', $_POST['emailCliente'])));
    $assunto = $_POST['assunto'];
    $texto = $_POST['texto'];

    if (isset($_POST['emailCliente']) && $_POST['emailCliente'] != '') {
        for ($i = 0; $i < count($destinatarios); $i++) {
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => "https://managersaas.tecnospeed.com.br:8081/ManagerAPIWeb/nfe/email",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => "Grupo=$grupo&CNPJ=$cnpj&EmailDestinatario=$destinatarios[$i]&ChaveNota=$chaveDaNota&Assunto=$assunto&Texto=$texto&AnexaPDF=1&ConteudoHTML=0&EmailCCo=$emailAdmin&EmailCC=$emailAdmin",
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                        'Authorization: Basic ' . $autorizacao,
                    ),
                )
            );
            $emailEnviado = curl_exec($curl);
            curl_close($curl); // fechando o cURL
        }
    }
}
header('Location: ../../table/index.php');
?>