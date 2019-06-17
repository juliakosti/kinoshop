<?php
require_once 'baseconnect_class.php';

abstract class BaseReq extends BaseConnect {

	
	

	public function __construct($tablename)
	{
		parent::__construct(KS_BASE, KS_BASE_US, KS_BASE_PASS);
		$this->tablename = $tablename;
	}

	protected function getAll($params, $tablename, $order='title', $desc=false) 
	{
		if (!$desc) 
		{
			$query = "SELECT $params from $this->tablename ORDER BY $order" ;
		} else 
		{
			$query = "SELECT $params from $this->tablename ORDER BY $order DESC"; 
		}	

		try 
		{
			$result = $this->db->query($query);
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC))
				{
					$sel[$i] = $res; $i++;
				}
			return $sel;
		

		} catch (PDOException $e) 
		{
	    	echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	protected function getNews($params, $tablename, $section_id)
	{	
		if ($section_id) 
			{
				$query_inn = "SELECT $params from $tablename WHERE section_id = $section_id ORDER BY date DESC LIMIT 12";
			} else
				$query_inn = "SELECT $params from $tablename ORDER BY date DESC LIMIT 12";

		try 
		{
			$result = $this->db->query($query_inn);
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC))
				{
					$sel[$i] = $res; $i++;
				}
			return $sel;
		

		} catch (PDOException $e) 
		{
	    	echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	
	
	protected function getOnebySmth($params, $tablename, $param, $myparam, $order = 'id', $desc = false)
	{
		if (!$desc)
		{
			$query = "SELECT $params from $tablename WHERE $param= $myparam ORDER BY $order";
		} else 
		{
			$query = "SELECT $params from $tablename WHERE $param= $myparam ORDER BY $order DESC";
		} 
		try
		{
			$result = $this->db->prepare($query);
			$result -> execute();
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC))
				{
				$sel[$i] = $res; $i++;
				}
			return $sel;

		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	protected function getLike($params, $tablename, $paramsarr, $myparam)
	{
		$query = "SELECT $params FROM $tablename WHERE";
		for ($i=0; $i < (count($paramsarr)); $i++) 
		{ 
			$query .=' '. $paramsarr[$i]." LIKE '%$myparam%'".' OR';
		}
		
		$query = substr($query, 0, -2);
		echo $query;
		
		try
		{
			$result = $this->db->prepare($query);
			$result -> execute();
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC))
				{
				$sel[$i] = $res; $i++;
				}
			return $sel;

		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}	

	}

	protected function setIntoTable($tablename, $params, $myparams)
	{
		$query = "INSERT INTO $tablename ($params) VALUES ($myparams)";
		
		try
		{
			$result = $this->db->prepare($query);
			$result -> execute();
			
		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}
}
