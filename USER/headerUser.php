<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
                <span>
                    Jollibee

                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pageMenu.php">Thực đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pageAbout.php">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pageStore.php">Cửa hàng</a>
                    </li>
                </ul>
                <div class="user_option">
                    <a href="listCart.php" class="link-icon"><i class="ti-shopping-cart ti-icon"></i></a>
                    <a href="pageSearch.php" class="link-icon"><i class="ti-search ti-icon"></i></a>
                    <?php
                    if(isset($_SESSION['loged']) == 1){
                    ?>
                    <ul class="account">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button"
                                aria-expanded="false">
                                <?Php echo $_SESSION["loged"]?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="inforCustomer.php?idif=<?php echo $_SESSION['loged'];?>">Thông tin</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="historyOder.php?phoneUser=<?php echo $_SESSION['phone'];?>">Đơn hàng</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="changePass.php?userName=<?php echo $_SESSION['loged'];?>&phone=<?php echo $_SESSION['phone'];?>">Đổi
                                        mật khẩu</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php }else{?>

                    <a href="login.php" class="order_online">
                        Đăng nhập
                    </a>
                    <?php
                    } ?>

                </div>
            </div>
        </nav>
    </div>
</header>