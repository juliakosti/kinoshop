<?php
require_once 'basereq_class.php';

class Sections extends BaseReq 
{ 

	private $url;

	function __construct()	
	{
	parent::__construct("sdvd_sections");
	$this->url = new URL;
	}

	public function getSections() 
	{
		return $this->transformSec($this->getAllSections());
	}

	private function getAllSections() 
	{
		return $this->getAll('id, title', $this->tablename);
	}

	private function transformSec($arr) 
	{
		foreach ($arr as $key => $value) 
		{
			$arr[$key]['link'] = $this->url->section($section[$key]['id']);
		}
		return $arr;
		
	}

}