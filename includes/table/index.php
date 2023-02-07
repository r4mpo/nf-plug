<?php
require_once __DIR__ . '/../../../../../wp-admin/admin.php';
$orders = wc_get_orders(array('status' => 'completed'));
$nf_plug_admin = new nf_plug_admin(nf_plug_BASE_NAME, nf_plug_PLUGIN_SLUG, nf_plug_VERSION);
$configuracoes = get_option('nf_plug_dados');
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
                                <a href='../form/form.php?id=<?php echo base64_encode($order->get_id()) ?>'
                                    target="_blank"><button type="button" title="Emitir" class="btn btn-outline-primary"><i
                                            class="bi bi-file-earmark-text"></i></button>
                                </a>
                            <?php } elseif ($nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'situacao_nota_fiscal_plug') == 'Cancelado') { ?>
                                <i style="color: red;" title="Cancelado" class="bi bi-x-circle-fill"></i>

                            <?php } else { ?>
                                <a href="../form/pdf/<?php echo $nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'pdf_nota_fiscal_plug'); ?>"
                                    target="_blank" rel="noopener noreferrer"><button type="button" title="Baixar PDF"
                                        class="btn btn-outline-danger"><i class="bi bi-filetype-pdf"></i></button></a>
                                <a href="../form/xml/<?php echo $nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'xml_nota_fiscal_plug'); ?>"
                                    target="_blank" rel="noopener noreferrer"
                                    download="../form/xml/<?php echo $nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'xml_nota_fiscal_plug'); ?>"><button
                                        type="button" title="Baixar XML" class="btn btn-outline-success"><i
                                            class="bi bi-filetype-xml"></i></button></a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalEmail"
                                    title="Enviar NF-e por e-mail" class="btn btn-outline-dark"><i
                                        class="bi bi-envelope-at"></i></button>
                            <?php } ?>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="modalEmailLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../form/backend/enviar-email-nfe.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalEmailLabel">Enviar NF-e</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="chave_nf_plug" class="col-form-label">Chave de acesso:</label>
                                            <input readonly type="text" class="form-control" name="chave_nf_plug"
                                                value="<?php echo $nf_plug_admin->buscarCampoPersonalizadoEmPedidos($order->get_id(), 'chave_nota_fiscal_plug'); ?>"
                                                id="chave_nf_plug">
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailCliente" class="col-form-label">Endereços de e-mail separados
                                                por ",":</label>
                                            <textarea class="form-control" name="emailCliente"
                                                id="emailCliente"><?php echo $order->get_billing_email(); ?></textarea>
                                        </div>

                                        <!-- Configurações -->
                                        <input type="hidden" class="validate-config" name="cnpj"
                                            value="<?php echo $configuracoes['cnpj']; ?>">
                                        <input type="hidden" class="validate-config" name="grupo"
                                            value="<?php echo $configuracoes['grupo']; ?>">
                                        <input type="hidden" class="validate-config" name="email_adm"
                                            value="<?php echo get_user_meta($adm->ID, 'billing_email', true); ?>">
                                        <input type="hidden" class="validate-config" name="assunto"
                                            value="<?php echo $configuracoes['assunto']; ?>">
                                        <input type="hidden" class="validate-config" name="texto"
                                            value="<?php echo $configuracoes['texto']; ?>">
                                        <input type="hidden" class="validate-config" name="senha"
                                            value="<?php echo $configuracoes['senha']; ?>">
                                        <input type="hidden" class="validate-config" name="nome"
                                            value="<?php echo $configuracoes['nome']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
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