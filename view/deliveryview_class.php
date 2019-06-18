<?php

require_once 'mainview_class.php';

class DeliveryView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/delivery.tpl';
        
    }
}