<!DOCTYPE html>
<html lang="ru">

<?php View::render('parts/head.php') ?>

<body>
	<div class="wrapper">
		<div class="wrapper__navigation" id="wrapper__navigation"></div>
			
		<?php View::render('parts/nav.php') ?>

		<header class="header">
		</header>
		<section class="modal" id="modal" style="display: none;">

		</section>
		<div class="container">
			<div class="box__photo">
				<img class="user-photo" src="../template/image/5-1.jpg">
			</div>
		
			<section class="box-of-data">
				<form>
					<div class="boxer">
						<div class="p-login">
							<h2>Логин: </h2><input type="text" name="login">
						</div>
						<div class="p-login">
							<h2>Имя: </h2><input type="text" name="name">
						</div>
						<div class="p-login">
							<h2>Фамилия: </h2><input type="text" name="sername">
						</div>
						<div class="p-login">
							<h2>Номер телефона: </h2><input type="text" name="phone">
						</div>
					</div>
				</form>
			</section>

			<div class="photo">
				
			</div>
				
		</div>




		<?php View::render('parts/footer.php') ?>

	<?php View::render('parts/scripts.php') ?>

</body>
<script type="text/javascript">

	$("#modal").click(function()
	{
		$(this).toggle("slow");
	});

$("#sign-in").click(function()
{
  $("#regForm").hide("fast", function()
  {
    $("#loginForm").show("fast");
  });
});

</script>

</html>