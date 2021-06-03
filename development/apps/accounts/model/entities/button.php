<?php
/**
 * User entity
 *
 * @author Serhii Shkrabak
 * @global object $CORE->model
 * @package Model\Entities
 */
namespace Model\Entities;

class Button
{
	use \Library\Shared;
	use \Library\Entity;


    public static function loadButtons(Int $limit = 0): ?array {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
				'Buttons' => []
			])->where([
				'Buttons' => []
			])->many($limit) as $buttons) {
                $class = __CLASS__;
                $result[] = new $class($buttons['id'], $buttons['message']);
			}

		return $limit == 1 ? (isset($result[0]) ? $result[0] : null) : $result;
	}
	
	public function __construct(
		public Int $id = 0, 
        public String $message = ''
		) 
		{
		$this->db = $this->getDB();
	}
}
