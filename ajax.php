<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent("users:show", "ajax-json", array(
	),
	false
);
 ?>
