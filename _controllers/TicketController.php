<?php
/**
 * 
 */
include_once ROOT . '/models/Ticket.php';
class TicketController 
{

//	**************************************************
//	**************************************************

	public function actionIndex()
	{
		//include_once ROOT . '/config/db/db_tables.php';
		//include_once ROOT . '/config/pdf/pdf_ticket.php';

		$IDEN  = $params[0];
		$LOGIN = "Alex54";
		$CODE  = "sdsdgs";

		$RANDOM_STRING = Ticket::checkingILC($IDEN, $LOGIN, $CODE, $TABLE_NAME);

		include_once ROOT . '/views/ticketing.php';
	}

//	**************************************************
//	**************************************************

}