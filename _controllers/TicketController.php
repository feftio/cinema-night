<?php
/**
 * 
 */
class TicketController 
{

//	**************************************************
//	**************************************************

	public function actionIndex($params)
	{
		$bean = R::findOne("seat", "login = ? AND iden = ? AND status = 1", array(Session::get("user", "login"), $params[0]));

		if (!session_is("user") || (is_null($bean)))
		{
			header("Location: /");
		}
		else
		{

			$IDEN  = $params[0];
			$LOGIN = Session::get("user", "login");
			$CODE = $bean->code;

			G::setvar(False, [
				'bean'  => $bean,
				'iden'  => $IDEN,
				'login' => $LOGIN
			]);


			view("ticketing.php");
		}
	}

//	**************************************************
//	**************************************************

}