<div class="header_bottom">
		<!--Скрытая кнопка бутера -->
			<input type="checkbox" id="hamburger" class="hidden-menu-ticker ">
			<label class="btn-menu" for="hamburger">
			  <span class="first"></span>
			  <span class="second"></span>
			  <span class="third"></span>
			</label>
		<!--/Скрытая кнопка бутера -->
		<div class="top">
			<nav>
				<a class="active" href="/">Главная</a><img src="http://kinoshop/img/line.png" alt="#">
				<a href="<?=$this->url->delivery();?>">Оплата и доставка</a><img src="http://kinoshop/img/line.png" alt="#">
				<a href="<?=$this->url->contacts();?>">Контакты</a>
			</nav>
		</div>
		<div class="search">
			<input id="search" type="text" placeholder="Поиск" onblur="checkInput(this)">
			<i class="fa fa-search" aria-hidden="true"></i>
		</div>
	</div>