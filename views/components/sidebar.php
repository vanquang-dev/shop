
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Shop</h3>
                <strong>SP</strong>
            </div>
            <ul class="list-unstyled components">
                <li id="home">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        Trang chủ
                    </a>
                </li>
                <?php 
                    if(isset($_SESSION['user_id']) && $_SESSION['kind'] == 0) {
                        echo '
                        <li id="product">
                            <a href="products.php">
                                <i class="fas fa-briefcase"></i>
                                Sản phẩm
                            </a>
                        </li>
                        <li id="user">
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-copy"></i>
                                Tài khoản
                            </a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="#">Quản trị</a>
                                </li>
                                <li>
                                    <a href="#">Người dùng</a>
                                </li>
                            </ul>
                        </li>
                        <li id="order">
                            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-image"></i>
                                Đơn hàng
                            </a>
                            <ul class="collapse list-unstyled" id="pageSubmenu1">
                                <li>
                                    <a href="orders.php">Giỏ hàng</a>
                                </li>
                                <li>
                                    <a href="orders_success.php">Đang chuyển</a>
                                </li>
                            </ul>
                        </li>';
                    } elseif (isset($_SESSION['user_id']) && $_SESSION['kind'] != 0) {
                        echo '
                        <li>
                            <a href="orders.php">
                                <i class="fas fa-image"></i>
                                Đơn hàng
                            </a>
                        </li>';
                    }
                ?>
                <li>
                    <a href="#" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-question"></i>
                        Về chúng tôi
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Liên hệ
                    </a>
                </li>
            </ul>
        </nav>