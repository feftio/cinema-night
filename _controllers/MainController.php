<?php
/**
 * 
 */

class MainController
{


//	**************************************************
//	**************************************************


	public function actionIndex()
	{
		/*
		$event = R::dispense('event');
		$event->f_name = 'Эверест';
		$event->f_path = 'everest.jpg';
		$event->s_name = '';
		$event->s_path = '';
		$event->t_name = '';
		$event->t_path = '';
		$event->price = 1200;
		R::store($event);
		*/

		G::setvar(True, [

			'menu__active' => 'main',
			'css' => [
				'parts/wrapper.css',
				'parts/nav.css',
				'main.css',
				'parts/footer.css'
			]

		]);

		view('main.php');
	}


//	**************************************************
//	**************************************************


}