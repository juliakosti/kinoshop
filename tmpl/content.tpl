<div class="content ">
<span></span>
		<h2><?=$this->smalltitle;?></h2>
		<div class="sorting">
			<p>Сортировать по: 
				<span>цене (
					<a href="<?=$this->url->sortPriceUp()?>">возр.</a> | 
					<a href="<?=$this->url->sortPriceDown()?>">убыв.</a> )
				</span>
				<span> названию (
					<a href="<?=$this->url->sortTitleUp();?>">возр.</a> | 
					<a href="<?=$this->url->sortTitleDown();?>">убыв.</a> )
				</span>
			</p>
		
		</div>
		<div class="afisha">
			<?
			if ($this->newsArray) 
			{
						
				foreach ($this->newsArray as $key => $value) {?>
					
				<div class="card"><img src="<?=$this->newsArray[$key]['img'];?>" alt="<?=$this->newsArray[$key]['title'];?>">
					<a href="<?=$this->newsArray[$key]['link'];?>" class="linck"><?=$this->newsArray[$key]['title'];?></a>
					<p><?=$this->newsArray[$key]['price'];?> руб.</p>
					<a href="<?=$this->newsArray[$key]['link_cart'];?>" class="btn2">В корзину <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a>
				</div>
				<?	}

			} else
			echo 'К сожалению, товаров в данной категории пока не представлено ((( Задите к нам позже! ';


			?>
		</div>
		<div class='more&all'>
			<a href="#">Показать больше...</a>
			<a href="#">Показать все продукты</a>
		</div>	
</div>		