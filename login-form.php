<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogani | Login</title>
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
        <a href="index.php"><img src="img/logo.png" alt="Logo"></a>
        <h2>Login</h2>
        <?php
            if (!empty($errorMsg)) {
                echo "<h4 class='alert alert-danger'>$errorMsg</h4>";
            }
        ?>
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="mat_khau" placeholder="Password" required>
            <button type="submit" name="btSubmit">Đăng nhập</button>
        </form>
        <div class="register-link">
            <a href="register.php">Bạn không có tài khoản? Đăng kí</a>
        </div>
    </div>
</body>
</html>