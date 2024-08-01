<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errorMsg = "";
if(isset($_POST['btSubmit'])){
    $email = $_POST['email'];
    $mat_khau = $_POST['mat_khau'];
    
    require_once ('./db/conn.php');

    $sql = "SELECT * FROM khach_hang WHERE email='$email' AND mat_khau='$mat_khau'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row;
        header("Location: index.php");
        exit;
    } else {
        $errorMsg = "Không tìm thấy tài khoản trong hệ thống";
        require_once ("login-form.php");
    }
} else {
    require_once ("login-form.php");
}
?>
