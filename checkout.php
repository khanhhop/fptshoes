<?php 
    session_start();
    $is_homepage = false;
    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    require_once('./db/conn.php');

    if(isset($_POST['btDathang'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Câu lệnh INSERT vào bảng hoa_don
        $sqli = "INSERT INTO hoa_don (firstname, lastname, address, phone, email, status, create_at, update_at) 
                 VALUES ('$firstname', '$lastname', '$address', '$phone', '$email', 'Processing', now(), now())";
        
        if (mysqli_query($conn, $sqli)) {
            $last_order_id = mysqli_insert_id($conn);
            // Sau đó thêm vào chi tiết đơn hàng
            foreach ($cart as $item) {
                $id_sp = $item['id_sp'];
                $gia = $item['gia'];
                $qty = $item['qty'];
                $total = $item['qty'] * $item['gia'];
                $sqli2 = "INSERT INTO gio_hang (id, order_id, id_sp, gia, qty, total, create_at, update_at) 
                          VALUES (0, $last_order_id, $id_sp, $gia, $qty, $total, now(), now())";
                mysqli_query($conn, $sqli2);
            }
        }
        unset($_SESSION["cart"]);
        header("Location: thankyou.php");
    }

    require_once ('./component/header.php');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/banner/banner1.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin khách hàng </h4>
            <form action="#" method="post" >
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ và tên đệm<span>*</span></p>
                                    <input type="text" name="firstname" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên <span>*</span></p>
                                    <input type="text" name="lastname" >
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ nhận hàng<span>*</span></p>
                            <input type="text" class="checkout__input__add" name="address" >
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                            <ul>
                                <?php 
                                    $cart = [];
                                    if (isset($_SESSION['cart'])) {
                                        $cart = $_SESSION['cart'];
                                    }
                                    $total = 0;
                                    foreach ($cart as $item) {
                                        $total += $item['qty'] * $item['gia'];
                                ?>
                                <li><?=$item['ten_sp'];?> <span><?=number_format($item['gia']*$item['qty'], 0, ',', '.') . '₫'?></li>
                                <?php } ?>
                            </ul>
                            <div class="checkout__order__total">Tổng tiền 
                                <span>
                                    <?=number_format($total, 0, ',', '.') . '₫'?>
                                </span>
                            </div>
                            <button type="submit" class="site-btn" name="btDathang" >ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php 
    require_once ('./component/footer.php')
?>
