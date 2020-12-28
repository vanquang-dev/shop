<?php  
	include_once '../../models/database.php';
	include_once '../objects/order.php';

	$order = new Order();
	$order->id = $_POST['id'];
	$order->destroy();
	http_response_code(200);
	echo json_encode(array('code' => 200, 'message' => 'Xóa thành công'));
?>