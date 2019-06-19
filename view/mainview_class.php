<?php
require_once 'lib/config_class.php';
require_once 'lib/products_class.php';
require_once 'lib/sections_class.php';
require_once 'lib/url_class.php';
require_once 'lib/cart_class.php';
require_once 'lib/order_class.php';
require_once 'lib/search_class.php';

class MainView

{
	public $title;
	public $description;
	public $keyword;
	public $h1;
	public $seourl;
	public $inc;
	public $smalltitle;

	public $url;
	public $cartInfo;
	public $cartProd;
	public $prodInfo;
	public $searchResult;

	protected $config;
	protected $products;
	protected $sections;
	protected $order;

	public function __construct()

	{
		$this->config = new Config();
		$this->products = new Products();
		$this->sections = new Sections();
		$this->url = new Url();
		$this->cart = new Cart();
		$this->order = new Order();
		$this->search = new Search();

		$this->title = $title;
		$this->description = $description;
		$this->keyword = $keyword;
		$this->h1 = $h1;
		$this->seourl = $seourl;
		$this->inc = $inc;
		$this->smalltitle = 'Новинки';

		$this->secArray = $this->sections->getSections();
		$this->newsArray = $this->products->news();
		$this->cartInfo = $this->cart->setInfoCart();
		$this->cartProd = $this->cart->getMyCart();
		$this->searchResult = $this->search->getDataFromSearch();


	}

    public function Try() 
	{
		
	}























}