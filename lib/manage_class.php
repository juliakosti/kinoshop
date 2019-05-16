<?php
require_once 'config_class.php';

class Manage {

	private $config;

	public function __construct() 
	{
		session_start();
		$this->config = new Config();
	}

	public function addCart()
	{
		$id = $this->data['id'];
		if (!$this-> product->existsID($id)) return false;//дописать функцию
		if ($_SESSION['cart']) $_SESSION['cart'] .=", $id";
		else $_SESSION['cart'] = $id;
	}

}