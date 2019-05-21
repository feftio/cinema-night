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

		if (!session_is('logged_user'))
		{
			G::setvar(True, [
				'css' => [
					'login.css'
				]
			]);

			View::render('login.php');
		}
		else
		{
			header("Location: /cabinet");
		}

	}

	public function actionunsetlogin()
	{
		unset($_SESSION['logged_user']);
	}

	public function actionchlogin()
	{

		Post::catch(function()
		{
			Ajax::catch(function()
			{
				$data = $_POST;

				$user = R::findOne("users", "login = ?", array($data["login"]));
				if ($user)
				{
					if (password_verify($data["password"], $user->password))
					{
						$_SESSION['logged_user'] = $user;
						echo json_encode(["success" => "Вы авторизованы!"]);
					}
					else
					{
						echo json_encode(["password" => "Неверно введен пароль!"]);
					}
				}
				else
				{
					echo json_encode(["thereis" => "Пользователя с таким логином не существует"]);
				}
			});
		});
	}

	public function actionchreg()
	{
		Post::catch(function()
		{
			Ajax::catch(function()
			{
				$data = $_POST;
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

				if ( R::count("users", "login = ?", array($data["login"])) > 0 )
				{
					$errors["thereis"] = "Такой пользователь уже сущестует";
				}

				if (empty($errors))

				{
					$user = R::dispense('users');
					$user->login    = $data["login"];
					$user->email    = $data["email"];
					$user->password = password_hash($data["password"], PASSWORD_DEFAULT);
					$user->r_token  = 'token';
					$user->date     = date("Y-m-d H:i:s");
					R::store($user);

					$profile = R::dispense('profile');
					$profile->login    = $data["login"];
					$profile->name     = "";
					$profile->surname  = "";
					$profile->photo    = "";
					$profile->phone    = "";
					R::store($profile);

					$ticket = R::dispense('ticket');
					$ticket-> = $data["login"];
					
					R::store($ticket);


					echo json_encode(["success" => "Регистрация прошла успешно!"]);
				}
				else
				{
					echo json_encode($errors);
				}
			});
		});
	}


}
//	**************************************************
//	**************************************************