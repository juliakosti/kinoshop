<?php

require_once 'template_class.php';

class Cart 
{ 
    public $cartArr;
    private $config;
    private $url;
    private $template;
    private $products;

	function __construct()	
	{
		$this->config = new Config();
		$this->url = new Url();
		$this->template = new Template();
		$this->products = new Products();
		$this->cart_count = $cart_count;
	}


	public function setInfoCart() 
	{
		if ($_SESSION['cart']) 
		{
			$cartIds = explode(",", $_SESSION["cart"]);
			$cart_count = count($cartIds);
			$cart_summa = $this->products->getPriceOnIDs($cartIds);
			$words = array("товар", "товара", "товаров");
			$cart_word = $this->getWord(count($cartIds), $words);
		}
		else {
			$cart_count = 0;
			$cart_summa = 0;
			$cart_word = 'товаров';
		}
		$cartArr = ['cart_count' => $cart_count, 'cart_word' => $cart_word, 'cart_summa' => $cart_summa];
		$_SESSION['order_summa'] = $_SESSION['cart_summa'] = $cart_summa;
		return $cartArr;
	}

	private function getWord($number, $words) {
		$keys = array(2, 0, 1, 1, 1, 2);
		$mod = $number % 100;
		$word_key = ($mod > 7 && $mod < 20)? 2: $keys[min($mod % 10, 5)];
		return $words[$word_key];
	}



	public function getMyCart()
	{
		if ($_SESSION['cart'])
		{
			$cartIds = explode(',', $_SESSION['cart']);
			$cart = $this->products->getProductsByID($cartIds);
			
			foreach ($cart as $key => $value) 
			{ 
				$cart[$key]['count'] = $this->getCountInArray($cart[$key]['id'], $cart);
				$cart[$key]['summa'] = $cart[$key]['count'] * $cart[$key]['price'];
				$cart[$key]['link_delete'] = $this->url->deleteCart($cart[$key]['id']);
			}
			$cart = array_map("unserialize", array_unique( array_map("serialize", $cart)));
			
			return $cart;
		}
		
	}


	public function getCountInArray($id, $arr) 
	{   
		foreach ($arr as $key => $value) 
		{
			foreach ($value as $k => $v) 
			{
				$array[$key] = $value['id'];
			}
		}
			
			$counts = array_count_values($array); 
			
			return $counts[$id];
	}

}	