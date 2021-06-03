<?php
/**
 * User entity
 *
 * @author Serhii Shkrabak
 * @global object $CORE->model
 * @package Model\Entities
 */
namespace Model\Entities;

class Teams
{
	use \Library\Shared;
	use \Library\Entity;
    
	public function create(User $user): ?array {
		$token = $this->getAppToken();

		$pass = $this->generateToken();

		$params[0] = [
			'accountEnabled' => true,
			'displayName' => $user->name . ' ' . $user->surname,
			'mailNickname' => $user->name . $user->surname,
			'userPrincipalName' => 'auto.' .  $user->name . '.' . $user->surname .'@e.opu.ua',
			'mail' => 'auto.' .  $user->name . '.' . $user->surname . '@e.opu.ua',
			'passwordProfile' => [
				'forceChangePasswordNextSignIn' => true,
				'password' => $pass
			]
		];
		
		$result = $this->request('graph.microsoft.com/v1.0/users', $params, $token, true);
		$result['password'] = $pass;

		$this->save(personId: $user->personId, teamsId: $result['id']);

		return $result;
	}

	
	public function get(String $personId): ?array {
		$result = null;

		$id = $this->getTeamsId(personId: $personId);

		$token = $this->getAppToken();
		$params[0] = [];
		$url = 'graph.microsoft.com/v1.0/users/' . $id;

		$result = $this->requestGet($url, $params, $token, true);

		return $result;
	}


	public function dropPass(String $personId): String {
		$token = $this->getAdminToken();

		$id = $this->getTeamsId(personId: $personId);
		$pass = $this->generateToken();
		$params[0] = [
			'passwordProfile' => [
				'forceChangePasswordNextSignIn' => true,
				'password' => $pass
			]
		];
		
		$result = $this->requestPatch('graph.microsoft.com/v1.0/users/' . $id, $params, $token, true);
		return $pass;
	}


	private function getAppToken(Int $limit = 1): String {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
			'Sync' => []
		])->where([
			'Sync' => ['name' => 'application']
		])->many($limit) as $teams) {
			$result['token'] = $teams['token'];
		}
		return $result['token'];
	}

	private function getAdminToken(Int $limit = 1): String {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
			'Sync' => []
		])->where([
			'Sync' => ['name' => 'pass']
		])->many($limit) as $teams) {
			$result['token'] = $teams['token'];
		}
		return "Bearer " . $result['token'];
	}	

	public function getTeamsId(String $personId, Int $limit = 1): ?String {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
				'Teams' => []
			])->where([
				'Teams' => ['personId' => $personId]
			])->many($limit) as $teams) {
				$result['teamsId'] = $teams['teamsId'];
		}
		if(isset($result['teamsId'])) {
			return $result['teamsId'];
		} else {
			return null;
		}
	}

	public function save(String $personId, String $teamsId):self {
		$db = $this->db;
		$db->insert([
			'Teams' => [ 
				'personId' => $personId,
				'teamsId' => $teamsId 
				]
		])->run(true)->storage['inserted'];
		return $this;
	}

	public function getRefreshToken(Int $limit = 1): ?String {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
			'Sync' => []
		])->where([
			'Sync' => ['name' => 'refresh']
		])->many($limit) as $teams) {
			$result['token'] = $teams['token'];
		}
		return $result['token'];
	}
	
	public function getLinkedIds(Int $limit = 0): ?array {
		$result = [];
		$db = self::getDB();
		foreach ($db -> select([
				'Teams' => []
			])->where([
				'Teams' => []
			])->many($limit) as $teams) {
                $class = __CLASS__;
                $result[] = new $class($teams['id'], $teams['teamsId'], $teams['personId']);
			}

		return $limit == 1 ? (isset($result[0]) ? $result[0] : null) : $result;
	}

	public function __construct(
		public Int $id = 0, 
		public String $teamsId = '', 
		public String $personId = '',
	) {
		//$this->db = $this->getDB();
	}
}
