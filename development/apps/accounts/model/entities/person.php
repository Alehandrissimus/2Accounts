<?php
/**
 * User entity
 *
 * @author Serhii Shkrabak
 * @global object $CORE->model
 * @package Model\Entities
 */
namespace Model\Entities;

use \Model\Entities\Group;
use \Model\Entities\Teams;

class Person
{
	use \Library\Shared;
	use \Library\Entity;


	public static function search(String $id, Int $limit = 0):self|array|null {
		$g = new Group();
		$groups = $g->loadGroups();

		$result = [];
		$db = self::getDB();

		foreach ($db -> select([
				'Person' => []
			])->where([
				'Person' => ['PersonId' => $id]
			])->many($limit) as $user) {
				$class = __CLASS__;
				
				foreach($groups as $key => $value) {
					if($value->id == $user['party']) {
						$party = $value->nameGroup;
						$department = $value->nameDepartment;
					}
				}

				if($user['isLecturer'] == 0) {$lecturer = false;} else {$lecturer = true;}
				
				$result[] = new $class($user['id'], $user['PersonId'], $user['name'], $user['middlename'], $user['surname'], $party, $department, $lecturer, $user['isFound']);
		}

		return $limit == 1 ? (isset($result[0]) ? $result[0] : null) : $result;
	}


	public static function searchby(String $filter = '' , Int $limit = 0):self|array|null {
		$g = new Group();
		$groups = $g->loadGroups();

		$result = [];
		$db = self::getDB();
		$filter = explode(',', $filter);

		foreach ($db -> select([
				'Person' => []
			])->where([
				'Person' => strlen($filter[0]) == 0 ? [] : [$filter[0] => $filter[1]]
			])->many($limit) as $user) {
				$class = __CLASS__;

				foreach($groups as $key => $value) {
					if($value->id == $user['party']) {
						$party = $value->nameGroup;
						$department = $value->nameDepartment;
					}
				}

				if($user['isLecturer'] == 0) {$lecturer = false;} else {$lecturer = true;}

				$result[] = new $class($user['id'], $user['PersonId'], $user['name'], $user['middlename'], $user['surname'], $party, $department, $lecturer, $user['isFound']);
		}

		return $limit == 1 ? (isset($result[0]) ? $result[0] : null) : $result;
	}



    //TODO args array
	public function save(array $data):self {
		$g = new Group();
		$groups = $g->loadGroups();

		$party = 0;
		foreach($groups as $key => $value) {
			if($value->nameDepartment == $data['group']) {
				$party = $value->id;
			}
		}


		$db = self::getDB();
		if (!$this->id) {
			$this->id = $db -> insert([
				'Person' => [ 'name' => $data['firstName'],
                              'surname' => $data['lastName'],
							  'middlename' => $data['middleName'],
                              'party' => $party,
							  'institute' => $data['department'],
							  'isLecturer' => $data['isLecturer']]
			])->run(true)->storage['inserted'];
			$dbrow = $db -> select([
				'Person' => ['PersonId']
			])->where([
				'Person' => ['id' => $this->id]
			])->one();
			$this->personId = $dbrow['PersonId'];
		}
		
		if ($this->_changed)
			$db -> update('Person', $this->_changed )
				-> where(['Person'=> ['id' => $this->id]])
				-> run();
		return $this;
	}

	//TODO
	public function edit(String $guid, array $data): bool {
		$db = self::getDB();
		$db -> update('Person', $data)
				-> where(['Person'=> ['PersonId' => $guid]])
				-> run();

		return true;
	}

	public function unlinked(): ?array {
		$persons = $this->searchby();
		$teams = new Teams();
		$linkeds = $teams->getLinkedIds();

		$result = [];

		foreach($persons as $personKey => $personValue) {
			foreach($linkeds as $linkedKey => $linkedValue) {
				if ($personValue->personId == $linkedValue->personId) {
					array_push($result, $persons[$personKey]);
				}
			}
		}

		return array_udiff($persons, $result,
		function ($obj_a, $obj_b) {
			return strcmp(spl_object_hash($obj_a), spl_object_hash($obj_b));
		});
	}

	public function __construct(
		public Int $id = 0, 
		public ?String $personId = null, 
		public ?String $name = null, 
		public ?String $surname = null, 
		public ?String $middlename = null, 
		public ?String $party = null,
		public ?String $department = null,
		public bool $isLecturer = false,
		public ?String $isFound = null,
		) {
		//$this->db = $this->getDB();
	}
}
