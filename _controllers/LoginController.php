<?php
/**
 * 
 */
class LoginController
{

//	**************************************************
//	**************************************************

	public function actionIndex()
	{

		Ajax::catch(function($data) {

			$errors = [];

			if (trim($data["login"]) == "")
			{
				$errors["login"] = "Введите логин";
			}

			if (trim($data["email"]) == "")
			{
				$errors["email"] = "Введите Email";
			}

			if ($data["password"] == "")
			{
				$errors["password"] = "Введите пароль";
			}

			if ($data["password_r"] != $data["password"])
			{
				$errors["password_r"] = "Повторный пароль введен не верно";
			}

			if (empty($errors))
			{
				$user = R::dispense('users');
				$user->login    = $data["login"];
				$user->email    = $data["email"];
				$user->password = $data["password"];
				$user->date     = date("Y-m-d H:i:s");
				R::store($user);
				echo json_encode(["success" => "Регистрация прошла успешно!"]);
			}
			else
			{
				echo json_encode($errors);
			}

		});
	
		G::setvar(True, [
			'css' => [
				'login.css'
			]
		]);

		View::render('login.php');
	}
}
//	**************************************************
//	**************************************************