<?php

require_once 'mainview_class.php';

class SectionView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/content.tpl';
    	$this->smalltitle = '8';
    }

    public function getSmallTitle()
    {
    	$section_id = $_GET['section_id'];
    	$arr = $this->sections->getSection($section_id);
    	$title = $arr['1']['title'];
    	return $title;
    }
}