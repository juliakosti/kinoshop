<?php

class Check 
{



	public function cleanFormData($value)
	{
		$value = trim(stripslashes(strip_tags(htmlspecialchars($value))));
	    
	    return $value;
	}
}