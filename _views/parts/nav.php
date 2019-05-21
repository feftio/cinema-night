<nav class="navbar" id="navbar">
	<div class="navbar__container" id="navbar__container">
		<div class="navbar__adapted">
			<a class="navbar__adapted__bar" id="navbar__adapted__bar" href="#"><i class="fal fa-bars"></i></a>
		</div>
		<div class="navbar__logo" id="navbar__logo">
			<a class="navbar__logo__cinema" id="a" href="/">CINEMA</a>
			<a class="navbar__logo__picture" href="/"><img src="/template/image/logoCN1.png" alt="placeholder+image" width="60" height="60"></a>
			<a class="navbar__logo__night" href="/">NIGHT</a>
		</div>
		<ul class="navbar__list" id="navbar__list">
			<li class="navbar__list__li">
				<a class="navbar__list__a <?php if (G::var('menu__active') == 'main') echo 'menu__active'; ?>" href="/">
					<i class="ico__main fas fa-mobile-android"></i>
					<span class="navbar__list__span">Главная</span>
				</a>
			</li>
			<li class="navbar__list__li">
				<a class="navbar__list__a <?php if (G::var('menu__active') == 'doc') echo 'menu__active'; ?>" href="/doc">
					<i class="ico__documentation fas fa-books"></i>
					<span class="navbar__list__span">Инструкция</span>
				</a>
			</li>
		</ul>
		<div class="navbar__form" id="navbar__form">
			<a class="navbar__form__login" href="/login">
				<i class="fal fa-sign-in"></i>
				<span class="navbar__form__span">Войти</span>
			</a>
		</div>
	</div>
</nav>