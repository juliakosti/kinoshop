<?php

require_once 'mainview_class.php';

class SectionView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/content.tpl';
        
    }
}