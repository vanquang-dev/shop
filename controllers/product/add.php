<?php 
	session_start();
	include_once '../../models/database.php';
	include_once '../objects/product.php';

	$product = new Product();

	$name = $_POST['name'];
	$price = $_POST['price'];

	if ($name == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'name', 'message' => 'Không được để trống'));
		die();
	} else if ($price == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'price', 'message' => 'Không được để trống'));
		die();
	}

	$product->name = $name;
	$product->price = $price;
	$product->add();
	http_response_code(200);
	echo json_encode(array('code' => 200, 'message' => 'Thêm thành công'));
	die();

?>