<?php
require_once ROOT . '/web/rb/rb.php';
//R::setup( 'mysql:host=127.0.0.1;dbname=redbean','login', 'password' );
R::setup( 'mysql:host=' . Config::getdatabase('host') . ';dbname=' . Config::getdatabase('dbname') . '', Config::getdatabase('user'), Config::getdatabase('password')); 

if (!R::testConnection()) 
{
	exit ('[Problems with DB Connection]');
}