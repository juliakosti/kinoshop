<?php


require_once 'mainview_class.php';

class NotfoundView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/404.tpl';
        
    }
}