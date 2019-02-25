<?php
require_once 'basereq_class.php';

class Products extends BaseReq 
{ 

	function __construct()	
	{
		parent::__construct("sdvd_products");
	}
	
	public function GetAllProducts($order ='title', $desc = false) 
	{
		return $this->getAll("id, title, price", $this->tablename, $order, $desc);
	}

	
	public function GetProductByID($id)
	{
		return $this->getOnebySmth('title', $this->tablename, 'id', $id);
	}
	
	public function GetProductsBySectionID($sec_id, $order ='title', $desc = false)
	{
		return $this->getOnebySmth('title, price', $this->tablename, 'section_id', $sec_id, $order, $desc);
	}

}