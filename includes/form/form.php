<?php
require_once __DIR__ . '/../../../../../wp-admin/admin.php';
$id = base64_decode($_GET['id']);
$order = wc_get_order($id);
$adm = get_user_by('ID', 1);
$valueItems = [];
$configuracoes = get_option('nf_plug_dados');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Ref. externas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


    <!-- Arquivos JavaScript -->
    <script src="js/script.js"></script>
    <script src="js/masks/cpf.js"></script>
    <script src="js/masks/rg.js"></script>
    <script src="js/events/onload.js"></script>
    <script src="js/events/validacao.js"></script>

    <!-- Arquivos CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>
        <?php echo $id; ?> -
        <?php echo $order->get_billing_first_name(); ?>
    </title>
</head>

<body>


    <div class="bloc-section">
        <h3>
            <i class="bi bi-info-square"></i>
            Gera????o da NFe - Pedido WooCommerce n??mero
            #<?php echo $id; ?>
        </h3>
        <hr>
    </div>

    <form action="backend/emitir-nfe.php" target="_blank" id="nfe_form" method="POST">
        <div id="campos-do-formulario">
            <?php
            include_once('sections/introducao.php');
            include_once('sections/emitente.php');
            include_once('sections/adicionais.php');
            include_once('sections/destinatario.php');
            include_once('sections/mercadorias.php');
            include_once('sections/transportador.php');
            include_once('sections/veiculo.php');
            include_once('sections/volumes.php');
            include_once('sections/consideracoes.php');
            include_once('sections/configuracoes.php');
            include_once('sections/enviarEmail.php');
            ?>
        </div>

        <div id="progress_bar">
            <!--  -->
        </div>

        <div class="bloc-section" id="bloco-de-botoes">
            <div class="container text-center">
                <div class="row">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-warning" onclick="retornar()" type="button">Voltar</button>
                        <button class="btn btn-success" onclick="validarFormulario()" type="button">Avan??ar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>