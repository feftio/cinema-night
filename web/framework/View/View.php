<?php
/**
 * 
 */
class View
{
	public static function render($fileName)
	{
		include_once ROOT . Config::getdirs('views') . '/' . $fileName;
	} 
}