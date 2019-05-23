<?php
require_once 'manage_class.php';
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
		}	
		for ($i=0; $i < count($cart); $i++) { 
			$cart[$i]['count'] = 1;
			$cart[$i]['summa'] = $cart[$i]['count'] * $cart[$i]['price'];
			$cart[$i]['link_delete'] = $this->url->deleteCart($cart[$i]['id']);
		}
		return $cart;
	}


	private function getCountInArray($array) 
	{
		$count = 0;
		for ($i=0; $i < count($array); $i++) { 
			if ($array[$i]['id'] == $v) $count++;
		}
		return $count;
	}

}	