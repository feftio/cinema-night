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

		if ((!session_is("user") || Session::get("user", "role") == "admin") || (is_null($bean)))
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


	public function actionWipe($params)
	{
		//$bean = R::findOne("seat", "login = ? AND iden = ? AND status = 1", array(Session::get("user", "login"), $params[0]));

		if (Session::get("user", "role") == "admin")
		{
			$bean = R::findOne("seat", "iden = ? AND status = 1", array($params[0]));
			$bean->status = 2;
			R::store($bean);
		}
		else
		{
			header("Location: /ticket" . $params[0]);
		}
	}


}