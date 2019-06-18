<?php

class Check 
{



	public function cleanFormData($value)
	{
		$value = rtrim(trim(stripslashes(htmlspecialchars(strip_tags($value)))));
	    
	    return $value;
	}
}