<?php
session_start();
require('./db/conn.php');

// Kiểm tra xem người dùng đã đăng nhập hay chưa


// Lấy ID đơn hàng từ tham số trên URL
if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']);

    // Kiểm tra xem đơn hàng có tồn tại hay không
    $sql_check = "SELECT * FROM hoa_don WHERE id = $order_id";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) == 1) {
        // Cập nhật trạng thái đơn hàng thành "Cancelled"
        $sql_update = "UPDATE hoa_don SET status = 'Cancelled' WHERE id = $order_id";

        if (mysqli_query($conn, $sql_update)) {
            // Cập nhật thành công
            $_SESSION['message'] = "<div class='alert alert-success'>Đơn hàng đã được hủy thành công!</div>";
        } else {
            // Cập nhật thất bại
            $_SESSION['message'] = "<div class='alert alert-danger'>Lỗi khi hủy đơn hàng: " . mysqli_error($conn) . "</div>";
        }
    } else {
        // Đơn hàng không tồn tại
        $_SESSION['message'] = "<div class='alert alert-danger'>Đơn hàng không tồn tại.</div>";
    }

    // Chuyển hướng về trang danh sách đơn hàng
    header("Location: show-order.php"); // Thay đổi đường dẫn nếu cần
    exit();
} else {
    // Thiếu tham số id
    $_SESSION['message'] = "<div class='alert alert-danger'>Thiếu tham số id đơn hàng.</div>";
    header("Location: show-order.php"); // Thay đổi đường dẫn nếu cần
    exit();
}
?>
