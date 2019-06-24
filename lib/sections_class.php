<?php
require_once 'basereq_class.php';
require_once 'check_class.php';
require_once 'url_class.php';

class Sections extends BaseReq 
{ 

	private $url;

	function __construct()	
	{
	parent::__construct("sdvd_sections");
	$this->url = new URL;
	$this->check = new Check();
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
			$arr[$key]['link'] = $this->url->section($arr[$key]['id']);
		}
		return $arr;
		
	}

	public function checkSectionId($section_id)
	{
		if (!$this->check->checkId($section_id)) 
		{
			echo '<script>setTimeout(\'location="'.$this->url->notFound().'"\', 0)</script>';
			exit();
		}
		if (!$this->existSectionID($section_id))
		{
			echo '<script>setTimeout(\'location="'.$this->url->notFound().'"\', 0)</script>';
			exit();
		}	
	}

	private function existSectionID($section_id)
	{
		return $this->getOnebySmth('id', $this->tablename, 'id', $section_id);
	}

	public function getSection($section_id)
	{
		$this->checkSectionId($section_id);
		$section = $this->getOnebySmth('id, title', $this->tablename, 'id', $section_id);
		return $section;
					
	}

}