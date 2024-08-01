<?php
    session_start();
    $id_sp = $_GET['id'];

    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['id'] == $id_sp) {
            array_splice($cart, $i, 1);
            break;
        }
    }

    //update session
    $_SESSION['cart'] = $cart;

    header("Location: shoping-cart.php");
