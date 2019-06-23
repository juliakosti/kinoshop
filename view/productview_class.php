<?php

require_once 'mainview_class.php';

class ProductView extends MainView
{
	public $othProd;

	public function __construct()
    {   
    	parent::__construct();
    	$this->prodInfo = $this->products->getOneProductByID($id);
    	$this->othProd = $this->OtherProducts();
    	//include_once 'tmpl/product.tpl';
        
    }

    public function OtherProducts()
    {
    	$arr = $this->products->getProdBySection($this->prodInfo['1']['section_id']);
    	
    	$arr = $this->products->transformProd($arr);
    	
    	
    	return $arr;
    }

    public function getViewContent()
    {
        include_once 'tmpl/product.tpl';
    }
}