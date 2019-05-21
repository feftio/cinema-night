<!DOCTYPE html>
<html lang="ru">

<?php View::render('parts/head.php') ?>

<body>
	<div class="container">
		<div class="big-image"></div>
		<div class="wrapper">
			<a class="arrow-back" href="/"><i class="fa fa-arrow-left"></i></a>
			<div class="form__wrapper">

				<form class="form" id="loginForm" action=" " style="display: block;">

					<div class="logo__circle"><a class="logo__image" href="/"><img src="/template/image/logoCN1.png" alt="placeholder+image" width="70" height="70"></a></div>

					<span class="form__welcome">Добро пожаловать!</span>

					<div class="login out-input">
						<input class="input-style" type="text" name="login" placeholder="Логин">
					</div>

					<div class="password out-input">
						<input class="input-style" id="password-1" type="password" name="password" placeholder="Пароль">
						<span class="eye eye-active"><i class="fa fa-eye" aria-hidden="true"></i></span>
						<span class="eye"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
					</div>

					<div class="sign">
						<button class="button green" id="do-sign-in" name="do-sign-in">Войти</button>	
					</div>

					<div class="pop">
						<span>У вас нет аккаунта? </span><label class="clip-sign-up" id="sign-up">Зарегистрироваться</label>
					</div>

				</form>

				<form class="form" id="regForm" style="display: none;">

					<div class="logo__circle"><a class="logo__image" href="/"><img src="/template/image/logoCN1.png" alt="placeholder+image" width="70" height="70"></a></div>

					<span class="form__welcome">Регистрация</span>

					<div class="email out-input">
						<?php csrf_field() ?>
						<input class="input-style" type="text" name="login" placeholder="Логин">
					</div>

					<div class="login out-input">
						<input class="input-style" type="text" name="email" placeholder="Email">
					</div>

					<div class="password out-input">
						<input class="input-style" id="password-2" type="password" name="password" placeholder="Пароль">
						<span class="eye eye-active"><i class="fa fa-eye" aria-hidden="true"></i></span>
						<span class="eye"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
					</div>

					<div class="password out-input">
						<input class="input-style" id="password-3" type="password" name="password_r" placeholder="Повторите пароль">
					</div>

					<div class="result_form" id="result_form">
						
					</div>
					
					<div class="sign">
						<button class="button red" id="do-sign-up" name="do-sign-up">Создать</button>
					</div>

					<div class="pop">
						<span>У вас уже есть аккаунт? </span><span class="clip-sign-in" id="sign-in">Войти</span>
					</div>
					
				</form>

			</div>
		</div>
	</div>
	<script type="text/javascript" src="/template/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/template/js/login.js"></script>
</body>
</html>