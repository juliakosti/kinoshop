<div class="searchresult">
	<h1>Результаты поиска: "<?=$_GET['search'];?>"</h1>
	<?
	if (!$this->searchResult) 
	{
		echo '<p>Сожалеем, но Ваш поиск не дал результатов</p>';
	} else {
	?>

	<ul>
		<? for ($i=1; $i <=count($this->searchResult); $i++) 
		{ ?>
			<li>
				<span><?=$i?>. </span> <a href="<?=$this->searchResult[$i]['link']?>"><?=$this->searchResult[$i]['title']?></a>
			</li>
			
		<? }}?>
		
		
	</ul>
</div>	