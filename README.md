# simplecart
 Простая корзина на сессиях

$cart = new ShopCart;

// добавляем товар
$cart->addToCart($_POST['id'], $_POST['price'], $_POST['quantity']);

// удаляем товар
$cart->deleteFromCart($_POST['id']);

// минусуем товар
$cart->minusProduct($_POST['id']);

// плюсуем товар
$cart->plusProduct($_POST['id']);

//выводим сумму товаров в корзине
echo $cart->getTotalSumm();

//выводим КОЛИЧЕСТВО товаров в корзине
echo $cart->getTotalProducts();

//очищаем корзину
echo $cart->clearCart();
