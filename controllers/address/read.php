<?php 
	include_once '../../models/database.php';
	include_once '../objects/address.php';

	$address = new Address();
	$address->id_user = $_POST['id_user'];
	$query = $address->get_address();
	$data = [];
	$i = 0;
	while($row = mysqli_fetch_array($query)) {
		$data['result'][$i]['id'] = $row['id'];
		$data['result'][$i]['name'] = $row['name'];
		$data['result'][$i]['city'] = $row['city'];
		$data['result'][$i]['district'] = $row['district'];
		$data['result'][$i]['address'] = $row['address'];
		$data['result'][$i]['number_phone'] = $row['number_phone'];
		$data['result'][$i]['created'] = $row['created'];
		$i++;
	}
	http_response_code(200);
	echo json_encode($data);
?>