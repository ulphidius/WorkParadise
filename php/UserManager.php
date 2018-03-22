<?php
	require "User.php";
	
	class UserManager{
		private $_db;

		public function __construct(PDO $db){
			$this->_db = $db;
		}

		public function __destruct(){
			$this->_db;
		}

		// Getter
		public function getDb(){
			return $this->_db;
		}

		// Setter
		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function addUser(User $user){
			$connect = $this->_db->prepare('INSERT INTO Users(admin, firstname, lastname, phoneN, statut, email, pwd, subscription, secret) VALUES(:admin, :firstname, :lastname, :phoneN, :statut, :email, :pwd, :subscription, :secret)');

			$connect->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);			
			$connect->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
			$connect->bindValue(':statut', $user->getStatut(), PDO::PARAM_BOOL);
			$connect->bindValue(':admin', $user->getAdmin(), PDO::PARAM_BOOL);
			$connect->bindValue(':phoneN', $user->getPhone(), PDO::PARAM_STR);
			$connect->bindValue(':subscription', $user->getSubscription(), PDO::PARAM_STR);
			$connect->bindValue(':secret', $user->getSecret(), PDO::PARAM_STR);

			$pwd = password_hash($user->getPwd(), PASSWORD_DEFAULT);
			$connect->bindValue(':pwd', $pwd, PDO::PARAM_STR);

			$connect->execute();

		}

		public function deleteUser(User $user){
			$connect = $this->_db->prepare('DELETE FROM Users WHERE id = :id');
			$connect->execute([":id"=>$user->getId()]);
		}

		public function getUser($id){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT admin, firstname, lastname, phoneN, statut, email, pwd, subscription, secret FROM Users WHERE id = :id');
			$connect->execute([":id"=>$id]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new User($data);
		}

		public function getPhone($id){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT phoneN FROM Users WHERE id = :id');
			$connect->execute([":id"=>$id]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);
		}

		public function getList(){
			$users = [];
			$connect = $this->_db->prepare('SELECT admin, firstname, lastname, phoneN, statut, email, pwd, subscription secret FROM Users ORDER BY lastname');
			$connect->execute();
			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$users[] = new User($data);
			}

			return $users;
		}

		public function checkEmail($email){
			$connect = $this->_db->prepare('SELECT email FROM Users WHERE email = :email');
			$connect->execute([":email"=> $email]);
			$result = $connect->fetch();
			if(empty($result)){
				return false;
			} 
			return true;
		}

		public function checkSecret($email, $secret){
			$connect = $this->_db->prepare('SELECT secret FROM Users WHERE email = :email');
			$connect->execute([":email"=> $email]);
			$result = $connect->fetch();
			if($result != $secret){
				return false;
			} 
			return true;
		}

		public function checkLastname($email, $name){
			$connect = $this->_db->prepare('SELECT lastname FROM Users WHERE email = :email');
			$connect->execute([":email"=> $email]);
			$result = $connect->fetch();
			if($result && $name == $result["lastname"]){
				return true;			
			}
			return false;
		}

		public function checkFirstname($email, $name){
			$connect = $this->_db->prepare('SELECT firstname FROM Users WHERE email = :email');
			$connect->execute([":email"=> $email]);
			$result = $connect->fetch();
			if($result && $name == $result["firstname"]){
				return true;			
			}
			return false;
		}

		public function checkPwd($email, $pwd){
			$connect = $this->_db->prepare('SELECT pwd FROM Users WHERE email = :email');
			$connect->execute([":email" => $email]);
			$result = $connect->fetch();

			if($result && password_verify($pwd, $result["pwd"])){
				return true;			
			}else{
				return false;			
			}
			
		}
		
		public function loadId($email){
			$connect = $this->_db->prepare('SELECT id FROM Users WHERE email = :email');
			$connect->execute([":email" => $email]);
			$id = $connect->fetch();
			
			return $id;
		}

		public function checkValidation($email){
			$connect = $this->_db->prepare('SELECT statut FROM Users WHERE email = :email');
			$connect->execute([":email" => $email]);
			$validation = $connect->fetch();

			if($validation == 1){
				return true;
			}else{
				return false;
			}
		}

		public function updatePwd($email, $password){
			$connect = $this->_db->prepare('UPDATE Users SET pwd = :pwd WHERE email = :email');
			$connect->bindValue(':email', $email, PDO::PARAM_STR);
			$connect->bindValue(':pwd', $password, PDO::PARAM_STR);

			$connect->execute();
		}

		public function updateUser(User $user){
			$connect = $this->_db->prepare('UPDATE Users SET id = :id, lastname = :lastname, firstname = :firstname, email = :email, pwd = :pwd admin = :admin phoneN = :phone statut = :statut subscription = :subscription secret = :secret WHERE id = :id');
			
			$pwd = password_hash($user->getPwd(), PASSWORD_DEFAULT);
			
			$connect->bindValue(':id', $user->getId(), PDO::PARAM_INT);
			$connect->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
			$connect->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
			$connect->bindValue(':pwd', $pwd, PDO::PARAM_STR);
			$connect->bindValue(':admin', $user->getAdmin(), PDO::PARAM_BOOL);
			$connect->bindValue(':statut', $user->getStatut(), PDO::PARAM_BOOL);
			$connect->bindValue(':phone', $user->getPhone(), PDO::PARAM_STR);
			$connect->bindValue(':subscription', $user->getSubscription(), PDO::PARAM_STR);
			$connect->bindValue(':secret', $user->getSubscription(), PDO::PARAM_STR);

			$connect->execute();

		}

	}
