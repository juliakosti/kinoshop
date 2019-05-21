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
		
	}

	public function setInfoCart() {
		if ($_SESSION["cart"]) {
			$cartIds = explode(",", $_SESSION["cart"]);
			echo '<pre>';
			print_r($cartIds);
			echo '</pre>';
			$summa = $this->products->getPriceOnIDs($cartIds);
			$cart_count = count($cartIds);
			echo '</br>';
			echo $cart_count;
			echo '</br>';
			echo $summa;
			$this->products->getProductsByID($cartIds);
			/*$this->template->set("cart_summa", $summa);
			$words = array("товар", "товара", "товаров");
			$this->template->set("cart_word", $this->getWord(count($cartArr), $words));
		}
		else {
			$this->template->set("cart_count", 0);
			$this->template->set("cart_summa", 0);
			$this->template->set("cart_word", "товаров");*/
		}
	}

	private function getWord($number, $words) {
		$keys = array(2, 0, 1, 1, 1, 2);
		$mod = $number % 100;
		$word_key = ($mod > 7 && $mod < 20)? 2: $keys[min($mod % 10, 5)];
		return $words[$word_key];
	}


}	