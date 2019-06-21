<?php

require_once 'mainview_class.php';

class View extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	$this->smalltitle = 'Новинки';
    	include_once 'tmpl/content.tpl';
        
    }
}