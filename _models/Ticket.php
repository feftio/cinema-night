<?php
/**
 * 
 */
class Ticket
{
	public static function getTicketKeyById($id)
	{
		
	}

	public static function getRandomString($STR_UP_LENGTH = 0, $STR_DOWN_LENGTH = 0, $STR_NUMBER_LENGTH = 0) 
	{
		$stringUp = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $stringDown = 'abcdefghijklmnopqrstuvwxyz';
	    $stringNumbers = '1234567890';

	    $stringUplength = strlen($stringUp);
	    $stringDownlength = strlen($stringDown);
	    $stringNumberslenght = strlen($stringNumbers);

	    $RandomString = '';

		// strUp Generation
	    for ($i = 0; $i < $STR_UP_LENGTH; $i++) {
	        $RandomString .= $stringUp[rand(0, $stringUplength - 1)];
	    }

		// strDown Generation
	 	for ($i = 0; $i < $STR_DOWN_LENGTH; $i++) {
	        $RandomString .= $stringDown[rand(0, $stringDownlength - 1)];
	    }

		// numlenght Generation
	     for ($i = 0; $i < $STR_NUMBER_LENGTH; $i++) {
	        $RandomString .= $stringNumbers[rand(0, $stringNumberslenght - 1)];
	    }

	    return $RandomString; //AAaa1234(4569760000)
	}

	public static function checkingILC($IDEN, $LOGIN, $CODE, $TABLE_NAME)
	{
		if (($IDEN == '') || ($LOGIN == '') || ($CODE == ''))
		{
			echo '[["iden" or "login" or "code" are null]]';
			exit;
		}

		$CODE_IN_DATABASE = R::getAll( 'SELECT * FROM `' . $TABLE_NAME['TABLE_FOR_CODE'] . '` WHERE iden = :iden and login = :login and code = :code', array(':iden' => $IDEN, ':login' => $LOGIN, ':code' => $CODE));

		if (!($CODE_IN_DATABASE)) 
		{ 
			//echo '[["iden" or "login" or "code" are not correct]]';
			require_once ROOT . '/error.php';
			exit;
		} 
		else 
		{
			$RANDOM_STRING = $CODE;
			return $RANDOM_STRING;
		}
	}

}
