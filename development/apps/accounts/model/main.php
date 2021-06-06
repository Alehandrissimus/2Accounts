<?php
/**
 * User Controller
 *
 * @author Serhii Shkrabak
 * @global object $CORE->model
 * @package Model\Main
 */
namespace Model;

use \Model\Entities\User;
use \Model\Entities\Teams;
use \Model\Entities\Person;
use \Model\Entities\Button;
use \Model\Entities\Group;

class Main
{
	use \Library\Shared;

	public function uniwebhook(String $type = '', String $value = '', Int $code = 0):?array {
		$result = null;
		switch ($type) {
			case 'click':
				$result = $this->processClick($code);
				break;
			case 'message':
				$result = [
					'to' => $GLOBALS['uni.user'],
					'type' => 'message',
					'value' => "Сервіс `Акаунти та ресурси`. Виберіть обліковий запис",
					'keyboard' => [
						'inline' => true,
						'buttons' => [
							[['id' => 1, 'title' => 'MS Teams']],
							[['id' => 2, 'title' => 'Google']],
							[['id' => 0, 'title' => 'Повернутись']]
						]
					]
				];
				break;
		}

		return $result;
	}

	public function processClick(Int $code) {
		$result = [];
		switch($code) {
			case 24:
				$buttons = Button::loadButtons();
				$formedButtons = [];
				foreach($buttons as $button) {
					array_push($formedButtons, ['id' => $button->id, 'title' => $button->message]);
				}
				$result = [
					'to' => $GLOBALS['uni.user'],
					'type' => 'message',
					'value' => "Сервіс `Акаунти та ресурси`. Натиснуто кнопку $code",
					'keyboard' => [
						'buttons' => [$formedButtons]
					]
				];
				break;
			case 0:
				$result = ['type' => 'context', 'set' => null];
				break;
			case 1:
				$user = User::search(guid: $GLOBALS['uni.user'], limit: 1);
				if(!isset($user)) {
					return $result = [
						'to' => $GLOBALS['uni.user'],
						'type' => 'message',
						'value' => "User not found",
					];
				} else {
					if(isset($user->personId)) {
						$teams = new Teams();
						$teamsId = $teams->getTeamsId($user->personId);
						if(isset($teamsId)) {
							$data = $teams->get($user->personId);
							$result = [
								'to' => $GLOBALS['uni.user'],
								'type' => 'message',
								'value' => 'id аккаунта: ' . $data['id'] . '    email аккаунта: ' . $data['mail'],
								'keyboard' => [
									'inline' => true,
									'buttons' => [
										[['id' => 3, 'title' => 'Скинути пароль']],
										[['id' => 0, 'title' => 'Повернутись']]
									]
								]
							];
						} else {
							$teams = new Teams();
							$data = $teams->create($user);
							$result = [
								'to' => $GLOBALS['uni.user'],
								'type' => 'message',
								'value' => 'Аккаунт MS Teams успешно ' . $data['id'] 
								. ' Mail: ' . $data['mail'] 
								. '  Password: ' . $data['password'] 
								. '  Display name: ' . $data['displayName']
							];
						}
					} else {
						$result = ['type' => 'context', 'set' => 'verify'];
					}
				}
				break;
			case 2:
				$user = User::search(guid: $GLOBALS['uni.user'], limit: 1);
				$result = [
					'to' => $GLOBALS['uni.user'],
					'type' => 'message',
					'value' => "google кнопку a verified",
				];
				break;
			case 3:
				$user = User::search(guid: $GLOBALS['uni.user'], limit: 1);
				$teams = new Teams();
				$data = $teams->dropPass($user->guid);
				return $result = [
					'to' => $GLOBALS['uni.user'],
					'type' => 'message',
					'value' => "Пароль сброшен. Новый пароль: " . $data,
				];
				break;
			default:
				$result = [
					'to' => $GLOBALS['uni.user'],
					'type' => 'message',
					'value' => "som $code error",
				];
			}
		return $result;
	}


	public function accountcreate(String $type, ?String $firstName, ?String $middleName, ?String $lastName, ?String $group, ?String $department, ?String $guid):?array {
		$result = [];

		switch ($type) {
			case 'user': 
				$user = new User();
				$user->save();
				$result['guid'] = $user->guid;
				break;
			case 'person':
				$data = [
					'person' => $guid,
					'firstName' => $firstName,
					'middleName' => $middleName,
					'lastName' => $lastName,
					'group' => $group,
					'department' => $department,
					'isLecturer' => 0,
				];
				$person = new Person();
				$person->save($data);
				$result[$data['person']] = $person->personId;
				break;
			case 'lecturer':
				$data = [
					'person' => $guid,
					'firstName' => $firstName,
					'middleName' => $middleName,
					'lastName' => $lastName,
					'group' => $group,
					'department' => $department,
					'isLecturer' => 1,
				];
				$person = new Person();
				$person->save($data);
				$result[$data['person']] = $person->personId;
				break;
			default: 
				throw new \Exception("REQUEST_UNKNOWN");
		}

		return $result;
	}

	
	//TODO user array accept
	public function accountlist(String $type, String $user, String $filter):?array {
		$result = [];
		
		switch ($type) {
			case 'user': 
				$user = new User(guid: $user);
				$result = [$user->search($user->guid)];
				break;
			case 'person': 
				$user = new User(guid: $user);
				$result = $user->search($user->guid);
				$person = new Person();
				$result = $person->search($result->personId);
				break;
			case 'lecturer':
				$lecturer = new Person();
				$result = $lecturer->searchby('isLecturer,1');
				break;
			case 'personlist':
				$person = new Person();
				$result = $person->searchby($filter);
				break;
			case 'personsunlinked':
				$person = new Person();
				$result = $person->unlinked();
				break;
			default: throw new \Exception("REQUEST_UNKNOWN");
		}

		return $result;
	}


