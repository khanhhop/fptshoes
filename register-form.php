<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogani | Register</title>
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
    <div class="register-container">
        <img src="img/logo.png" alt="Logo">
        <h2>Register</h2>
        <?php
            if (!empty($errorMsg)) {
                echo "<h4 class='alert alert-danger'>$errorMsg</h4>";
            }
            if (!empty($successMsg)) {
                echo "<h4 class='alert alert-success'>$successMsg</h4>";
            }
        ?>
        <form action="register.php" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="sdt" placeholder="Phone Number" required>
            <input type="text" name="dia_chi" placeholder="Address" required>
            <button type="submit" name="btSubmit">Register</button>
        </form>
        <div class="login-link">
            <a href="login.php">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
