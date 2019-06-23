<?php

require_once 'mainview_class.php';

class SectionView extends MainView
{

	public function __construct()
    {   
    	parent::__construct();
        $this->pagetitle = 'Список фильмов в жанре '.$this->getSmallTitle().' интернет-магазина фильмов и сериалов kinoshop.ru';
        $this->description = 'Список фильмов в жанре '.$this->getSmallTitle().' интернет-магазина фильмов и сериалов kinoshop.ru';
    	$this->smalltitle = $this->getSmallTitle();

        //include_once 'tmpl/content.tpl';
    	
    }

    public function getViewContent()
    {
        include_once 'tmpl/content.tpl';
    }

    private function getSmallTitle()
    {
    	$section_id = $_GET['section_id'];
        $arr = $this->sections->getSection($section_id);
    	$title = $arr['1']['title'];
        return $title;
    }
}