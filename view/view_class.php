<?php

require_once 'mainview_class.php';

class View extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	$this->pagetitle = 'Интернет-магазин фильмов и сериалов kinoshop.ru';
    	$this->description = 'интернет-магазин фильмов и сериалов';
    	$this->smalltitle = 'Новинки';
    	//include_once 'tmpl/content.tpl';
        
    }

    public function getViewContent()
    {
    	include_once 'tmpl/content.tpl';
    }
}