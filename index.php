<?php

require_once 'start.php';

require_once 'lib/page_class.php';

$page = new Page;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?$page->getMetategs();?>
	<!--metatags.tpl-->
	<?$page->getIncludes();?>
	<!--includes.tpl-->
</head>
<body>
<!--Главная обёртка -->
<div class="wrap">
<!--Шапка -->
	<header>
		<?$page->getHat();?>
		<!--hat.tpl -->
		
	</header>
	<!--/Шапка -->

	<!--Меню и поиск -->
	<?$page->getTopmenu();?>
	<?//$page->cart->setInfoCart();
	//echo $page->cart_count;
	?>
	<!--/Меню и поиск -->

	<!--Боковая панель -->
		<?$page->getLeftmenu();?>
		<!--leftmenu.tpl -->
		<div class="start"></div>
		
	<!--/Боковая панель -->
	<!--Основной контент -->
	
		<?
		
		$page->getContent();?>
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
		<?$page->getFooter();?>
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