<?
namespace Users\Show;
use Users\Show\UsersTable;
use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class UsersTable extends DataManager 
{
	public static function getTableName(){
		return 'users';
	}

	public static function getMap(){
		return [
			'ID' => new IntegerField('ID', ['primary' => true]),
			'NAME' => new StringField('NAME')
		];
	}
}