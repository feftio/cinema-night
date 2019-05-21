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
		if (session_is('logged_user'))
		{
			G::setvar(True, [
				'menu__active' => 'cabinet',
				'css' => [
					'parts/wrapper.css',
					'parts/nav.css',
					'cabinet.css',
					'parts/footer.css']
				]);

			view('cabinet.php');
		}
		else
		{
			header("Location: /login");
		}
	}

//	**************************************************
//	**************************************************

}