<?php 

require_once 'check_class.php';
require_once 'products_class.php';

class Search 
{

	private $check;
	private $products;

	public function __construct()
	{
		$this->check = new Check();
		$this->products = new Products();

	}


	public function getDataFromSearch()
	{
		$search = $this->check->cleanFormData($_GET['search']);
		echo $search;
		return $this->products->getSearchProducts($search);
	}

}