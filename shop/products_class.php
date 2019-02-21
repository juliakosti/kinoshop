<?php
require_once 'basereq_class.php';

class Products extends BaseReq 
	{ 

		function __construct()	
		{
		parent::__construct("sdvd_products");
		}
		
		public function GetAllProducts() 
		{
			return $this->getAll("id, img, title, price", $this->tablename);
		}

		

	}