<?
use Users\Show\UsersTable;
if(!\Bitrix\Main\Loader::includeModule('users.show'))
	die('Ошибка загрузки модуля!');

class UserList extends \CBitrixComponent {
	public function executeComponent() {
		$this->arResult = $this->getData($_REQUEST['order'], $_REQUEST['sort'], $_REQUEST['name']);
		$this->includeComponentTemplate();
	}
	
	private function getData($order, $sort, $filter){
		$order = (empty($order) ? "ID" : $order);
		$sort = (empty($sort) ? "asc" : $sort);
		$q['select'] = array('ID', 'NAME');
		
		if(!empty($filter))
			$q['filter'] = array('%=NAME'=> trim($filter).'%');
		
		$q['order'] = array($order => $sort);

		$data = UsersTable::getList($q);
		$arResult = array();

		while ($row = $data->fetch())
			$arResult['ITEMS'][] = $row;

		$sort = ($sort == 'desc' ? 'asc' : 'desc');
		$arResult['SORT'] = $sort;

		return $arResult;
	}
}