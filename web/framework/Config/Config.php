<?php
/**
 * 
 */

class Config
{
	private static $SysPathes = 
	[
		'dirs.php'     => '/config/dirs.php',
		'global.php'   => '/config/global.php',
		'router.php'   => '/config/router.php',
		'routes.php'   => '/config/routes.php',
		'database.php' => '/config/database.php',
		'csrf.php'     => '/config/csrf.php'
	];

	private static $dirs     = [];
	private static $global   = [];
	private static $router   = [];
	private static $routes   = [];
	private static $database = [];
	private static $csrf     = [];

//	******************************************
//	*******************SET********************
//	******************************************

	public static function init()
	{
		self::$dirs     = include_once ROOT . self::$SysPathes['dirs.php'];
		self::$global   = include_once ROOT . self::$SysPathes['global.php'];
		self::$routes   = include_once ROOT . self::$SysPathes['routes.php'];
		self::$router   = include_once ROOT . self::$SysPathes['router.php'];
		self::$database = include_once ROOT . self::$SysPathes['database.php'];
		self::$csrf     = include_once ROOT . self::$SysPathes['csrf.php'];
	}

//	******************************************
//	*******************GET********************
//	******************************************

	public static function getdirs($key='')
	{
		if ($key === '')
		{
			return self::$dirs;
		}
		else
		{
			return self::$dirs[$key];
		}
	}

	public static function getglobal($key='')
	{
		if ($key === '')
		{
			return self::$global;
		}
		else
		{
			return self::$global[$key];
		}
	}

	public static function getrouter($key='')
	{
		if ($key === '')
		{
			return self::$router;
		}
		else
		{
			return self::$router[$key];
		}
	}

	public static function getroutes($key='')
	{
		if ($key === '')
		{
			return self::$routes;
		}
		else
		{
			return self::$routes[$key];
		}
	}

	public static function getdatabase($key='')
	{
		if ($key === '')
		{
			return self::$database;
		}
		else
		{
			return self::$database[$key];
		}
	}

	public static function getcsrf($key='')
	{
		if ($key === '')
		{
			return self::$csrf;
		}
		else
		{
			return self::$csrf[$key];
		}
	}

	public static function getSysPathes($key='')
	{
		if ($key === '')
		{
			return self::$SysPathes;
		}
		else
		{
			return self::$SysPathes[$key];
		}
	}
}

Config::init();