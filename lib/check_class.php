<?php

class Check 
{



	public function cleanFormData($value)
	{
		$value = rtrim(trim(stripslashes(htmlspecialchars(strip_tags($value)))));
	    
	    return $value;
	}

	public function checkId($id)
	{
		$id = intval($this->cleanFormData($id));
		if ((!isset($id)) || ($id == '')) 
		{
			return false;
		}
		elseif ($id < 0) 
		{
			return false;
		}
		else return true;
	}

}