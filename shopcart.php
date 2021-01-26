<?php
session_start();

class ShopCart
{
	// глобальная переменная корзины
	public $cart;

	public function __construct() 
	{
		// записываем в глобальную переменную массив корзины из сессии
		$this->cart = $_SESSION['cart'];
	}

	// метод добавления товара в корзину
	public function addToCart($product_id, $price, $quantity) 
	{
		// проверяем есть ли такой товар в корзине
		if (!empty($this->cart[$product_id]))
		{
			// если есть добавляем количество
			$this->updateQuantity($product_id);
		} 
		else
		{
			// если нет, то добавляем товар в массив
			$this->cart[$product_id] = array(
				'quantity' => $quantity,
				'price' => $price
			);
		}		
		$_SESSION['cart'] = $this->cart;
		return true;
	}

	// метод обновления количество товара 
	public function updateQuantity($product_id) 
	{
		$this->cart[$product_id]['quantity'] = (int)$this->cart[$product_id]['quantity'] + 1;
		$_SESSION['cart'] = $this->cart;
		return true;
	}

	// метод прибавления количества товара
	public function plusProduct($product_id) 
	{
		return $this->updateQuantity($product_id);
	}

	// метод удаления количества товара
	public function minusProduct($product_id) 
	{
		$this->cart[$product_id]['quantity'] = (int)$this->cart[$product_id]['quantity'] - 1;
		// проверяем сколько товара в корзине осталось
		if ($this->cart[$product_id]['quantity'] == 0) {
			// если равно нулю, то удаляем товар из корзины
			unset($this->cart[$product_id]);
		}
		$_SESSION['cart'] = $this->cart;
		return true;
	}

	// метод удаления товара из корзины
	public function deleteFromCart($product_id) 
	{
		unset($this->cart[$product_id]);
		$_SESSION['cart'] = $this->cart;
		return true;
	}

	// метод подсчета общей стоимости товаров
	public function getTotalSumm() 
	{
		if (count($this->cart) > 0) {			
			$total = 0;
			foreach ($this->cart as $key => $value) {
				$total += $value['price'];
			} 
			return $total;
		} else {
			return '0';
		}
	}	

	// метод подсчета количества товаров в корзине
	public function getTotalProducts() 
	{
		return count($this->cart);
	}

	// метод удаляем все товары из корзины
	public function clearCart() 
	{ 
		$this->cart = array();
		$_SESSION['cart'] = $this->cart;
		return true;
	}
 
 	// метод возвращения товара
 	public function getBasket()
 	{ 		
		$_SESSION['cart'] = $this->cart;
		return true;
 	}
}

