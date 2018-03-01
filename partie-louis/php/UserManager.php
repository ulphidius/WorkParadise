<?php
	class UserManager{
		private $_db;

		public function __construct($db){
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
		public function setDb($db){
			$this->_db = $db;
		}

		public function addUser(User $user){
			$connect = $this->_db->prepare('INSERT INTO USERS(prenom, nom, email, pwd) VALUES(:prenom, :nom, :email, :pwd)');
			$connect->bindValue(':prenom', $user->prenom(), PDO::PARAM_STR);
			$connect->bindValue(':nom', $user->nom(), PDO::PARAM_STR);
			$connect->bindValue(':email', $user->email(), PDO::PARAM_STR);
			$connect->bindValue(':pwd', $user->pwd(), PDO::PARAM_STR);

			$connect->execute();

		}

		public function deleteUser(User $user){
			$this->_db->exec('DELETE FROM USERS WHERE id ='.$user->id())
		}

		public function getUser($id){
			$id = (int) $id;
			$connect = $this->_db->query('SELECT id, prenom, nom, email, pwd FROM USERS WHERE id ='.$id);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new User($data);
		}

		public function getList(){
			$users = [];
			$connect = $this->_db-query('SELECT id, prenom, nom, email, pwd FROM USERS ORDER BY nom');

			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$users[] = new User($data);
			}

			return $users;
		}

		public function updateUser(User $user){
			$connect = $this->_db->prepare('UPDATE USERS SET id = :id, prenom = :prenom, nom = :nom, email = :email, pwd = :pwd WHERE id = :id');
			$connect->bindValue(':id', $user->id(), PDO::PARAM_INT);
			$connect->bindValue(':prenom', $user->prenom(), PDO::PARAM_STR);
			$connect->bindValue(':nom', $user->nom(), PDO::PARAM_STR);
			$connect->bindValue(':email', $user->email(), PDO::PARAM_STR);
			$connect->bindValue(':pwd', $user->pwd(), PDO::PARAM_STR);

			$connect->execute();

		}

	}
?>