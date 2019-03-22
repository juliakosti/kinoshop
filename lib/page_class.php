<?php
require_once 'lib/config_class.php';
require_once 'lib/products_class.php';
require_once 'lib/sections_class.php';
require_once 'lib/url_class.php';


class Page 
{
	private $config;
	private $products;
	private $sections;
	private $url;

	public function __construct()
	{
		$this->config = new Config;
		$this->products = new Products;
		$this->sections = new Sections;
		$this->url = new URL;

		$this->secArray = $this->sections->getAllSections();
		$this->newsArray = $this->products->getNewProd();
		

	}
}