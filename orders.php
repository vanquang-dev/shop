<?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }
    $url = 'orders';
?>
<!DOCTYPE html>
<html>

<head>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <title>Giỏ hàng</title>
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
                        <div class="tab-pane fade  active show">
                            <h4 class="font-weight-bold mt-0 mb-4">Địa chỉ</h4>
                            <div class="row">
                                <select class="form-control" id="address">
                                    <option>...</option>
                                </select>
                                <div class="add-address">
                                    <img src="https://img.icons8.com/cute-clipart/64/000000/plus-math.png" data-toggle="modal" data-target="#exampleModal" id="show" />
                                    <span style="margin-top: -5px; color: #3cc876;">Thêm địa chỉ</span>
                                </div>
                            </div>
                        </div>
                        <div id="content-order"></div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include_once 'views/components/footer.php' ?>
            <!-- Footer -->
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 700px; margin-top: 100px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm địa chỉ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-fn">Họ và tên</label>
                                    <input class="form-control" type="text" id="name" placeholder="Tên đầy đủ">
                                    <small id="empty-name" class="form-text hidden"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Tên tỉnh</label>
                                    <input class="form-control" type="text" id="city" placeholder="Tỉnh">
                                    <small id="empty-city" class="form-text hidden"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên huyện</label>
                                    <input class="form-control" type="text" id="district" placeholder="Huyện">
                                    <small id="empty-district" class="form-text hidden"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-phone">Địa chỉ</label>
                                    <input class="form-control" type="text" id="address_add" placeholder="Địa chỉ">
                                    <small id="empty-address" class="form-text hidden"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="account-pass">Số điện thoại</label>
                                    <input class="form-control" type="text" id="number_phone" value="+84" placeholder="Số điện thoại">
                                    <small id="empty-number_phone" class="form-text hidden"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Đóng</button>
                        <button type="button" class="btn btn-primary" id="add-adderss">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'views/components/script.php'?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $('#order').addClass('active');

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
                $('#content-order').append('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="'+a.image+'"></div><div class="col-md-6 mt-1"><h5>'+a.name+' <span>Số lượng: '+a.number+'</span></h5><div class="d-flex flex-row"><div class="ratings mr-2"><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i></div></div><div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div><div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div><p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.<br><br></p></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><div class="d-flex flex-row align-items-center"><h4 class="mr-1">'+a.price+'đ</h4></div><h6 class="text-success">Free shipping</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" onclick = "add('+a.id+')" type="button">Đặt hàng</button><button class="btn btn-outline-primary btn-sm mt-2" type="button" onclick = "destroy('+a.id+')">Xóa đơn hàng</button></div></div></div>');
            }
        })
        .fail(function(error) {
            console.log('Đã xảy ra lỗi!');
        })
    }
    get_orders();

    function add(id) {
        var address = $('#address').val();
        console.log(address);
        if (address == '...') {
            console.log('heelo');
            $('#show').click();
        } else {
            data = {id: id, address: address};
            $.ajax({
            url: 'controllers/order/update.php',
            type: 'POST',
            dataType: 'json',
            data: data,
        })
        .done(function(data) {
            location.replace("orders_success.php");
        })
        .fail(function(error) {
            console.log('Đã xảy ra lỗi!');
        })
        }
    }

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

    function get_address() {
        var id_user = '<?php echo $_SESSION["user_id"] ?>';
        $.ajax({
            url: 'controllers/address/read.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id_user: id_user
            }
        })
        .done(function(data) {
            for (a of data.result) {
                $('#address').append('beforeend', "<option>Tên: "+ a.name +" &ensp; - &ensp;Địa chỉ: "+ a.address +" / "+ a.district +" / "+ a.city +" &ensp; - &ensp;Số điện thoại: "+ a.number_phone +"</option>");
            }
        })
        .fail(function(error) {
            console.log('Đã xảy ra lỗi!');
        })
    }
    get_address();

    $('#add-adderss').click(function() {
        var id_user = '<?php echo $_SESSION["user_id"] ?>';
        var name = $('#name').val();
        var city = $('#city').val();
        var district = $('#district').val();
        var address = $('#address_add').val();
        var number_phone = $('#number_phone').val();
        data = {id_user: id_user, name: name, city: city, district: district, address: address, number_phone: number_phone};
        $.ajax({
            url: 'controllers/address/add.php',
            type: 'POST',
            dataType: 'json',
            data: data,
        })
        .done(function(data) {
            get_address();
            $('#name').val('');
            $('#city').val('');
            $('#district').val('');
            $('#address_add').val('');
            $('#number_phone').val('');

            $('#empty-name').addClass('hidden');
            $('#empty-city').addClass('hidden');
            $('#empty-district').addClass('hidden');
            $('#empty-address').addClass('hidden');
            $('#empty-number_phone').addClass('hidden');
            $('#close').click();
        })
        .fail(function(error) {
            if (error.responseJSON.plane == 'name') {
                $('#empty-name').removeClass('hidden');
                $('#empty-city').addClass('hidden');
                $('#empty-district').addClass('hidden');
                $('#empty-address').addClass('hidden');
                $('#empty-number_phone').addClass('hidden');
                $('#empty-name').html(error.responseJSON.message);
            } else if (error.responseJSON.plane == 'city') {
                $('#empty-city').removeClass('hidden');
                $('#empty-name').addClass('hidden');
                $('#empty-district').addClass('hidden');
                $('#empty-address').addClass('hidden');
                $('#empty-number_phone').addClass('hidden');
                $('#empty-city').html(error.responseJSON.message);
            } else if (error.responseJSON.plane == 'district') {
                $('#empty-district').removeClass('hidden');
                $('#empty-city').addClass('hidden');
                $('#empty-name').addClass('hidden');
                $('#empty-address').addClass('hidden');
                $('#empty-number_phone').addClass('hidden');
                $('#empty-district').html(error.responseJSON.message);
            } else if (error.responseJSON.plane == 'address') {
                $('#empty-address').removeClass('hidden');
                $('#empty-city').addClass('hidden');
                $('#empty-district').addClass('hidden');
                $('#empty-name').addClass('hidden');
                $('#empty-number_phone').addClass('hidden');
                $('#empty-address').html(error.responseJSON.message);
            } else if (error.responseJSON.plane == 'number_phone') {
                $('#empty-number_phone').removeClass('hidden');
                $('#empty-city').addClass('hidden');
                $('#empty-district').addClass('hidden');
                $('#empty-address').addClass('hidden');
                $('#empty-name').addClass('hidden');
                $('#empty-number_phone').html(error.responseJSON.message);
            }
        })
    })

    </script>
</body>

</html>