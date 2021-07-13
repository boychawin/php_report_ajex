<?php include 'includes/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> รายงาน คำนวณยอด บน Modal ด้วย PDO and jQuery AJAX | boychawin.com</title>
	<?php include 'includes/head.php'; ?>
</head>

<body background="https://boychawin.com/B_images/logoboychawins.com.png">
	<!-- container -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
				<div class="jumbotron">
					<p class="lead"> รายงาน คำนวณยอด บน Modal ด้วย PHP + PDO and jQuery AJAX </p>
					<hr class="my-4">
				</div>
			</div>
		</div>
	</div>
	<div class="container-sm">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped" cellspacing="0" width="100%">
								<thead>
									<th>วันที่</th>
									<th>รายการ</th>
									<th>จำนวนเงิน</th>
									<th>รายละเอียด</th>
								</thead>
								<tbody>
									<?php
									$conn = $pdo->open();

									try {
										$stmt = $conn->prepare("SELECT * FROM tb_sales  ORDER BY sales_date DESC");
										$stmt->execute();
										foreach ($stmt as $row) {
											$stmt2 = $conn->prepare("SELECT * FROM tb_details 
											LEFT JOIN tb_products ON tb_products.products_id=tb_details.details_products_id 
											WHERE tb_details.details_sales_id=:id");

											$stmt2->execute(['id' => $row['sales_id']]);
											$total = 0;
											foreach ($stmt2 as $row2) {
												$subtotal = $row2['products_price'] * $row2['details_quantity'];
												$total += $subtotal;
											}
											echo "
	        									<tr>
	        									
	        										<td>" . date('d-m-Y', strtotime($row['sales_date'])) . "</td>
	        										<td>" . $row['sales_pay_id'] . "</td>
	        										<td>&#3647; " . number_format($total, 2) . "</td>
	        										<td><button type='button' class='btn btn-primary btn-sm btn-flat tranC' data-id='" . $row['sales_id'] . "' ><i class='fas fa-folder-open'></i></button> </td>
	        									</tr>
	        								";
										}
									} catch (PDOException $e) {
										echo "มีปัญหาในการเชื่อมต่อ: " . $e->getMessage();
									}

									$pdo->close();
									?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'includes/transaction_modal.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		$(function() {
			$(document).on('click', '.tranC', function(e) {
				e.preventDefault();
				$('#transaction').modal('show');
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'transaction_row.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						$('#date').html(response.date);
						$('#transid').html(response.transaction);
						$('#detail').prepend(response.data);
						$('#total').html(response.total);
					}
				});
			});

			$("#transaction").on("hidden.bs.modal", function() {
				$('.bc_tr_items').remove();
			});

		});
	</script>
</body>

</html>