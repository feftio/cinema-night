<?php
/**
 * 
 */
class CabinetController 
{

//	**************************************************
//	**************************************************

	public function actionIndex()
	{
		if (session_is("user"))
		{
			G::setvar(True, [
				'menu__active' => 'cabinet',
				'css' => [
					'parts/wrapper.css',
					'parts/nav.css',
					'cabinet.css',
					'parts/footer.css']
				]);

			view("cabinet.php");
		}
		else
		{
			header("Location: /login");
		}
	}

	public function actionCh()
	{
		Post::catch(function()
		{
			Ajax::catch(function()
			{
				$data = $_POST;

				$login = R::count("users", "login = ?", array($data["login"]));

				if ( ($login > 0) && (Session::get("user", "login") == $data["login"]) )
				{
					echo json_encode(["error" => "Логин " . $data["login"] . " уже занят!"]);
				}
				else
				{

				}

			});
		}, False);
	}

	public function actionLogout()
	{
		unset($_SESSION["user"]);
	}

//	**************************************************
//	**************************************************

}