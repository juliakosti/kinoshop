<?php

require_once 'mainview_class.php';

class AddorderView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	
        
    }

    public function getViewContent()
    {
        include_once 'tmpl/ordermessage.tpl';
    }
}