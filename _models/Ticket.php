<?php
/**
 * 
 */
class Ticket
{

	public static function checkingILC($IDEN, $LOGIN, $CODE, $TABLE_NAME)
	{
		if (($IDEN == '') || ($LOGIN == '') || ($CODE == ''))
		{
			echo '[["iden" or "login" or "code" are null]]';
			exit;
		}

		$CODE_IN_DATABASE = R::getAll( 'SELECT * FROM `seat` WHERE iden = :iden and login = :login and code = :code', array(':iden' => $IDEN, ':login' => $LOGIN, ':code' => $CODE));

		if (!($CODE_IN_DATABASE)) 
		{ 
			echo '[["iden" or "login" or "code" are not correct]]';
			//require_once ROOT . '/error.php';
			exit;
		} 
		else 
		{
			$RANDOM_STRING = $CODE;
			return $RANDOM_STRING;
		}
	}

}
