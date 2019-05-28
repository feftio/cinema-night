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
				<img class="user-photo" src="../template/image/logoCN1.png">
			</div>

			<section class="box-of-data">

				<div class="boxer-wrapper">
					<form class="boxer" id="profileForm" method="POST" action=" ">
						<div class="p-login">
							<h2>Логин: </h2><input type="text" name="login" value="<?php echo Session::get('user', 'login') ?>" disabled>
						</div>
						<div class="p-login">
							<h2>Email: </h2><input type="text" name="email" value="<?php echo Session::get('user', 'email') ?>" disabled>
						</div>
						<div class="p-login">
							<h2>Имя: </h2><input type="text" name="name" value="<?php echo Session::get('profile', 'name') ?>" disabled>
						</div>
						<div class="p-login">
							<h2>Фамилия: </h2><input type="text" name="surname" value="<?php echo Session::get('profile', 'surname') ?>" disabled>
						</div>
						<div class="p-login">
							<h2>Отчество: </h2><input type="text" name="patronymic" value="<?php echo Session::get('profile', 'patronymic') ?>" disabled>
						</div>
						<div class="p-login">
							<h2>Номер телефона: </h2><input type="text" name="phone" value="<?php echo Session::get('profile', 'phone') ?>" disabled>
						</div>
						<div class="p-login responce" id="responce">
							
						</div>

						<div class="p-login butts">
							<button class="button-save button" id="button-save" name="button-save" style="display: none;">Сохранить</button>
							<button class="button-change button" id="button-change" name="button-change button" style="display: block;">Изменить</button>
						</div>

					</form>
				</div>

				<div class="logout-box">
					<form action="/cabinet/logout" method="GET">
						<input type="hidden" name="redirect" value="/login">
						<button class="button-logout button" id="button-logout">Выйти</button>
					</form>
				</div>

			</section>

			<section class="content">

				<div class="choose-text-block">
					<h2 class="choose-text">Выберите место</h2>
				</div>

				<div class="hole-block">
					<div class="cinema room">
						
					</div>
				</div>
				<div class="block-take">
					<div class="responce" id="responce-taken">
						
					</div>
					<button class="button-take button" id="button-take">Забронировать</button>
				</div>
			</section>

		


<?php 
$num = 0;
$seats = R::find("seat", "login = ? AND status = 1", array(Session::get('user', 'login')));
?>

<?php if (!empty($seats)) { ?>

			<section class="content">
				<div class="choose-block">
					<h2 class="choose-text">Забронированные билеты</h2>
				</div>

				<div class="tickets-block">


	<?php	foreach ($seats as $seat) { 
				$num++;

		?>

					<div class="ticket">
						<h2 class="num-box"><?php echo $num; ?>.</h2>
						<a href="/ticket<?php echo $seat->iden; ?>" class="barcode">
							<i class="fas fa-qrcode"></i>
						</a>

						<div class="ticket-card">
							<a href="/ticket<?php echo $seat->iden; ?>">/<?php echo $seat->iden; ?></a>
						</div>

						<div class="places">
						<?php

						foreach (json_decode($seat->seat) as $value) {
							$row = explode(",", $value)[0];
							$column = explode(",", $value)[1];
						?>	

							<p>Ряд: <?php echo $row; ?></p>
							<p class="box-place">Место: <?php echo $column; ?></p>


						<?php } ?>



						

						</div>

				</div>
			

	<?php } ?>

				</div>
			</section>

<?php } ?>


	</div>

		<?php View::render('parts/footer.php') ?>
</div>
	<?php View::render('parts/scripts.php') ?>
</body>




