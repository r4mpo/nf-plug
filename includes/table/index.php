<?php
require_once __DIR__ . '/../../../../../wp-admin/admin.php';
$orders = wc_get_orders( array( 'status' => 'completed' ) );
?>

<!doctype html>
<html lang="en">

<head>
	<title>Pedidos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Painel NF-e / Pedidos finalizados.</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table text-center">
							<thead class="thead-dark">
								<tr>
									<th>#</th>
									<th>Cliente</th>
									<th>Data do pedido</th>
									<th>Total</th>
									<th>NF-e</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orders as $order):
									// var_dump($order->data['date_created']);?>
								<tr>
									<th scope="row"><?php echo $order->get_id(); ?></th>
									<td><?php echo $order->get_user()->display_name; ?></td>
									<td><?php echo date('d/m/Y H:i:s', strtotime($order->data['date_created']->date)); ?></td>
									<td class="money">R$ <?php echo $order->get_total(); ?></td>
									<td>
										<a href='../form/form.php?id=<?php echo base64_encode($order->get_id()) ?>'><button type="button" class="btn btn-dark"><i class="fa fa-file-text"></i>
										</button></a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>