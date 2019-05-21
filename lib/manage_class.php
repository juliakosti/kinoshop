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
		print_r($_SESSION);
	}

	

}