<?php
require_once 'admin/constdata/data.php';

class BaseConnect {

	public $db;
	private $dbname;
	private $dbuser;
	private $dbpass;
	

	public function __construct($dbname, $dbuser, $dbpass){
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;	
		try {
		    $this->db= new PDO("mysql:host=localhost;dbname={$this->dbname}", "{$this->dbuser}", "{$this->dbpass}");
		    echo 'Удачное подключение!';
		} catch (PDOException $e) {
		    print "Произошла ошибка. Мы уже оповещены о ней и разбираемся в ситуации. Попробуйте зайти на сайт позже:  " . $e->getMessage() . "<br/>";
		    die();
		}
		
	}

	
	
}