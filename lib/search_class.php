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
		if ($_GET['search'] !== '') 
		{
			$search = $this->check->cleanFormData($_GET['search']);
			return $this->products->getSearchProducts($search);
		}
		
	}

}