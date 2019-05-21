<?php
/**
 * 
 */
class Post
{
	public static function catch($UserFunction, $withoutError=True)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
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