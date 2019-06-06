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

	protected function getNews($params, $tablename, $section_id)
	{	
		if ($section_id) 
			{
				$query_inn = "SELECT $params from $tablename WHERE section_id = $section_id ORDER BY date DESC LIMIT 6";
			} else
				$query_inn = "SELECT $params from $tablename ORDER BY date DESC LIMIT 12";

		try 
		{
			$result = $this->db->query($query_inn);
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
				$this->sel[$i] = $res; $i++;
				}
			return $this->sel;

		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}

	protected function setIntoTable()
	{
		$query = "INSERT INTO sdvd_orders (name, phone, email, delivery, address, notice, product_ids, price, date_order) VALUES ('Юлия', '+79208443208', 'test@test.ru', '0', '241020, г. Брянск, ул. Маяковского, д.4, кв. 35', 'Доставьте быстро', '13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 9, 2, 5, 5', '3843', '06-06-2019 12:39:49')";
		
		try
		{
			$result = $this->db->prepare($query);
			$result -> execute();
			echo 'Ваш заказ зарегистрирован';

		} catch (PDOException $e) 
		{
			echo 'Ошибка выполнения запроса: ' . $e->getMessage();
		}
	}
}
