<?php
require_once 'basereq_class.php';

class Products extends BaseReq 
{ 
    public $newProd;
    private $config;
    private $url;

	function __construct()	
	{
		parent::__construct("sdvd_products");
		$this->config = new Config();
		$this->url = new Url();
		
	}
	
	public function news()
	{
		if (!empty($_GET['sort'])) 
		{
			$param = $_GET['sort'];
		} else $param = 'title';
		if ($_GET['up'] === '0') {
			$order = SORT_DESC;
		} else $order = SORT_ASC;

		return $this->transformProd($this->getNewProd($param, $order));
	}

	private function transformProd($arr)//Трансформируем исходный массив
	{   
		foreach ($arr as $key => $value) {
			$arr[$key]['img'] = $this->config->dirProdImg.$arr[$key]['img'];
			$arr[$key]['link_cart'] = $this->url->addCart($arr[$key]['id']);
		}
		return $arr;
	}

	public function getAllProducts($order ='title', $desc = false) 
	{
		return $this->getAll("id, title, price", $this->tablename, $order, $desc);
	}

    
    private function getNewProd($param, $order) 
	{   
		
		$section_id = $_GET['section_id'];
		$newProd = $this->getNews('id, title, img, price', $this->tablename, $section_id);
		foreach ($newProd as $key => $row) 
		{
			$array_price[$key] = $row[$param];
		}
		array_multisort($array_price, $order, $newProd);
		
		return $newProd;
		
	}

	public function existsID($id) 
	{
		return $this->getOnebySmth('id', $this->tablename, 'id', $id);
		 

	}
	
	public function getProdBySection($section_id, $order='title', $desc=false)
	{
		$sectionProd = $this->getOnebySmth('*', $this->tablename, 'section_id', $section_id, $order, $desc);
		//временно
		echo '<pre>';	
		print_r($sectionProd);
		echo '</pre>';
	}

	public function getPriceOnIDs($ids) {
		$products = $this->getProductsByID($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["id"]] = $products[$i]["price"];
		}
		$summa = 0;
		for ($i = 0; $i < count($ids); $i++) {
			$summa += $result[$ids[$i]];
		}
		return $summa;
	}
	
	public function getProductsByID($ids)
	{	
		for ($i=0; $i < count($ids); $i++) 
		{
			$id = $ids[$i];
			$products[$i] = $this->getOnebySmth('title, price', $this->tablename, 'id', $id);
		}
		
		echo '<pre>';
		print_r($products);
		echo '</pre>';
	}
	
	public function getOneProductByID($id)
	{
		return $this->getOnebySmth('title, price', $this->tablename, 'id', $id);
	}
	
	public function getProductsBySectionID($sec_id, $order ='title', $desc = false)
	{
		return $this->getOnebySmth('title, price', $this->tablename, 'section_id', $sec_id, $order, $desc);
	}

}