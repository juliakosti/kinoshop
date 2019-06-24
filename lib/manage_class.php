<?php
require_once 'config_class.php';
require_once 'products_class.php';
require_once 'discounts_class.php';
require_once 'order_class.php';
require_once 'url_class.php';
require_once 'check_class.php';

class Manage {

	private $config;
	private $products;
	private $discounts;
	private $order;
	private $url;

	
	

	public function __construct() 
	{
		$this->check = new Check();
		$this->config = new Config();
		$this->products = new Products();
		$this->discounts = new Discounts();
		$this->order = new Order();
		$this->url = new Url();
		
	}

	public function addToCart()
	{
		$id = $_REQUEST['id'];//Попробовать найти другой вариант
		$id = $this->check->cleanFormData($id);
		$this->products->checkProductId($id);
		if ($_SESSION['cart']) $_SESSION['cart'] .=", $id";
		else $_SESSION['cart'] = $id;
		echo '<script>setTimeout(\'location="'.$_SERVER['HTTP_REFERER'].'"\', 0)</script>';
	}

	public function deleteCart()
	{	
		$id = $_REQUEST['id'];//Попробовать найти другой вариант
		$id = $this->check->cleanFormData($id);
		$this->products->checkProductId($id);
		$ids = explode(',', $_SESSION['cart']);
		for ($i=0; $i <= count($ids); $i++) 
		{ 
			if ($ids[$i] == $id) 
				{
					unset($ids[$i]);
				}
		}
		$_SESSION['cart'] = implode(',', $ids);
		echo '<script>setTimeout(\'location="/cart"\')</script>';
		
	}


	
	public function changeCart() 
	{
		$_SESSION['cart'] = '';
		$_SESSION['code'] = '';
		$_SESSION['discount'] = '';
		
		$arr = $_POST;
			
		foreach ($arr as $key => $value) 
		{
			if (strpos($key, 'count_') !== false) 
			{
				$id = substr($key, strlen('count_'));
				for ($i = 0; $i < $value; $i++) 
				{
					if ($_SESSION['cart']) 
						{
							$_SESSION['cart'] .=", $id";
						}
					else $_SESSION['cart'] = $id;
				}
			}
		}

		$_SESSION['code'] = $arr ['discount'];
		$_SESSION['discount'] = $this->discounts->existsValue($arr ['discount']);
		$_SESSION['order_summa'] = $_SESSION['cart_summa'] - ($_SESSION['cart_summa']*$_SESSION['discount']);
		echo '<script>setTimeout(\'location="/cart"\', 0)</script>';
	}
		
	public function saveOrder()
	{
		$this->order->setIntoOrders();
		session_unset();
		echo '<script>setTimeout(\'location="/addorder"\', 0)</script>';
	}	
	

	
	

	



}