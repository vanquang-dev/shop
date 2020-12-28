<?php  
    include_once 'controllers/functions/formatMoney.php';
	// Phân trang
	if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($page-1) * $no_of_records_per_page;

    $conn=mysqli_connect("localhost","root","","shop");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $total_pages_sql = "SELECT COUNT(*) FROM products";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn,$sql);
    while($data = mysqli_fetch_array($res_data)){
        $price = formatMoney($data["price"]);
    	echo '
			<tr>
	            <th scope="row">'.$data["id"].'</th>
	            <td><div style="background: url('.$data["image"].') center center / cover; width: 150px; height: 150px;"></div></td>
	            <td>'.$data["name"].'</td>
	            <td>'.$price.'đ</td>
	            <td>
					<button type="button" class="btn btn-warning">Sửa</button>
	            	<button type="button" class="btn btn-danger">Xóa</button>
				</td>
	        </tr>
		';
    }
    mysqli_close($conn);
?>