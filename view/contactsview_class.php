<?php

class ContactsView extends MainView
{


    public function __construct()
    {
    	parent::__construct();
    	$this->pagetitle = 'Страница контактов kinoshop.ru';
    	$this->description = 'Страница контактов Интернет-магазина фильмов и сериалов kinoshop.ru';
    	

    }

	public function getViewContent()
    {
        include_once 'tmpl/contacts.tpl';
    }
}