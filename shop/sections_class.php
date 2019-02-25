<?php
require_once 'basereq_class.php';

class Sections extends BaseReq 
{ 

	function __construct()	
	{
	parent::__construct("sdvd_sections");
	}
	
	public function GetAllSections() 
	{
		return $this->getAll("title", $this->tablename);
	}

	public function GetSectionByID($id)
	{
		return $this->getOnebySmth('title', $this->tablename, 'id', $id);
	}
	

}