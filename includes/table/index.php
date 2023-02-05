<?php
require_once __DIR__ . '/../../../../../wp-admin/admin.php';
$orders = wc_get_orders(array('status' => 'completed'));
$nf_plug_admin = new nf_plug_admin(nf_plug_BASE_NAME, nf_plug_PLUGIN_SLUG, nf_plug_VERSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- DataTable CDN -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Bootstrap CDN -->
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

    <title>NF-e PLUG</title>
</head>

<body class="container">

    <div style="padding: 2% 2% 2% 2%;">

        <table id="example" class="display" width="100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Data do pedido</th>
                    <th>Total</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <th scope="row">
                            <?php echo $order->get_id(); ?>
                        </th>
                        <td>
                            <?php echo $order->get_user()->display_name; ?>
                        </td>
                        <td>
                            <?php echo wc_format_datetime($order->get_date_created(), 'd/m/Y') . ' às ' . wc_format_datetime($order->get_date_created(), 'h:i:s'); ?>
                        </td>
                        <td class="money">R$
                            <?php echo $order->get_total(); ?>
                        </td>
                        <td>
                            <?php echo $nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'situacao_nota_fiscal_plug'); ?>
                        </td>
                        <td>
                            <?php if ($nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'situacao_nota_fiscal_plug') == 'Pendente') { ?>
                                <a href='../form/form.php?id=<?php echo base64_encode($order->get_id()) ?>'><button
                                        type="button" title="Emitir" class="btn btn-outline-primary"><i
                                            class="bi bi-file-earmark-text"></i></button>
                                </a>
                            <?php } elseif ($nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'situacao_nota_fiscal_plug') == 'Cancelado') { ?>
                                <i style="color: red;" title="Cancelado" class="bi bi-x-circle-fill"></i>

                            <?php } else { ?>
                                <button type="button" title="Cancelar" class="btn btn-outline-danger"><i
                                        class="bi bi-x-circle-fill"></i></button>
                                <button type="button" title="Baixar PDF" class="btn btn-outline-secondary"><i
                                        class="bi bi-filetype-pdf"></i></button>
                                <button type="button" title="Baixar XML" class="btn btn-outline-success"><i
                                        class="bi bi-filetype-xml"></i></button>
                                <button type="button" title="Enviar NF-e por e-mail" class="btn btn-outline-dark"><i
                                        class="bi bi-envelope-at"></i></button>
                            <?php } ?>

                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
                    }
                });
            });
        </script>
</body>

</html>