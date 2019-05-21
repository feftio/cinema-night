<?php
/**
 * 
 */
class Ajax
{
	public static function catch($UserFunction)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{
			if ( (isset($_GET)) && (!empty($_GET)) )
			{
				$UserFunction($_GET);
			}
			if ( (isset($_POST)) && (!empty($_POST)) )
			{
				$UserFunction($_POST);
			}

			die();
		}
	}
}