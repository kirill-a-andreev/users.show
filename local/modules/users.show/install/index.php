<?
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Users\Show\UsersTable;

class users_show extends CModule
{
	public function __construct()
	{
		$this->MODULE_ID = 'users.show';
		$this->MODULE_NAME = 'Модуль список пользователей';
		$this->MODULE_DESCRIPTION = 'Описание';
	}

	public function doInstall()
	{
		ModuleManager::registerModule($this->MODULE_ID);
		$this->installDB();
	}

	public function doUninstall()
	{
		$this->uninstallDB();
		ModuleManager::unregisterModule($this->MODULE_ID);
	}

	public function installDB()
	{
		if(Loader::includeModule($this->MODULE_ID))
		{
			UsersTable::getEntity()->createDbTable();
		}
	}

	public function uninstallDB()
	{
		if(Loader::includeModule($this->MODULE_ID))
		{
			$connection = Application::getInstance()->getConnection();
			$connection->dropTable(UsersTable::getTableName());
		}
	}
}