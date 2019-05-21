<!DOCTYPE html>
<html lang="ru">

<?php View::render('parts/head.php') ?>

<body>
	<div class="wrapper">
		<div class="wrapper__navigation" id="wrapper__navigation"></div>
		<header class="header">
			<div class="header__overlay"></div>
			
			<?php View::render('parts/nav.php') ?>

			<section class="header__text">
				<div class="header__text__block">
					<p class="header__text__p1">Онлайн-покупка билетов на киноночь!</p>
					<p class="header__text__p2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
				</div>
			</section>
		</header>
		<section class="info" id="info">
			<div class="info__text">
				<h2>Забронировать место!</h2>
				<p>Переходите к выбору мест!</p>
			</div>
			<div class="info__blocks">
				<div class="info__block">
					<div class="info__card info__one"></div>
				</div>
				<div class="info__block">
					<div class="info__card info__two"></div>
				</div>
				<div class="info__block">
					<div class="info__card info__three"></div>
				</div>
				<div class="info__block">
					<div class="info__card info__four"></div>
				</div>
			</div>
		</section>
		<section class="form" id="form">
			<div class="form__block">

			</div>
		</section>
		

		<?php View::render('parts/footer.php') ?>

	</div>

<?php View::render('parts/scripts.php') ?>

</body>

</html>