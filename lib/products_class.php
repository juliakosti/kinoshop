<?php
require_once 'basereq_class.php';
require_once 'sections_class.php';
require_once 'check_class.php';
require_once 'url_class.php';

class Products extends BaseReq 
{ 
    public $newProd;
    private $config;
    private $url;
    private $sections;

	function __construct()	
	{
		parent::__construct("sdvd_products");
		$this->config = new Config();
		$this->url = new Url();
		$this->check = new Check();
		$this->sections = new Sections();
		
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

	public function transformProd($arr)//Трансформируем исходный массив
	{   
		foreach ($arr as $key => $value) {
			$arr[$key]['img'] = $this->config->dirProdImg.$arr[$key]['img'];
			$arr[$key]['link'] = $this->url->product($arr[$key]['id']);
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

	public function checkProductId($id)
	{
		if (!$this->check->checkId($id)) 
		{
			header("Location: ".$this->url->notFound());
			exit();
		}
		if (!$this->existsID($id))
		{
			header("Location: ".$this->url->notFound());
			exit();
		}	
	}

	private function existsID($id) 
	{
		return $this->getOnebySmth('id', $this->tablename, 'id', $id);
		 

	}

	public function getSearchProducts($data)
	{	
		$arr = $this->getLike('id, title', $this->tablename, ['title', 'year', 'country', 'cast', 'director'], $data);
		
		if ($arr) 
		{   
			$arr = $this->transformProd($arr);
			return $arr;
		}
		else return false;
	}
	 
	


	public function getProdBySection($section_id, $order='title', $desc=false)
	{
		$sectionProd = $this->getOnebySmth('*', $this->tablename, 'section_id', $section_id, $order, $desc);
		return $sectionProd;
		
	}

	public function getPriceOnIDs($ids) {
		$prod = $this->getProductsByID($ids);
		$summa = 0;
		for ($i=0; $i <count($prod) ; $i++) { 
			$summa += $prod[$i]['price'];
		}
		return $summa;
	}
	
	public function getProductsByID($ids)
	{	
		for ($i=0; $i < count($ids); $i++) 
		{
			$id = $ids[$i];
			$products[$i] = $this->getOnebySmth('id, img, title, price', $this->tablename, 'id', $id);
		}
		
		for ($i=0; $i < count($products); $i++) 
		{ 
			$prod[$i]['id'] = $products[$i][1]['id'];
			$prod[$i]['title'] = $products[$i][1]['title'];
			$prod[$i]['price'] = $products[$i][1]['price'];
			$prod[$i]['img'] = $this->config->dirProdImg.$products[$i][1]['img'];
		}
		
		return $prod;

	}
	
	public function getOneProductByID($id)
	{   
		if (isset ($_GET['id'])) 
		{
			$id = $_GET['id'];
		}
		$this->checkProductId($id); 
		$arr = $this->getOnebySmth('id, section_id, title, price, img, price, year, country, director, play, cast, description', $this->tablename, 'id', $id);
		$arr = $this->transformProd($arr);

		$noname = ($this->sections->getSection($arr['1']['section_id']));
		$arr['1']['section_title'] = $noname['1']['title'];

		return $arr;
	}
	
	public function getProductsBySectionID($sec_id, $order ='title', $desc = false)
	{
		return $this->getOnebySmth('title, price', $this->tablename, 'section_id', $sec_id, $order, $desc);
	}

}