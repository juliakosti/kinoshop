<!--Контент главный -->
	<div class="content_cart">
		<h1>Корзина</h1>
		<!--Форма -->
		<form name="cart" action="<?=$this->url->action()?>" method="post">
			<div id="cart">
				<div class="wrap_1">
					<table>
						<thead>
						    <tr>
								<th>Товар</th>
								<th>Цена за 1 шт.</th>
								<th>Количество</th>
								<th>Стоимость</th>
						    </tr>
						</thead>
						<tbody>
							
							<?
							for ($i=0; $i <=100; $i++) 
							{ 
								if (isset($this->cartProd[$i])) 
								{?>
									
									<tr>
										<td data-label="Товар">
											<div class="product pr">
												<img src="<?=$this->cartProd[$i]['img']?>" alt="<?=$this->cartProd[$i]['title']?>">
												<p><?=$this->cartProd[$i]['title']?></p>
											</div>
										</td>
										<td data-label="Цена за 1 шт."><p class="price"><?=$this->cartProd[$i]['price']?> руб.</p></td>
										<td data-label="Количество">
											<p class="quantity1">
												<input type="hidden" name="func" value="cart" />
												<input  type="number" name="count_<?=$this->cartProd[$i]['id']?>" min="1" max="99" value="<?=$this->cartProd[$i]['count']?>"> шт. 
											</p>
										</td>
										<td data-label="Стоимость">
											<div class="cost1">
												<p><?=$this->cartProd[$i]['summa']?> руб.</p>
												<a class="del" href="<?=$this->cartProd[$i]['link_delete']?>">Удалить</a>
											</div>
										</td>
									</tr>
								<?} 
							}?>
							
						</tbody>
					</table>
				</div>
				
				<div class="discount">
					<p>Введите номер купона со скидкой <br>
						(если есть)
					</p>
					<input type="text" name="discount" value="<?=$_SESSION['code'];?>">
					<input type="submit" class="btn2" value="Получить скидку">
				</div>
				<div class="total clearfix">
					<p>

						Итого 
						<?echo $this->disc;
						if ($_SESSION['discount']) echo '(с учетом скидки ' . $_SESSION['discount']*100 . '%)';
						
						?>
						: <?=$_SESSION['cart_summa'] - ($_SESSION['cart_summa']*$_SESSION['discount']);?> руб.</p>
					<input type="submit" class="btn3" value="Пересчитать">
					
					<a class="btn4" href="<?=$this->url->order();?>">Оформить заказ</a>
				</div>
				
			</div>
		</form>
		<!--/Форма -->
	</div>
	<div class="clear"></div>
	<!--/Контент главный -->