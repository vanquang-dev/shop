<?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }
    $url = 'orders_success';
?>
<!DOCTYPE html>
<html>

<head>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <title>Đơn hàng </title>
    <?php include_once 'views/components/head.php'?>
    <link rel="stylesheet" type="text/css" href="views/assets/css/order.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include_once 'views/components/sidebar.php'?>
        <!-- Page Content  -->
        <div id="content">
            <?php include_once 'views/components/navbar.php'?>
            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10">
                        <div id="content-order"></div>
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

    function get_orders() {
        data = {id_user: <?php echo $_SESSION["user_id"]; ?>, url: '<?php echo $url; ?>'};

        $.ajax({
            url: 'controllers/order/read.php',
            type: 'POST',
            dataType: 'json',
            data: data,
        })
        .done(function(data) {
            for (a of data.result) {
                $('#content-order').append('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="'+a.image+'"></div><div class="col-md-6 mt-1"><h5>'+a.name+' <span>Số lượng: '+a.number+'</span></h5><div class="d-flex flex-row"><div class="ratings mr-2"><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i></div></div><div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div><div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div><p class="text-justify text-truncate para mb-0">'+a.address+'<br><br></p></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><div class="d-flex flex-row align-items-center"><h4 class="mr-1">'+a.price+'đ</h4></div><h6 class="text-success">Free shipping</h6><div class="d-flex flex-column mt-4"><a href="process.php?order='+a.id+'" class="btn btn-primary btn-sm">Xem tiến trình</a><button class="btn btn-outline-primary btn-sm mt-2" type="button" onclick = "destroy('+a.id+')">Hủy đơn hàng</button></div></div></div>');
            }
        })
        .fail(function(error) {
            console.log('Đã xảy ra lỗi!');
        })
    }
    get_orders();

    function destroy(id) {
        data = {id: id};
        $.ajax({
            url: 'controllers/order/destroy.php',
            type: 'POST',
            dataType: 'json',
            data: data,
        })
        .done(function(data) {
            $('#address').html('');
            get_orders();
        })
        .fail(function(error) {
            console.log('Đã xảy ra lỗi!');
        })
    }


    </script>
</body>

</html>