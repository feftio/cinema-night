<?php
/**
 * 
 */
class Post
{
	public static function catch($UserFunction)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if ( (isset($_POST)) && (!empty($_POST)) )
			{
				$UserFunction($_POST);
			}
			die();
		}
	}
}