<?php
include 'includes/conn.php';

$id = $_POST['id'];

$conn = $pdo->open();

$output = array('data' => '');

$stmt = $conn->prepare("SELECT * FROM tb_details 
	LEFT JOIN tb_products ON tb_products.products_id=tb_details.details_products_id 
	LEFT JOIN tb_sales ON tb_sales.sales_id=tb_details.details_sales_id 
	WHERE tb_details.details_sales_id=:id");

$stmt->execute(['id' => $id]);

$total = 0;
foreach ($stmt as $row) {
	$output['transaction'] = $row['sales_pay_id'];
	$output['date'] = date('d-m-Y', strtotime($row['sales_date']));
	$subtotal = $row['products_price'] * $row['details_quantity'];
	$total += $subtotal;
	$output['data'] .= "
			<tr class='bc_tr_items'>
				<td>" . $row['products_name'] . "</td>
				<td>&#3647; " . number_format($row['products_price'], 2) . "</td>
				<td>" . $row['details_quantity'] . "</td>
				<td>&#3647; " . number_format($subtotal, 2) . "</td>
			</tr>
		";
}

$output['total'] = '<b>&#3647; ' . number_format($total, 2) . '<b>';
$pdo->close();
echo json_encode($output);
