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
		if (session_is("user"))
		{
			$bean = R::findOne("seat", "iden = ? AND status = 1", array($params[0]));
		}

		if ( ((!is_null($bean))&&(Session::get("user", "role") == "admin")) || ( (!is_null($bean)) && (Session::get("user", "login") == $bean->login) ) )
		{
			$IDEN  = $params[0];
			$LOGIN = $bean->login;
			$CODE = $bean->code;

			G::setvar(False, [
				'bean'  => $bean,
				'iden'  => $IDEN,
				'login' => $LOGIN
			]);

			view("ticketing.php");
			
		}
		else
		{
			header("Location: /login");
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
			header("Location: /cabinet");
		}
		else
		{
			header("Location: /ticket" . $params[0]);
		}
	}


}