<?php

require_once 'mainview_class.php';

class View extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/content.tpl';
        
    }
}