<?php

require_once 'mainview_class.php';

class SearchView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/searchresult.tpl';
        
    }
}