<!--Контент главный -->
	<div class="content_cart">
		<h1>Корзина</h1>
		<!--Форма -->
		<form name="cart" action="#" method="post">
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
							/*echo '<pre>';
							print_r($this->cartProd);
							echo '</pre>';*/
							for ($i=0; $i <= count($this->cartProd); $i++) 
							{ 
								if (isset($this->cartProd[$i])) {
									
								
								?>
									
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
											<input  type="number" min="1" max="99" value="<?=$this->cartProd[$i]['count']?>"> шт. 
										</p>
									</td>
									<td data-label="Стоимость">
										<div class="cost1">
											<p><?=$this->cartProd[$i]['summa']?> руб.</p>
											<a class="del" href="<?=$this->cartProd[$i]['link_delete']?>">Удалить</a>
										</div>
									</td>
								</tr>
							<?}}?>
							
						</tbody>
					</table>
				</div>
				
				<div class="discount">
					<p>Введите номер купона со скидкой <br>
						(если есть)
					</p>
					<input type="text">
					<a class="btn2" href="#">Получить скидку</a>
				</div>
				<div class="total clearfix">
					<p>Итого: <?=$this->cartInfo['cart_summa'];?> руб.</p>
					<a class="btn3" href="#">Пересчитать</a>
					<a class="btn4" href="order.html">Оформить заказ</a>
				</div>
				
			</div>
		</form>
		<!--/Форма -->
	</div>
	<div class="clear"></div>
	<!--/Контент главный -->