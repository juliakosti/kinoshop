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
		return $this->getAll("id, title", $this->tablename);
	}

	public function GetProductByID($id)
	{
		return $this->getOnebySmth('title', $this->tablename, 'id', $id);
	}
	

}