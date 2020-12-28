<?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }
    $url = 'process';
    $id = $_GET['order'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Trạng thái đơn hàng</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <?php include_once 'views/components/head.php'?>
    <link rel="stylesheet" type="text/css" href="views/assets/css/process.css">
    <style>
        
    </style>
</head>
    
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include_once 'views/components/sidebar.php'?>
        <!-- Page Content  -->
        <div id="content">
            <?php include_once 'views/components/navbar.php'?>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="container">
                            <article class="card">
                                <header class="card-header"> Đơn hàng / Theo dõi </header>
                                <div class="card-body">
                                    <h6>Mã Đơn hàng: OD45345345435</h6>
                                    <article class="card" id="information">
                                        
                                    </article>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Xác nhận</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Thanh toán</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Giao hàng </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Kết thúc</span> </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-11">
                                            <div id="content-order"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="orders_success.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i>Trở lại</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include_once 'views/components/footer.php' ?>
            <!-- Footer -->
        </div>
    </div>
    <?php include_once 'views/components/script.php'?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    function get_order() {
        data = {id: <?php echo $id; ?>, id_user: <?php echo $_SESSION["user_id"]; ?>, url: '<?php echo $url; ?>'};

        $.ajax({
            url: 'controllers/order/read.php',
            type: 'POST',
            dataType: 'json',
            data: data,
        })
        .done(function(data) {
            for (a of data.result) {
                $('#content-order').append('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="'+a.image+'"></div><div class="col-md-6 mt-1"><h5>'+a.name+' <span>Số lượng: '+a.number+'</span></h5><div class="d-flex flex-row"><div class="ratings mr-2"><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i></div></div><div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div><div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><div class="d-flex flex-row align-items-center"><h4 class="mr-1">'+a.price+'đ</h4></div><h6 class="text-success">Free shipping</h6><div class="d-flex flex-column mt-4"><button class="btn btn-outline-primary btn-sm mt-2" type="button" onclick = "destroy('+a.id+')">Hủy đơn hàng</button></div></div></div>');
            }
            $('#information').append('<div class="card-body row"><div class="col"> <strong>Thời gian giao hàng:</strong> <br>3 ngày </div><div class="col"> <strong>Người nhận:</strong> <br> '+data.name+' </div><div class="col"> <strong> Địa chỉ:</strong> <br>'+data.address+' </div><div class="col"> <strong>Số điện thoại:</strong> <br> '+data.number_phone+' </div></div>');
        })
        .fail(function(error) {
            console.log('Đã xảy ra lỗi!');
        })
    }
    get_order();
    </script>
</body>

</html>