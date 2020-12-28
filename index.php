<?php 
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>    
    <title>Trang chủ</title>
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
		    		<div class="col-sm-9">
                        <h2>Danh sách sản phẩm</h2>
				        <?php include_once 'controllers/product/read_index.php' ?>
                        <ul class="pagination mt-3">
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
				    <div class="col-sm-3">
				    	<h2>Quản cáo</h2>
                        <h2>Hoặc cái gì đó</h2>
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
        $('#home').addClass('active');
    </script>
</body>

</html>