<?php  
	include_once '../../models/database.php';
	include_once '../objects/address.php';

	$address = new Address();

	if($_POST['name'] == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'name', 'message' => 'Không được để trống'));
		die();
	} else if($_POST['city'] == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'city', 'message' => 'Không được để trống'));
		die();
	} else if($_POST['district'] == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'district', 'message' => 'Không được để trống'));
		die();
	} else if($_POST['address'] == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'address', 'message' => 'Không được để trống'));
		die();
	} else if($_POST['number_phone'] == '') {
		http_response_code(400);
		echo json_encode(array('code' => 400, 'plane' => 'number_phone', 'message' => 'Không được để trống'));
		die();
	}

	$address->id_user = $_POST['id_user'];
	$address->name = $_POST['name'];
	$address->city = $_POST['city'];
	$address->district = $_POST['district'];
	$address->address = $_POST['address'];
	$address->number_phone = $_POST['number_phone'];

	$address->add();
	http_response_code(200);
	echo json_encode(array('code' => 200, 'message' => 'Thêm thành công'));
	die();
?>