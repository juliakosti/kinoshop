<div class="content_product">
	<!--Крошки -->
		<div class="bredcrams">
			<ul>
				<li>
					<a href="/">Главная</a>
					<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				</li>
				<li>
					<a href="<?=$this->url->section($this->prodInfo['1']['section_id']);?>"><?=$this->prodInfo['1']['section_title']?></a> 
					<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				</li>
				<li><?=$this->prodInfo['1']['title']?></li>
			</ul>
		</div>
		<!--/Крошки -->
		<div class="film">
			<img src="<?=$this->prodInfo['1']['img']?>" alt="<?=$this->prodInfo['1']['title']?>">
			<p><strong>Название: </strong><span><?=$this->prodInfo['1']['title']?></span></p>
			<p><strong>Год выхода:</strong> <?=$this->prodInfo['1']['year']?></p>
			<p><strong>Жанр:</strong> <?=$this->prodInfo['1']['section_title']?></p>
			<p><strong>Страна производитель:</strong> <?=$this->prodInfo['1']['country']?></p>
			<p><strong>Режиссёр:</strong> <?=$this->prodInfo['1']['director']?></p>
			<p><strong>Продолжительность: </strong> <?=$this->prodInfo['1']['play']?></p>
			<p><strong>В ролях:</strong> <?=$this->prodInfo['1']['cast']?></p>
			<p><span class="money"> <?=$this->prodInfo['1']['price']?> руб.</span>
				<a href="<?=$this->prodInfo['1']['link_cart']?>" class="btn2">В корзину <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a>
			</p>
			
			<p><strong>Описание:</strong></p>
			<p><?=$this->prodInfo['1']['description']?></p>
		</div>

		<?$this->OtherProducts();?>
		<div class="accompanying">
			<h2>С этим товаром также заказывают:</h2>
			<div class="card_small">
				<?
				for ($i=1; $i <= count($this->othProd); $i++) { 
				
				?>
				<img src="<?=$this->othProd[$i]['img']?>" alt="<?=$this->othProd[$i]['title']?>#">
				<a href="<?=$this->othProd[$i]['link']?>" class="linck"><?=$this->othProd[$i]['title']?></a>
				<p><?=$this->othProd[$i]['price']?></p>
				<a href="<?=$this->othProd[$i]['link_cart']?>" class="btn2">В корзину <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a>
				<?}?>
			</div>
			
		</div>
	</div>
	<div class="clear"></div>