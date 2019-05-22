<?php
/**
 * 
 */

class Session
{

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key, $value)
	{
		$val = @unserialize($_SESSION[$key])->$value;

		if ($value === 'b:0;' || $val !== false)
		{
			return $val;
		}

		return $_SESSION[$key];
	}

	public static function destoy()
	{
		session_destroy();
	}

	public static function is($name)
	{
		if (isset($_SESSION[$name]))
		{
			return true;
		}

		return false;
	}
}