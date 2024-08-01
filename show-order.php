<?php
session_start();
$is_homepage = false;
require_once ('./db/conn.php');

if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: login.php"); // Giả sử bạn có trang login.php
    exit(); 
}

// Lấy ID khách hàng từ session
$id_kh = $_SESSION['user']['id_kh'];

// Truy vấn SQL để lấy dữ liệu từ bảng `hoa_don` và `gio_hang`
$sql = "SELECT hd.id, hd.firstname, hd.lastname, hd.address, hd.phone, hd.email, hd.status, gh.total
        FROM hoa_don hd
        INNER JOIN gio_hang gh ON hd.id = gh.order_id";

$result = $conn->query($sql);

// Lưu trữ dữ liệu vào mảng
$orders = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$conn->close(); // Đóng kết nối

require_once ('./component/header.php');
?>
<section class="breadcrumb-section set-bg" data-setbg="img/banner/banner1.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đơn mua</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <span>Đơn mua</span>
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
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order["id"] ?></td>
                                <td><?= $order["firstname"] . " " . $order["lastname"] ?></td>
                                <td><?= $order["address"] ?></td>
                                <td><?= $order["phone"] ?></td>
                                <td><?= $order["email"] ?></td>
                                <td><?= $order["status"] ?></td>
                                <td><?= number_format($order["total"], 0, ',', '.') . " VND" ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    require_once ('./component/footer.php');
?>
