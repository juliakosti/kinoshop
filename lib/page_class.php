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
	public $url;
	

	public function __construct()
	{
		$this->config = new Config;
		$this->products = new Products;
		$this->sections = new Sections;
		$this->url = new URL;

		$this->secArray = $this->sections->getSections();
		$this->newsArray = $this->products->news();
		

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
		include_once 'tmpl/content.tpl';
	}
	public function getFooter()
	{
		include_once 'tmpl/footer.tpl';
	}
}