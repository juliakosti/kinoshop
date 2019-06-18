<!DOCTYPE html>
<html lang="ru">
<head>
	<?$this->getMetategs();?>
	<!--metatags.tpl-->
	<?$this->getIncludes();?>
	<!--includes.tpl-->
</head>
<body>
<!--Главная обёртка -->
<div class="wrap">
<!--Шапка -->
	<header>
		<?$this->getHat();?>
		<!--hat.tpl -->
		
	</header>
	<!--/Шапка -->

	<!--Меню и поиск -->
	<?$this->getTopmenu();?>
	
	<!--/Меню и поиск -->

	<!--Боковая панель -->
		<?$this->getLeftmenu();?>
		<!--leftmenu.tpl -->
		<div class="start"></div>
		
	<!--/Боковая панель -->
	<!--Основной контент -->
	
		<?

		$this->getContent();?>
		<!--content.tpl -->
				
	
	<div class="clear"></div>
	<!--/Основной контент -->
	<!--Оплата -->
	<div class="payment">
			<p>Способы оплаты: </p>
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
	</div>
	<!--/Оплата -->
	<!--Подвал -->
	
	<footer><!--footer.tpl -->
		<?$this->getFooter();?>
	</footer>
	<!--/Подвал -->
</div>
<!--/Главная обёртка -->
	
<!-- Поиск -->
<script>
var checkInput = function(input) {
	if (input.value.length > 0) {
		input.className = 'active_form';
	} else {
		input.className = '';
	}
};

</script>
<!--Разделы в мобильном -->
<script>
$(".start").click(function(){
 $('.sections').toggleClass("action");
 
});
$(".stop").click(function(){
 $('.sections').toggleClass("action");
 
});

</script> 
</body>
</html>