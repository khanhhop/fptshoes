<?php 
    session_start();
    $is_homepage = false;

    require_once('./db/conn.php');

    require_once ('./component/header.php');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/banner1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                    
                                    $cart = [];
                                    if (isset($_SESSION['cart'])) {
                                        $cart = $_SESSION['cart'];
                                    }
                                    $total = 0;
                                    foreach ($cart as $item) {
                                        $total += $item['qty'] * $item['gia'];
                                        $anh_arr = explode(';', $item['anh']);
                                    ?>
                                    <tr>
                                        <form action="update-cart.php?id=<?=$item['id_sp']?>" method="post" >
                                            <td class="shoping__cart__item">
                                                <img src="<?= "img/" . $anh_arr[0] ?>" alt="">
                                                <h5><?=$item['ten_sp']?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?=number_format($item['gia'], 0, ',', '.') . '₫'?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" name="qty" value="<?=$item['qty']?>" min="1">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <?=number_format($item['gia']*$item['qty'], 0, ',', '.') . '₫'?>
                                            </td>
                                            <td class="shoping__cart__update">
                                                <button type="submit" class="primary-btn">Cập nhật</button> 
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="delete-cart.php?id=<?=$item['id_sp']?>"><span class="icon_close"></span></a>    
                                            </td>
                                        </form> 
                                    </tr>

                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Chi tiết thanh toán</h5>
                        <ul>
                            <li>Tổng tiền <span><?=number_format($total, 0, ',', '.') . '₫'?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="shop.php" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout__btns">
                        <a href="checkout.php" class="primary-btn">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

<?php 
    require_once('component/footer.php');
?>
