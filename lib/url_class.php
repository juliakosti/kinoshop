<?php
require_once "config_class.php";

class Url 
{
	protected $config;

	public function __construct()
	{
		$this->config = new Config();
	}

	public function getView() {
		$view = $_SERVER["REQUEST_URI"];
		$view = substr($view, 1);
		if (($pos = strpos($view, "?")) !== false) {
			$view = substr($view, 0, $pos);
		}
		return $view;
	}

	public function getThisURL() {
		$uri = substr($_SERVER["REQUEST_URI"], 1);
		return $this->config->address.$uri;
	}

	protected function deleteGET($url, $param) {
		$res = $url;
		if (($p = strpos($res, "?")) !== false) {
			$paramstr = substr($res, $p + 1);
			$params = explode("&", $paramstr);
			$paramsarr = array();
			foreach ($params as $value) {
				$tmp = explode("=", $value);
				$paramsarr[$tmp[0]] = $tmp[1];
			}
			if (array_key_exists($param, $paramsarr)) {
				unset($paramsarr[$param]);
				$res = substr($res, 0, $p + 1);
				foreach ($paramsarr as $key => $value) {
					$str = $key;
					if ($value !== "") {
						$str .= "=$value";
					}
					$res .= "$str&";
				}
				$res = substr($res, 0, -1);
			}
		}
		return $res;
	}


	//делаем адреса
	protected function returnURL($url, $index = false) {
		if (!$index) $index = $this->config->address;
		if ($url == "") return $index;
		if (strpos($url, $index) !== 0) $url = $index.$url;
		//if ($this->amp) $url = str_replace("&", "&amp;", $url);
		return $url;
	}

	public function index() {
		return $this->returnURL("");
	}

	public function cart() {
		return $this->returnURL("cart");
	}
	
	public function order() {
		return $this->returnURL("order");
	}
	
	public function message() {
		return $this->returnURL("message");
	}
	
	public function delivery() {
		return $this->returnURL("delivery");
	}
	
	public function contacts() {
		return $this->returnURL("contacts");
	}
	
	public function search() {
		return $this->returnURL("search");
	}
	
	public function catalog($id) {
		return $this->returnURL("catalog");
	}

	public function section($id) {
		return $this->returnURL("catalog/section?section_id=$id");
	}
	
	public function product($id) {
		return $this->returnURL("catalog/product?id=$id");

	}

	public function addCart($id) {
		return $this->returnURL("functions.php?func=add_cart&id=$id");
	}

	public function deleteCart($id) {
		return $this->returnURL("functions.php?func=delete_cart&id=$id");
	}

	public function action() {
		return $this->returnURL("functions.php");
	}


	//конец делаем адреса


	//сортировки
	protected function sortOnField($field, $up) {
		$this_url = $this->getThisURL();
		$this_url = $this->deleteGET($this_url, "up");
		$this_url = $this->deleteGET($this_url, "sort");
		if (strpos($this_url, "?") === false) $url = $this->url."?sort=$field&up=$up";
		else $url = $this_url."&sort=$field&up=$up";
		return $this->returnURL($url);
	}

	public function sortTitleUp() {
		return $this->sortOnField("title", 1);
	}
	
	public function sortTitleDown() {
		return $this->sortOnField("title", 0);
	}
	
	public function sortPriceUp() {
		return $this->sortOnField("price", 1);
	}
	
	public function sortPriceDown() {
		return $this->sortOnField("price", 0);
	}
	//конец сортировки



}