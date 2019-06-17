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
			<form action="<?=$this->url->search();?>" method="GET">
				<input id="search" name="search" type="text" placeholder="Поиск" onblur="checkInput(this)">
				<button><i class="fa fa-search"  aria-hidden="true"></i></button>
			</form>
		</div>
	</div>