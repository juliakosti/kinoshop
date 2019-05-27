<?php
require_once 'config_class.php';
require_once 'products_class.php';

class Manage {

	private $config;

	public function __construct() 
	{
		//session_start();
		$this->config = new Config();
		$this->products = new Products();
	}

	public function addToCart()
	{
		$id = $_REQUEST['id'];//Попробовать найти другой вариант
		if (!$this->products->existsID($id)) return false;
		if ($_SESSION['cart']) $_SESSION['cart'] .=", $id";
		else $_SESSION['cart'] = $id;
		
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
		/*$id = $this->data["id"];
		
		$_SESSION["cart"] = "";
		for ($i = 0; $i < count($ids); $i++) {
			if ($ids[$i] != $id) $this->addCart($ids[$i]);*/
	}
	

}