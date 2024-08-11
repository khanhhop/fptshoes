<?php

session_start();
$is_homepage = false;

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}
require_once('./db/conn.php');
$user = $_SESSION['user'];



// Truy vấn thông tin người dùng từ cơ sở dữ liệu (nếu cần)
$id_kh = $user['id_kh']; // Giả sử bạn lưu trữ ID người dùng trong session
$sql = "SELECT * FROM khach_hang WHERE id_kh = $id_kh";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result); // Cập nhật thông tin người dùng từ cơ sở dữ liệu
} else {
    // Xử lý trường hợp không tìm thấy người dùng
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}
require_once ('./component/header.php');
?>

    <section class="breadcrumb-section set-bg" data-setbg="img/banner/banner1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thông tin tài khoản</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Thông tin tài khoản</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Thông tin</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="shoping__cart__item">Họ và tên</td>
                                    <td class="shoping__cart__price"><?= $user['ho_ten'] ?></td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">Email</td>
                                    <td class="shoping__cart__price"><?= $user['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">Số điện thoại</td>
                                    <td class="shoping__cart__price"><?= $user['sdt'] ?></td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">Địa chỉ</td>
                                    <td class="shoping__cart__price"><?= $user['dia_chi'] ?></td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="edit_profile.php" class="primary-btn cart-btn cart-btn-right">
                            Chỉnh sửa thông tin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php 
    require_once ('./component/footer.php')
?>

