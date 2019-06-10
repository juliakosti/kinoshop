<?php
require_once 'lib/config_class.php';
require_once 'lib/products_class.php';
require_once 'lib/sections_class.php';
require_once 'lib/url_class.php';
require_once 'lib/cart_class.php';
require_once 'lib/order_class.php';
//временно




class Page 
{
	private $config;
	private $products;
	private $sections;
	private $order;
	
	
	
	public $url;
	public $cartInfo;
	public $cartProd;
	public $prodInfo;


	public function __construct()
	{
		$this->config = new Config();
		$this->products = new Products();
		$this->sections = new Sections();
		$this->url = new Url();
		$this->cart = new Cart();
		$this->order = new Order();

		

		//временно
		
		
		$this->prodInfo = $this->products->getProductsByID($id);
		$this->secArray = $this->sections->getSections();
		$this->newsArray = $this->products->news();
		$this->cartInfo = $this->cart->setInfoCart();
		$this->cartProd = $this->cart->getMyCart();


	}

	public function Try() 
	{
		$this->order->setIntoOrders();
	}
	
	
	public function getMetategs()
	{
		include_once 'tmpl/metategs.tpl';
	}
	public function getIncludes()
	{
		include_once 'tmpl/includes.tpl';
	}
	public function getHat()
	{
		include_once 'tmpl/hat.tpl';
	}
	public function getTopmenu()
	{
		include_once 'tmpl/topmenu+search.tpl';
	}
	public function getLeftmenu()
	{
		include_once 'tmpl/leftmenu.tpl';
	}
	public function getContent()
	{
		echo $_SERVER['REDIRECT_URL'];

		if	($_SERVER['REDIRECT_URL'] == '/order')
		{
			include_once 'tmpl/order.tpl';
			
		}
		elseif	($_SERVER['REDIRECT_URL'] == '/cart')
		{
			include_once 'tmpl/cart.tpl';
		}
		elseif	($_SERVER['REDIRECT_URL'] == '/contacts')
		{
			include_once 'tmpl/contacts.tpl';
		}
		elseif	($_SERVER['REDIRECT_URL'] == '/delivery')
		{
			include_once 'tmpl/delivery.tpl';
		}
		elseif	($_SERVER['REDIRECT_URL'] == '/product')
		{
			include_once 'tmpl/product.tpl';
		}
		
		else 
		{
			include_once 'tmpl/content.tpl';
		}

		
	}
	public function getFooter()
	{
		include_once 'tmpl/footer.tpl';
	}
}