<script type="text/javascript">
$(document).ready(function()
{	


	//-------------------------------------------------

	var CinemaStruct = {
		'1' : [16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16]
	}

	var Taken = [];
		Cinema1 = '';


	$.each(CinemaStruct["1"], function(row, numberOfSeats) {

		if ((row+1)<10)
		{
			cinemaHallRow =  '<span class="num-column">Ряд№:' + (row+1) + '</span>&nbsp;&nbsp;&nbsp;';
		}
		else
		{
			cinemaHallRow =  '<span class="num-column">Ряд№:' + (row+1) + '</span>&nbsp;';
		}

		for (i = 1; i <= numberOfSeats; i++) {
			cinemaHallRow += 
			'<div class="seat" data-row="' +
			(row+1) + '" data-seat="' +
			i + '">' + i + '</div>';
		}

		Cinema1 += cinemaHallRow + '<div class="passageBetween">&nbsp;</div>';
	});


$('.room').html(Cinema1);

$('.seat').on('click', function(e) {
	if (!$(this).hasClass('bought'))
	{
		$(e.currentTarget).toggleClass('bay');
		showBaySeat();
	}
		
});

function showBaySeat() {
  result = '';
  $.each( $('.seat.bay'), function(key, item) {
    result += '<div class="ticket">Ряд: ' +
      $(item).data().row + ' Место:' +
      $(item).data().seat + '</div>';
  });

  $('.result').html(result);
}

//-------------------------------------------------

	$.ajax({
			type: "POST",
			url: "/cabinet/seats",
			cache: false,

			success: function(response) {
				var arr = [];

				$.each(JSON.parse(response), function(key, item) {
					arr.push(JSON.parse(item["seat"]));
				});

				$('.seat').each(function(index1,elem1) {

					$.each(arr, function(index2, elem2) {

						$.each(elem2, function(index3, elem3) {

							if ((elem1.getAttribute("data-row") == elem3.split(",")[0]) && (elem1.getAttribute("data-seat") == elem3.split(",")[1]))
							{
								$(elem1).addClass('bought');
								$(elem1).html("X");
							}
						});

					});

				});
			}
		});

//-------------------------------------------------

	$("#button-take").click(function(event)
	{

		event.preventDefault();

		//console.log($('.bay'));

		var answ = "";
		var arr = [];

		$('.bay').each(function(i,elem) {
			answ += elem.getAttribute("data-row") + ',' + elem.getAttribute("data-seat");
			arr.push(answ);
			answ = "";
		});

		console.log(arr);

		$.ajax({
			type: "POST",
			url: "/cabinet/taken",
			data:{data: arr},
			cache: false,

			success: function(responce) {
				result = JSON.parse(responce);

				$.each(result, function(key, item) {

					if (key == "error")
					{
						$('#responce-taken').css("color", "red");
						$('#responce-taken').html(item);
					}
					else
					{
						$('#responce-taken').css("color", "green");
						$('#responce-taken').html(item);
					}

					setTimeout(function () 
                    {
                    	$('.bay').removeClass('bay');
                    	$('#responce-taken').html("");
                    }, 1800);

				});




			}

		});


	/*$.each(JSON.parse(responce), function(key1, item1) {
		$.each(item1, function(key, item) {
			console.log(key + ' ' + item);
		});
	});*/



	});






//-------------------------------------------------
	$("#button-change").click(function(event)
	{

		event.preventDefault();
		$(".p-login input").attr("disabled", false);
		$(".p-login input").css("background-color", "#D7F5DC");

		$(".p-login input[name=login]").attr("disabled", true);
		$(".p-login input[name=login]").css("background-color", "#FFFFFF");

		$("#button-change").hide();
		$("#button-save").show();

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
                $('#responce').html("");
                result = $.parseJSON(response);

                $.each(result, function(keyError, value)
                {
                	if (keyError == 'success')
                    {
                        $('#responce').css("color", "green");
                        $('#responce').html(value);
   
                        setTimeout(function () 
                        {
                        	$('#responce').html("");
                        	$(".p-login input").attr("disabled", true);
                        	$(".p-login input").css("background-color", "#FFFFFF");

                        	$("#button-save").hide();
                        	$("#button-change").show();
                        	

                        }, 1000);
                    }
                    else
                    {
                        $('#responce').css("color", "red");
                        $('#responce').html(value);

                        setTimeout(function(){
                        	$('#responce').html("");
                        }, 1000);
                    }
                });

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