<div class="sections">
		<div class="stop"></div>
		<h2>Жанры</h2>
		<ul>
		<?foreach ($this->secArray as $key => $value) {?>
			<li><a href="#"><?=$this->secArray[$key]['title'];?></a></li>
			
			<!--<li class="bullet"><a href="#">Боевики</a></li>
			<li class="bullet"><a href="#">Вестерн</a></li>
			<li class="bullet"><a href="#">Военное кино</a></li>-->
			<?} ?>
		</ul>
	</div>