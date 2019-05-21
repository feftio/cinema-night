<!DOCTYPE html>
<html lang="ru">

<?php View::render('parts/head.php'); ?>

<body>
	<div class="wrapper">
		<div class="wrapper__navigation" id="wrapper__navigation"></div>

			<?php View::render('parts/nav.php'); ?>

		<?php View::render('parts/footer.php'); ?>
		
	</div>

	<?php View::render('parts/scripts.php'); ?>

</body>
</html>