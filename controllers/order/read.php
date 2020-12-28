<?php 
	include_once '../../models/database.php';
	include_once '../objects/order.php';;
	include_once '../functions/formatMoney.php';

	$order = new Order();

	$order->id_user = $_POST['id_user'];
    if ($_POST['url'] == 'orders') {
        $query = $order->get_orders();
    } else if ($_POST['url'] == 'orders_success') {
        $query = $order->get_orders_success();
    } else if ($_POST['url'] == 'process') {
        $order->id = $_POST['id'];
        $query = $order->get_order();
    }
    $data = [];
    $arr = [];
    $i = 0;
    while($row = mysqli_fetch_array($query)) {
        $price = formatMoney($row["price_order"]);
        $data['result'][$i]['id'] = $row['order_id'];
        $data['result'][$i]['name'] = $row['name'];
        $data['result'][$i]['number'] = $row['number'];
        $data['result'][$i]['image'] = $row['image'];
        $data['result'][$i]['price'] = $price;
        $data['result'][$i]['address'] = $row['address'];

        if ($_POST['url'] == 'process') {
            $arr = explode("-", $row['address']);
            $data['name'] = trim(str_replace(array("Tên: "),'',$arr[0]));
            $data['address'] = trim(str_replace(array("Địa chỉ: "),'',$arr[1]));
            $data['number_phone'] = trim(str_replace(array("Số điện thoại: "),'',$arr[2]));
        }
        $i++;
    }
	http_response_code(200);
    echo json_encode($data);
?>