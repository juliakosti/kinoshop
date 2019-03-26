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
	public $x;

	public function __construct()
	{
		$this->config = new Config;
		$this->products = new Products;
		$this->sections = new Sections;
		$this->url = new URL;

		$this->secArray = $this->sections->getAllSections();
		
		

	}
	
	public function TransformNews()
	{   
		$this->newsArray = $this->products->getNewProd();
		foreach ($this->newsArray as $key => $value) {
			$this->newsArray[$key]['img'] = $this->config->dirProdImg.$this->newsArray[$key]['img'];
		}
		return $this->newsArray;
	}

	public function getMetategs()
	{
		include_once 'tmpl/metategs.tpl';
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