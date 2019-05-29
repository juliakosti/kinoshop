<?php

require_once 'basereq_class.php';


class Discounts extends BaseReq 
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
		$value = 1;
		$value = $this->getParam();
		echo $value;
	}

	public function existsValue($code) 
	{
		$arr = $this->getAll('*', $this->tablename, 'id');
		foreach ($arr as $key => $value) 
		{
			if ($arr[$key]['code'] == $code )  
			{
				$disc = $arr[$key]['value'];
			}
		}

		return $disc;

	} 
		
}





