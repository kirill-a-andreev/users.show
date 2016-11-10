<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<form action="" method="get" id="users_show">
	<input type="text" placeholder = "Введите имя.." name="name" />
	<input type="submit" />
	<input type="hidden" name="sort" value="asc" />
</form>

<div class="ajax_data">
<table border="1" cellspacing="1" cellpadding="15">
	<tr><td><a href="?order=ID&sort=<?=$arResult['SORT'];?>">ID</a></td><td><a href="?order=NAME&sort=<?=$arResult['SORT'];?>">NAME</a></td></tr>
	<?
	foreach($arResult['ITEMS'] as $k => $v)
	{
	?>
	<tr><td><?=$v['ID'];?></td><td><?=$v['NAME'];?></td></tr>
	<?
	}
	?>
</table>
</div>