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
				<form id="profileForm" method="POST" action=" ">
					<div class="boxer">
						<div class="p-login">
							<h2>Логин: </h2><input type="text" name="login" value="<?php echo Session::get('user', 'login') ?>" disabled>
						</div>
						<div class="p-login">
							<h2>Имя: </h2><input type="text" name="name" disabled>
						</div>
						<div class="p-login">
							<h2>Фамилия: </h2><input type="text" name="sername" disabled>
						</div>
						<div class="p-login">
							<h2>Отчество: </h2><input type="text" name="patronymic" disabled>
						</div>
						<div class="p-login">
							<h2>Номер телефона: </h2><input type="text" name="phone" disabled>
						</div>
						<div class="p-login responce" id="responce">

						</div>
						<div class="p-login butts">
							<button class="button-save button" id="button-save" name="button-save" style="display: none;">Сохранить</button>
							<button class="button-change button" id="button-change" name="button-change button" style="display: block;">Изменить</button>
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

$(document).ready(function()
{

	$("#button-change").click(function(event)
	{
		event.preventDefault();
		$(".p-login input").attr("disabled", false);
		$(".p-login input").css("background-color", "#FFFAC2");
		$("#button-change").hide("fast", function(){
			$("#button-save").show("fast");
		});
	});

	 $("#profileForm").submit(function()
    {
        $.ajax(
        {
            url: "/cabinet/ch",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) 
            {
            	var string = "";
                $('#responce').html(string);
                result = $.parseJSON(response);

                $.each(result, function(keyError, value)
                {
                	if (keyError == 'error')
                    {
                        string = value;
                    }
                });

                $('#responce').html(string);
                //$('#responce').html(result["error"]);

            },
            error: function(response)
            {
                $('#responce').html('Ошибка. Данные не отправлены.');
            }
        });
        return false;
    });

});


</script>

</html>