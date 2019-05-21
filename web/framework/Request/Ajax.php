<?php
/**
 * 
 */
class Ajax
{
	public static function catch($UserFunction, $withoutError=True)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
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