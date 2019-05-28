<?php

require_once 'basereq_class.php';


class Discount extends BaseReq 
{ 
	private $config;
    private $url;

	function __construct()	
	{
		parent::__construct('sdvd_discounts');
		$this->config = new Config();
		$this->url = new Url();
		
	}

	public function getValueOnCode()
	{
		$value = $this->getOnebySmth('value', $this->tablename, 'code', 'ABCD');
		echo $value;
	}





}