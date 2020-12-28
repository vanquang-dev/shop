<?php 
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/previews/ecommerce-demo/css/mdb-pro.min.css">
    <?php include_once 'views/components/head.php'?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include_once 'views/components/sidebar.php'?>
        <!-- Page Content  -->
        <div id="content">
            <?php include_once 'views/components/navbar.php'?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            include_once 'controllers/product/read_product.php';
                        ?>
                        <section class="mb-5">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div id="mdb-lightbox-ui"></div>
                                    <div class="mdb-lightbox">
                                        <div class="row product-gallery mx-1">
                                            <div class="col-12 mb-0">
                                                <figure class="view overlay rounded z-depth-1 main-img">
                                                    <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg" data-size="710x823">
                                                        <img src="<?php echo $data['image']; ?>" style="width: 100%;">
                                                    </a>
                                                </figure>
                                            </div>
                                            <!-- <div class="col-12">
                                                <div class="row">
                                                  <div class="col-3">
                                                    <div class="view overlay rounded z-depth-1 gallery-item">
                                                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                                        class="img-fluid">
                                                      <div class="mask rgba-white-slight"></div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        <?php echo $data["name"]; ?>
                                    </h5>
                                    <p class="mb-2 text-muted text-uppercase small">Đánh giá</p>
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
                                        <li>
                                            <i class="far fa-star fa-sm text-danger"></i>
                                        </li>
                                    </ul>
                                    <p><span class="mr-1"><strong>
                                                <?php echo $data["price"]; ?>đ</strong></span></p>
                                    <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
                                        error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
                                        officia quis dolore quos sapiente tempore alias.</p>
                                    <hr>
                                    <div class="table-responsive mb-2">
                                        <table class="table table-sm table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td class="pl-0 pb-0 w-25">Số lượng</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">
                                                        <div class="def-number-input number-input safari_only mb-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn" style="margin-right: -3px;">-</button>
                                                            <input class="btn" min="0" id="number" value="1" type="number" style="width: 100px;">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn" style="margin-left: -3px;">+</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if (isset($_SESSION['user_id'])) { ?>
                                    <button id="submit" type="button" class="btn btn-primary btn-md mr-1 mb-2">Mua ngay</button>
                                    <?php } else { ?>
                                    <button id="login" type="button" class="btn btn-primary btn-md mr-1 mb-2">Mua ngay</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include_once 'views/components/footer.php' ?>
            <!-- Footer -->
        </div>
    </div>
    <?php include_once 'views/components/script.php'?>
    <script type="text/javascript" src="https://mdbootstrap.com/previews/ecommerce-demo/js/popper.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/ecommerce-demo/js/mdb.min.js"></script>
    <!-- MDB Ecommerce JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/ecommerce-demo/js/mdb.ecommerce.min.js"></script>
    <script>
    $(document).ready(function() {
        // MDB Lightbox Init
        $(function() {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
        $('#submit').click(function() {
            var id_product = '<?php echo $_GET["sp"]; ?>';
            var id_user = '<?php echo $_SESSION["user_id"]; ?>';
            var number = $('#number').val();
            var price = '<?php echo $data["price_db"] ?>';
            data = { id_product: id_product, id_user: id_user, number: number, price: price };
            $.ajax({
                url: 'controllers/order/add.php',
                type: 'POST',
                dataType: 'json',
                data: data,
            })
            .done(function(data) {
                location.replace("orders.php");
            })
            .fail(function(error) {
                console.log('Đã xảy ra lỗi!');
            })
        })
        $('#login').click(function() {
            console.log('hello');
            location.replace("login.php");
        })
    });
        
    </script>
</body>

</html>