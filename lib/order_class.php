<?php
require_once 'basereq_class.php';
require_once 'check_class.php';
require_once 'config_class.php';
require_once 'url_class.php';
require_once 'products_class.php';

class Order extends BaseReq
{
	private $config;
	private $url;
	private $products;
	private $check;

	function __construct()	
	{
		parent::__construct("sdvd_orders");
		$this->config = new Config();
		$this->url = new Url();
		//$this->template = new Template();
		$this->products = new Products();
		$this->check = new Check();
		
	}

	public function setIntoOrders()
		{
			$params = implode(array_keys($this->dataOrder()), ', ');  
			$myparams = "'". implode(array_values($this->dataOrder()) , "', '") . "'";
			$this->setIntoTable($this->tablename, $params, "$myparams");
		}

	public function dataOrder()
	{
		if (isset($_POST['fio'])) 
		{
			$_SESSION['fio'] = $this->check->cleanFormData($_POST['fio']);
		}
		if (isset($_POST['phone'])) 
		{
			$_SESSION['phone'] = $this->check->cleanFormData($_POST['phone']);
		}
		if (isset($_POST['email'])) 
		{
			$_SESSION['email'] = $this->check->cleanFormData($_POST['email']);
		}
		if (isset($_POST['delivery'])) 
		{
			$_SESSION['delivery'] = $this->check->cleanFormData($_POST['delivery']);
		}
		if (isset($_POST['address'])) 
		{
			$_SESSION['address'] = $this->check->cleanFormData($_POST['address']);
		}
		if (isset($_POST['notice'])) 
		{
			$_SESSION['notice'] = $this->check->cleanFormData($_POST['notice']);
		}


		$arr = [
		
			'name' => $_SESSION['fio'],
			'phone' => $_SESSION['phone'],
			'email' => $_SESSION['email'],
			'delivery' => $_SESSION['delivery'],
			'address' => $_SESSION['address'],
			'notice' => $_SESSION['notice'],
			'product_ids' =>$_SESSION['cart'],
			'price' =>$_SESSION['order_summa'],
			'date_order' =>date("d-m-Y H:i:s"),

		];


		return $arr;

	}


	
}