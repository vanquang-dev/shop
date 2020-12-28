
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <div class="input-group search">
                        <input class="form-control" type="text" placeholder="Tìm kiếm" style="border-radius: 20px;">
                        <span class="btn-search"><i class="fas fa-search text-grey"></i></span>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <?php if (isset($_SESSION['user_id'])) {  ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="controllers/logout/logout.php">Đăng xuất</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Đăng nhập</a>
                                </li>
                                <li><a class="nav-link" href="#">/</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Đăng ký</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>