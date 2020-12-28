<?php 
	session_start();
	include_once '../../models/database.php';
	include_once '../objects/order.php';

	$order = new Order();
	if ($_POST['number'] == 0 || $_POST['number'] == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'message' => 'Số lượng phải lớn hơn 0'));
		die();
	}

	$order->id_user = $_POST['id_user'];
	$order->id_product = $_POST['id_product'];
	$order->number = $_POST['number'];
	$order->price = $_POST['price'] * $_POST['number'];

	$order->add();
	http_response_code(200);
	echo json_encode(array('code' => 200, 'message' => 'Thêm thành công'));
	die();

?>