<?php 
    include_once 'controllers/functions/formatMoney.php';
	// Phân trang
	if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $no_of_records_per_page = 9;
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
            <div class="box-product">
                <article class="box">
                    <figure style="background: url('.$data["image"].') center center / cover"></figure>
                    <div class="details"> 
                        <h4 class="box-title">'.$data["name"].'</h4>
                        <span class="price">'.$price.'đ</span>
                        <div class="feedback">
                            <ul class="rating">
                                <li>
                                    <i class="fas fa-star fa-sm text-danger"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-danger"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-danger"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-danger"></i>
                                </li>
                            </ul>
                            <span class="review">1700 Lượt mua</span>
                        </div>
                        <p class="description">For what reason would it be advisable for me to think about business content?</p>
                        <div class="action"> <a class="button btn-small" href="product.php?sp='.$data["id"].'">Đặt</a> </div>
                    </div>
                </article>
            </div>
		';
    }
    mysqli_close($conn);
?>