<?php
//	*******************************************************
	ini_set('display_errors', '1');
	error_reporting(E_ALL);
	define('ROOT', dirname(dirname(__FILE__)));
//	*******************************************************
	require_once ROOT . '/web/framework/Error/ErrorHandle.php';
	(new \lib\ErrorHandle())->register();
	require_once ROOT . '/web/framework/Config/Config.php';
//	*******************************************************
	require_once ROOT . '/web/framework/Session/Session.php';
	require_once ROOT . '/web/framework/Config/G.php';
	require_once ROOT . '/web/framework/Database/Database.php';
	require_once ROOT . '/web/framework/View/View.php';
	require_once ROOT . '/web/framework/Protection/Crypt.php';
	require_once ROOT . '/web/framework/Protection/Csrf.php';
	require_once ROOT . '/web/framework/Routing/Router.php';
	require_once ROOT . '/web/framework/Request/Ajax.php';
	require_once ROOT . '/web/framework/Request/Post.php';
	require_once ROOT . '/web/framework/Support/helpers.php';
//	*******************************************************
	(new Router())->run();
//	*******************************************************
?>