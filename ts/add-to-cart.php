<?php
session_start();
$id = $_GET['id'];
echo $id ;

$products = json_decode(file_get_contents("products.json"), true);

$product = $products[$id - 1];
$product['qty'] = 1;
if(array_key_exists($product['id'],$_SESSION['cart'])){
    $product = $_SESSION['cart'][$product['id']];
    $product['qty'] = $product['qty'] + 1 ;
    $_SESSION['cart'][$product['id']] = $product ;
}else{
    $_SESSION['cart'][$product['id']] = $product;
}


$_SESSION['add'] = "product  is added " . $product['title'];

header('location:test.php');


