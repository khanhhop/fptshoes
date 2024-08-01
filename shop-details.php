<?php
    session_start();
    $is_homepage = false;

    require_once('./db/conn.php');

    // Kiểm tra nếu nút "Thêm vào giỏ hàng" được nhấp
    if (isset($_POST['atcbtn'])) {
        $cart = [];
        $id_sp = $_POST['pid'];
        $quantity = $_POST['so_luong'];

        // Nếu giỏ hàng đã tồn tại trong phiên, lấy giỏ hàng hiện tại
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        $isFound = false;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id_sp'] == $id_sp) {
                $cart[$i]['qty'] += $quantity;
                $isFound = true;
                break;
            }
        }

        // Nếu không tìm thấy sản phẩm trong giỏ hàng, lấy chi tiết sản phẩm và thêm vào giỏ hàng
        if (!$isFound) {
            $sql_str = "SELECT * FROM san_pham WHERE id_sp = $id_sp";
            $result = mysqli_query($conn, $sql_str);
            $product = mysqli_fetch_assoc($result);
            $product['qty'] = $quantity;
            $cart[] = $product;
        }

        // Cập nhật phiên với giỏ hàng mới
        $_SESSION['cart'] = $cart;
    }

    // Xử lý form bình luận
    if (isset($_POST['submit_comment'])) {
        $ten = mysqli_real_escape_string($conn, $_POST['ten']);
        $noi_dung = mysqli_real_escape_string($conn, $_POST['noi_dung']);
        $id_sp = $_GET['id'];
        $id_kh = isset($_SESSION['user']['id_kh']) ? $_SESSION['user']['id_kh'] : 0;
        $trang_thai = 1; // hoặc 0 nếu bạn muốn quản trị viên duyệt trước khi hiển thị
    
        $sql_insert = "INSERT INTO binh_luan (id_kh, id_sp, ten, noi_dung, trang_thai) VALUES ('$id_kh', '$id_sp', '$ten', '$noi_dung', '$trang_thai')";
        if (mysqli_query($conn, $sql_insert)) {
            // Chuyển hướng đến chính trang đó để ngăn việc form được gửi lại khi reload
            header("Location: shop-details.php?id=$id_sp");
            exit();
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }

    require_once ('./component/header.php');

    $id_sp = $_GET['id'];
    $sql_str = "SELECT * FROM san_pham WHERE id_sp = $id_sp";
    $result = mysqli_query($conn, $sql_str);
    $row = mysqli_fetch_assoc($result);
    $anh_arr = explode(';', $row['anh']);
?>                                          
    <!-- Phần Breadcrumb Bắt Đầu -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/banner1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?=$row['ten_sp']?></h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Trang chủ</a>
                            <a href="shop.php">Sản phẩm</a>
                            <span><?=$row['ten_sp']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần Breadcrumb Kết Thúc -->
   
    <!-- Phần Chi Tiết Sản Phẩm Bắt Đầu -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?="img/".$anh_arr[0]?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                                foreach ($anh_arr as $anh) {
                                    ?>
                                    <img data-imgbigurl="<?= "img/" . $anh ?>" src="<?= "img/" . $anh ?>">
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$row['ten_sp']?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price"><?=number_format($row['gia'], 0, ',', '.') . '₫'?></div>
                        <p><?=$row['mo_ta']?></p>
                        <form action="" method="post">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                        <input type="hidden" value="1" name="so_luong">
                                    </div>
                                    <input type="hidden" value="<?=$id_sp?>" name="pid">
                                </div>
                            </div>
                            <button class="primary-btn" name="atcbtn">THÊM VÀO GIỎ HÀNG</button>
                        </form>
                        <ul>
                            <li><b>Trạng thái</b> <span><?=$row['trang_thai']?></span></li>
                            <li><b>Size</b> <span><?=$row['kich_co']?></span></li>
                            <li><b>Chất liệu</b> <span><?=$row['chat_lieu']?></span></li>
                            <li><b>Số lượng đã bán</b> <span><?=$row['so_luong_da_ban']?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Bình luận</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Bình luận</h6>
                                    <form action="shop-details.php?id=<?=$id_sp?>" method="post">
                                        <div class="form-group">
                                            <label for="ten">Tên:</label>
                                            <input type="text" class="form-control" id="ten" name="ten" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="noi_dung">Nội dung:</label>
                                            <textarea class="form-control" id="noi_dung" name="noi_dung" rows="4" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit_comment">Gửi bình luận</button>
                                    </form>
                                    <?php
                                        $sql_comments = "SELECT * FROM binh_luan WHERE id_sp = $id_sp AND trang_thai = 1 ORDER BY id_binhluan DESC";
                                        $result_comments = mysqli_query($conn, $sql_comments);
                                        
                                        echo '<div class="product__details__tab__desc">';
                                        echo '<h6>Đánh giá</h6>';
                                        while ($comment = mysqli_fetch_assoc($result_comments)) {
                                            echo '<div class="comment">';
                                            echo '<b>' . htmlspecialchars($comment['ten']) . '</b>';
                                            echo '<p>' . htmlspecialchars($comment['noi_dung']) . '</p>';
                                            echo '</div>';
                                        }
                                        echo '</div>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần Chi Tiết Sản Phẩm Kết Thúc -->

    <!-- Phần Sản Phẩm Liên Quan Bắt Đầu -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                $dmid = $row['id_dm'];
                $sql2 = "SELECT * FROM san_pham WHERE id_dm='$dmid' AND id_sp <> $id_sp";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $arrs = explode(";", $row2["anh"]);
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?= "img/".$arrs[0] ?>">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="shop-details.php?id=<?=$row2['id_sp']?>"><?=$row2['ten_sp']?></a></h6>
                        <h5><?=number_format($row2['gia'], 0, ',', '.') . '₫'?></h5>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </section>
    <!-- Phần Sản Phẩm Liên Quan Kết Thúc -->

<?php
    require_once('component/footer.php');
?>
