<?php 
	include_once 'models/database.php';
	include_once 'controllers/objects/product.php';
	include_once 'controllers/functions/formatMoney.php';
	$product = new Product();

	$product->id = $_GET['sp'];
	$query = $product->get_product();
	if (mysqli_num_rows($query) != 1) {
		header('location: index.php');
		die();
	}
	$data = [];

	while ($row = mysqli_fetch_array($query)) {
		$price = formatMoney($row["price"]);
		$data['id'] = $row['id'];
		$data['name'] = $row['name'];
		$data['price'] = $price;
		$data['price_db'] = $row['price'];
		$data['image'] = $row['image'];
		$data['created'] = $row['created'];
	}
?>