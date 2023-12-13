<?php
session_start();
$id = $_GET['id'];
echo $id ;
$cart = $_SESSION['cart'];
unset($cart[$id]);
$_SESSION['cart'] = $cart;
header("location:cart.php");
die;
