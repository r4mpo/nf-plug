<?php
require_once __DIR__ . '/../../../../../wp-admin/admin.php';
$orders = wc_get_orders(array('status' => 'completed'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>NF-e PLUG</title>
</head>

<body class="container">
    <table id="maintable" class="display compact cell-border" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Data do pedido</th>
                <th>Total</th>
                <th>Situação</th>
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
                    <td><a target="_blank" href='../form/form.php?id=<?php echo base64_encode($order->get_id()) ?>'>Em desenvolvimento</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot style="background-color: #c0c0c0; color: #ffffff; font-size: 0.9em; ">
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Data do pedido</th>
                <th>Total</th>
                <th>Situação</th>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jszip.min.js"></script>
    <script type="text/javascript" src="js/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/buttons.print.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery.mark.min.js"></script>
    <script type="text/javascript" src="js/datatables.mark.js"></script>
    <script type="text/javascript" src="js/buttons.colVis.min.js"></script>
</body>

</html>