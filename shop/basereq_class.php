<?php
require_once 'baseconnect_class.php';

abstract class BaseReq extends BaseConnect {

	public $sel;
	

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
					$this->sel[$i] = $res; $i++;
				}
			return $this->sel;
		

		} catch (PDOException $e) 
		{
	    	echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	private function getNewsIds()
	{
		$query_inn = "SELECT id from $this->tablename ORDER BY date DESC LIMIT 6";
		try 
		{
			$result = $this->db->query($query_inn);
			$i = 1;
			while($res = $result->fetch(PDO::FETCH_ASSOC))
				{
					$this->ids[$i] = $res; $i++;
				}
			return $this->ids;
		

		} catch (PDOException $e) 
		{
	    	echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	protected function getAllNews($params, $tablename, $param, $myparam, $order='title') 
	{
		$query_out = "SELECT $params from $tablename WHERE id= $id ORDER BY $order";
		try 
		{
			$result = $this->db->query($query_out);
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




	protected function getOnebySmth($params, $tablename, $param, $myparam, $order='title', $desc=false)
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
				$this->sel[$i] = $res; $i++;
				}
			return $this->sel;

		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}
}
