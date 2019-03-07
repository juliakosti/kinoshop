<?php
require_once 'basereq_class.php';

class Sections extends BaseReq 
{ 

	function __construct()	
	{
	parent::__construct("sdvd_sections");
	}
	
	public function getAllSections() 
	{
		return $this->getAll("title", $this->tablename);
	}

	

}