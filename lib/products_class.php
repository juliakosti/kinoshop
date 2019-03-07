<?php
require_once 'basereq_class.php';

class Products extends BaseReq 
{ 
    
	function __construct()	
	{
		parent::__construct("sdvd_products");
	}
	
	public function getAllProducts($order ='title', $desc = false) 
	{
		return $this->getAll("id, title, price", $this->tablename, $order, $desc);
	}

    
    public function getNewProd($param='price', $order=SORT_ASC) 
	{   
		$newProd = $this->getNews($this->tablename);
		foreach ($newProd as $key => $row) 
		{
			$array_price[$key] = $row[$param];
		}
		array_multisort($array_price, $order, $newProd);
		//временно
		echo '<pre>';	
		print_r($newProd);
		echo '</pre>';
	}

	
	public function getProdBySection($section_id, $order='title', $desc=false)
	{
		$sectionProd = $this->getOnebySmth('*', $this->tablename, 'section_id', $section_id, $order, $desc);
		//временно
		echo '<pre>';	
		print_r($sectionProd);
		echo '</pre>';
	}
	
	
	public function getProductByID($id)
	{
		return $this->getOnebySmth('title', $this->tablename, 'id', $id);
	}
	
	public function getProductsBySectionID($sec_id, $order ='title', $desc = false)
	{
		return $this->getOnebySmth('title, price', $this->tablename, 'section_id', $sec_id, $order, $desc);
	}

}