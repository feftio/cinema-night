<?php
/**
 * 
 */
class Get
{
	public static function catch($UserFunction, $withoutError=True)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'Get')
		{
			$UserFunction();
		}
		else
		{
			if ($withoutError)
			{
				header('HTTP/1.1 400 Bad Request');
				header('Content-Type: application/json; charset=UTF-8');
				die();
			}
		}
	}
}