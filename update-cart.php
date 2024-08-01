<?php
session_start();
$id_sp = $_GET['id'];
$qty = $_POST['qty'];

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
for ($i = 0; $i < count($cart); $i++) {
    if ($cart[$i]['id_sp'] == $id_sp) {
        $cart[$i]['qty'] = $qty;
        break;
    }
}

//update session
$_SESSION['cart'] = $cart;

header("Location: shoping-cart.php");
?>
