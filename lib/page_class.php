<?php

require_once 'view/mainview_class.php';

//временно




class Page extends MainView
{
	private $myclass;

	public function __construct()
	{
		parent::__construct();
		$view = $this->url->getView();
		$class = ucfirst($view."View");
		if ($this->url->fileExists(strtolower('view/'.$class."_class.php"))) 
		{
			include_once 'view/'.$class.'_class.php';
			$this->myclass = new $class();
		}
		else {
			header("Location: ".$this->url->notFound());
			exit;
		}

		
		$this->viewPage();


	}

	public function viewPage()
	{
		include_once 'tmpl/main.tpl';
	}

	
	
	public function getMetategs()
	{
		include_once 'tmpl/metategs.tpl';
	}
	public function getIncludes()
	{
		include_once 'tmpl/includes.tpl';
	}
	public function getHat()
	{
		include_once 'tmpl/hat.tpl';
	}
	public function getTopmenu()
	{
		include_once 'tmpl/topmenu+search.tpl';
	}
	public function getLeftmenu()
	{
		include_once 'tmpl/leftmenu.tpl';
	}
	public function getContent()
	{
		
		return $this->myclass->getViewContent();

				
	}
	public function getFooter()
	{
		include_once 'tmpl/footer.tpl';
	}
}