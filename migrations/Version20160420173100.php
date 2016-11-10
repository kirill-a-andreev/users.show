<?
namespace Sprint\Migration;
use Users\Show\UsersTable;
use Bitrix\Main\Application;
\Bitrix\Main\Loader::includeModule('users.show');

class Version20160420173100 extends Version{

	private $data = array(
		'Петр',
		'Мария',
		'Иван',
		'Кирилл',
		'Елена',
		'Светлана'
	);

	public function up(){
		$connection = Application::getConnection();
		$connection->createTable(UsersTable::getTableName(), UsersTable::getMap(), ['ID'], ['ID']);		// название таблицы, маппинг, primary, autoincrement
		
		foreach($this->data as $k => $v)
			UsersTable::add(array('NAME' => $v));
	}

	public function down(){
		$connection = Application::getConnection();
		if($connection->isTableExists(UsersTable::getTableName()))
			$connection->dropTable(UsersTable::getTableName());
	}
}