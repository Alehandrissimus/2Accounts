<?php
/**
 * User entity
 *
 * @author Serhii Shkrabak
 * @global object $CORE->model
 * @package Model\Entities
 */
namespace Model\Entities;

class Group
{
	use \Library\Shared;
	use \Library\Entity;


    public static function loadGroups(Int $limit = 0): ?array {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
				'Department' => []
			])->where([
				'Department' => []
			])->many($limit) as $groups) {
                $class = __CLASS__;
                $result[] = new $class($groups['id'], $groups['nameGroup'], $groups['nameDepartment']);
			}

		return $limit == 1 ? (isset($result[0]) ? $result[0] : null) : $result;
	}
	
	public function __construct(
		public Int $id = 0, 
        public String $nameGroup = '',
		public String $nameDepartment = ''
		) 
		{
	}
}
