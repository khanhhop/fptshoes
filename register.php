<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errorMsg = "";
$successMsg = "";

// Kiểm tra nếu form được gửi đi
if(isset($_POST['btSubmit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['sdt'];
    $address = $_POST['dia_chi'];

    require_once ('./db/conn.php');

    // Kiểm tra xem email đã tồn tại chưa
    $checkEmailQuery = "SELECT * FROM khach_hang WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmailQuery);
    if (mysqli_num_rows($result) > 0) {
        $errorMsg = "Email đã được sử dụng.";
    } else {
        // Thực hiện chèn thông tin người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO khach_hang (ho_ten, ten_dang_nhap, email, mat_khau, sdt, dia_chi) VALUES ('$fullname', '$username', '$email', '$password', '$phone', '$address')";
        if (mysqli_query($conn, $sql)) {
            $successMsg = "Đăng ký thành công. Bạn có thể <a href='login.php'>đăng nhập</a> ngay bây giờ.";
        } else {
            $errorMsg = "Có lỗi xảy ra. Vui lòng thử lại.";
        }
    }
}

require_once ("register-form.php");
?>
