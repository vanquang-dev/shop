<?php 
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['kind'] != 0) {
        header('location: /lam_ho/');
        die();
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sản phẩm</title>
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
                    <div class="col-12">
                        <h2 style="padding: 15px 0;">Thêm sản phẩm</h2>
                    </div>
                    <div class="col-6">
                        <img src="https://sieupet.com/sites/default/files/pictures/images/1-1473150685951-5.jpg" style="width: 100%;">
                    </div>
                    <div class="col-6">
                        <div class="add-product">
                            <div class="form-group">
                                <label for="name">Tên sám phẩm</label>
                                <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" required>
                                <small id="empty-name" class="form-text hidden"></small>
                            </div>
                            <div class="form-group">
                                <label for="number">Giá</label>
                                <input type="number" class="form-control" id="price" placeholder="Giá" required>
                                <small id="empty-price" class="form-text  hidden"></small>
                            </div>
                            <div class="form-group">
                                <label>Chọn ảnh</label>
                                <label for="image" class="btn form-image">Chọn ảnh</label>
                                <input type="file" class="hidden" id="image">
                                <small id="empty-image" class="form-text hidden"></small>
                                <div class="box-pre-img hidden"></div>
                            </div>
                            <label class="btn hidden" id="success">Thêm thành công</label>
                            <button type="button" id="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </div> 
                <div class="row mt-5">
                    <div class="col-12">
                        <h2 style="padding: 15px 0;">Danh sách sản phẩm</h2>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include_once 'controllers/product/read_table.php' ?>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="?page=1">Đầu</a></li>
                            <li class="page-item, <?php if($page <= 1){ echo 'disabled'; } ?>">
                                <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"><<</a>
                            </li>
                            <li class="page-item, <?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                                <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">>></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $total_pages; ?>">Cuối</a></li>
                        </ul>              
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include_once 'views/components/footer.php' ?>
            <!-- Footer -->
        </div>
    </div>

    <?php include_once 'views/components/script.php'?>
    <script>
        $('#product').addClass('active');

        $('#image').change(function() {
            img_up = $('#image').val();
            count_img_up = $('#image').get(0).files.length;
            $(".box-pre-img").children().remove();

            // Nếu đã chọn ảnh
            if (img_up != '') {
                $('.box-pre-img').removeClass('hidden');
                for (i = 0; i <= count_img_up - 1; i++) {
                    $('.box-pre-img').append('<img src="' + URL.createObjectURL(event.target.files[i]) + '" style="width: 150px;">');
                }
            }
            // Ngược lại chưa chọn ảnh
            else {
                $('.box-pre-img').html('');
            }
        });
        $('#submit').click(function() {
            var name = $('#name').val();
            var price = $('#price').val();
            $.ajax({
                url: 'controllers/product/add.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name,
                    price: price,
                }
            })
            .done(function(data) {
                $('#name').val('');
                $('#price').val('');
                $('.box-pre-img').html('');
                $('#success').removeClass('hidden');
            })
            .fail(function(error) {
                $('#success').addClass('hidden');
                if (error.responseJSON.plane == 'name') {
                    $('#empty-name').removeClass('hidden');
                    $('#empty-name').html(error.responseJSON.message);
                } else if (error.responseJSON.plane == 'price') {
                    $('#empty-price').removeClass('hidden');
                    $('#empty-price').html(error.responseJSON.message);
                } 
            })
        })
    </script>
</body>

</html>