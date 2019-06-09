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
		R::wipe('films');
		R::wipe('prices');

		// FILMS
		$films = R::dispense('films');
		$films->num = 'Первый';
		$films->name = 'Эверест';
		$films->genre = 'Приключение';
		$films->producer = 'Балтазар Кормакур';
		$films->time = '121 минута';
		$films->year = '2015';
		$films->lang = 'Русский';
		$films->about = 'Приключенческий фильм исландского режиссёра Балтазара Кормакура, главные роли в котором исполнили Джейсон Кларк, Джош Бролин, Джейк Джилленхол, Сэм Уортингтон и Джон Хоукс';
		$films->status = '1';
		R::store($films);

		$films = R::dispense('films');
		$films->num = 'Второй';
		$films->name = 'Титаник';
		$films->genre = 'Катастрофа';
		$films->producer = 'Джеймс Кэмерон';
		$films->time = '253 минуты';
		$films->year = '1997';
		$films->lang = 'Русский';
		$films->about = 'Американский фильм-катастрофа 1997 года, снятый режиссёром Джеймсом Кэмероном, в котором показана гибель легендарного лайнера «Титаник».';
		$films->status = '1';
		R::store($films);

		$films = R::dispense('films');
		$films->num = 'Третий';
		$films->name = 'Побег из Шоушенка';
		$films->genre = 'Драма';
		$films->producer = 'Фрэнк Дарабонт';
		$films->time = '120 минут';
		$films->year = '1993';
		$films->lang = 'Русский';
		$films->about = 'Культовый американский художественный фильм-драма 1994 года, снятый режиссёром Фрэнком Дарабонтом по повести С. Кинга «Рита Хейуорт и спасение из Шоушенка» о банкире.';
		$films->status = '1';
		R::store($films);
		

		// PRICES
		$prices = R::dispense('prices');
		$prices->price = '800';
		$prices->status = '1';
		R::store($prices);
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