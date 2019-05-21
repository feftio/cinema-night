<?php
/**
 * 
 */

class Session
{
	public static function start()
	{
		if (!isset($_SESSION))
		{
			session_start();
		}
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key, $value)
	{
		$val = (unserialize($_SESSION[$key])->$value);
		return $val;
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