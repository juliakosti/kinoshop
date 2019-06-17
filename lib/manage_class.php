<?php
require_once 'config_class.php';
require_once 'products_class.php';
require_once 'discounts_class.php';
require_once 'order_class.php';

class Manage {

	private $config;
	private $products;
	private $discounts;
	private $order;

	
	

	public function __construct() 
	{
		//session_start();
		$this->config = new Config();
		$this->products = new Products();
		$this->discounts = new Discounts();
		$this->order = new Order();
		
	}

	public function addToCart()
	{
		$id = $_REQUEST['id'];//Попробовать найти другой вариант
		if (!$this->products->existsID($id)) return false;
		if ($_SESSION['cart']) $_SESSION['cart'] .=", $id";
		else $_SESSION['cart'] = $id;
		echo '<script>setTimeout(\'location="'.$_SERVER['HTTP_REFERER'].'"\', 0)</script>';
	}

	public function deleteCart()
	{	
		$id = $_REQUEST['id'];//Попробовать найти другой вариант
		if (!$this->products->existsID($id)) return false;
		$ids = explode(',', $_SESSION['cart']);
		echo '<pre>';
		print_r($ids);
		echo '</pre>';
		echo '<hr>';
		echo $id;
		for ($i=0; $i <= count($ids); $i++) 
		{ 
			if ($ids[$i] == $id) 
				{
					unset($ids[$i]);
				}
		}
		echo '<pre>';
		print_r($ids);
		echo '</pre>';
		$_SESSION['cart'] = implode(',', $ids);
		echo '<hr>';
		echo $_SESSION['cart'];
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
		echo 'Ваш заказ успешно отправлен. Менеджер свяжется с Вами в ближайшее время';
		echo '<script>setTimeout(\'location="/"\', 5000)</script>';
	}	
	

	
	

	



}