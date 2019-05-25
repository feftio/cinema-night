<?php
/**
 * 
 */
class Str
{
	public static function random($STR_UP_LENGTH = 0, $STR_DOWN_LENGTH = 0, $STR_NUMBER_LENGTH = 0) 
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
}