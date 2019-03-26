<span></span>
		<h2>Новинки</h2>
		<div class="sorting">
			<p>Сортировать по: 
				<span>цене (
					<a href="#">возр.</a> | 
					<a href="#">убыв.</a> )
				</span>
				<span> названию (
					<a href="#">возр.</a> | 
					<a href="#">убыв.</a> )
				</span>
			</p>
		
		</div>
		<div class="afisha">
			<?foreach ($this->newsArray as $key => $value) {?>
				
			
			<div class="card"><img src="<?=$this->newsArray[$key]['img'];?>" alt="<?=$this->newsArray[$key]['title'];?>">
				<a href="#" class="linck"><?=$this->newsArray[$key]['title'];?></a>
				<p><?=$this->newsArray[$key]['price'];?> руб.</p>
				<a href="#" class="btn2">В корзину <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a>
			</div>
			<?} ?>
		</div>