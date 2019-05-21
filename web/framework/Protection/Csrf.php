<?php
/**
 * 
 */

class Csrf
{
	private static $key   = '';
	private static $token = '';

	private static function badresponce()
	{
		header('HTTP/1.1 400 Bad Request');
		header('Content-Type: application/json; charset=UTF-8');
		die();
	}

	private static function generate()
	{
		self::$token = Crypt::bin2hexPHP();
		Session::set(self::key(), self::token());
	}

	public static function token()
	{
		return self::$token;
	}

	public static function key()
	{
		return self::$key;
	}

	public static function field()
	{
		echo '<input type="hidden" name="' . self::key() . '" value="' . self::token() . '">';
	}

	public static function catch()
	{
		self::$key = Config::getcsrf('key');

		if ((isset($_POST[self::key()]) || !empty($_POST[self::key()])) && ($_SERVER['REQUEST_METHOD'] === 'POST'))
		{
			if (!(hash_equals(Session::get(self::key()), $_POST[self::key()])))
			{
				self::badresponce();
			}
			else
			{
				self::generate();
			}
		}
		else
		{
			if ($_SERVER['REQUEST_METHOD'] === 'POST')
			{
				self::badresponce();
			}
			else
			{
				self::generate();
			}
		}
	}
}