<?php
/**
 * User entity
 *
 * @author Serhii Shkrabak
 * @global object $CORE->model
 * @package Model\Entities
 */
namespace Model\Entities;

class User
{
	use \Library\Shared;
	use \Library\Entity;

	
	public static function search(String $guid, Int $limit = 1):self|array|null {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
				'Users' => []
			])->where([
				'Users' => ['guid' => $guid]
			])->many($limit) as $user) {
				$class = __CLASS__;
				$result[] = new $class($user['id'], $guid, $user['name'], $user['middlename'], $user['surname'], $user['PersonId']);
		}
		return $limit == 1 ? (isset($result[0]) ? $result[0] : null) : $result;
	}

	public function save():self {
		$db = self::getDB();
		if (!$this->id) {
			$this->id = $db -> insert([
				'Users' => [ 'name' => null, ]
			])->run(true)->storage['inserted'];
			$dbrow = $db -> select([
				'Users' => ['guid']
			])->where([
				'Users' => ['id' => $this->id]
			])->one();
			$this->guid = $dbrow['guid'];
		}
		
		if ($this->_changed)
			$db -> update('Users', $this->_changed )
				-> where(['Users'=> ['id' => $this->id]])
				-> run();
		return $this;
	}


	public function edit(array $data): bool {
		$db = self::getDB();
		$db -> update('Users', $data)
				-> where(['Users'=> ['guid' => $this->guid]])
				-> run();

		return true;
	}


	public function __construct(
		public Int $id = 0, 
		public ?String $guid = null, 
		public ?String $name = '',
		public ?String $middlename = '',
		public ?String $surname = '',
		public ?String $personId = '',
		) 
		{
	}
}
