<span class="k1"></span>
		<span class="k2"></span>
		<span class="k3"></span>
		<span class="k4"></span>
		<span class="k5"></span>
		
		<div class="logo">
			<a href="/">kinoshop.ru</a>
			<a href="tel:+78001234567">8-800-123-45-67</a>
			<p>Время работы: с 09:00 до 21:00</p>
			<p>без перерыва и выходных</p>
		
		</div>
		<div class="basket">
			<h3>Корзина</h3>
			<div class="wrapper">
				<a href="#" class="order">Текущий заказ</a><br>
				<p>В корзине <span class="quantity"><?=$this->cartInfo['cart_count'];?></span> <?=$this->cartInfo['cart_word'];?></p>
				<p>на сумму <span class="cost"><?=$this->cartInfo['cart_summa'];?></span> руб.</p>
			</div>
			<a href="<?=$this->url->cart();?>" class="btn1">Перейти в корзину</a>
		</div>