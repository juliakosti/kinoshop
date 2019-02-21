<?php
require_once 'baseconnect_class.php';

abstract class BaseReq extends BaseConnect {

	public $sel;
	

	public function __construct($tablename)
	{
		parent::__construct(KS_BASE, KS_BASE_US, KS_BASE_PASS);
		$this->tablename = $tablename;
	}

	protected function getAll($params, $tablename) 
	{
	try {
		$query = "SELECT $params from $this->tablename";
		$result = $this->db->query($query);
		$i = 1;
		while($res = $result->fetch(PDO::FETCH_ASSOC)){
			$this->sel[$i] = $res; $i++;
		}
		return $this->sel;
		

		} catch (PDOException $e) 
		{
	    echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	protected function getOnebySmth($params, $tablename, $param, $myparam)
	{
		try
		{
			$query = "SELECT $params from $tablename WHERE $param= $myparam";
			$result = $this->db->prepare($query);
			$result -> execute();
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC))
				{
				$this->sel[$i] = $res; $i++;
				}
			return $this->sel;

		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}
}
