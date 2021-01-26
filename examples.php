<?php 

require_once('shopcart.php');

$cart = new ShopCart;
// Добавление товара
$cart->addToCart('1', '100', '12');