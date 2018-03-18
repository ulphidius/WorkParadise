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
			$connect = $this->_db->prepare('INSERT INTO USERS(prenom, nom, email, pwd) VALUES(:prenom, :nom, :email, :pwd)');

			$connect->bindValue(':prenom', $user->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':nom', $user->getLastname(), PDO::PARAM_STR);			
			$connect->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
			
			$pwd = password_hash($user->getPwd(), PASSWORD_DEFAULT);
			$connect->bindValue(':pwd', $pwd, PDO::PARAM_STR);

			$connect->execute();

		}

		public function deleteUser(User $user){
			$connect = $this->_db->prepare('DELETE FROM USERS WHERE id = :id');
			$connect->execute([":id"=>$user->getId()]);
		}

		public function getUser($id){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT id, prenom, nom, email, pwd FROM USERS WHERE id = :id');
			$connect->execute([":id"=>$id]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new User($data);
		}

		public function getList(){
			$users = [];
			$connect = $this->_db-prepare('SELECT id, prenom, nom, email, pwd FROM USERS ORDER BY nom');
			$connect->execute();
			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$users[] = new User($data);
			}

			return $users;
		}

		public function checkEmail($email){
			$connect = $this->_db->prepare('SELECT email FROM USERS WHERE email = :email');
			$connect->execute([":email"=> $email]);
			$result = $connect->fetch();
			if(empty($result)){
				return false;
			} 
			return true;
		}
		
		public function checkPwd($email, $pwd){
			$connect = $this->_db->prepare('SELECT pwd FROM USERS WHERE email = :email');
			$connect->execute([":email" => $email]);
			$result = $connect->fetch();

			if($result && password_verify($pwd, $result["pwd"])){
				return true;			
			}else{
				return false;			
			}
			
		}
		
		public function loadId($email){
			$connect = $this->_db->prepare('SELECT id FROM USERS WHERE email = :email');
			$connect->execute([":email" => $email]);
			$id = $connect->fetch();
			
			return $id;
		}

		public function checkValidation($email){
			$connect = $this->_db->prepare('SELECT validation FROM USERS WHERE email = :email');
			$connect->execute([":email" => $email]);
			$validation = $connect->fetch();

			if($validation == 1){
				return true;
			}else{
				return false;
			}
		}

		public function updateUser(User $user){
			$connect = $this->_db->prepare('UPDATE USERS SET id = :id, prenom = :prenom, nom = :nom, email = :email, pwd = :pwd WHERE id = :id');
			
			$pwd = password_hash($user->getPwd(), PASSWORD_DEFAULT);
			
			$connect->bindValue(':id', $user->getId(), PDO::PARAM_INT);
			$connect->bindValue(':prenom', $user->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':nom', $user->getLastname(), PDO::PARAM_STR);
			$connect->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
			$connect->bindValue(':pwd', $pwd, PDO::PARAM_STR);

			$connect->execute();

		}

	}
