<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>datbui180504@gmail.com</li>
                                <li>Miễn phí giao hàng với đơn có giá trị trên 5.000.000₫</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">
                                <?php if (isset($_SESSION['user'])): ?>
                                    <select onchange="location = this.value;">
                                        <option value="#"><?= $_SESSION['user']['ten_dang_nhap'] ?></option>
                                        <option value="logout.php">Đăng xuất</option>
                                        <option value="show-order.php">Xem đơn hàng đã đặt</option>
                                    </select>
                                <?php else: ?>
                                    <select onchange="location = this.value;">
                                        <option value="#">Tài khoản</option>
                                        <option value="login.php">Đăng nhập</option>
                                        <option value="register.php">Đăng kí</option>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="index.php"><img src="img/banner/images (1).jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero__search__form">
                    <form action="timkiem.php" method="get">
                        <select name="danhmuc">
                            <option value='*'>Tất cả danh mục</option>
                            <?php
                            require('./db/conn.php');
                            $sql_str = "select * from danh_muc order by ten_dm";
                            $result = mysqli_query($conn, $sql_str);
                                while ($row = mysqli_fetch_assoc($result)){
                            ?>
                                <option value=<?=$row['id_dm']?>><?=$row['ten_dm']?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="tukhoa" placeholder="Bạn cần tìm gì?">
                        <button type="submit" class="site-btn">Tìm</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span>
                        <?php
                            $cart = [];
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                            }
                            $count = 0;
                            $tongtien = 0;
                            foreach ($cart as $item) {
                                $count += $item['qty'];
                                $tongtien += $item['qty'] * $item['gia']; 
                            }
                            echo $count;
                        ?>
                        </span></a></li>
                    </ul>
                    <div class="header__cart__price">Tổng tiền: <span><?=number_format($tongtien, 0, '', '.'). "₫" ?></span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
    </header>
    <!-- Header Section End -->


    <!-- Hero Section Begin -->
    <?php 
        if ($is_homepage){
            echo '<section class="hero">';
        } else {
            echo '<section class="hero hero-normal">';
        }
    ?>
    <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        <?php 
                            require('./db/conn.php');
                            $sql_str = "SELECT * FROM danh_muc order by ten_dm";
                            $result = mysqli_query($conn, $sql_str);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <li><a href="#"><?=$row['ten_dm']?></a></li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="./shop.php">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="shoping-cart.php">Shoping Cart</a></li>
                                <li><a href="checkout.php">checkout</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
                <?php 
                    if ($is_homepage){
                ?>
                <div class="hero__item set-bg" data-setbg="img/banner/e00cb4200863337.Y3JvcCwyNTY3LDIwMDgsMCww.jpg">
                    <div class="hero__text">
                        <span>HÀNG MỚI VỀ</span>
                        <h2>Giày Nike <br />100% Chính Hãng</h2>
                        <p>Miễn Phí Vận Chuyển Cho Đơn Hàng Trên 2.000.000₫</p>
                        <a href="shop.php" class="primary-btn">MUA NGAY</a>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    </section>
    <!-- Hero Section End -->
</body>

</html>
