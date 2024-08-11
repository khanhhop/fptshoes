<?php
session_start();
require_once('./db/conn.php');
$message = ""; // Biến lưu trữ thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
    $sql_check = "SELECT * FROM khach_hang WHERE email = '$email'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) == 1) {
        // Nếu email tồn tại, lấy mật khẩu và hiển thị (KHÔNG AN TOÀN)
        $row = mysqli_fetch_assoc($result_check);
        $password = $row['mat_khau'];
        $message = "<div class='alert alert-success'>Mật khẩu của bạn là: $password</div>";
    } else {
        // Nếu email không tồn tại
        $message = "<div class='alert alert-danger'>Email không tồn tại trong hệ thống.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogani | Quên mật khẩu</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <a href="index.php"><img src="img/banner/images (1).jpg" alt="Logo"></a>
        <h2>Quên mật khẩu</h2>
        <?php if (!empty($message)) { echo $message; } ?>
        <form action="" method="post"> 
            <input type="text" name="email" placeholder="Email" required>
            <button type="submit" name="btnSubmit">Gửi yêu cầu</button>
        </form>
        <div class="register-link">
            <a href="login.php">Quay lại đăng nhập</a>
        </div>
    </div>

   
</body>
</html>