	public function accountedit(String $type, String $owner, String $data):?array {
		$result = [];
		$data = json_decode($data, true);

		switch ($type) {
			case 'user': 
				$user = new User(guid: $owner);
				$result['result'] = $user->edit($data);
				break;
			case 'person':
				$person = new Person();
				$result['result'] = $person->edit($owner, $data);
				break;
			default: throw new \Exception("REQUEST_UNKNOWN");
		}

		return $result;
	}


	public function accountlink(String $person, String $guid, String $type): ?array {
		$result = [];
		
		switch($type) {
			case 'link':
				$teams = new Teams();
				$teams->save(personId: $person, teamsId: $guid);
				$result = [true];	
				break;
			default: 
				$user = new User(guid: $guid);
				$result['result'] = $user->edit(['PersonID' => $person]);
				break;
		}

		return $result;
	}

	
	public function accountgroups(): ?array {
		$result = [];
		$db = $this->db;
		
		$groups = Group::loadGroups();
		$persons = Person::searchby();

		if(count($groups) == 1) {
			return ["wtf"];
		}
		foreach($groups as $group) {
			$count = 0;
			foreach($persons as $person) {
				if($group->nameGroup == $person->party) {
					$count++;
					$result[$group->nameGroup . " " . $group->nameDepartment] = $count; 
				}
			}
		}

		return $result;
	}



	public function accountrefresh(): ?array {
		$db = new \Library\MySQL('core',
    		\Library\MySQL::connect(
      		$this->getVar('DB_HOST', 'e'),
      		$this->getVar('DB_USER', 'e'),
      		$this->getVar('DB_PASS', 'e')
    	));
  		// Getting app token
		$params = [
    		'grant_type' => 'client_credentials',
    		'client_id' => 'b12ee5c0-54af-4b8c-afaa-f55aafdaa164',
    		'scope' => 'https://graph.microsoft.com/.default',
    		'client_secret' => 'Wauu3~~'
		];
    
		$response = $this->request('login.microsoftonline.com/8efef98e-4b58-4293-8fbe-408a6973145a/oauth2/v2.0/token', $params);
		$result = 'Bearer ' . $response['access_token'];

		$db -> update('Sync', ['token' => $result])
			-> where(['Sync'=> ['name' => 'application']])
			-> run();

    
		// Refreshing pass token
		$limit = 1;
		$refresh = null;
		$db = self::getDB();
		foreach ($db -> select([
			'Sync' => []
		])->where([
			'Sync' => ['name' => 'refresh']
		])->many($limit) as $teams) {
			$refresh = $teams['token'];
		}

		$params = [
  			'grant_type' => 'refresh_token',
  			'client_id' => 'b12ee5c0-54af-4b8c-afaa-f55aafdaa164',
  			'scope' => 'offline_access User.ReadWrite User.ReadWrite.All User.ManageIdentities.All Directory.ReadWrite.All Directory.AccessAsUser.All',
  			'client_secret' => 'Wauu3~~',
  			'refresh_token' => $refresh
		];

		$response = $this->request('login.microsoftonline.com/8efef98e-4b58-4293-8fbe-408a6973145a/oauth2/v2.0/token', $params);
		// Updating access_token
		$db -> update('Sync', ['token' => $response['access_token']])
			-> where(['Sync'=> ['name' => 'pass']])
			-> run();
		// Updating refresh token
		$db -> update('Sync', ['token' => $response['refresh_token']])
			-> where(['Sync'=> ['name' => 'refresh']])
			-> run();
		
		return [true];
	}


	public function accounttoken() {
		$db = $this->db;

		
		foreach ($db -> select([
			'Sync' => []
		])->where([
			'Sync' => ['name' => 'application']
		])->many(1) as $token) {
			$refresh = $token['token'];
		}

		return ['token' => $refresh];
	}



	public function __construct() {
		$this->db = new \Library\MySQL('core',
			\Library\MySQL::connect(
				$this->getVar('DB_HOST', 'e'),
				$this->getVar('DB_USER', 'e'),
				$this->getVar('DB_PASS', 'e')
			) );
		$this->setDB($this->db);
		//$this -> TG = new Services\Telegram(key: $this->getVar('TGKey', 'e'), emergency: 280751679);
	}
}