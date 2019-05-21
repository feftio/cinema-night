<?php
/**
 * 
 */

class Crypt
{
	public static function bin2hex7()
	{
		return bin2hex(random_bytes(32));
	}

	public static function bin2hex5()
	{
		if (function_exists('mcrypt_create_iv'))
		{
			return bin2hex(mcrypt_create_iv(32, MCRYPT_DEV));
		}
		else
		{
			return bin2hex(opensll_random_pseudo_bytes(32));
		}
	}

	public static function bin2hexPHP()
	{
		if (version_compare(PHP_VERSION, '7.0.0', '>='))
		{
			return self::bin2hex7();
		}
		else
		{
			return self::bin2hex5();
		}
	}
}