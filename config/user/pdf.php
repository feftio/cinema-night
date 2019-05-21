<?php
//*******************************************************************************
//							SETTING START INFO
//*******************************************************************************

$Author = 'Ticketing';				//	NAME OF FILE {$Author}.pdf (Example.pdf)
$Title = 'Your Code';				//	NAME IN BROWSER(LeftTopSide)

$Orientation = 'P'; 				//  1. $Orientation = 'L'; - LANDSCAPE
									//	2. $Orientation = 'P'; - PORTRAIT
$TYPE_GENERATION_CODE = [
	'STR_UP_LENGTH' => 2,			//	LENGTH OF UP CHARS IN CODE
	'STR_DOWN_LENGTH' => 2,			//	LENGTH OF DOWN CHARS IN CODE
	'STR_NUMBER_LENGTH' => 8		//	LENGTH OF NUMBERS IN CODE
];

$TEXT_HEADER = file_get_contents(ROOT . '/template/text/text.txt');