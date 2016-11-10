<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?>

<b>Тестовый компонент</b><br /><br />
<?
$APPLICATION->IncludeComponent("users:show", "", array(
	),
	false
);
?>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>